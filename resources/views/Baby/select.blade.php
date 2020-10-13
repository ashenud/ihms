@extends('layouts.app')

@section('title')
<title>Infant Health Management System</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/baby/baby-select-style.css')}}">
@endsection

@section('user-area')
    <img src="{{asset('img/baby/mother.png')}}" class="rounded-circle">
    @isset($data['mother_name'])
        <a href="#"> <span>{{$data['mother_name']}}</span> </a>
    @endisset
@endsection

@section('sidebar')
@include('layouts.sidebars.mother')
@endsection

@section('content')
<div class="content">
               
    <div class="container">
        <div class="row">
            @isset($data['babies'])

                @foreach ($data['babies'] as $baby)

                    @if ($baby['baby_gender'] == 'M')
                        <div class="col-md-auto">
                            <form action="{{url('baby/change')}}" method="POST">
                                @csrf
                                <input type="hidden" name="baby_id" value="{{$baby['baby_id']}}">
                                <button type="submit" class="btn" name="submit">
                                    <div class="card card-common">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <i class="fas fa-baby" style="color: #2a94c3;"></i>
                                            </div>
                                        </div>
                                        <div class="c-footer py-1 text-center">
                                            <center> <p style="color: #1565c0;"> {{$baby['baby_first_name']}} </p> </center>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="col-md-auto">
                            <form action="{{url('baby/change')}}" method="POST">
                                @csrf
                                <input type="hidden" name="baby_id" value="{{$baby['baby_id']}}">
                                <button type="submit" class="btn" name="submit">
                                    <div class="card card-common">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <i class="fas fa-baby" style="color: #bd445d;"></i>
                                            </div>
                                        </div>
                                        <div class="c-footer py-1 text-center">
                                            <center> <p style="color: #c2185b;"> {{$baby['baby_first_name']}} </p> </center>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>                        
                    @endif
                    
                @endforeach
                
            @endisset
           
        </div>
    </div>

</div>
@endsection

@section('script')

<script type="text/javascript" src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('css/calendar/calendar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/charts/Chart.min.js')}}"></script>

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.d-dash').addClass('active');
    }); 
</script>

@endsection
