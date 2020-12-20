@extends('layouts.app')

@section('title')
<title>Doctor Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/doctor/doc-inbox-style.css')}}">
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
        
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card card-inbox">
                    <div class="card-header">
                        <h3>පැමිණි පණිවිඩ</h3>
                    </div>
                    <div class="card-body">
                        <div class="b_table">
                            <table class="table table-responsive-sm">
                                
                                @if (count($data['recieved_messages']) > 0)
                                    @foreach ($data['recieved_messages'] as $key => $message)
                                        <tr id="tr_{{$key+1}}" @if ($message->read_status == 0) style='background-color:#e5e8ef;' @endif>
                                            <td class="tbl_content">
                                                <div id="data_icon_{{$key+1}}" class="data-icon">
                                                    @if ($message->read_status == 0)
                                                        <i class='far fa-folder-open'></i>
                                                    @else
                                                        <i class='far fa-folder'></i>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="tbl_content">
                                                <div class="data-sender">
                                                    {{ $message->sender }}
                                                </div>
                                            </td>
                                            <td class="tbl_content">
                                                <div class="data-msg">
                                                    {{ $message->message }}
                                                </div>
                                            </td>
                                            <td class="tbl_content">
                                                <div class="data-date">
                                                    {{ date("F j,",strtotime($message->date)).' '.date("g:i a",strtotime($message->date)) }}
                                                </div>
                                            </td>
                                            
                                            <td class="tbl_content">
                                                <div class="data-btn" id="data_btn_{{$key+1}}">
                                                    @if ($message->read_status == 0)
                                                        <input type='button' class='btn btn-danger btn-sm' id='delete-btn' data-toggle='modal' href='#delete-msg' data-id='{{$message->id}}' data-tr='{{$key+1}}' data-msg='{{$message->message}}' value='මකන්න'>
                                                    @else
                                                        <input type='button' class='btn btn-warning btn-sm' id='read-btn' data-toggle='modal' href='#read-msg' data-id='{{$message->id}}' data-tr='{{$key+1}}' data-msg='{{$message->message}}' data-show_date='{{ date("F j,",strtotime($message->date)).' '.date("g:i a",strtotime($message->date)) }}' value='කියවන්න'>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td style="font-family: 'abhaya';">පැමිනි පනිවිඩ කිසිවක් නොමැත.</td></tr>
                                @endif                             

                                <!-- model read msg -->
                                <div class='modal modal-read fade' id='read-msg'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='ModalTitleMidwife'>පණිවිඩය</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <div class=row>
                                                    <div class="col-12">
                                                        <textarea name='msg_area' id='read_msg_area' class='form-control' readonly></textarea>
                                                    </div>
                                                    <div class='col-12'>
                                                        <input type="text" id='msg_show_date' class='form-control mt-3' readonly>
                                                        <input type='hidden' name='read_id' id='read_id'>
                                                        <input type='hidden' name='read_tr' id='read_tr'>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-info btn-reader' data-dismiss='modal'>ඉවත් වන්න</button>
                                                    <input type='button' onclick="markAsRead()" name='read-submit' class='btn btn-danger btn-reader' value='කියවූ බව සලකුණු කරන්න'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- model delete msg -->
                                <div class='modal modal-read fade' id='delete-msg'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='ModalTitleMidwife'>පණිවිඩය මැකීම තහවුරු කරන්න</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <div class=row>
                                                    <div class="col-12">
                                                        <textarea name='delete_msg_area' id='delete_msg_area' class='form-control' readonly></textarea>
                                                    </div>
                                                    <div class='col-12'>
                                                        <input type='hidden' name='delete_id' id='delete_id'>
                                                        <input type='hidden' name='delete_tr' id='delete_tr'>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-info' data-dismiss='modal'>ඉවත් වන්න</button>
                                                    <input type='button' onclick="deleteMessage()" name='delete-submit' class='btn btn-danger' value='මකන්න'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
        $('.inner-sidebar-menu ul li a.li-inbox').addClass('active');
    });

    $(document).on("click", "#read-btn", function () {
        var getID= $(this).data('id');
        var getTR= $(this).data('tr');
        var getMsg = $(this).data('msg');
        var getDate= $(this).data('show_date');
        
        $("#read_id").val(getID);
        $("#read_tr").val(getTR);
        $("#read_msg_area").val(getMsg);
        $("#msg_show_date").val(getDate);
    });
    
    $(document).on("click", "#delete-btn", function () {
        var getID= $(this).data('id');
        var getTR= $(this).data('tr');
        var getMsg = $(this).data('msg');
        
        $("#delete_id").val(getID);
        $("#delete_tr").val(getTR);
        $("#delete_msg_area").val(getMsg);
    });

    function removeJsAlert() {
        $('#js-alert').hide('slow');
    }

    function markAsRead() {
        var message_id = $('#read_id').val();
        var message_tr = $('#read_tr').val();
        var msg_body = $('#read_msg_area').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{url("/doctor/messages-read")}}',
            type: 'POST',
            data: {
                message_id:message_id,
                message_tr:message_tr
            },
            dataType: 'JSON',
            success: function (data) { 
                if(data.result == true) {
                    console.log(data);
                    $('#tr_'+data.table_row).css("background-color", "#e5e8ef");
                    $('#data_icon_'+data.table_row).html("<i class='far fa-folder-open'></i>");
                    $('#data_btn_'+data.table_row).html("<input type='button' class='btn btn-danger btn-sm' id='delete-btn' data-toggle='modal' href='#delete-msg' data-id='"+message_id+"' data-tr='"+message_tr+"' data-msg='"+msg_body+"' value='මකන්න'>");
                    var current_msg_count = (parseFloat($('.inner-sidebar-menu ul li a .icon .badge').html())-1);
                    if(current_msg_count > 0) {
                        $('.inner-sidebar-menu ul li a .icon .badge').html(current_msg_count);
                    }
                    else {
                        $('.inner-sidebar-menu ul li a .icon .badge').remove();
                    }
                    $('#read-msg').modal('toggle');
                    $('#alert-message').html(data.message);
                    $('#js-alert').addClass(data.add_class);
                    $('#js-alert').show();
                }
                else {
                    $('#read-msg').modal('toggle');
                    $('#alert-message').html(data.message);
                    $('#js-alert').addClass(data.add_class);
                    $('#js-alert').show();
                }                      
            }
        });
    }

    function deleteMessage() {
        var message_id = $('#delete_id').val();
        var message_tr = $('#delete_tr').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{url("/doctor/messages-delete")}}',
            type: 'POST',
            data: {
                message_id:message_id,
                message_tr:message_tr
            },
            dataType: 'JSON',
            success: function (data) { 
                if(data.result == true) {
                    console.log(data);
                    $('#tr_'+data.table_row).remove();
                    $('#delete-msg').modal('toggle');
                    $('#alert-message').html(data.message);
                    $('#js-alert').addClass(data.add_class);
                    $('#js-alert').show();
                }
                else {
                    $('#delete-msg').modal('toggle');
                    $('#alert-message').html(data.message);
                    $('#js-alert').addClass(data.add_class);
                    $('#js-alert').show();
                }                      
            }
        });
    }

</script>

@endsection
