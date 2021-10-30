@extends('layouts.app')

@section('title')
<title>Baby Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/baby/baby-vaccinations-style.css')}}">

    @if (($data['baby_gender'] == 'M'))
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
    </style>

    <!--male badge color-->
    <style>
        .color-given 
        {
            background: linear-gradient(60deg, #fdd835, #ffbb33);
        }
        .badge-secondary
        {
            background: linear-gradient(60deg, #929fba, #7283a7);
        }            
    </style>    
    @else
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
    </style>

    <!--female badge color-->
    <style>
        .color-given 
        {
            background: linear-gradient(60deg, #fdd835, #ffbb33);
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
                                                    <label for="vaccine1">{{$data['vac_data'][1]['name']}}</label>
                                                </span>
                                            <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][1]['date_given']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine1" value="1" disabled>
                                                    <label for="vaccine1">{{$data['vac_data'][1]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!--end BCG-1-->

                                        <!-- BCG-2(if no scar) -->
                                        @if ($data['vac_data'][2]['given_status'] == 1)
                                            {{-- bcg-2 not empty=diilanam  --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][2]['date_given']}}</span>
                                            </div>
                                        @elseif((($data['vac_data'][2]['given_status'] == 1) && ($data['vac_data'][2]['scar'] == 1)))
                                            {{-- bcg-2 dilanam && scar tyeinam --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>
                                                <span class="badge badge-secondary">බී.සී.ජී. කැළැල ඇත.</span>
                                            </div>
                                        @elseif($data['vac_data'][2]['given_status'] == 0 && $data['vac_data'][2]['giving_status'] == 1)
                                            {{-- bcg-2 date ekak dilanam --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][2]['giving_date']}}</span>
                                            </div> 
                                        @else
                                            {{-- bcg-2 date ekak dila nattan --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>                                                          
                                            </div>
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
                                        @if ($data['vac_data'][3]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                    <label for="vaccine3">{{$data['vac_data'][3]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][3]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][3]['given_status'] == 0 && $data['vac_data'][3]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                    <label for="vaccine3">{{$data['vac_data'][3]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][3]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                    <label for="vaccine3">{{$data['vac_data'][3]['name']}}</label>
                                                </span>                                                          
                                            </div>
                                        @endif
                                        <!--end Pentavalent 1-->

                                        <!-- OPV-1 -->
                                        @if ($data['vac_data'][4]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                    <label for="vaccine4">{{$data['vac_data'][4]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][4]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][4]['given_status'] == 0 && $data['vac_data'][4]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                    <label for="vaccine4">{{$data['vac_data'][4]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][4]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                    <label for="vaccine4">{{$data['vac_data'][4]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!-- end OPV-1 -->

                                        <!-- fIPV 1 -->
                                        @if ($data['vac_data'][5]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" checked="checked" disabled>
                                                    <label for="vaccine5">{{$data['vac_data'][5]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][5]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][5]['given_status'] == 0 && $data['vac_data'][5]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                    <label for="vaccine5">{{$data['vac_data'][5]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][5]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                    <label for="vaccine5">{{$data['vac_data'][5]['name']}}</label>
                                                </span>
                                            </div>
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
                                        @if ($data['vac_data'][6]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" checked="checked" disabled>
                                                        <label for="vaccine6">{{$data['vac_data'][6]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][6]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][6]['given_status'] == 0 && $data['vac_data'][6]['giving_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6">{{$data['vac_data'][6]['name']}}</label>
                                                    </span>
                                                    <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][6]['giving_date']}}</span>
                                                </div>
                                        @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6">{{$data['vac_data'][6]['name']}}</label>
                                                    </span>
                                                </div>
                                        @endif
                                        <!--Pentavalent 2 -->

                                        <!-- OPV-2 -->
                                        @if ($data['vac_data'][7]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" checked="checked" disabled>
                                                    <label for="vaccine7">{{$data['vac_data'][7]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][7]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][7]['given_status'] == 0 && $data['vac_data'][7]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                    <label for="vaccine7">{{$data['vac_data'][7]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][7]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                    <label for="vaccine7">{{$data['vac_data'][7]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!-- end OPV-2 -->

                                        <!-- fIPV 2 -->
                                        @if ($data['vac_data'][8]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                        <label for="vaccine8">{{$data['vac_data'][8]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][8]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][8]['given_status'] == 0 && $data['vac_data'][8]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                    <label for="vaccine8">{{$data['vac_data'][8]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][8]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                    <label for="vaccine8">{{$data['vac_data'][8]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][9]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                        <label for="vaccine9">{{$data['vac_data'][9]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][9]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][9]['given_status'] == 0 && $data['vac_data'][9]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                    <label for="vaccine9">{{$data['vac_data'][9]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][9]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                    <label for="vaccine9">{{$data['vac_data'][9]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!--end Pentavalent 3 -->

                                        <!-- OPV-3 -->
                                        @if ($data['vac_data'][10]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" checked="checked" disabled>
                                                        <label for="vaccine10">{{$data['vac_data'][10]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][10]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][10]['given_status'] == 0 && $data['vac_data'][10]['giving_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10">{{$data['vac_data'][10]['name']}}</label>
                                                    </span>
                                                    <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][10]['giving_date']}}</span>
                                                </div>
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10">{{$data['vac_data'][10]['name']}}</label>
                                                    </span>
                                                    
                                                </div>
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
                                        @if ($data['vac_data'][11]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" checked="checked" disabled>
                                                    <label for="vaccine11">{{$data['vac_data'][11]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][11]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][11]['given_status'] == 0 && $data['vac_data'][11]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                    <label for="vaccine11">{{$data['vac_data'][11]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][11]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                    <label for="vaccine11">{{$data['vac_data'][11]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][12]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" checked="checked" disabled>
                                                    <label for="vaccine12">{{$data['vac_data'][12]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][12]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][12]['given_status'] == 0 && $data['vac_data'][12]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                    <label for="vaccine12">{{$data['vac_data'][12]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][12]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                    <label for="vaccine12">{{$data['vac_data'][12]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][13]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" checked="checked" disabled>
                                                    <label for="vaccine13">{{$data['vac_data'][13]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][13]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][13]['given_status'] == 0 && $data['vac_data'][13]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                    <label for="vaccine13">{{$data['vac_data'][13]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][13]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                    <label for="vaccine13">{{$data['vac_data'][13]['name']}}</label>
                                                </span>
                                                
                                            </div>
                                        @endif
                                        <!-- DPT -->


                                        <!--OPV 4-->
                                        @if ($data['vac_data'][14]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" checked="checked" disabled>
                                                    <label for="vaccine14">{{$data['vac_data'][14]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][14]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][14]['given_status'] == 0 && $data['vac_data'][14]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                    <label for="vaccine14">{{$data['vac_data'][14]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][14]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                    <label for="vaccine14">{{$data['vac_data'][14]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][15]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" checked="checked" disabled>
                                                    <label for="vaccine15">{{$data['vac_data'][15]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][15]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][15]['given_status'] == 0 && $data['vac_data'][15]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                    <label for="vaccine15">{{$data['vac_data'][15]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][15]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                    <label for="vaccine15">{{$data['vac_data'][15]['name']}}</label>
                                                </span>
                                            </div>
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
                                        @if ($data['vac_data'][16]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" checked="checked" disabled>
                                                    <label for="vaccine16">{{$data['vac_data'][16]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][16]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][16]['given_status'] == 0 && $data['vac_data'][16]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                    <label for="vaccine16">{{$data['vac_data'][16]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][16]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                    <label for="vaccine16">{{$data['vac_data'][16]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!-- end D.T -->


                                        <!--OPV 5-->
                                        @if ($data['vac_data'][17]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" checked="checked" disabled>
                                                    <label for="vaccine17">{{$data['vac_data'][17]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][17]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][17]['given_status'] == 0 && $data['vac_data'][17]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                    <label for="vaccine17">{{$data['vac_data'][17]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][17]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                    <label for="vaccine17">{{$data['vac_data'][17]['name']}}</label>
                                                </span>
                                            </div>
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
                                        @if ($data['vac_data'][20]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" checked="checked" disabled>
                                                    <label for="vaccine20">{{$data['vac_data'][20]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][20]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][20]['given_status'] == 0 && $data['vac_data'][20]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                    <label for="vaccine20">{{$data['vac_data'][20]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][20]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                    <label for="vaccine20">{{$data['vac_data'][20]['name']}}</label>
                                                </span>
                                            </div>
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
                                                    <label for="vaccine1">{{$data['vac_data'][1]['name']}}</label>
                                                </span>
                                            <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][1]['date_given']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine1" value="1" disabled>
                                                    <label for="vaccine1">{{$data['vac_data'][1]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!--end BCG-1-->

                                        <!-- BCG-2(if no scar) -->
                                        @if ($data['vac_data'][2]['given_status'] == 1)
                                            {{-- bcg-2 not empty=diilanam  --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][2]['date_given']}}</span>
                                            </div>
                                        @elseif((($data['vac_data'][2]['given_status'] == 1) && ($data['vac_data'][2]['scar'] == 1)))
                                            {{-- bcg-2 dilanam && scar tyeinam --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>
                                                <span class="badge badge-secondary">බී.සී.ජී. කැළැල ඇත.</span>
                                            </div>
                                        @elseif($data['vac_data'][2]['given_status'] == 0 && $data['vac_data'][2]['giving_status'] == 1)
                                            {{-- bcg-2 date ekak dilanam --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][2]['giving_date']}}</span>
                                            </div> 
                                        @else
                                            {{-- bcg-2 date ekak dila nattan --}}
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine2" value="2" disabled>
                                                    <label for="vaccine2">{{$data['vac_data'][2]['name']}}</label>
                                                </span>                                                          
                                            </div>
                                        @endif
                                        <!--end BCG-2(if no scar)-->
                                    </div>
                                </div>
                            </div>

                            <!-- 2 months timeline-->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!--2 months vaccination--->
                                    <div class="title">
                                        <h3>2 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- Pentavalent 1 -->
                                        @if ($data['vac_data'][3]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                    <label for="vaccine3">{{$data['vac_data'][3]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][3]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][3]['given_status'] == 0 && $data['vac_data'][3]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                    <label for="vaccine3">{{$data['vac_data'][3]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][3]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine3" value="3" disabled>
                                                    <label for="vaccine3">{{$data['vac_data'][3]['name']}}</label>
                                                </span>                                                          
                                            </div>
                                        @endif
                                        <!--end Pentavalent 1-->

                                        <!-- OPV-1 -->
                                        @if ($data['vac_data'][4]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                    <label for="vaccine4">{{$data['vac_data'][4]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][4]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][4]['given_status'] == 0 && $data['vac_data'][4]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                    <label for="vaccine4">{{$data['vac_data'][4]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][4]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine4" value="4" disabled>
                                                    <label for="vaccine4">{{$data['vac_data'][4]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!-- end OPV-1 -->

                                        <!-- fIPV 1 -->
                                        @if ($data['vac_data'][5]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" checked="checked" disabled>
                                                    <label for="vaccine5">{{$data['vac_data'][5]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][5]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][5]['given_status'] == 0 && $data['vac_data'][5]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                    <label for="vaccine5">{{$data['vac_data'][5]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][5]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine5" value="5" disabled>
                                                    <label for="vaccine5">{{$data['vac_data'][5]['name']}}</label>
                                                </span>
                                            </div>
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
                                        @if ($data['vac_data'][6]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" checked="checked" disabled>
                                                        <label for="vaccine6">{{$data['vac_data'][6]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][6]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][6]['given_status'] == 0 && $data['vac_data'][6]['giving_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6">{{$data['vac_data'][6]['name']}}</label>
                                                    </span>
                                                    <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][6]['giving_date']}}</span>
                                                </div>
                                        @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6">{{$data['vac_data'][6]['name']}}</label>
                                                    </span>
                                                </div>
                                        @endif
                                        <!--Pentavalent 2 -->

                                        <!-- OPV-2 -->
                                        @if ($data['vac_data'][7]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" checked="checked" disabled>
                                                    <label for="vaccine7">{{$data['vac_data'][7]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][7]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][7]['given_status'] == 0 && $data['vac_data'][7]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                    <label for="vaccine7">{{$data['vac_data'][7]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][7]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine7" value="7" disabled>
                                                    <label for="vaccine7">{{$data['vac_data'][7]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!-- end OPV-2 -->

                                        <!-- fIPV 2 -->
                                        @if ($data['vac_data'][8]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                        <label for="vaccine8">{{$data['vac_data'][8]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][8]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][8]['given_status'] == 0 && $data['vac_data'][8]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                    <label for="vaccine8">{{$data['vac_data'][8]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][8]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine8" value="8" disabled>
                                                    <label for="vaccine8">{{$data['vac_data'][8]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][9]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                        <label for="vaccine9">{{$data['vac_data'][9]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][9]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][9]['given_status'] == 0 && $data['vac_data'][9]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                    <label for="vaccine9">{{$data['vac_data'][9]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][9]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine9" value="9" disabled>
                                                    <label for="vaccine9">{{$data['vac_data'][9]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!--end Pentavalent 3 -->

                                        <!-- OPV-3 -->
                                        @if ($data['vac_data'][10]['given_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" checked="checked" disabled>
                                                        <label for="vaccine10">{{$data['vac_data'][10]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][10]['date_given']}}</span>
                                                </div>
                                        @elseif($data['vac_data'][10]['given_status'] == 0 && $data['vac_data'][10]['giving_status'] == 1)
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10">{{$data['vac_data'][10]['name']}}</label>
                                                    </span>
                                                    <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][10]['giving_date']}}</span>
                                                </div>
                                            @else
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10">{{$data['vac_data'][10]['name']}}</label>
                                                    </span>
                                                    
                                                </div>
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
                                        @if ($data['vac_data'][11]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" checked="checked" disabled>
                                                    <label for="vaccine11">{{$data['vac_data'][11]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][11]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][11]['given_status'] == 0 && $data['vac_data'][11]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                    <label for="vaccine11">{{$data['vac_data'][11]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][11]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine11" value="11" disabled>
                                                    <label for="vaccine11">{{$data['vac_data'][11]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][12]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" checked="checked" disabled>
                                                    <label for="vaccine12">{{$data['vac_data'][12]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][12]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][12]['given_status'] == 0 && $data['vac_data'][12]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                    <label for="vaccine12">{{$data['vac_data'][12]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][12]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine12" value="12" disabled>
                                                    <label for="vaccine12">{{$data['vac_data'][12]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][13]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" checked="checked" disabled>
                                                    <label for="vaccine13">{{$data['vac_data'][13]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][13]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][13]['given_status'] == 0 && $data['vac_data'][13]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                    <label for="vaccine13">{{$data['vac_data'][13]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][13]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine13" value="13" disabled>
                                                    <label for="vaccine13">{{$data['vac_data'][13]['name']}}</label>
                                                </span>
                                                
                                            </div>
                                        @endif
                                        <!-- DPT -->


                                        <!--OPV 4-->
                                        @if ($data['vac_data'][14]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" checked="checked" disabled>
                                                    <label for="vaccine14">{{$data['vac_data'][14]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][14]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][14]['given_status'] == 0 && $data['vac_data'][14]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                    <label for="vaccine14">{{$data['vac_data'][14]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][14]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine14" value="14" disabled>
                                                    <label for="vaccine14">{{$data['vac_data'][14]['name']}}</label>
                                                </span>
                                                
                                            </div>
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
                                        @if ($data['vac_data'][15]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" checked="checked" disabled>
                                                    <label for="vaccine15">{{$data['vac_data'][15]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][15]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][15]['given_status'] == 0 && $data['vac_data'][15]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                    <label for="vaccine15">{{$data['vac_data'][15]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][15]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine15" value="15" disabled>
                                                    <label for="vaccine15">{{$data['vac_data'][15]['name']}}</label>
                                                </span>
                                            </div>
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
                                        @if ($data['vac_data'][16]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" checked="checked" disabled>
                                                    <label for="vaccine16">{{$data['vac_data'][16]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][16]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][16]['given_status'] == 0 && $data['vac_data'][16]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                    <label for="vaccine16">{{$data['vac_data'][16]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][16]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine16" value="16" disabled>
                                                    <label for="vaccine16">{{$data['vac_data'][16]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!-- end D.T -->


                                        <!--OPV 5-->
                                        @if ($data['vac_data'][17]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" checked="checked" disabled>
                                                    <label for="vaccine17">{{$data['vac_data'][17]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][17]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][17]['given_status'] == 0 && $data['vac_data'][17]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                    <label for="vaccine17">{{$data['vac_data'][17]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][17]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine17" value="17" disabled>
                                                    <label for="vaccine17">{{$data['vac_data'][17]['name']}}</label>
                                                </span>
                                            </div>
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
                                        @if ($data['vac_data'][18]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine18" value="18" checked="checked" disabled>
                                                    <label for="vaccine18">{{$data['vac_data'][18]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][18]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][18]['given_status'] == 0 && $data['vac_data'][18]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine18" value="18" disabled>
                                                    <label for="vaccine18">{{$data['vac_data'][18]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][18]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine18" value="18" disabled>
                                                    <label for="vaccine18">{{$data['vac_data'][18]['name']}}</label>
                                                </span>
                                            </div>
                                        @endif
                                        <!-- end HPV-1 -->


                                        <!-- HPV-2 -->
                                        @if ($data['vac_data'][19]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine19" value="19" checked="checked" disabled>
                                                    <label for="vaccine19">{{$data['vac_data'][19]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][19]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][19]['given_status'] == 0 && $data['vac_data'][19]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine19" value="19" disabled>
                                                    <label for="vaccine19">{{$data['vac_data'][19]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][19]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine19" value="19" disabled>
                                                    <label for="vaccine19">{{$data['vac_data'][19]['name']}}</label>
                                                </span>
                                            </div>
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
                                        @if ($data['vac_data'][20]['given_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" checked="checked" disabled>
                                                    <label for="vaccine20">{{$data['vac_data'][20]['name']}}</label>
                                                </span>
                                                <span class="badge color-given">ලබා දුන් දිනය: {{$data['vac_data'][20]['date_given']}}</span>
                                            </div>
                                        @elseif($data['vac_data'][20]['given_status'] == 0 && $data['vac_data'][20]['giving_status'] == 1)
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                    <label for="vaccine20">{{$data['vac_data'][20]['name']}}</label>
                                                </span>
                                                <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][20]['giving_date']}}</span>
                                            </div>
                                        @else
                                            <div class="vaccine">
                                                <span>
                                                    <input type="checkbox" id="vaccine20" value="20" disabled>
                                                    <label for="vaccine20">{{$data['vac_data'][20]['name']}}</label>
                                                </span>
                                            </div>
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
        
    </div><!--end container-fluid-->

</div>
@endsection

@section('script')

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.li-vacc').addClass('active');
    }); 
</script>

@endsection