@extends('layouts.app')

@section('title')
<title>Baby Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/sister/sis-dashboard-style.css')}}">
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
    
        <div class="row mt-4 mb-5">
            <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                <div class="card card-stats">
                    <div class="card-header header-warning">
                        <div class="card-icon icon-color">
                            <i class="fas fa-baby"></i>
                        </div>
                        <p class="card-category">ක්‍රියාකාරී ළදරුවන්</p>
                        
                        <?php 
                            /* $query1="SELECT * FROM baby_register";
                            $result1=mysqli_query($conn, $query1);
                            $num_rows1=mysqli_num_rows($result1); */
                        ?>
                                                            
                        <h3 class="card-title counter"><?php //echo $num_rows1; ?></h3>
                    </div>
                    <div class="card-footer item-footer">
                        <div class="stats">
                            <a href="/sister/view-babies">ළමුන්ගේ තොරතුරු බලන්න</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="card-icon icon-color">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <p class="card-category">ක්‍රියාකාරී වින්නඹුවන් (Midwife)</p>
                        <?php 
                        
                        /* $query1="SELECT * FROM midwife";
                        $result1=mysqli_query($conn, $query1);
                        $num_rows2=mysqli_num_rows($result1); */
                        
                        ?>
                    <h3 class="card-title"><span class="counter"><?php //echo $num_rows2; ?></span></h3>
                    </div>
                    <div class="card-footer item-footer">
                        <div class="stats">
                            <a href="/sister/view-midwife">වින්නඹුවන්ගේ (Midwife) තොරතුරු බලන්න</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="card-icon icon-color">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <p class="card-category">වින්නඹුවන් (Midwife) ලියාපදිංචිය</p>
                        <h3 class="card-title"><span class="counter"> </span></h3>
                    </div>
                    <div class="card-footer item-footer">
                        <div class="stats">
                            <a href="/sister/add-midwife">වින්නඹුවන්(VAC) ලියාප්දිංචි කිරීම...</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 col-md-6 mb-2">
                <div class="card card-cal" style="height: 100%;width:100%;">
                    <div class="calendar calendar-first" id="calendar_first">
                        <div class="calendar_header">
                            <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                            <h2></h2>
                            <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="calendar_weekdays"></div>
                        <div class="calendar_content"></div>
                    </div>
                </div>
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
</script>

@endsection
