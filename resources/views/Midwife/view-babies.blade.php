@extends('layouts.app')

@section('title')
<title>VIEW BABIES</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/midwife/mid-view-babies-style.css')}}">
<style>
    .collapse-manage {
        display: block !important;
    }
</style>
@endsection

@section('user-area')
    <img src="{{asset('img/midwife/midwife.png')}}" class="rounded-circle">
    @isset($data)
    <a href="#"> <span>{{$data['midwife_name']}}</span> </a>
    @endisset
@endsection

@section('sidebar')
@include('layouts.sidebars.midwife')
@endsection

@section('content')
<div class="content">
               
    <!-- alert section -->
    @include('layouts.alerts')
    <!-- end of alert section -->
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">active babies</h5>
                        
                        <div class="table-for-data" style="margin-top: 30px">
                            <table class="mdl-data-table table-responsive-xl bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Baby Name</th>
                                        <th>Baby ID</th>
                                        <th>Mother NIC</th>
                                        <th>Age</th>
                                        <th class="text-center baby-actions">View</th>
                                        <th class="text-center baby-actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @if (isset($data['babies']))
                                    @foreach ($data['babies'] as $key => $baby)
                                    <tr>
                                        <td>{{$baby->baby_first_name.' '.$baby->baby_last_name}}</td>
                                        <td>{{$baby->baby_id}}</td>
                                        <td>{{$baby->mother_nic}}</td>
                                        @php
                                            $age = \Carbon\Carbon::parse($baby->baby_dob)->diff(\Carbon\Carbon::now());
                                            $years = $age->format('%y');
                                            $months = $age->format('%m');
                                            $days = $age->format('%d');
                                            $age_formated = "";
                                            if($years != 0){ $age_formated .= $years.'years '; } if($months != 0){ $age_formated .= $months.'months '; } if($days != 0){ $age_formated .= $days.'days'; } 
                                        @endphp
                                        <td>{{$age_formated}}</td>
                                        <td>
                                            <form action="{{url("/general/view-data")}}" method="POST">
                                                <input type="hidden" name="view-id" value="{{$baby->baby_id}}">
                                                <button type="submit" name="view-btn" class="btn view-btn"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                        <td class="d-flex justify-content-end remove-btns">
                                            <input type="hidden" id="baby_{{$key+1}}" value="{{$baby->id}}">
                                            @if ($baby->status == 1)
                                                <input type="hidden" id="type_{{$key+1}}" value="0">
                                                <button id="baby_btn_{{$key+1}}" onclick="inactiveBaby({{$key+1}})" class="btn remove-btn"><i class="fas fa-user-slash" aria-hidden="true"></i><span>INACTIVE</span></button>
                                            @else
                                                <input type="hidden" id="type_{{$key+1}}" value="1">
                                                <button id="baby_btn_{{$key+1}}" onclick="inactiveBaby({{$key+1}})" class="btn inactive-btn"><i class="fas fa-user-plus" aria-hidden="true"></i><span>ACTIVE</span></button>
                                            @endif
                                            {{-- <button onclick="inactiveMother('{{$baby->mother_nic}}')" class="btn remove-btn ml-2"><i class="fas fa-user-slash" aria-hidden="true"></i><span>MOTHER</span></button> --}}
                                        </td>
                                    </tr>                                        
                                    @endforeach                                    
                                @else
                                    
                                @endif
                                   

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>              
    
</div>
@endsection

@section('script')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.li-view').addClass('drop-active');
    });

    $('#manage-users').on('click', function () {
        $('#manage-users').toggleClass('active');
        $('#manage').toggleClass('collapse-manage d-none');
    }); 

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideToggle(500, function(){
            $(this).remove();
        });
    }, 3500);

    function inactiveBaby(row) {
        var baby_id = $('#baby_'+row).val();
        var type = $('#type_'+row).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will be able to recover this baby details!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{url("/midwife/inactivate-baby-action")}}',
                    type: 'POST',
                    data: {baby_id:baby_id,type:type},
                    dataType: 'JSON',
                    success: function (data) { 
                        if(data.result == true) {
                            console.log(data);
                            $('#baby_btn_'+row).addClass(data.add_class);
                            $('#baby_btn_'+row).removeClass(data.remove_class);
                            swal("Poof! "+data.message, {
                                icon: "success",
                            });
                        }
                        else {
                            swal("Poof! "+data.message, {
                                icon: "success",
                            });
                        }                      
                    }
                });
                
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    }

</script>

@endsection
