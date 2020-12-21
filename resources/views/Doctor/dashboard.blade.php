@extends('layouts.app')

@section('title')
<title>Doctor Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/calendar/calendar.css')}}">
<link rel="stylesheet" href="{{asset('css/doctor/doc-dashboard-style.css')}}">
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
        <div class="row mt-4 mb-5">
           
            <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                <a class="text-decoration-none" href="/doctor/view-babies">
                    <div class="card card-stats">
                        <div class="card-header stat-header">
                            <div class="card-icon icon-color">
                                <i class="fas fa-baby"></i>
                            </div>
                            <p class="card-category">ක්‍රියාකාරී ළදරුවන්</p>
                            <h3 class="card-title counter">{{ $data['babies_count'] }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                <a class="text-decoration-none" href="/doctor/inbox">
                    <div class="card card-stats">
                        <div class="card-header stat-header">
                            <div class="card-icon icon-color">
                                <i class="far fa-envelope"></i>
                            </div>
                            <p class="card-category">එන පණිවිඩ</p>
                            <h3 class="card-title counter">{{ $data['msg_count'] }}</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                <div class="card card-stats">
                    <div class="card-header stat-header">
                        <div class="card-icon icon-color">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <p class="card-category">සිහි කැඳවීම්</p>
                        <h3 class="card-title"><span id="reminder-count" class="counter">{{ count($data['reminders']) }}</span></h3>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-4 col-md-6 mb-2">
                <div class="card card-stats">
                    <div class="card-header stat-header">
                        <div class="card-icon icon-color">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <p class="card-category">රැස්වීම්</p>
                        <h3 class="card-title"><span class="counter">0</span></h3>
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
        <div class="row mb-5 parent">
          
            <div class="col-lg-6 mb-2">
                <div class="card search-babies">
                    <form method="POST" action="{{url('doctor/baby-select')}}">
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
           
            <!-- reminder table section -->
            <div class="col-lg-6 mb-2">
                <div class="card view-reminders">
                    <div class="card-header">
                        <h6 class="font-weight-bold float-left">සිහි කැඳවීම්(Reminders)</h6>
                        <button data-toggle="modal" href="#reminderModal" class="float-right btn btn-sm text-light">එක් කරන්න</button>
                    </div>
                    <div class="card-body">                  
                        <input type="hidden" id="loading_rem_count" value="{{count($data['reminders'])}}">
                        <input type="hidden" id="rem_count" value="{{count($data['reminders'])}}">
                        <input type="hidden" id="tr_count" value="{{count($data['reminders'])}}">

                        <div id="table-container" class="table-container">
                            @if (count($data['reminders']) >= 5)
                                <p id="count_p" class='count'>ඔබට සිහිකැදවීම් 5+ ඇත.</p>
                            @elseif(count($data['reminders']) > 0)
                                <p id="count_p" class='count'>ඔබට සිහිකැදවීම් {{count($data['reminders'])}}ක් ඇත.</p>
                            @else
                                <p id="count_p" class='count'>ඔබට සිහිකැදවීම් කිසිවක් නැත.</p>
                            @endif

                            @if(count($data['reminders']) > 0)
                                <table class="table table-reminder table-responsive-xl">
                                    <tbody id="rem_tbl_body">                                
                                        @foreach ($data['reminders'] as $key => $reminder)
                                            <tr id="tr_{{$key +1}}">                                
                                                <td>
                                                    <img class="media-photo" src="{{asset('img/doctor/reminder-icon.webp')}}">
                                                </td>
                                                <td>
                                                    <span class="discription">{{$reminder->reminder}}</span>
                                                </td>
                                                <td>
                                                    <span class="date pull-right">{{$reminder->date}}</span>
                                                </td>
                                                <td>
                                                    <input type='button' class='btn btn-success btn-sm' id='del_rem_btn' data-toggle='modal' href='#del-reminder-model' data-id="{{$reminder->id}}" data-row="{{$key+1}}" value='මකන්න'>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif      
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for add Reminders -->
            <div id="reminderModal" class="modal fade">
                <div class="modal-dialog modal-reminder">
                    <div class="modal-content card card-image">
                        <form id="reminder-form" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title text-uppercase">සිහිකැඳවීම් එක් කරන්න</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="far fa-window-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="text-uppercase">විස්තරය</label>
                                    <input type="text" id="reminder" name="reminder" class="form-control" placeholder="කෙටි විස්තරයක් ඇතුල් කරන්න" required>
                                </div>
                                <div class="form-group">

                                    <div class="clearfix">
                                        <label class="text-uppercase">දිනය සහ වෙලාව</label>
                                        <input type="datetime-local" id="dateTime" min="{{ date('Y-m-d').'T'.date("H:i") }}" placeholder="දිනය සහ වෙලාව ඇතුල් කරන්න" name="dateTime" class="form-control" required>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <a id="submit-reminder" name="submitReminder" class="btn btn-primary pull-right">එක් කරන්න</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for delete Reminders -->
            <div id="del-reminder-model" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>එන්නත අනුමත කිරීමට 'අනුමත කරන්න' හෝ අවලංගු කිරීමට 'ඉවත් වන්න' ක්ලික් කරන්න</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                                <input type="hidden" id="delete_id" name="delete_id">
                                <input type="hidden" id="tbl_row" name="tbl_row">
                                <button onclick="delete_reminder()" id="delete-reminder" type="button" class="btn btn-danger">අනුමත කරන්න</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- model end -->
            
        </div> 
        
        <div class="row mb-5">
           
            <div class="col-lg-6 mb-2">
                <div class="card card-chart">
                    <div class="card-header chart-header">                                    
                        <canvas id="chart-age" class="line-chart"></canvas>
                    </div>
                    <div class="card-body chart-body">
                        <h3 class="chart-title">ළදරුවන්</h3>
                        <p class="chart-category">එක් එක් වයස්(මාස) කාණ්ඩයේ සිටින ළදරුවන් සංඛ්‍යාව</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-5 mb-2">
                                          
                <?php //include('inc/low-high-weight-table.php'); ?>
                
            </div>
            
            <div class="col-md-3 mt-5">
                                          
                <?php //include('inc/low-high-height-table.php'); ?>
                
            </div>
            
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
        $('.inner-sidebar-menu ul li a.li-dash').addClass('active');
    }); 

    $(document).ready(function() { 
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });

    function removeJsAlert() {
        $('#js-alert').hide('slow');
    }

    $(document).on("click", "#del_rem_btn", function () {
        var getId = $(this).data('id');
        var getRow = $(this).data('row');
        $("#delete_id").val(getId);
        $("#tbl_row").val(getRow);
    });

    $("#submit-reminder").click(function(e) {
        e.preventDefault();
        
        if ( $("#reminder").val().length !== 0 && $("#dateTime").val().length !== 0 ){

            $('#reminderModal').modal('hide');
            var form_data = $('#reminder-form').serialize();
            var loading_rem_count = parseFloat($('#loading_rem_count').val());
            var new_rem_count = (parseFloat($('#rem_count').val())+1);
            var new_tr_count = (parseFloat($('#tr_count').val())+1);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("/doctor/reminder-add")}}',
                type: 'POST',
                data: form_data,
                dataType: 'JSON',
                success: function (data) { 
                    if(data.result == true) {
                        console.log(data);
                        if(loading_rem_count == 0) {
                            $('#table-container').html('<p id="count_p" class="count">ඔබට සිහිකැදවීම් 1ක් ඇත.</p>'+
                                                        '<table class="table table-reminder table-responsive-xl">'+
                                                            '<tbody>'+
                                                                '<tr id="tr_'+new_tr_count+'">'+                                
                                                                    '<td>'+
                                                                        '<img class="media-photo" src="{{asset('img/doctor/reminder-icon.webp')}}">'+
                                                                    '</td>'+
                                                                    '<td>'+
                                                                        '<span class="discription">'+data.reminder+'</span>'+
                                                                    '</td>'+
                                                                    '<td>'+
                                                                        '<span class="date pull-right">'+data.date+'</span>'+
                                                                    '</td>'+
                                                                    '<td>'+
                                                                        '<input type="button" class="btn btn-success btn-sm" id="del_rem_btn" data-toggle="modal" href="#del-reminder-model" data-id="'+data.reminder_id+'" data-row="'+new_tr_count+'" value="මකන්න">'+
                                                                    '</td>'+
                                                                '</tr>'+
                                                            '</tbody>'+
                                                        '</table>');
                        }
                        else {
                            $('#rem_tbl_body').append('<tr id="tr_'+new_tr_count+'">'+                                
                                                            '<td>'+
                                                                '<img class="media-photo" src="{{asset('img/doctor/reminder-icon.webp')}}">'+
                                                            '</td>'+
                                                            '<td>'+
                                                                '<span class="discription">'+data.reminder+'</span>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                '<span class="date pull-right">'+data.date+'</span>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                '<input type="button" class="btn btn-success btn-sm" id="del_rem_btn" data-toggle="modal" href="#del-reminder-model" data-id="'+data.reminder_id+'" data-row="'+new_tr_count+'" value="මකන්න">'+
                                                            '</td>'+
                                                        '</tr>');

                            if(new_rem_count >= 5) {
                                $('#count_p').html('ඔබට සිහිකැදවීම් 5+ ඇත.');
                            }
                            else if(new_rem_count > 0) {
                                $('#count_p').html('ඔබට සිහිකැදවීම් '+new_rem_count+'ක් ඇත.');
                            }
                            else {
                                $('#count_p').html('ඔබට සිහිකැදවීම් කිසිවක් නොමැත.');
                            }
                        }

                        $('#reminder').val('');
                        $('#dateTime').val('');

                        $('#rem_count').val(new_rem_count);
                        $('#tr_count').val(new_tr_count);
                        $('#reminder-count').html(new_rem_count);
                        $('#alert-message').html(data.message);
                        $('#js-alert').addClass(data.add_class);
                        $('#js-alert').show();
                    }
                    else {
                        $('#alert-message').html(data.message);
                        $('#js-alert').addClass(data.add_class);
                        $('#js-alert').show();
                    }                      
                }
            });

        }
        else {
            alert("දත්ත ඇතුලත් කරන්න");
        }
        
    });

    function delete_reminder(){
        var reminder_id = $('#delete_id').val();
        var reminder_tr = $('#tbl_row').val();

        $('#del-reminder-model').modal('toggle');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{url("/doctor/reminder-delete")}}',
            type: 'POST',
            data: {
                reminder_id:reminder_id
            },
            dataType: 'JSON',
            success: function (data) { 
                if(data.result == true) {
                    console.log(data);

                    var new_rem_count = (parseFloat($('#reminder-count').html())-1);
                    if(new_rem_count >= 5) {
                        $('#count_p').html('ඔබට සිහිකැදවීම් 5+ ඇත.');
                    }
                    else if(new_rem_count > 0) {
                        $('#count_p').html('ඔබට සිහිකැදවීම් '+new_rem_count+'ක් ඇත.');
                    }
                    else {
                        $('#count_p').html('ඔබට සිහිකැදවීම් කිසිවක් නොමැත.');
                    }
                    $('#reminder-count').html(new_rem_count);
                    $('#rem_count').val(new_rem_count);
                    $('#tr_'+reminder_tr).remove();
                    $('#alert-message').html(data.message);
                    $('#js-alert').addClass(data.add_class);
                    $('#js-alert').show();
                }
                else {
                    $('#alert-message').html(data.message);
                    $('#js-alert').addClass(data.add_class);
                    $('#js-alert').show();
                }                      
            }
        });
    }

</script>

@endsection
