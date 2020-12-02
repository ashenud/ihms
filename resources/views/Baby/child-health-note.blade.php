@extends('layouts.app')

@section('title')
<title>Baby Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/doctor/doc-baby-data-style.css')}}">
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

    <div class="container">
                    
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card card-data">
                    <div class="card-header">
                        <h3>ළමා සෞඛ්‍ය සටහන</h3>
                    </div>
                    <div class="card-body">
                        <div class="data_table">                           
                            <table class="table table-responsive-xl">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">දරුවාගේ වයස</th>
                                        <th scope="col">මාස 1</th>
                                        <th scope="col">මාස 2</th>
                                        <th scope="col">මාස 4</th>
                                        <th scope="col">මාස 6</th>
                                        <th scope="col">මාස 9</th>
                                        <th scope="col">මාස 12</th>
                                        <th scope="col">මාස 18</th>
                                        <th scope="col">අවු. 3</th>
                                        <th scope="col">අවු. 5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">සායනයට පැමිණි දිනය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['clinic_date']); $i++)
                                                <td class='date-data'>{{date_format(date_create($data['health_note']['clinic_date'][$i]),'Y F j')}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">ඇසේ ප්‍රමාණය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['eye_size']); $i++)
                                                <td class='date-data'>{{$data['health_note']['eye_size'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">ඇසේ වපරය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['squint']); $i++)
                                                <td class='date-data'>{{$data['health_note']['squint'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">කණිනිකාව සුදු වීම</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['retina']); $i++)
                                                <td class='date-data'>{{$data['health_note']['retina'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">කුණිතය සුදු වීම</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['cornea']); $i++)
                                                <td class='date-data'>{{$data['health_note']['cornea'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">ඇසේ චලනය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['eye_movement']); $i++)
                                                <td class='date-data'>{{$data['health_note']['eye_movement'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">ඇසීම</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['hearing']); $i++)
                                                <td class='date-data'>{{$data['health_note']['hearing'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">බර තත්වය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['weight']); $i++)
                                                <td class='date-data'>{{$data['health_note']['weight'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">උස තත්වය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['height']); $i++)
                                                <td class='date-data'>{{$data['health_note']['height'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">සංවර්ධනය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['development']); $i++)
                                                <td class='date-data'>{{$data['health_note']['development'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">හෘදය රෝග</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['heart']); $i++)
                                                <td class='date-data'>{{$data['health_note']['heart'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">උකුල් සන්ධිය</th>
                                        @if (isset($data['health_note']))
                                            @for ($i = 0; $i < count($data['health_note']['hip']); $i++)
                                                <td class='date-data'>{{$data['health_note']['hip'][$i]}}</td>
                                            @endfor
                                        @endif
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card card-note">
                    <div class="card-body">
                        <h2 class="card-title">වර්ධනය</h2>
                        <p>නියමිත බර = N | අධි බර = OW | වර්ධනය අඩාල = O | අඩුබර == X | උග්‍ර අඩුබර = XX</p>
                        <p>නියමිත උස = NH | මධ්‍යස්ථ මිටි බව == S | උග්‍ර මිටි = SS</p>
                        <p>අන් සියලුම තත්වයන් සඳහා අබාධ ඇත්නම් X ලකුණද නැතිනම් O ලකුණද යොදා ඇත</p>
                    </div>
                </div>
            </div>
            
        </div>
        
        @if ($data['group_6_note'] == 0)
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-data-enter">
                        <div class="card-body">
                            <h2 class="card-title">12 වන මාසය සම්පූර්ණ වූ විට අදාළ දත්ත ඇතුළත් කර නැත්නම් පමණක්</h2>
                        <button class="btn data-btn" id='health-data-btn' data-toggle='modal' href='#helth-data' data-baby='{{ $data['baby_id'] }}' data-group='6'>
                                දත්ත ඇතුලත් කරන්න
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- give approval model-with-data -->
            <div id="helth-data" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <form action="{{url('doctor/vaccinations-permission-action')}}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="3"> {{-- 1- without child helth data, 2-with child helth data 3-with child helth of age group 6 if not given it after 1 year data  --}}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="batch">
                                    <table>
                                        <tr>
                                            <td><label>සායනයට පැමිණි දිනය:</label></td>
                                            <td><input class="form-control" type="date" max="<?php echo date('Y-m-d'); ?>" id="date_came" name="date_came" required></td>
                                        </tr>
                                        <tr>
                                            <td><label>ඇසේ ප්‍රමාණය:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="eye1" id="eye1">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>ඇසේ වපරය:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="eye2" id="eye2">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>කණිනිකාව සුදු වීම:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="eye3" id="eye3">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>කුණිතය සුදු වීම:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="eye4" id="eye4">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>ඇසේ චලනය:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="eye5" id="eye5">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
        
                                        <tr>
                                            <td><label>ඇසීම:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="hearing" id="hearing">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
        
                                        <tr>
                                            <td><label>බර තත්වය:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="weight" id="weight">
                                                    <option value="N">නියමිත බර(N)</option>
                                                    <option value="OW">අධි බර(OW)</option>
                                                    <option value="O">වර්ධනය අඩාල(O)</option>
                                                    <option value="X">අඩු බර(X)</option>
                                                    <option value="XX">උග්‍ර අඩු බර(XX)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>උස තත්වය:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="height" id="height">
                                                    <option value="NH">නියමිත උස(NH)</option>
                                                    <option value="S">මධ්‍යස්ථ මිටි බව(S)</option>
                                                    <option value="SS">උග්‍ර මිටි බව(SS)</option>
                                                </select>
                                            </td>
                                        </tr>
        
                                        <tr>
                                            <td><label>සංවර්ධනය:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="development" id="development">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>හෘදය රෝග:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="heart" id="heart">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>උකුල් සන්ධිය:</label></td>
                                            <td>
                                                <select class="form-control form-control-md" name="hip" id="hip">
                                                    <option value="O">අබාධ නොමැත(O)</option>
                                                    <option value="X">අබාධ ඇත(X)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>වෙනත්:</label></td>
                                            <td>
                                                <textarea class="form-control form-control-md" name="other" id="other"> </textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">ඉවත් වන්න</button>
                                <input type="hidden" id="baby_id" name="baby_id">
                                <input type="hidden" id="vaccine" name="vaccine" value="12">
                                <input type="hidden" id="group_id" name="group_id">
                                <button name="submit" type="submit" class="btn btn-danger">අනුමත කරන්න</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endif 


    </div>

</div>
@endsection

@section('script')

<script>
    $(function() {
        $('.inner-sidebar-menu ul li a.li-edit').addClass('active');
    }); 

    $(document).on("click", "#health-data-btn", function () {
        var getBaby = $(this).data('baby');
        var getGrp= $(this).data('group');
        
        $("#baby_id").val(getBaby);
        $("#group_id").val(getGrp);
    });

</script>

@endsection
