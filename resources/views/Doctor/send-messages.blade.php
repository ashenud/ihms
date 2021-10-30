@extends('layouts.app')

@section('title')
<title>Doctor Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/doctor/doc-send-messages-style.css')}}">
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
        
        <!-- Send SMS to Sister section -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card card-send-msg">
                    <div class="card-header">
                        <h3>හෙදියක්(Sister) හට පණිවිඩයක් යවන්න</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 img-col">
                                    <div class="img-area">
                                        <img src="{{asset('img/doctor/sister.png')}}" alt="midwife" width="110px" height="115px">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="b_table">
                                        <table class="table table-responsive-xl">
                                            @if(count($data['sisters']) > 0)
                                                @foreach ($data['sisters'] as $sister)
                                                <tr>
                                                    <td class="content">
                                                        <div class="data-receiver">
                                                            {{$sister->sister_name}}
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="content">
                                                        <div class="data-btn">
                                                            <input type='button' name='smsSister' class='btn btn-success btn-sm' id='send_sis_msg_btn' data-toggle='modal' href='#msg-model' data-id='{{$sister->sister_id}}' value='යවන්න'>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Send SMS to Midwife section -->
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card card-send-msg">
                    <div class="card-header">
                        <h3>වින්නඹුවක්(Midwife) හට පණිවිඩයක් යවන්න</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 img-col">
                                    <div class="img-area">
                                        <img src="{{asset('img/doctor/midwife.png')}}" alt="midwife" width="110px" height="115px">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="b_table">
                                        <table class="table table-responsive-xl">
                                            @if(count($data['midwives']) > 0)
                                                @foreach ($data['midwives'] as $midwife)
                                                <tr>
                                                    <td class="content">
                                                        <div class="data-receiver">
                                                            {{$midwife->midwife_name}}
                                                        </div>
                                                    </td>
                                                    <td class="content">
                                                        <div class="data-btn">
                                                            <input type='button' class='btn btn-success btn-sm' id='send_mid_msg_btn' data-toggle='modal' href='#msg-model' data-id='{{$midwife->midwife_id}}' value='යවන්න'>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- This is modal -->
        <div class='modal model-send-msg fade' id='msg-model'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='ModalTitle'>පණිවිඩය යවන්න</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='row d-flex justify-content-around'>
                            <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                <lable>විසින්:</lable>
                                <input type='text' class='form-control mb-2' name='sender' value='{{ $data['doctor_name'] }}' readonly>
                            </div>
                        </div>
                        {{-- @@ javascript error alert @@ --}}
                        <div class="alert alert-dismissible fade show animated fadeIn" id="js-alert-error" data-auto-dismiss="2000" role="alert" style="display:none ">
                            <strong id="error-message"></strong>
                            <button type="button" class="close" onclick="removeAlert()" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <textarea name='message_body' id='message_body' class='form-control' placeholder='මෙහි ටයිප් කරන්න....'></textarea>
                        <input type='hidden' name='type' id='type'>
                        <input type='hidden' name='receiver_id' id='receiver_id'>

                        <div class='modal-footer'>
                            <button type='button' class='btn btn-info' data-dismiss='modal'>ඉවත් වන්න</button>
                            <input type='button' onclick="sendMessages()" id='send-msg' class='btn btn-success' value='යවන්න'>
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
        $('.inner-sidebar-menu ul li a.li-send').addClass('active');
    });

    $(document).on("click", "#send_mid_msg_btn", function () {
        var getId = $(this).data('id');
        $("#receiver_id").val(getId);
        $("#type").val(3); //midwife
    });
    
    $(document).on("click", "#send_sis_msg_btn", function () {
        var getId = $(this).data('id');
        $("#receiver_id").val(getId);
        $("#type").val(2); //sister
    });

    function removeJsAlert() {
        $('#js-alert').hide('slow');
    }

    function removeAlert() {
        $('#js-alert-error').hide('slow');
    }

    function sendMessages() {
        var type = $('#type').val();
        var receiver_id = $('#receiver_id').val();
        var msg_body = $('#message_body').val();

        if(msg_body !== '') {
            $('#js-alert-error').hide('slow');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("/doctor/send-messages-action")}}',
                type: 'POST',
                data: {
                    receiver_id:receiver_id,
                    msg_body:msg_body,
                    type:type
                },
                dataType: 'JSON',
                success: function (data) { 
                    if(data.result == true) {
                        console.log(data);
                        $('#message_body').val('');
                        $('#msg-model').modal('toggle');
                        $('#alert-message').html(data.message);
                        $('#js-alert').addClass(data.add_class);
                        $('#js-alert').show();
                    }
                    else {
                        $('#message_body').val('');
                        $('#msg-model').modal('toggle');
                        $('#alert-message').html(data.message);
                        $('#js-alert').addClass(data.add_class);
                        $('#js-alert').show();
                    }                      
                }
            });

        }
        else {
            $('#error-message').html('පනිවිඩයක් ටයිප් කරන්න');
            $('#js-alert-error').addClass('alert-danger');
            $('#js-alert-error').show('slow');
        }
    }

</script>

@endsection
