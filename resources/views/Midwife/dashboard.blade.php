@extends('layouts.app')

@section('title')
<title>Midwife Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/midwife/mid-dashboard-style.css')}}">
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
        
        <div class="row mt-4 mb-5">
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                <a data-toggle="modal" href="#reminderModal" class="text-decoration-none">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col title">
                                    <h5 class="card-title text-uppercase text-muted mb-0">සිහි කැඳවීම්</h5>
                                    <span class="h5 text-uppercase font-weight-bold mb-0">එක් කරන්න</span>
                                </div>
                                <div class="col-auto">
                                    <div class="card-icon icon-color">
                                        <i class="far fa-clipboard"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <?php 

                                    /* $query1="SELECT * FROM midwife_reminder WHERE midwife_id='".$_SESSION['midwife_id']."'";
                                    $result1=mysqli_query($conn, $query1);
                                    $num_rows1=mysqli_num_rows($result1); */

                                ?>
                                <span class="text-nowrap">දැනට ඇති සිහි කැඳවීම් ගනණ <?php //echo $num_rows1; ?>කි.</span>
                            </p>

                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                <a class="text-decoration-none" href="/midwife/view-babies">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col title">
                                    <h5 class="card-title text-uppercase text-muted mb-0">ලියාපදිංචි</h5>
                                    <span class="h5 text-uppercase font-weight-bold mb-0">ළදරුවන්</span>
                                </div>
                                <div class="col-auto">
                                    <div class="card-icon icon-color">
                                        <i class="fas fa-baby"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <?php 
                        
                                    /* $query3="SELECT * FROM baby_register WHERE midwife_id='".$_SESSION['midwife_id']."'";
                                    $result3=mysqli_query($conn, $query3);
                                    $num_rows3=mysqli_num_rows($result3); */

                                ?>
                                <span class="text-nowrap">දැනට ලියාපදිංචි ළදරුවන් ගනණ <?php //echo $num_rows3; ?>කි.</span>
                            </p>

                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                <a class="text-decoration-none" href="/midwife/thriposha">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col title">
                                    <h5 class="card-title text-uppercase text-muted mb-0">ත්‍රිපෝෂ</h5>
                                    <span class="h5 text-uppercase font-weight-bold mb-0">බෙදාහැරීම</span>
                                </div>
                                <div class="col-auto">
                                    <div class="card-icon icon-color">
                                        <i class="fas fa-cookie-bite"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <?php
                                
                                    /* $currentYMonth=date("Y-m");
                                    $query4="SELECT available_qty,MAX(distributed_qty) FROM thriposha_storage WHERE midwife_id='".$_SESSION['midwife_id']."' AND updated_date LIKE'%$currentYMonth%'";
                                    $result4=mysqli_query($conn,$query4);
                                    $row4=mysqli_fetch_assoc($result4);
                                    $reminder=$row4['available_qty']-$row4['MAX(distributed_qty)']; */
                                    
                                ?>
                                <span class="text-nowrap">දැනට ඇති පැකට් ප්‍රමාණය <?php //echo $reminder; ?> කි.</span>
                            </p>

                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
                <a class="text-decoration-none" href="/midwife/contact-staff">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col title">
                                    <h5 class="card-title text-uppercase text-muted mb-0">කාර්ය මණ්ඩලය</h5>
                                    <span class="h5 text-uppercase font-weight-bold mb-0">සම්බන්ඳ කරගන්න</span>
                                </div>
                                <div class="col-auto">
                                    <div class="card-icon icon-color">
                                        <i class="fas fa-address-book"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap">ක්ෂණික පණිවිඩයක් යවන්න.</span>
                            </p>

                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Modal for add Reminders -->
            <div id="reminderModal" class="modal fade">
                <div class="modal-dialog modal-reminder">
                    <div class="modal-content card card-image">
                        <form action="/pages/midwife/php/add-reminder-action.php" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title text-uppercase">Add Reminder</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="far fa-window-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="text-uppercase">discription</label>
                                    <input type="text" name="reminder" class="form-control" required>
                                </div>
                                <div class="form-group">

                                    <div class="clearfix">
                                        <label class="text-uppercase">date and time</label>
                                        <input type="datetime-local" name="dateTime" class="form-control" required>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="submitReminder" class="btn btn-primary pull-right" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- model end -->
            
        </div>

        <div class="row mt-4 mb-5">

            <!-- search baby section -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                <div class="card search-babies">
                    <form method="POST" action="{{url('midwife/baby-select')}}">
                        @csrf
                        <div class="card-header">
                            <h6 class="font-weight-bold">ළදරුවන් නිරීක්ෂණය කිරීම</h6>
                        </div>
                        <div class="card-body">
                            <div class="search-input">
                                <input type="text" name="mother_nic" class="form-control" placeholder="සෙවීම සඳහා මවගේ හැඳුනුම් අංකය ඇතුළත් කරන්න..." required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="සොයන්න" class="btn btn-sm text-light" name="submit">
                        </div>
                    </form>
                </div>
            </div>

            <!-- message section -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                <div class="card compose-mail">
                    <form method="POST" action="/pages/midwife/php/send-mail-action.php">
                        <div class="card-header">
                            <h6 class="font-weight-bold">සියලුම මව්වරුන්ට එකවර ඊ මේල් පණිවිඩයක් යවන්න</h6>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>
                                        <label class="table-data">මාතෘකාව</label>
                                    </td>
                                    <td>
                                        <input type="text" name="subject" class="form-control form-control-sm" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="table-data">පණිවිඩය</label>
                                    </td>
                                    <td>
                                        <textarea rows="2" cols="50" name="message" class="form-control form-control-sm" required></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="යවන්න" class="btn btn-sm text-light" name="submit2">
                        </div>
                    </form>
                </div>
            </div>

        </div>
        
        <div class="row mt-4 mb-5">

            <!-- vaccination table section -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                <div class="card view-vaccine">
                    <div class="card-header">
                        <h6 class="font-weight-bold">එන්නත් ලබාදිය යුතු දිනයන්</h6>
                    </div>
                    <div class="card-body">
                        <div class="b_table" id="newDiv">
                            <table class="table table-responsive-xl">
                                <thead class="thead-theme">
                                    <tr class="b_text5">
                                        <th>ළදරු ලියාපදිංචි අංකය</th>
                                        <th>එන්නත</th>
                                        <th>දිනය</th>
                                    </tr>
                                </thead>
                                
                                <?php 
                                   /*  include "php/selectdb.php";

                                    $mid=$_SESSION["midwife_id"];
                                    $currentDate= date("Y-m-d");
                                    $expireDate = date('Y-m-d', strtotime("+5 days"));

                                    //$sqlDel="DELETE FROM vaccine_date WHERE giving_date < DATE_SUB(curdate(), INTERVAL 7 DAY)";
                                    //mysqli_query($conn,$sqlDel);

                                    $sql5="SELECT * FROM vaccine_date WHERE midwife_id='".$mid."' AND (giving_date >='".$currentDate."') AND (giving_date <='".$expireDate."') order by giving_date ASC ";
                                    $data=mysqli_query($conn,$sql5);
                                
                                    while ($result=mysqli_fetch_assoc($data)) {
                                        echo  "<tr class='b_text3' style='color:black'>";
                                        echo  "<td>".$result['baby_id']."</td>";
                                        echo  "<td>".$result['vac_name']."</td>";
                                        echo  "<td>".$result['giving_date']."</td>";
                                        echo  "</tr>";
                                    } */
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                        
            </div>

            <!-- reminder table section -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                <div class="card view-reminders">
                    <div class="card-header">
                        <h6 class="font-weight-bold">සිහි කැඳවීම්(Reminders)</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table table-reminder table-responsive-xl">

                            <?php
                            
                            /* $mid_id=$_SESSION["midwife_id"];
                            $query2="SELECT * FROM midwife_reminder WHERE midwife_id='".$mid_id."' order by date_time DESC ";
                            $result2=mysqli_query($conn,$query2);

                            while ($row2=mysqli_fetch_assoc($result2)) { */
                        
                            ?>
                               
                                <form method='POST' action="/pages/midwife/php/delete-reminder-action.php">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img class="media-photo" src="{{asset('img/midwife/reminder-icon.webp')}}">
                                            </td>
                                            <td>
                                                <span class="discription"><?php //echo $row2['midwife_reminder']; ?></span>
                                            </td>
                                            <td>
                                                <span class="date pull-right"><?php //echo $row2['date_time']; ?></span>
                                            </td>
                                            <td>
                                                <input type='hidden' name='date_time' value='<?php //echo $row2['date_time']; ?>'>
                                                <input type='submit' name='submit3' class='btn text-light' value='Delete'>
                                            </td>
                                        </tr>
                                    </tbody>
                                </form>

                            <?php
                                //  }
                            ?>
                            
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

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.li-dash').addClass('active');
    }); 
</script>

@endsection
