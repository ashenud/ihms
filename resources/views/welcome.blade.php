<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

        <!--favicons-->
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">

        <!--fonts and icons-->        
        <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('css/unicode-fonts.css')}}">
        <link rel="stylesheet" href="{{asset('css/english-fonts.css')}}">
        <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">

        <!--css files-->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/now-ui-kit.css?v=1.3.0')}}">
        <link rel="stylesheet" href="{{asset('css/loader-style.css')}}">
        
        <link rel="stylesheet" href="{{asset('css/index-style.css')}}">

        <title>Infant Health Management System</title>
    </head>
    
    <body class="index-page sidebar-collapse">
   
        @include('inc.include-loader')
        
        <!--navbar-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="70">
            <div class="container">
                <div class="navbar-translate">
                <a class="navbar-brand" href="{{url('/')}}" rel="tooltip" data-placement="bottom">
                        <img src="{{asset('img/icon.png')}}">
                    </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar top-bar"></span>
                        <span class="navbar-toggler-bar middle-bar"></span>
                        <span class="navbar-toggler-bar bottom-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">
                                <i class="now-ui-icons travel_info"></i>
                                <p>අප ගැන</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#our-services">
                                <i class="now-ui-icons ui-1_settings-gear-63"></i>
                                <p>අපගේ සේවාවන්</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#our-facilities">
                                <i class="now-ui-icons objects_diamond"></i>
                                <p>අප සපයන පහසුකම්</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">
                                <i class="now-ui-icons business_badge"></i>
                                <p>අපව සම්බන්ද කරගන්න</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php 
                            //if(isset($_SESSION['admin_id'])) {                            
                            ?>  
                            
                            {{-- <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='/admin/dashboard';">
                                <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
                            </button>
                           
                            <?php
                            //}
                            //else if(isset($_SESSION['midwife_id'])) {
                            ?>  
                            
                            <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='/midwife/dashboard';">
                                <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
                            </button>
                           
                            <?php
                            //}
                            //else if(isset($_SESSION['sister_id'])) {
                            ?>
                            
                            <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='/sister/dashboard';">
                                <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
                            </button>
                          
                            <?php
                            //}
                            //else if(isset($_SESSION['doctor_id'])) {
                            ?>
                            
                            <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='/doctor/dashboard';">
                                <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
                            </button>
                          
                            <?php
                            //}
                            //else if(isset($_SESSION['mother_id'])) {
                            ?>
                            
                            <button type="button" class="nav-link btn btn-neutral btn-round" onclick="window.location.href ='/baby/select';">
                                <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>දත්ත පුවරුව</p>
                            </button>
                          
                            <?php
                            //}
                            //else {
                            ?> --}}
                                
                            <button type="button" class="nav-link btn btn-neutral btn-round" data-toggle="modal" data-target="#userlogin">
                                <i class="now-ui-icons users_circle-08 lgn-icn login-icon"></i> <p>පිවිසෙන්න</p>
                            </button>  
                                
                            <?php
                            //}
                            ?>
                           
                            
                        </li>                    
                        <?php 
                        //foreach ($_SESSION as $key=>$val);
                        //if(isset($val)) {
                        ?>
                        
                        {{-- <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="නික්මෙන්න" data-placement="bottom" href="./php/logout.php">
                                <i class="material-icons sign-out-icon">settings_power</i>
                                <p class="d-lg-none d-xl-none">නික්මෙන්න</p>
                            </a>
                        </li> --}}
                        
                        <?php
                           // }
                        ?>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!--end navbar-->
        
        <!--login model-->
        <div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="examplemodellable1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="wrap-login">
                        <form action="{{ url('authentication') }}" method="POST"  class="login-form validate-form">
                            @csrf
                            <img class="login-form-logo" src="{{asset('img/icon-login.png')}}" alt="">
                            <span class="login-form-title">
                                පිවිසීම
                            </span>
    
                            <div class="wrap-input">
                                <input class="input" type="text" name="user_id" placeholder="පරිශීලක නම" required>
                                <span class="focus-input" data-placeholder="&#xf207;"></span>
                            </div>
    
                            <div class="wrap-input">
                                <input class="input" type="password" id="pwd" name="password" placeholder="මුරපදය" required>
                                <span class="focus-input" data-placeholder="&#xf191;"></span>
                                <span toggle="#pwd" class="far fa-fw fa-eye password-icon"></span>
                            </div>    
                            <div class="container-login-form-btn">
                                <button type="submit" name="submit" class="login-form-btn text-uppercase">
                                    පිවිසෙන්න
                                </button>
                            </div>
                            
                            <div class="froget-password text-center mt-1">
                                <a href="/confirm-details"> මුරපදය අමතකද? </a>
                            </div>
    
                            <div class="text-center">
                                <p class="reg">
                                    ලියාපදිංචි වීමට ඔබ ප්‍රදේශයට අයත් සෞඛ්‍ය වෛද්‍ය නිලධාරී කාර්යාලය කාර්යාලයට පිවිසෙන්න!
                                </p>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
        <!--end login model-->
     
        <!--wrapper (header) -->
        <div class="wrapper">
    
            <!--header with carousel-->
            <div class="header">
              
                <!-- alert section -->  
                <div class="alert-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-2 col-1"></div>
                            <div class="col-md-6 col-sm-8 col-10">
                                <?php //include('./assets/inc/alert-pass-error.php'); ?>
                                <?php //include('./assets/inc/alert-logout.php'); ?>
                                <?php //include('./assets/inc/alert-pass-changed.php'); ?>
                                <?php //include('./assets/inc/alert-mail-success.php'); ?>
                                <?php //include('./assets/inc/alert-no-permission.php'); ?>
                            </div>
                            <div class="col-md-3 col-sm-2 col-1"></div>
                        </div>
                    </div>  
                </div>
                <!-- end of alert section -->
               
                <div class="carousel slide carousel-fade" data-ride="carousel" id="cng">
                    <ol class="carousel-indicators">
                        <li data-target="#cng" data-slide-to="0" class="d-none d-md-inline"></li>
                        <li data-target="#cng" data-slide-to="1" class="d-none d-md-inline"></li>
                        <li data-target="#cng" data-slide-to="2" class="d-none d-md-inline"></li>
                        <li data-target="#cng" data-slide-to="3" class="d-none d-md-inline"></li>
                        <li data-target="#cng" data-slide-to="4" class="d-none d-md-inline"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('img/c_carousel1.jpg')}}" class="d-block w-100">
    
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                                <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/c_carousel2.jpg')}}" class="d-block w-100">
    
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                                <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/c_carousel3.jpg')}}" class="d-block w-100">
    
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                                <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/c_carousel4.jpg')}}" class="d-block w-100">
    
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                                <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/c_carousel5.jpg')}}" class="d-block w-100">
    
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="animated bounceInLeft" style="animation-delay:1s">Welcome to Baby Care System</h2>
                                <p class="animated bounceInRight" style="animation-delay:2s">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <a href="#cng" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
    
                    <a href="#cng" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                
                <div class="container hero-section">
                    <div class="jumbotron  wow fadeInUp">
                        <h1>ළමා සෞඛ්‍ය කළමනාකරණ පද්ධතිය</h1>
                        <p class="lead">ඔබගේ දරුවා නීරෝගීව තබා ගැනීමට උපකාරී වීම අපගේ ඒකායන අභිමතාර්ථයයි.</p>
                        <hr class="my-2">
                        <p>මවගේ හා පවුල් සෞඛ්‍ය නිලධාරිණිගේ කටයුතු පහසු ඉතා පහසු කරගැනීමට මෙම පද්ධතිය භාවිතා කල හැක.</p>
                        <p class="lead">
                            <a class="btn btn-info btn-lg" href="#!" role="button">වැඩිදුර තොරතුරු</a>
                        </p>
                    </div>
                </div>
                    
            </div>
            <!--end header and carousel-->
    
        </div>
        <!--end wrapper-->
        
        <!-- back to top button -->
        <div class="back-to-top" id="back-to-top">
            <a href="#">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
        <!-- end of to top button -->
        
        <!--content-->
        <div class="content">
    
            <!-- about -->
            <div class="container about" id="about">
                <div class="row mt-5 row-about">
                    <div class="col-md-3 text-center wow fadeInLeft">
                        <img src="{{asset('img/index/about.png')}}" class="about-pic img-fluid" alt="Responsive image">
                    </div>
                    <div class="about-system col-md-9 mt-2 colum-about wow fadeInRight">
                        <h1 class="text-uppercase mb-3">පද්ධතිය ගැන</h1>
                        <p>පවුල් සෞඛ්‍යය නිලධාරිනියන්ට වෛද්‍ය වරුන්ට හෙදියන්ට හා මව් වරුන්ට මෙමෙ පද්ධතියට හරහා තම කටයුතු පහසු කරගත හැක. ඒ සඳහා ඔවුන්ට අවශ්‍ය කාර්යයන් ඇතුළත් වෙන වෙනම පරිශීලක අතුරුමුහුණත් ලබා දෙමින් ඔවුන්ගේ අවශ්‍යතා සපුරාලීමට අපි උපරිම උත්සාහයක් ගෙන ඇත. කාලය ඉතිරි කර ගැනීම සඳහා දත්ත සෘජුවම දත්ත සමුදාය(database) සමඟ හුවමාරු වන අතර අදාළ ප්‍රතිදානය ලබා දෙනු ලැබේ. වෙන වෙනම පරිශීලක පිවිසුම් භාවිතයෙන් දත්ත වල ආරක්ෂාව සපයනු ලබන අතර පද්ධතියේ ලියාපදිංචි වී ඇති පරිශීලකයින්ට විශේෂ වරප්‍රසාද ලැබේ.</p>
                    </div> <!--about system-->
                </div>
                <div class="row mt-5">
                    <div class="about-objective col-md-7 wow fadeInLeft">
                        <h3 class="text-uppercase mb-3">අපගේ පරමාර්ථය</h3>
                        <p>පරිගණක පද්ධතියක් මගින්  MOH කාර්යාලයට අවශ්‍ය ළදරුවන්ගේ තොරතුරු සටහන් කර ගෙන ඉතා ආරක්ෂාකාරීව, පැහැදිලිව හා පහසුවෙන් ඉදිරිපත් කිරීම හා පවුල් සෞඛ්‍යය නිලධාරිනියන් යටතේ සිටින සියලුම මව්වරුන්ට පණිවිඩ ලබා දීම සඳහා කාර්යක්ෂම හා පහසු ක්‍රමයක් සැකසීම අපගේ අරමුණකි. තවද මව්වරුන්ට තම ළදරුවන්ගේ වැදගත් සෞඛ්‍ය තොරතුරු ඕනෑම මොහොතක බැලීමට හා  තේරුම් ගැනීමට හැකි පහසු ක්‍රමවේදයක් ලබා දීම හා ළදරුවන් පරීක්ෂා කිරීම සඳහා මවගේ නිවෙස්වලට යන පවුල් සෞඛ්‍යය නිලධාරිනියන් මුහුණ දෙන අපහසුතාවන්ගෙන් මිදී අවශ්‍ය නිවාසවල පිහිටීම සොයා ගැනීමට අවශ්‍ය මග පෙන්වීම් ලබා දීමද අපගේ අරමුණකි.</p>
                    </div>
                    <div class="col-md-5 text-center wow fadeInRight">
                        <img src="{{asset('img/index/objective.png')}}" class="object-pic img-fluid" alt="Responsive image">
                    </div> <!--about system-->
                </div>
            </div>
            <!--end of about-->
           
            <!--our service-->
            <div class="container our-services mt-5" id="our-services">
               
                <h1 class="text-center text-uppercase mb-3">අපගේ සේවාවන්</h1>
                <p class="text-center mt-1">අප පද්ධතිය භාවිතයෙන් ලබා ගත හැකි සේවාවන් කිහිපයක් පහත දැක්වේ.</p>
                
                <div class="service-cards">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card text-center wow zoomIn">
                                <div class="service-icon">
                                    <span class="icon">
                                        <i class="fas fa-user-friends" aria-hidden="true"></i>
                                    </span>
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase">පරිශීලක කළමනාකරණය</h4>
                                        <p class="card-text">කාණ්ඩ 4ක් යටතේ පරිශීලකයින් පද්ධතියට එක්කල හැක.</p>
                                        <a href="#!" class="btn btn-primary">වැඩිදුර තොරතුරු</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card text-center wow zoomIn">
                                <div class="service-icon">
                                    <span class="icon">
                                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                                    </span>
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase">දත්ත විශ්ලේෂණය</h4>
                                        <p class="card-text">දත්ත කළමනාකරණය කරමින් පරිශීලකයට පහසුවන අයුරින් ඉදිරිපත් කිරීම.</p>
                                        <a href="#!" class="btn btn-primary">වැඩිදුර තොරතුරු</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card text-center wow zoomIn">
                                <div class="service-icon">
                                    <span class="icon">
                                        <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
                                    </span>
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase">ස්ථාන සේවා</h4>
                                        <p class="card-text">සිතියම්(map) භාවිතයෙන් පරිශීලකයින්ගේ ස්ථාන(locations) පෙන්වීම.</p>
                                        <a href="#!" class="btn btn-primary">වැඩිදුර තොරතුරු</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card text-center wow zoomIn">
                                <div class="service-icon">
                                    <span class="icon">
                                        <i class="fas fa-comment-dots" aria-hidden="true"></i>
                                    </span>
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase">පණිවිඩ සේවා</h4>
                                        <p class="card-text">පරිශීලකයින් අතර ක්ෂණික පණිවිඩ යැවීම ඊ මේල් පණිවිඩ යැවීම.</p>
                                        <a href="#!" class="btn btn-primary">වැඩිදුර තොරතුරු</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                
                
            </div>
            <!--end of our service-->
            
            <!-- our facilities -->
            <div class="container our-facilities mt-5" id="our-facilities">
               
                <h1 class="text-center text-uppercase mb-3">අප ලබා දෙන පහසුකම්</h1>
                <p class="text-center mt-1">අප පද්ධතිය භාවිතයෙන් ලබා ගත හැකි පහසුකම් කිහිපයක් පහත දැක්වේ.</p>
                
                <div class="facilities mb-5">
                    <div class="row">
                        <div class="col-md-1  wow fadeInLeft"></div>
                        <div class="c1 col-md-5 mt-4 text-center  wow fadeInLeft">
                            <span class="facility-icon">
                                    <i class="fas fa-chart-area" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">ළදරු වර්ධන සටහන්</h6>
                                <p class="facility-text">ළදරුවාගේ උස, බර හා bmi සටහන්(chart) ආකාරයෙන් ඉදිරිපත් කිරීම.</p>
                            </div>
                        </div>
                        <div class="c2 col-md-5 mt-4 wow fadeInRight">
                            <span class="facility-icon">
                                    <i class="fas fa-syringe" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">එන්නත් කිරීම කළමනාකරණය</h6>
                                <p class="facility-text">ළදරුවාට එන්නත් ලබාදීමේදී අදාළ තොරතුරු ලබාගෙන පහසුවෙන් ඉදිරිපත් කිරීම.</p>
                            </div>
                        </div>
                        <div class="col-md-1 wow fadeInRight"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 wow fadeInLeft"></div>
                        <div class="c1 col-md-5 mt-4 text-center wow fadeInLeft">
                            <span class="facility-icon">
                                    <i class="fas fa-cookie-bite" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">ත්‍රිපෝෂ ලබාදීම කළමනාකරණය</h6>
                                <p class="facility-text">ත්‍රිපෝෂ ලබාදීම සටහන්කර අදාළ ත්‍රිපෝෂ අතිරික්ත ඉදිරිපත් කිරීම.</p>
                            </div>
                        </div>
                        <div class="c2 col-md-5 mt-4 wow fadeInRight">
                            <span class="facility-icon">
                                    <i class="fas fa-comment-dots" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">ක්ෂණික පණිවිඩ</h6>
                                <p class="facility-text">පරිශීලකයන් අතර ඉක්මනින්  හා ඉතා පහසුවෙන් පණිවිඩ හුවමාරු කරගත හැකි මුහුණතක් ඇත.</p>
                            </div>
                        </div>
                        <div class="col-md-1 wow fadeInRight"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 wow fadeInLeft"></div>
                        <div class="c1 col-md-5 mt-4 text-center wow fadeInLeft">
                            <span class="facility-icon">
                                    <i class="fas fa-bell" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">සිහසිහි කැදවීම්</h6>
                                <p class="facility-text">පරිශීලකයින්ට අවශ්‍ය වැඩසටහන් හෝ ක්‍රියාවන් සිහි කැදවීම්(reminders) ලෙස තබා ගැනීමේ හැකියාව.</p>
                            </div>
                        </div>
                        <div class="c2 col-md-5 mt-4 wow fadeInRight">
                            <span class="facility-icon">
                                    <i class="fas fa-at" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">ඊ මේල් සහසුකම</h6>
                                <p class="facility-text">මව්වරුන්ට ලබා දියයුතු දැනුවත් කිරීම් එකවර ඊ මේල් පණිවිඩයක් ලෙස ලබාදිය හැක.</p>
                            </div>
                        </div>
                        <div class="col-md-1 wow fadeInRight"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 wow fadeInLeft"></div>
                        <div class="c1 col-md-5 mt-4 text-center wow fadeInLeft">
                            <span class="facility-icon">
                                    <i class="fas fa-copy" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">වාර්තාවන්</h6>
                                <p class="facility-text">පරිශීලකයින්ට අදාළ වාර්තාවන් නිර්මාණය කිරීම හා pdf ගොනු ලෙස බාගත ලක හැක.</p>
                            </div>
                        </div>
                        <div class="c2 col-md-5 mt-4 wow fadeInRight">
                            <span class="facility-icon">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            </span>
                            <div class="facility-body text-justify mx-4">
                                <h6 class="facility-title text-uppercase mt-0 mb-0">ස්ථාන පහසුකම්</h6>
                                <p class="facility-text">පවුල් සෞඛ්‍ය නිලධාරිනියට මවගේ නිවස ඇති ස්ථානය සිතියම මගින් පෙන්වීම අදාළ මාර්ගය(direction) ලබාගත හැක.</p>
                            </div>
                        </div>
                        <div class="col-md-1 wow fadeInRight"></div>
                    </div>
                 </div>
                
                
            </div>
            <!--end if our facilities-->
            
            <!--contact-->
            <div class="contact-us pb-5" id="contact">
                <h1 class="text-center text-uppercase">අපව සම්බන්ඳ කරගන්න</h1>
                <p class="text-center">වැඩිදුර තොරතුරු සදහා පහත ආකාර ඔස්සේ අපව සම්බන්ඳ කර ගත හැක.</p>
                
                <div class="container contact text-center">
                    <div class="row">
                        <div class="col-md-4">
                            <i class="fas fa-phone"></i>
                            <p>+94 37 224 9278</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-envelope"></i>
                            <p>info@ihms.com</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-home"></i>
                            <p class="address">Medical Officer of Health <br> (MOH) Office - Narammala</p>
                        </div>
                    </div> <!--Contac info-->
                    
                    <button type="button" class="btn btn-primary"><i class="fa fa-download"></i>බාගත කරන්න</button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-rocket"></i>පණිවිඩ</button>
                </div>            
            </div>
            <!--end of contact-->
            
            <!--footer-->
            <div class="footer text-center mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('img/icon-black.png')}}" class="footer-logo">
                            <p>Our sole purpose is to help you to keep your child healthy.</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Features</h4>
                            <p>User Management</p>
                            <p>Instant Messaging</p>
                            <p>Location Service</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Quick Contact</h4>
                            <p><i class="fa fa-phone-square"></i> +94 37 224 9278</p>
                            <p><i class="fa fa-envelope"></i> info@ihms.com</p>
                            <p><i class="fa fa-home"></i> Medical Officer of Health (MOH) Office - Narammala</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Follow us</h4>
                            <p><i class="fab fa-facebook"></i> Facebook</p>
                            <p><i class="fab fa-youtube"></i> Youtube</p>
                            <p><i class="fab fa-twitter"></i> Twitter</p>
                        </div>
                    </div>
    
                    <hr>
    
                    <p class="copy-right">Made by csg06</p>
    
                </div>
            </div>
            <!--end of footer-->
            
            
        </div>
        <!--end content-->
        
        
        
        
        <!--core js files-->
        <script type="text/javascript" src="{{asset('js/core/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/core/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/core/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/now-ui-kit.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/loader.js')}}"></script>
        <!--end ofcore js files-->
        
        <!-- Smooth scroll -->
        <script type="text/javascript">
            $('.js-scroll-trigger').click(function() {
                $('.navbar-collapse').collapse('hide');
            });
        </script>
       
       <!-- password show hide -->
       <script>
            $(".password-icon").click(function () {
    
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        </script>
        
        <!-- activate wow -->
        <script>
          if ($(window).width() <= 1200){ 
              $(".wow").addClass('zoomIn').removeClass('rotateInDownLeft');
              $(".wow").addClass('zoomIn').removeClass('rotateInDownRight');
              $(".wow").addClass('zoomIn').removeClass('fadeInLeft');
              $(".wow").addClass('zoomIn').removeClass('fadeInRight');
          }
    
          new WOW().init();
        </script>
        
        <!-- back to to activate when scrolling -->
        <script>
            $(document).scroll(function () {
                var y = $(this).scrollTop();
                if (y > 70) {
                    $('.back-to-top').fadeIn();
                } else {
                    $('.back-to-top').fadeOut();
                }
    
            });
        </script>
        
        <!-- Alert Dismiss scripts -->
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideToggle(500, function(){
                $(this).remove();
            });
        }, 3500);
        </script>
        <!-- end of Alert Dismiss scripts -->
        
    </body>
</html>
