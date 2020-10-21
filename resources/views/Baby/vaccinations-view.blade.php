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

                            <!-- 2 months timeline--->
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

                            <!-- 4 month timeline--->
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

                            <!-- 6 month timeline--->
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

                            <!-- 9 month timeline--->
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

                            <!-- 12 month timeline--->
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

                            <!-- 18 months timeline--->
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

                            <!-- 3 year timeline--->
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

                            <!-- 5 years timeline--->
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

                            <!-- 11 years timeline --->
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
                        {{-- <div class="main-timeline">

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
                                        <?php
                                        $query1="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=1";
                                        $result1=mysqli_query($conn,$query1);
                                        $row1=mysqli_fetch_assoc($result1);
                                            
                                            //vaccin eka dunnanam(!empty=not empty)
                                            if(!empty($row1['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine1" value="1" checked="checked" disabled>
                                                        <label for="vaccine1">බී.සී.ජී.<br>(B.C.G.)</label>
                                                    </span>
                                                    <span class="badge color-given">දිය යුතු දිනය: {{$data['vac_data'][2]['giving_date']}}</span>
                                                </div>
                                        <?php 
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine1" value="1" disabled>
                                                        <label for="vaccine1">බී.සී.ජී.<br>(B.C.G.)</label>
                                                    </span>
                                                </div>
                                        @endif
                                        <!--end BCG-1-->

                                        <!-- BCG-2(if no scar) -->
                                        <?php
                                            $query2="SELECT * FROM vac_birth WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                            $result2=mysqli_query($conn,$query2);
                                            $row2=mysqli_fetch_assoc($result2);

                                            $sql2="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=2";
                                            $run2=mysqli_query($conn,$sql2);
                                            $data2=mysqli_fetch_assoc($run2);
                                            
                                            //bcg-2 not empty=diilanam 
                                            if(!empty($row2['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" checked="checked" disabled>
                                                        <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row2['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            //bcg-2 dilanam && scar tyeinam
                                            else if((!empty($row1['status'])) && (!empty($row1['scar']))) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                                                    </span>
                                                    <span class="badge badge-secondary">බී.සී.ජී. කැළැල ඇත.</span>
                                                </div>
                                        <?php
                                            }
                                            //bcg-2 date ekak dilanam
                                            else if(!empty($data2['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                                                    </span>
                                                    <span class="badge badge-red">දිය යුතු දිනය: {{$data['vac_data'][2]['giving_date']}}</span>
                                                </div> 
                                        <?php
                                            }
                                            //bcg-2 date ekak dila nattan
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine2" value="2" disabled>
                                                        <label for="vaccine2">බී.සී.ජී. දෙවන මාත්‍රාව<br>(B.C.G. 2nd dose)</label>
                                                    </span>                                                          
                                                </div>
                                        @endif
                                        <!--end BCG-2(if no scar)-->
                                    </div>
                                </div>
                            </div>

                            <!-- 2 months timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!--2 months vaccination--->
                                    <div class="title">
                                        <h3>2 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- Pentavalent 1 -->
                                        <?php
                            
                                            $query3="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                            $result3=mysqli_query($conn,$query3);
                                            $row3=mysqli_fetch_assoc($result3);

                                            $sql3="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=3";
                                            $run3=mysqli_query($conn,$sql3);
                                            $data3=mysqli_fetch_assoc($run3);

                                            //status eka empty nattan(=1 nam) vaccine krapu dine denna oni
                                            if(!empty($row3['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" checked="checked" disabled>
                                                        <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row3['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            //dunnu dine not emptinam diya yutu dinaya denna oni 
                                            else if(!empty($data3['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data3['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            //dunnu dine emtynm nikanma tiyanna oni
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine3" value="3" disabled>
                                                        <label for="vaccine3">පංච සං‍යුජ එන්නත 1<br>(Pentavalent 1)</label>
                                                    </span>                                                          
                                                </div>
                                        @endif
                                        <!--end Pentavalent 1-->

                                        <!-- OPV-1 -->
                                        <?php
                            
                                            $query4="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                            $result4=mysqli_query($conn,$query4);
                                            $row4=mysqli_fetch_assoc($result4);

                                            $sql4="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=4";
                                            $run4=mysqli_query($conn,$sql4);
                                            $data4=mysqli_fetch_assoc($run4);

                                            //status eka 1 nam dunnu dinaya display wennoni
                                            if(!empty($row4['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" checked="checked" disabled>
                                                        <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row4['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            //giving_date ekak dilanam diya yuthu dine display wenna oni
                                            else if(!empty($data4['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data4['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            //giving_date ekai,status=0 nam nikanma vaccine eka pennanna tianna
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine4" value="4" disabled>
                                                        <label for="vaccine4">මුඛ පෝලියෝ 1<br>(OPV 1)</label>
                                                    </span>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        <!-- end OPV-1 -->

                                        <!-- fIPV 1 -->
                                        <?php
                                        
                                            $query5="SELECT * FROM vac_2months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=5";
                                            $result5=mysqli_query($conn,$query5);
                                            $row5=mysqli_fetch_assoc($result5);

                                            $sql5="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=5";
                                            $run5=mysqli_query($conn,$sql5);
                                            $data5=mysqli_fetch_assoc($run5);

                                            if(!empty($row5['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" checked="checked" disabled>
                                                        <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row5['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            else if(!empty($data5['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data5['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine5" value="5" disabled>
                                                        <label for="vaccine5">අජීවී පෝලියෝ 1<br>(fIPV 1)</label>
                                                    </span>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        <!--end fIPV 1-->
                                    </div>
                                </div>
                            </div>

                            <!-- 4 month timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!--4 month vaccination-->
                                    <div class="title">
                                        <h3>4 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- Pentavalent 2 -->
                                        <?php
                    
                                            $query6="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=6";
                                            $result6=mysqli_query($conn,$query6);
                                            $row6=mysqli_fetch_assoc($result6);

                                            $sql6="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=6";
                                            $run6=mysqli_query($conn,$sql6);
                                            $data6=mysqli_fetch_assoc($run6);

                                            if(!empty($row6['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" checked="checked" disabled>
                                                        <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row6['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            else if(!empty($data6['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data6['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine6" value="6" disabled>
                                                        <label for="vaccine6">පංච සං‍යුජ එන්නත 2<br>(Pentavalent 2)</label>
                                                    </span>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        <!--Pentavalent 2 -->

                                        <!-- OPV-2 -->
                                        <?php
                                        
                                            $query7="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=7";
                                            $result7=mysqli_query($conn,$query7);
                                            $row7=mysqli_fetch_assoc($result7);

                                            $sql7="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=7";
                                            $run7=mysqli_query($conn,$sql7);
                                            $data7=mysqli_fetch_assoc($run7);

                                            if(!empty($row7['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" checked="checked" disabled>
                                                        <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row7['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            else if(!empty($data7['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data7['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine7" value="7" disabled>
                                                        <label for="vaccine7">මුඛ පෝලියෝ 2<br>(OPV 2)</label>
                                                    </span>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        <!-- end OPV-2 -->

                                        <!-- fIPV 2 -->
                                        <?php
            
                                            $query8="SELECT * FROM vac_4months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                            $result8=mysqli_query($conn,$query8);
                                            $row8=mysqli_fetch_assoc($result8);

                                            $sql8="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=8";
                                            $run8=mysqli_query($conn,$sql8);
                                            $data8=mysqli_fetch_assoc($run8);

                                            //status = 1 nam dunnu dine display wennoni
                                            if(!empty($row8['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" checked="checked" disabled>
                                                        <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row8['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            
                                            //giving date ekak dilanam diya yuthu dinaya(giving date eka) display wennoni 
                                            else if(!empty($data8['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data8['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            //giving date & tatus dila nattan vaacine eka witrak disply wenna tiyanna
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine8" value="8" disabled>
                                                        <label for="vaccine8">අජීවී පෝලියෝ 2<br>(fIPV 2)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        <!--end fIPV 2-->
                                    </div>
                                </div>
                            </div>

                            <!-- 6 month timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!--6 month vaccination-->
                                    <div class="title">
                                        <h3>6 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!--Pentavalent 3-->
                                        <?php
                                        
                                            $query9="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                            $result9=mysqli_query($conn,$query9);
                                            $row9=mysqli_fetch_assoc($result9);

                                            $sql9="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=9";
                                            $run9=mysqli_query($conn,$sql9);
                                            $data9=mysqli_fetch_assoc($run9);

                                            //status=1 nam dunnu dine display wennoni
                                            if(!empty($row9['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" checked="checked" disabled>
                                                        <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row9['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }

                                            //giving date eka dilnm dennoni dine display wennoni
                                            else if(!empty($data9['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data9['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }

                                            //status=0 & giving date ekat dila nattan vaccine eka nikanma diplay wennoni
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine9" value="9" disabled>
                                                        <label for="vaccine9">පංච සං‍යුජ එන්නත 3<br>(Pentavalent 3)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!--end Pentavalent 3 -->

                                        <!-- OPV-3 -->
                                        <?php
                                        
                                            $query10="SELECT * FROM vac_6months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=10";
                                            $result10=mysqli_query($conn,$query10);
                                            $row10=mysqli_fetch_assoc($result10);

                                            $sql10="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=10";
                                            $run10=mysqli_query($conn,$sql10);
                                            $data10=mysqli_fetch_assoc($run10);

                                            if(!empty($row10['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" checked="checked" disabled>
                                                        <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row10['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                        
                                            else if(!empty($data10['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data10['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine10" value="10" disabled>
                                                        <label for="vaccine10">මුඛ පෝලියෝ 3<br>(OPV 3)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!-- end OPV-3 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 9 month timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!--9 month vaccination-->
                                    <div class="title">
                                        <h3>9 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- MMR 1 -->
                                        <?php
                                        
                                            $query11="SELECT * FROM vac_9months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
                                            $result11=mysqli_query($conn,$query11);
                                            $row11=mysqli_fetch_assoc($result11);

                                            $sql11="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=11";
                                            $run11=mysqli_query($conn,$sql11);
                                            $data11=mysqli_fetch_assoc($run11);

                                            if(!empty($row11['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" checked="checked" disabled>
                                                        <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row11['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            
                                            }
                                            else if(!empty($data11['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data11['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine11" value="11" disabled>
                                                        <label for="vaccine11">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 1<br>(MMR 1)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!--end MMR 1-->
                                    </div>
                                </div>
                            </div>

                            <!-- 12 month timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!--12 month vaccination-->
                                    <div class="title">
                                        <h3>12 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!--Live JE-->
                                        <?php
                                        
                                            $query12="SELECT * FROM vac_12months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
                                            $result12=mysqli_query($conn,$query12);
                                            $row12=mysqli_fetch_assoc($result12);

                                            $sql12="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=12";
                                            $run12=mysqli_query($conn,$sql12);
                                            $data12=mysqli_fetch_assoc($run12);

                                            if(!empty($row12['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" checked="checked" disabled>
                                                        <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row12['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            
                                            else if(!empty($data12['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data12['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine12" value="12" disabled>
                                                        <label for="vaccine12">ජපන් නිදිකර්පථප්‍රදාහය<br>(Live JE)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!--end Live JE -->
                                    </div>
                                </div>
                            </div>

                            <!-- 18 months timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!-- 18 months vaccination-->
                                    <div class="title">
                                        <h3>18 වන මාසය සම්පූර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- DPT -->
                                        <?php
                                        
                                            $query13="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
                                            $result13=mysqli_query($conn,$query13);
                                            $row13=mysqli_fetch_assoc($result13);

                                            $sql13="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=13";
                                            $run13=mysqli_query($conn,$sql13);
                                            $data13=mysqli_fetch_assoc($run13);

                                            if(!empty($row13['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" checked="checked" disabled>
                                                        <label for="vaccine13">{{$data['vac_data'][3]['name']}}</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row13['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            
                                            else if(!empty($data13['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13">{{$data['vac_data'][3]['name']}}</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data13['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine13" value="13" disabled>
                                                        <label for="vaccine13">{{$data['vac_data'][3]['name']}}</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!-- DPT -->


                                        <!--OPV 4-->
                                        <?php
                                        
                                            $query14="SELECT * FROM vac_18months WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=14";
                                            $result14=mysqli_query($conn,$query14);
                                            $row14=mysqli_fetch_assoc($result14);

                                            $sql14="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=14";
                                            $run14=mysqli_query($conn,$sql14);
                                            $data14=mysqli_fetch_assoc($run14);

                                            if(!empty($row14['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" checked="checked" disabled>
                                                        <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row14['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            
                                            else if(!empty($data14['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data14['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine14" value="14" disabled>
                                                        <label for="vaccine14">මුඛ පෝලියෝ 4<br>(OPV 4)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!--end OPV 4 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 3 year timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!-- 3 year vaccination-->
                                    <div class="title">
                                        <h3>3 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- MMR 2 -->
                                        <?php
                                        
                                            $query15="SELECT * FROM vac_3years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
                                            $result15=mysqli_query($conn,$query15);
                                            $row15=mysqli_fetch_assoc($result15);

                                            $sql15="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=15";
                                            $run15=mysqli_query($conn,$sql15);
                                            $data15=mysqli_fetch_assoc($run15);

                                            if(!empty($row15['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" checked="checked" disabled>
                                                        <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row15['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            
                                            }
                                            else if(!empty($data15['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data15['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine15" value="15" disabled>
                                                        <label for="vaccine15">සරම්ප, කම්මුල්ගාය,<br>රුබෙල්ලා 2<br>(MMR 2)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!-- end MMR 2 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 5 years timeline--->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!-- 5 years vaccination-->
                                    <div class="title">
                                        <h3>5 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">


                                        <!-- D.T -->
                                        <?php
                                        
                                            $query16="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
                                            $result16=mysqli_query($conn,$query16);
                                            $row16=mysqli_fetch_assoc($result16);

                                            $sql16="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=16";
                                            $run16=mysqli_query($conn,$sql16);
                                            $data16=mysqli_fetch_assoc($run16);

                                            if(!empty($row16['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" checked="checked" disabled>
                                                        <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row16['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            
                                            }
                                            else if(!empty($data16['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data16['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine16" value="16" disabled>
                                                        <label for="vaccine16">ද්විත්ව<br>(D.T)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!-- end D.T -->


                                        <!--OPV 5-->
                                        <?php
                                        
                                            $query17="SELECT * FROM vac_5years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
                                            $result17=mysqli_query($conn,$query17);
                                            $row17=mysqli_fetch_assoc($result17);

                                            $sql17="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=17";
                                            $run17=mysqli_query($conn,$sql17);
                                            $data17=mysqli_fetch_assoc($run17);

                                            if(!empty($row17['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" checked="checked" disabled>
                                                        <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row17['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            
                                            else if(!empty($data17['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data17['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine17" value="17" disabled>
                                                        <label for="vaccine17">මුඛ පෝලියෝ 5<br>(OPV 5)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!--end OPV 5 -->
                                    </div>
                                </div>
                            </div>

                            <!-- 10 years timeline --->
                            <div class="timeline">

                                <span class="icon fas fa-syringe"></span>
                                <div class="timeline-content">

                                    <!-- 10 years vaccination -->
                                    <div class="title">
                                        <h3>10 වන අවුරුද්ද සම්පුර්ණ වූ විට(ගැහැණු)</h3>
                                    </div>

                                    <div class="description">

                                        <!-- HPV-1 -->
                                        <?php
                                        
                                            $query18="SELECT * FROM vac_10years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=18";
                                            $result18=mysqli_query($conn,$query18);
                                            $row18=mysqli_fetch_assoc($result18);

                                            $sql18="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=18";
                                            $run18=mysqli_query($conn,$sql18);
                                            $data18=mysqli_fetch_assoc($run18);

                                            if(!empty($row18['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine18" value="18" checked="checked" disabled>
                                                        <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row18['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            }
                                            
                                            else if(!empty($data18['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine18" value="18" disabled>
                                                        <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data18['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine18" value="18" disabled>
                                                        <label for="vaccine18">එච්. පී. වී. එන්නත 1<br>(HPV Vaccine 1)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!-- end HPV-1 -->


                                        <!-- HPV-2 -->
                                        <?php
                                        
                                            $query19="SELECT * FROM vac_10years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=19";
                                            $result19=mysqli_query($conn,$query19);
                                            $row19=mysqli_fetch_assoc($result19);

                                            $sql19="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=19";
                                            $run19=mysqli_query($conn,$sql19);
                                            $data19=mysqli_fetch_assoc($run19);

                                            if(!empty($row19['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine19" value="19" checked="checked" disabled>
                                                        <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data19['giving_date']; ?></span>
                                                </div>
                                        <?php 
                                            
                                            }
                                            else if(!empty($data19['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine19" value="19" disabled>
                                                        <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data19['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine19" value="19" disabled>
                                                        <label for="vaccine19">එච්. පී. වී. එන්නත 2<br>(HPV Vaccine 2)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!--end HPV-2 -->                                                
                                    </div>
                                </div>
                            </div>


                            <!-- 11 years timeline --->
                            <div class="timeline">

                                    <span class="icon fas fa-syringe"></span>
                                    <div class="timeline-content">

                                    <!-- 11 years vaccination -->
                                    <div class="title">
                                        <h3>11 වන අවුරුද්ද සම්පුර්ණ වූ විට</h3>
                                    </div>

                                    <div class="description">

                                        <!-- aTd -->
                                        <?php
                                        
                                            $query20="SELECT * FROM vac_11years WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
                                            $result20=mysqli_query($conn,$query20);
                                            $row20=mysqli_fetch_assoc($result20);

                                            $sql20="SELECT * FROM vaccine_date WHERE baby_id='".$_SESSION['baby_id']."' AND vac_id=20";
                                            $run20=mysqli_query($conn,$sql20);
                                            $data20=mysqli_fetch_assoc($run20);

                                            if(!empty($row20['status'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" checked="checked" disabled>
                                                        <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                                                    </span>
                                                    <span class="badge color-given"><?php echo "ලබා දුන් දිනය: ".$row20['date_given']; ?></span>
                                                </div>
                                        <?php 
                                            
                                            }
                                            else if(!empty($data20['giving_date'])) {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                                                    </span>
                                                    <span class="badge badge-red"><?php echo "දිය යුතු දිනය: ".$data20['giving_date']; ?></span>
                                                </div>
                                        <?php
                                            }
                                            else {
                                        ?>
                                                <div class="vaccine">
                                                    <span>
                                                        <input type="checkbox" id="vaccine20" value="20" disabled>
                                                        <label for="vaccine20">වැඩිහිටි පිටගැස්ම හා<br>ඩිප්තීරියා (aTd)</label>
                                                    </span>
                                                    
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>
                                        <!-- end aTd -->                                                
                                    </div>
                                </div>
                            </div>

                        </div> --}}
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
