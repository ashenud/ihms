@extends('layouts.app')

@section('title')
<title>Doctor Dashboard</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/doctor/doc-view-babies-style.css')}}">

    <style>
        .collapse-manage {
            display: block !important;
        }
        .swal-title {
            font-family: 'yaldevicolombo';
            font-size: 30px;
        }
        .swal-text {
            font-family: 'abhaya';
            font-size: 18px;
            color: black;
        }
    </style>

@endsection

@section('user-area')
    <img src="{{asset('img/doctor/doctor.png')}}" class="rounded-circle">
    @isset($data)
        <a href="#"> <span>{{$data['doctor_name']}}</span> </a>
    @endisset
@endsection

@section('sidebar')
@include('layouts.sidebars.doctor')
@endsection

@section('content')
<div class="content">
              
    <!-- alert section -->
    @include('layouts.alerts')
    <!-- end of alert section -->
   
    <div class="container">
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">සියලුම ළදරුවන්</h5>
                        
                        <div class="table-for-data" style="margin-top: 30px">

                            <table class="mdl-data-table table-responsive-xl bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Sister ID</th>
                                        <th>Sister Name</th>
                                        <th>Division</th>
                                        <th>Send Messages</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data['sisters']))
                                        @foreach ($data['sisters'] as $key => $sister)
                                            <tr>
                                                <td>{{$sister->sister_id}}</td>
                                                <td>{{$sister->sister_name}}</td>
                                                <td>{{$sister->moh_division}}</td>
                                                <td>
                                                    <a href="{{url('doctor/send-messages')}}" type="button" name="send-btn" class="btn send-btn"><i class="fa fa-comment-dots" aria-hidden="true"></i></a>
                                                </td>
                                                <td class="d-flex justify-content-end remove-btns">
                                                    <input type="hidden" id="sister_{{$key+1}}" value="{{$sister->id}}">
                                                    @if ($sister->status == 1)
                                                        <input type="hidden" id="type_{{$key+1}}" value="0">
                                                        <button id="sister_btn_{{$key+1}}" onclick="inactiveSister({{$key+1}})" class="btn remove-btn"><i class="fas fa-user-slash" aria-hidden="true"></i><span>INACTIVE</span></button>
                                                    @else
                                                        <input type="hidden" id="type_{{$key+1}}" value="1">
                                                        <button id="sister_btn_{{$key+1}}" onclick="activeSister({{$key+1}})" class="btn inactive-btn"><i class="fas fa-user-plus" aria-hidden="true"></i><span>ACTIVE</span></button>
                                                    @endif
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
            <div class="col-md-1"></div>
        </div>
        
    </div>

</div>
@endsection

@section('script')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.li-sis').addClass('drop-active');
    });
    
    $('#manage-users').on('click', function () {
        $('#manage-users').toggleClass('active');
        $('#manage').toggleClass('collapse-manage d-none');
    }); 

    function activeSister(row) {
        var sister_id = $('#sister_'+row).val();
        var type = $('#type_'+row).val();
        swal({
            title: "ඔබට විශ්වාසද?",
            text: "මෙම ගිණුම සක්‍රීය කිරීමට !",
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
                    url: '{{url("/doctor/inactivate-sister-action")}}',
                    type: 'POST',
                    data: {sister_id:sister_id,type:type},
                    dataType: 'JSON',
                    success: function (data) { 
                        if(data.result == true) {
                            console.log(data);
                            $('#sister_btn_'+row).addClass(data.add_class);
                            $('#sister_btn_'+row).removeClass(data.remove_class);
                            $('#sister_btn_'+row).attr('onclick', 'inactiveSister('+row+')');
                            $('#sister_btn_'+row).html('<i class="fas fa-user-slash" aria-hidden="true"></i><span>INACTIVE</span>');
                            $('#type_'+row).val(0);
                            swal(data.message, {
                                icon: "success",
                            });
                        }
                        else {
                            swal(data.message, {
                                icon: "success",
                            });
                        }                      
                    }
                });
                
            } else {
                swal("අවලංඟු කරන ලදී !");
            }
        });
    }

    function inactiveSister(row) {
        var sister_id = $('#sister_'+row).val();
        var type = $('#type_'+row).val();
        swal({
            title: "ඔබට විශ්වාසද?",
            text: "මෙම ගිණුම අක්‍රීය කිරීමට !",
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
                    url: '{{url("/doctor/inactivate-sister-action")}}',
                    type: 'POST',
                    data: {sister_id:sister_id,type:type},
                    dataType: 'JSON',
                    success: function (data) { 
                        if(data.result == true) {
                            console.log(data);
                            $('#sister_btn_'+row).addClass(data.add_class);
                            $('#sister_btn_'+row).removeClass(data.remove_class);
                            $('#sister_btn_'+row).attr('onclick', 'activeSister('+row+')');
                            $('#sister_btn_'+row).html('<i class="fas fa-user-plus" aria-hidden="true"></i><span>ACTIVE</span>');
                            $('#type_'+row).val(1);
                            swal(data.message, {
                                icon: "success",
                            });
                        }
                        else {
                            swal(data.message, {
                                icon: "success",
                            });
                        }                      
                    }
                });
                
            } else {
                swal("අවලංඟු කරන ලදී !");
            }
        });
    }

</script>

@endsection
