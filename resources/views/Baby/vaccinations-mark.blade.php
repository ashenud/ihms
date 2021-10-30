@extends('layouts.app')

@section('title')
<title>Midwife Vaccination Mark</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/baby/baby-vaccinations-mark-style.css')}}">

    @if (($data['baby_gender'] == 'M'))
        <!--male badge color-->
        <style>
            .main-timeline:before {
                background: #c2255c;
            }
            .main-timeline .timeline {
                border-top: 7px solid #084772;
                border-right: 7px solid #084772;
            }
            .main-timeline .icon {
                background: #17a2b8;
            }
            .main-timeline .timeline-content {
                background: #bac8ff;
            }
            .main-timeline .timeline-content:before,
            .main-timeline .timeline-content:after {
                background: #bac8ff;
            }
            .main-timeline .timeline:nth-child(2n) {
                border-left: 7px solid #084772;
            }
            .badge-secondary
            {
                background: linear-gradient(60deg, #929fba, #7283a7);
            }            
        </style>    
    @else
        <!--female badge color-->
        <style>
            .main-timeline:before {
                background: #084772;
            }
            .main-timeline .timeline {
                border-top: 7px solid #bd477d;
                border-right: 7px solid #bd477d;
            }
            .main-timeline .icon {
                background: #ea6aa5;
            }
            .main-timeline .timeline-content {
                background: #f8bbd0;
            }
            .main-timeline .timeline-content:before,
            .main-timeline .timeline-content:after {
                background: #f8bbd0;
            }
            .main-timeline .timeline:nth-child(2n) {
                border-left: 7px solid #bd477d;
            }
            .badge-secondary
            {
                background: linear-gradient(60deg, #929fba, #7283a7);
            }            
        </style>
    @endif

@endsection

@section('user-area')
    <img src="{{asset('img/baby/baby.png')}}" class="rounded-circle">
    @isset($data)
        <a href="#"> <span>{{$data['baby_name']}}</span> </a>
    @endisset
@endsection

@section('sidebar')
@include('layouts.sidebars.baby')
@endsection

@section('content')
<div class="content">
          
    @include('layouts.alerts')

    <!-- vaccination timeline section -->
    <div class="container-fluid">

        <div class="container">
        
            <div class="row">
                
                <div class="col-md-12">
                    
                    @if ($data['baby_gender'] == 'M')
                        <!--main-timeline male-->
                        <div class="main-timeline">

                            <!--at birth timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--at birth vaccination-->
                                    <div class="title">
                                        <h3>උපතේදී</h3>
                                    </div>

                                    <div class="description">

                                        <!--BCG-1-->                                        
                                        @if ($data['vac_data'][1]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                                    <label for="vaccine1"> @php $name1 = explode('+',$data['vac_data'][1]['name']); @endphp {{$name1[0]}}<br>{{$name1[1]}}</label>
                                                </span>
                                                <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                        <div class="card-body">
                                                                                                                                                            <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][1]['date_given']}}</p>
                                                                                                                                                            <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][1]['batch_no']}}</p>
                                                                                                                                                            <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][1]['side_effects']}}</p>
                                                                                                                                                        </div>
                                                                                                                                                    </div>'>එන්නත් කර ඇත
                                                </span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine1" value="1" disabled>
                                                    <label for="vaccine1"> @php $name1 = explode('+',$data['vac_data'][1]['name']); @endphp {{$name1[0]}}<br>{{$name1[1]}}</label>
                                                </span>
                                                <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='1'>
                                                    <span class="badge badge-danger">තොරතුරු ඇතුල් කරන්න</span>
                                                </button>
                                            </div>
                                        @endif
                                        <!--end BCG-1-->

                                        <!-- BCG-2(if no scar) -->
                                        @if ($data['vac_data'][1]['given_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][2]['given_status'] == 1)
                                                {{-- bcg-2 not empty=diilanam  --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][2]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][2]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][2]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif((($data['vac_data'][1]['given_status'] == 1) && ($data['vac_data'][1]['scar'] == 1)))
                                                {{-- bcg-2 dilanam && scar tyeinam --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary">බී.සී.ජී. කැළැල ඇත.</span>
                                                </div>
                                            @elseif($data['vac_data'][2]['giving_status'] == 1 && $data['vac_data'][2]['approvel_status'] == 0)
                                                {{-- bcg-2 date ekak dilanam --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][2]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @elseif($data['vac_data'][2]['giving_status'] == 1 && $data['vac_data'][2]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='2'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @else
                                                {{-- bcg-2 date ekak dila nattan --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='2'>
                                                        <span class="badge badge-off">මාස 6 වන විටත් කැළලක් නැත්නම්</span>
                                                    </button>                                                        
                                                </div>
                                            @endif
                                        @endif
                                        <!--end BCG-2(if no scar)-->
                                    </div>
                                </div>
                            </div>

                            <!-- 2 months timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--2 months vaccination-->
                                    <div class="title">
                                        <h3>2 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- Pentavalent 1 -->
                                        @if ($data['vac_data'][1]['given_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                    <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][3]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][3]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][3]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][3]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][3]['giving_status'] == 1 && $data['vac_data'][3]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='3'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][3]['giving_status'] == 1 && $data['vac_data'][3]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][3]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='3'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end Pentavalent 1-->

                                        <!-- OPV-1 -->
                                        @if ($data['vac_data'][3]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                    <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][4]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][4]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][4]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][4]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][4]['giving_status'] == 1 && $data['vac_data'][4]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='4'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][4]['giving_status'] == 1 && $data['vac_data'][4]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][4]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='4'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end OPV-1 -->

                                        <!-- fIPV 1 -->
                                        @if ($data['vac_data'][4]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                    <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][5]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" checked="checked" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][5]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][5]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][5]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][5]['giving_status'] == 1 && $data['vac_data'][5]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='5'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][5]['giving_status'] == 1 && $data['vac_data'][5]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][5]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='5'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end fIPV 1-->
                                    </div>
                                </div>
                            </div>

                            <!-- 4 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--4 month vaccination-->
                                    <div class="title">
                                        <h3>4 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- Pentavalent 2 -->
                                        @if ($data['vac_data'][5]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine6" value="6" disabled>
                                                    <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][6]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" checked="checked" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][6]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][6]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][6]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][6]['giving_status'] == 1 && $data['vac_data'][6]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='6'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][6]['giving_status'] == 1 && $data['vac_data'][6]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][6]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='6'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--Pentavalent 2 -->

                                        <!-- OPV-2 -->
                                        @if ($data['vac_data'][6]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                    <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][7]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" checked="checked" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][7]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][7]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][7]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][7]['giving_status'] == 1 && $data['vac_data'][7]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='7'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][7]['giving_status'] == 1 && $data['vac_data'][7]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][7]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='7'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end OPV-2 -->

                                        <!-- fIPV 2 -->
                                        @if ($data['vac_data'][7]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                    <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][8]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][8]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][8]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][8]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][8]['giving_status'] == 1 && $data['vac_data'][8]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='8'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][8]['giving_status'] == 1 && $data['vac_data'][8]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][8]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='8'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end fIPV 2-->
                                    </div>
                                </div>
                            </div>

                            <!-- 6 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--6 month vaccination-->
                                    <div class="title">
                                        <h3>6 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!--Pentavalent 3-->
                                        @if ($data['vac_data'][8]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                    <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][9]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][9]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][9]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][9]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][9]['giving_status'] == 1 && $data['vac_data'][9]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='9'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][9]['giving_status'] == 1 && $data['vac_data'][9]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][9]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='9'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end Pentavalent 3 -->

                                        <!-- OPV-3 -->
                                        @if ($data['vac_data'][9]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine10" value="10" disabled>
                                                    <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][10]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" checked="checked" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][10]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][10]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][10]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][10]['giving_status'] == 1 && $data['vac_data'][10]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='10'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][10]['giving_status'] == 1 && $data['vac_data'][10]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][10]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='10'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end OPV-3 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 9 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--9 month vaccination-->
                                    <div class="title">
                                        <h3>9 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- MMR 1 -->
                                        @if ($data['vac_data'][10]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                    <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][11]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" checked="checked" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][11]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][11]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][11]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][11]['giving_status'] == 1 && $data['vac_data'][11]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='11'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][11]['giving_status'] == 1 && $data['vac_data'][11]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][11]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='11'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end MMR 1-->
                                    </div>
                                </div>
                            </div>

                            <!-- 12 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--12 month vaccination-->
                                    <div class="title">
                                        <h3>12 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!--Live JE-->
                                        @if ($data['vac_data'][11]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                    <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][12]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" checked="checked" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][12]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][12]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][12]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][12]['giving_status'] == 1 && $data['vac_data'][12]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='12'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][12]['giving_status'] == 1 && $data['vac_data'][12]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][12]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='12'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end Live JE -->
                                    </div>
                                </div>
                            </div>

                            <!-- 18 months timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 18 months vaccination-->
                                    <div class="title">
                                        <h3>18 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- DPT -->
                                        @if ($data['vac_data'][11]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                    <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][13]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" checked="checked" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][13]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][13]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][13]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][13]['giving_status'] == 1 && $data['vac_data'][13]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='13'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][13]['giving_status'] == 1 && $data['vac_data'][13]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][13]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='13'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- DPT -->


                                        <!--OPV 4-->
                                        @if ($data['vac_data'][13]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                    <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][14]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" checked="checked" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][14]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][14]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][14]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][14]['giving_status'] == 1 && $data['vac_data'][14]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='14'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][14]['giving_status'] == 1 && $data['vac_data'][14]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][14]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='14'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end OPV 4 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 3 year timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 3 year vaccination-->
                                    <div class="title">
                                        <h3>3 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- MMR 2 -->
                                        @if ($data['vac_data'][14]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                    <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][15]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" checked="checked" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][15]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][15]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][15]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][15]['giving_status'] == 1 && $data['vac_data'][15]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='15'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][15]['giving_status'] == 1 && $data['vac_data'][15]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][15]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='15'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end MMR 2 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 5 years timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 5 years vaccination-->
                                    <div class="title">
                                        <h3>5 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">


                                        <!-- D.T -->
                                        @if ($data['vac_data'][15]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                    <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][16]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" checked="checked" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][16]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][16]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][16]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][16]['giving_status'] == 1 && $data['vac_data'][16]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='16'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][16]['giving_status'] == 1 && $data['vac_data'][16]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][16]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='16'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end D.T -->


                                        <!--OPV 5-->
                                        @if ($data['vac_data'][16]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                    <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][17]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" checked="checked" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][17]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][17]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][17]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][17]['giving_status'] == 1 && $data['vac_data'][17]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='17'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][17]['giving_status'] == 1 && $data['vac_data'][17]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][17]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='17'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end OPV 5 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 11 years timeline -->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 11 years vaccination -->
                                    <div class="title">
                                        <h3>11 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- aTd -->
                                        @if ($data['vac_data'][17]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                    <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][20]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" checked="checked" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][20]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][20]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][20]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][20]['giving_status'] == 1 && $data['vac_data'][20]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='20'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][20]['giving_status'] == 1 && $data['vac_data'][20]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][20]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='20'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end aTd -->                                                
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end main-timeline male-->
                    @else
                        <!--main-timeline female-->
                        <div class="main-timeline">

                            <!--at birth timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--at birth vaccination-->
                                    <div class="title">
                                        <h3>උපතේදී</h3>
                                    </div>

                                    <div class="description">

                                        <!--BCG-1-->                                        
                                        @if ($data['vac_data'][1]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                                    <label for="vaccine1"> @php $name1 = explode('+',$data['vac_data'][1]['name']); @endphp {{$name1[0]}}<br>{{$name1[1]}}</label>
                                                </span>
                                                <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                        <div class="card-body">
                                                                                                                                                            <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][1]['date_given']}}</p>
                                                                                                                                                            <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][1]['batch_no']}}</p>
                                                                                                                                                            <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][1]['side_effects']}}</p>
                                                                                                                                                        </div>
                                                                                                                                                    </div>'>එන්නත් කර ඇත
                                                </span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine1" value="1" disabled>
                                                    <label for="vaccine1"> @php $name1 = explode('+',$data['vac_data'][1]['name']); @endphp {{$name1[0]}}<br>{{$name1[1]}}</label>
                                                </span>
                                                <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='1'>
                                                    <span class="badge badge-danger">තොරතුරු ඇතුල් කරන්න</span>
                                                </button>
                                            </div>
                                        @endif
                                        <!--end BCG-1-->

                                        <!-- BCG-2(if no scar) -->
                                        @if ($data['vac_data'][1]['given_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][2]['given_status'] == 1)
                                                {{-- bcg-2 not empty=diilanam  --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][2]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][2]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][2]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif((($data['vac_data'][1]['given_status'] == 1) && ($data['vac_data'][1]['scar'] == 1)))
                                                {{-- bcg-2 dilanam && scar tyeinam --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary">බී.සී.ජී. කැළැල ඇත.</span>
                                                </div>
                                            @elseif($data['vac_data'][2]['giving_status'] == 1 && $data['vac_data'][2]['approvel_status'] == 0)
                                                {{-- bcg-2 date ekak dilanam --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][2]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @elseif($data['vac_data'][2]['giving_status'] == 1 && $data['vac_data'][2]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='2'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @else
                                                {{-- bcg-2 date ekak dila nattan --}}
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2"> @php $name2 = explode('+',$data['vac_data'][2]['name']); @endphp {{$name2[0]}}<br>{{$name2[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='2'>
                                                        <span class="badge badge-off">මාස 6 වන විටත් කැළලක් නැත්නම්</span>
                                                    </button>                                                        
                                                </div>
                                            @endif
                                        @endif
                                        <!--end BCG-2(if no scar)-->
                                    </div>
                                </div>
                            </div>

                            <!-- 2 months timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--2 months vaccination-->
                                    <div class="title">
                                        <h3>2 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- Pentavalent 1 -->
                                        @if ($data['vac_data'][1]['given_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                    <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][3]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][3]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][3]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][3]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][3]['giving_status'] == 1 && $data['vac_data'][3]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='3'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][3]['giving_status'] == 1 && $data['vac_data'][3]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][3]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3"> @php $name3 = explode('+',$data['vac_data'][3]['name']); @endphp {{$name3[0]}}<br>{{$name3[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='3'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end Pentavalent 1-->

                                        <!-- OPV-1 -->
                                        @if ($data['vac_data'][3]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                    <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][4]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][4]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][4]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][4]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][4]['giving_status'] == 1 && $data['vac_data'][4]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='4'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][4]['giving_status'] == 1 && $data['vac_data'][4]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][4]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4"> @php $name4 = explode('+',$data['vac_data'][4]['name']); @endphp {{$name4[0]}}<br>{{$name4[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='4'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end OPV-1 -->

                                        <!-- fIPV 1 -->
                                        @if ($data['vac_data'][4]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                    <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][5]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" checked="checked" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][5]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][5]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][5]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][5]['giving_status'] == 1 && $data['vac_data'][5]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='5'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][5]['giving_status'] == 1 && $data['vac_data'][5]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][5]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5"> @php $name5 = explode('+',$data['vac_data'][5]['name']); @endphp {{$name5[0]}}<br>{{$name5[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='5'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end fIPV 1-->
                                    </div>
                                </div>
                            </div>

                            <!-- 4 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--4 month vaccination-->
                                    <div class="title">
                                        <h3>4 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- Pentavalent 2 -->
                                        @if ($data['vac_data'][5]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine6" value="6" disabled>
                                                    <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][6]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" checked="checked" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][6]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][6]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][6]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][6]['giving_status'] == 1 && $data['vac_data'][6]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='6'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][6]['giving_status'] == 1 && $data['vac_data'][6]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][6]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6"> @php $name6 = explode('+',$data['vac_data'][6]['name']); @endphp {{$name6[0]}}<br>{{$name6[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='6'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--Pentavalent 2 -->

                                        <!-- OPV-2 -->
                                        @if ($data['vac_data'][6]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                    <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][7]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" checked="checked" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][7]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][7]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][7]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][7]['giving_status'] == 1 && $data['vac_data'][7]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='7'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][7]['giving_status'] == 1 && $data['vac_data'][7]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][7]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7"> @php $name7 = explode('+',$data['vac_data'][7]['name']); @endphp {{$name7[0]}}<br>{{$name7[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='7'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end OPV-2 -->

                                        <!-- fIPV 2 -->
                                        @if ($data['vac_data'][7]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                    <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][8]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][8]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][8]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][8]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][8]['giving_status'] == 1 && $data['vac_data'][8]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='8'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][8]['giving_status'] == 1 && $data['vac_data'][8]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][8]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8"> @php $name8 = explode('+',$data['vac_data'][8]['name']); @endphp {{$name8[0]}}<br>{{$name8[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='8'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end fIPV 2-->
                                    </div>
                                </div>
                            </div>

                            <!-- 6 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--6 month vaccination-->
                                    <div class="title">
                                        <h3>6 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!--Pentavalent 3-->
                                        @if ($data['vac_data'][8]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                    <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][9]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][9]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][9]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][9]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][9]['giving_status'] == 1 && $data['vac_data'][9]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='9'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][9]['giving_status'] == 1 && $data['vac_data'][9]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][9]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9"> @php $name9 = explode('+',$data['vac_data'][9]['name']); @endphp {{$name9[0]}}<br>{{$name9[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='9'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end Pentavalent 3 -->

                                        <!-- OPV-3 -->
                                        @if ($data['vac_data'][9]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine10" value="10" disabled>
                                                    <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][10]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" checked="checked" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][10]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][10]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][10]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][10]['giving_status'] == 1 && $data['vac_data'][10]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='10'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][10]['giving_status'] == 1 && $data['vac_data'][10]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][10]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10"> @php $name10 = explode('+',$data['vac_data'][10]['name']); @endphp {{$name10[0]}}<br>{{$name10[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='10'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end OPV-3 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 9 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--9 month vaccination-->
                                    <div class="title">
                                        <h3>9 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- MMR 1 -->
                                        @if ($data['vac_data'][10]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                    <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][11]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" checked="checked" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][11]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][11]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][11]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][11]['giving_status'] == 1 && $data['vac_data'][11]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='11'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][11]['giving_status'] == 1 && $data['vac_data'][11]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][11]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11"> @php $name11 = explode('+',$data['vac_data'][11]['name']); @endphp {{$name11[0]}}<br>{{$name11[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='11'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end MMR 1-->
                                    </div>
                                </div>
                            </div>

                            <!-- 12 month timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!--12 month vaccination-->
                                    <div class="title">
                                        <h3>12 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!--Live JE-->
                                        @if ($data['vac_data'][11]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                    <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][12]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" checked="checked" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][12]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][12]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][12]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][12]['giving_status'] == 1 && $data['vac_data'][12]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='12'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][12]['giving_status'] == 1 && $data['vac_data'][12]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][12]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12"> @php $name12 = explode('+',$data['vac_data'][12]['name']); @endphp {{$name12[0]}}<br>{{$name12[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='12'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end Live JE -->
                                    </div>
                                </div>
                            </div>

                            <!-- 18 months timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 18 months vaccination-->
                                    <div class="title">
                                        <h3>18 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- DPT -->
                                        @if ($data['vac_data'][11]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                    <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][13]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" checked="checked" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][13]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][13]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][13]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][13]['giving_status'] == 1 && $data['vac_data'][13]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='13'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][13]['giving_status'] == 1 && $data['vac_data'][13]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][13]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13"> @php $name13 = explode('+',$data['vac_data'][13]['name']); @endphp {{$name13[0]}}<br>{{$name13[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='13'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- DPT -->


                                        <!--OPV 4-->
                                        @if ($data['vac_data'][13]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                    <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][14]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" checked="checked" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][14]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][14]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][14]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][14]['giving_status'] == 1 && $data['vac_data'][14]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='14'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][14]['giving_status'] == 1 && $data['vac_data'][14]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][14]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14"> @php $name14 = explode('+',$data['vac_data'][14]['name']); @endphp {{$name14[0]}}<br>{{$name14[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='14'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end OPV 4 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 3 year timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 3 year vaccination-->
                                    <div class="title">
                                        <h3>3 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- MMR 2 -->
                                        @if ($data['vac_data'][14]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                    <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][15]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" checked="checked" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][15]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][15]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][15]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][15]['giving_status'] == 1 && $data['vac_data'][15]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='15'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][15]['giving_status'] == 1 && $data['vac_data'][15]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][15]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15"> @php $name15 = explode('+',$data['vac_data'][15]['name']); @endphp {{$name15[0]}}<br>{{$name15[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='15'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end MMR 2 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 5 years timeline-->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 5 years vaccination-->
                                    <div class="title">
                                        <h3>5 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">


                                        <!-- D.T -->
                                        @if ($data['vac_data'][15]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                    <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][16]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" checked="checked" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][16]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][16]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][16]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][16]['giving_status'] == 1 && $data['vac_data'][16]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='16'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][16]['giving_status'] == 1 && $data['vac_data'][16]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][16]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16"> @php $name16 = explode('+',$data['vac_data'][16]['name']); @endphp {{$name16[0]}}<br>{{$name16[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='16'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end D.T -->


                                        <!--OPV 5-->
                                        @if ($data['vac_data'][16]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                    <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][17]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" checked="checked" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][17]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][17]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][17]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][17]['giving_status'] == 1 && $data['vac_data'][17]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='17'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][17]['giving_status'] == 1 && $data['vac_data'][17]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][17]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17"> @php $name17 = explode('+',$data['vac_data'][17]['name']); @endphp {{$name17[0]}}<br>{{$name17[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='17'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end OPV 5 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 10 years timeline -->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 10 years vaccination -->
                                    <div class="title">
                                        <h3>10 වන අවුරුද්ද සම්පුර්ණ වූ විට(ගැහැණු)</h3>
                                    </div>

                                    <div class="description">

                                        <!-- HPV-1 -->
                                        @if ($data['vac_data'][17]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine18" value="18" disabled>
                                                    <label for="vaccine18"> @php $name18 = explode('+',$data['vac_data'][18]['name']); @endphp {{$name18[0]}}<br>{{$name18[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][18]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine18" value="18" checked="checked" disabled>
                                                        <label for="vaccine18"> @php $name18 = explode('+',$data['vac_data'][18]['name']); @endphp {{$name18[0]}}<br>{{$name18[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][18]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][18]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][18]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][18]['giving_status'] == 1 && $data['vac_data'][18]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine18" value="18" disabled>
                                                        <label for="vaccine18"> @php $name18 = explode('+',$data['vac_data'][18]['name']); @endphp {{$name18[0]}}<br>{{$name18[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='18'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][18]['giving_status'] == 1 && $data['vac_data'][18]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine18" value="18" disabled>
                                                        <label for="vaccine18"> @php $name18 = explode('+',$data['vac_data'][18]['name']); @endphp {{$name18[0]}}<br>{{$name18[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][18]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine18" value="18" disabled>
                                                        <label for="vaccine18"> @php $name18 = explode('+',$data['vac_data'][18]['name']); @endphp {{$name18[0]}}<br>{{$name18[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='18'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end HPV-1 -->


                                        <!-- HPV-2 -->
                                        @if ($data['vac_data'][18]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine19" value="19" disabled>
                                                    <label for="vaccine19"> @php $name19 = explode('+',$data['vac_data'][19]['name']); @endphp {{$name19[0]}}<br>{{$name19[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][19]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine19" value="19" checked="checked" disabled>
                                                        <label for="vaccine19"> @php $name19 = explode('+',$data['vac_data'][19]['name']); @endphp {{$name19[0]}}<br>{{$name19[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][19]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][19]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][19]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][19]['giving_status'] == 1 && $data['vac_data'][19]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine19" value="19" disabled>
                                                        <label for="vaccine19"> @php $name19 = explode('+',$data['vac_data'][19]['name']); @endphp {{$name19[0]}}<br>{{$name19[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='19'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][19]['giving_status'] == 1 && $data['vac_data'][19]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine19" value="19" disabled>
                                                        <label for="vaccine19"> @php $name19 = explode('+',$data['vac_data'][19]['name']); @endphp {{$name19[0]}}<br>{{$name19[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][19]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine19" value="19" disabled>
                                                        <label for="vaccine19"> @php $name19 = explode('+',$data['vac_data'][19]['name']); @endphp {{$name19[0]}}<br>{{$name19[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='19'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!--end HPV-2 -->                                                
                                    </div>
                                </div>
                            </div>

                            <!-- 11 years timeline -->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 11 years vaccination -->
                                    <div class="title">
                                        <h3>11 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- aTd -->
                                        @if ($data['vac_data'][19]['giving_status'] == 0)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                    <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                </span>                                                          
                                            </div>
                                        @else
                                            @if ($data['vac_data'][20]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" checked="checked" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <span class="badge color-given" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <p class="card-text">ලබා දුන් දිනය : {{$data['vac_data'][20]['date_given']}}</p>
                                                                                                                                                                <p class="card-text">කාණ්ඩ අංකය  : {{$data['vac_data'][20]['batch_no']}}</p>
                                                                                                                                                                <p class="card-text">අතුරු ආබාධ   : {{$data['vac_data'][20]['side_effects']}}</p>
                                                                                                                                                            </div>
                                                                                                                                                        </div>'>එන්නත් කර ඇත
                                                    </span>
                                                </div>
                                            @elseif($data['vac_data'][20]['giving_status'] == 1 && $data['vac_data'][20]['approvel_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='mark-vac-btn' data-toggle='modal' href='#vac-mark' data-baby='{{$data['baby_id']}}' data-vac='20'>
                                                        <span class="badge badge-danger">එන්නත ලබාදීම සලකුණු කරන්න</span>
                                                    </button>
                                                </div>
                                            @elseif($data['vac_data'][20]['giving_status'] == 1 && $data['vac_data'][20]['approvel_status'] == 0)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <span class="badge badge-secondary for-wait" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class="card">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                            <p class="card-text">නියම කළ දිනය : {{$data['vac_data'][20]['giving_date']}}</p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>'>අනුමැතිය ලැබෙනතුරු සිටින්න
                                                    </span>
                                                </div> 
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20"> @php $name20 = explode('+',$data['vac_data'][20]['name']); @endphp {{$name20[0]}}<br>{{$name20[1]}}</label>
                                                    </span>
                                                    <button class="btn" id='set-date-btn' data-toggle='modal' href='#set-date' data-baby='{{$data['baby_id']}}' data-vac='20'>
                                                        <span class="badge badge-warning">එන්නත් කිරීමට දිනයක් ලබාදෙන්න</span>
                                                    </button>                                                       
                                                </div>
                                            @endif
                                        @endif
                                        <!-- end aTd -->                                                
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end main-timeline female-->
                    @endif
                    
                </div><!--end col-md-12-->
                
            </div><!--end row-->
            
        </div><!--end container-->
        
    </div>
    <!-- end vaccination timeline section -->


    <!-- Modal vac-mark -->
    <div id="vac-mark" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <form action="{{url('midwife/vaccinations-mark-action')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="batch">
                            <table>
                                <tr>
                                    <td><label>ලබා දුන් දිනය:</label></td>
                                    <td><input class="form-control" max="<?php echo date('Y-m-d'); ?>" type="date" id="date_given" name="date_given" required></td>
                                </tr>
                                <tr>
                                    <td><label>කාණ්ඩ අංකය:</label></td>
                                    <td><input class="form-control" type="text" id="batch_no" name="batch_no" required></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                        <input type="hidden" id="baby_id" name="baby_id">
                        <input type="hidden" id="vaccine" name="vaccine">
                        <button name="mark_vac" type="submit" class="btn btn-danger">සලකුණු කරන්න</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal set-date -->
    <div id="set-date" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <form action="{{url('midwife/vaccinations-set-date-action')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="batch">
                            <table>
                                <tr>
                                    <td><label>දිනයක් තෝරන්න:</label></td>
                                    <td><input class="form-control" min="<?php echo date('Y-m-d'); ?>" type="date" id="giving_date" name="giving_date" required> <br></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                        <input type="hidden" id="baby_id1" name="baby_id">
                        <input type="hidden" id="vaccin" name="vaccine">
                        <button name="date-set" type="submit" class="btn btn-danger">දිනය ලබාදෙන්න</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.li-vacc').addClass('active');
    }); 

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // <!-- send data to modal scripts -->
    $(document).on("click", "#mark-vac-btn", function () {
        var getBaby = $(this).data('baby');
        var getVac= $(this).data('vac');
        
        $("#baby_id").val(getBaby);
        $("#vaccine").val(getVac);
    });
    
    $(document).on("click", "#set-date-btn", function () {
        var getBaby = $(this).data('baby');
        var getVac= $(this).data('vac');
        
        $("#baby_id1").val(getBaby);
        $("#vaccin").val(getVac);
    });

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideToggle(500, function(){
            $(this).remove();
        });
    }, 3500);
    // <!-- end of send data to modal scripts -->
</script>

@endsection