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
                                        <th>Mother NIC</th>
                                        <th>Baby ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data['babies']))
                                        @foreach ($data['babies'] as $key => $baby)
                                            <tr>
                                                <td>{{$baby->mother_nic}}</td>
                                                <td>{{$baby->baby_id}}</td>
                                                <td>{{$baby->baby_first_name.' '.$baby->baby_last_name}}</td>
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

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.li-baby').addClass('drop-active');
    });

    $('#manage-users').on('click', function () {
        $('#manage-users').toggleClass('active');
        $('#manage').toggleClass('collapse-manage d-none');
    }); 

</script>

@endsection
