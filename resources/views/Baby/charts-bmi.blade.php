@extends('layouts.app')

@section('title')
<title>Baby BMI Chart</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/baby/baby-chart-all-style.css')}}">
    <style>
        .collapse-charts {
            display: block !important;
        }
    </style>
@endsection

@section('head-scripts')
    @isset($data)
        <script>
            var bmi_data = @json($data['baby_bmi_data']);
            var dataURLf24 = "{{asset('data/growth-chart-bmi-f24.json')}}";
            var dataURLl36 = "{{asset('data/growth-chart-bmi-l36.json')}}";
            // console.log(weight);
        </script>
    @endisset
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
                                          
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="chart-area">
                    <div class="word clearfix">
                       <p>

                        @if ($data['baby_gender'] == 'M')
                            දරුවාගේ උසට සරිලන බර ප්‍රස්ථාරය (පිරිමි)
                        @else
                            දරුවාගේ උසට සරිලන බර ප්‍රස්ථාරය (ගැහැණු)
                        @endif
                        
                        </p>
                        <div class="btn-set">
                            <button type="button" class="btn change-btn btn-sm" data-type="f24m">මාස 0 - 24</button>
                            <button type="button" class="btn change-btn btn-sm" data-type="l36m">මාස 25 - 60</button>
                            <button type="button" id="download" class="btn change-btn btn-sm download">බාගත කරන්න</button>
                        </div>
                    </div>
                    <div class="chart-canvas for-bmi-chart">
                        <canvas id="growth-chart-bmi" class="line-chart"></canvas>
                    </div>
                </div>
            </div>
            
            {{-- <div class="col-xl-3">
                <div class="container-fluid data-area">
                    <div class="row">
                        <div class="col-xl-12 col-sm-6 data-range">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">බර සටහන</h5>
                                    <p><span class="badge color-5">     </span>අධිබර</p>
                                    <p><span class="badge color-1"><i></i></span>මධ්‍යස්ථය</p>
                                    <p><span class="badge color-1">     </span>නියමිත බර</p>
                                    <p><span class="badge color-4">     </span>අඩු බරට අවදානම</p>
                                    <p><span class="badge color-2">     </span>අඩු බර</p>
                                    <p><span class="badge color-3">     </span>උග්‍ර අඩු බර</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>                    
    </div>    
</div>
@endsection

@section('script')
 
    <script type="text/javascript" src="{{asset('js/charts/Chart.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jspdf.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/baby/growth-chart-bmi.js')}}"></script>

    <script>
        $(function() {
            $('.inner-sidebar-menu ul li a.li-bmi').addClass('drop-active');
        }); 

        $(document).ready(function() {
            $('#baby-charts').on('click', function () {
                $('#charts').toggleClass('collapse-charts d-none');
            });         
        });
    </script>

    <!-- canvas to pdf -->
    <script>
        
        $(".download").click(function() {
            
            var canvas = document.getElementById('growth-chart-bmi');
            
            var imgData = canvas.toDataURL();
            var doc = new jsPDF({
                orientation: 'landscape'
            });
            doc.setFont("helvetica");
            doc.setFontType("bold");
            doc.setFontSize(12);
            doc.text(10,18, 'Baby BMI Chart');
            doc.setFontSize(6);
            doc.text(258,201, 'Generated on {{ date("Y, F j") }}');
            doc.setFontSize(8);
            doc.text(10,200, 'This chart was generated by {{ $data["chart_generator"] }} for {{ $data["chart_baby"] }}');

            
            var width = (canvas.width * 85) / 240;
            var height = (canvas.height * 85) / 240;

            doc.addImage(imgData, 'JPEG', 25, 30, width, height);
            // Opens the data uri in new window
            //doc.output('dataurlnewwindow');
            // Download the rendered PDF.
            doc.save('baby-bmi-chart.pdf');
        });
    
    </script>
    <!-- end of canvas to pdf -->

@endsection