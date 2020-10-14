<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            @yield('user-area')
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                @if (Auth::user()->role_id == '0')
                    <a href="{{url('admin/dashboard')}}" class="text-uppercase li-dash">
                        <span class="icon">
                            <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                    </a>
                @elseif (Auth::user()->role_id == '1')
                    <a href="{{url('doctor/dashboard')}}" class="text-uppercase li-dash">
                        <span class="icon">
                            <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                    </a>
                @elseif (Auth::user()->role_id == '2')
                    <a href="{{url('sister/dashboard')}}" class="text-uppercase li-dash">
                        <span class="icon">
                            <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                    </a>
                @elseif (Auth::user()->role_id == '3')
                    <a href="{{url('midwife/dashboard')}}" class="text-uppercase li-dash">
                        <span class="icon">
                            <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                    </a>
                @elseif (Auth::user()->role_id == '4')
                    <a href="{{url('baby/dashboard')}}" class="text-uppercase li-dash">
                        <span class="icon">
                            <i class="fas fa-chart-pie" aria-hidden="true"></i>
                        </span>
                        <span class="list">තොරතුරු පුවරුව</span>
                    </a>
                @endif
            </li>                     
            <li>
                @if (Auth::user()->role_id == '1')
                    <a href="{{url('doctor/vac-permission')}}" class="text-uppercase li-vacc">
                        <span class="icon">
                            <i class="fas fa-syringe" aria-hidden="true"></i>
                        </span>
                        <span class="list">එන්නත් කිරීම</span>
                    </a>
                @elseif (Auth::user()->role_id == '3')
                    <a href="{{url('midwife/vaccine-mark')}}" class="text-uppercase li-vacc">
                        <span class="icon">
                            <i class="fas fa-syringe" aria-hidden="true"></i>
                        </span>
                        <span class="list">එන්නත් කිරීම</span>
                    </a>
                @elseif (Auth::user()->role_id == '4')
                    <a href="{{url('baby/vaccinations')}}" class="text-uppercase li-vacc">
                        <span class="icon">
                            <i class="fas fa-syringe" aria-hidden="true"></i>
                        </span>
                        <span class="list">එන්නත් කිරීම</span>
                    </a>
                @endif
            </li>
            <li>
                <a class="text-uppercase" data-toggle="collapse" href="#charts" id="baby-charts">
                    <span class="icon">
                        <i class="fas fa-chart-bar" aria-hidden="true"></i>
                    </span>
                    <span class="list">වර්ධන සටහන්</span>
                </a>
            </li>
            <div class="collapse collapse-charts" id="charts">
                <li>
                    <a href="{{url('baby/charts-weight')}}" class="text-uppercase drop li-weight">
                        <span class="icon">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                        </span>
                        <span class="list">බර ප්‍රස්ථාරය</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('baby/charts-height')}}" class="text-uppercase drop li-height">
                        <span class="icon">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                        </span>
                        <span class="list">උස ප්‍රස්ථාරය</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('baby/charts-bmi')}}" class="text-uppercase drop li-bmi">
                        <span class="icon">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                        </span>
                        <span class="list">උසට සරිලන බර ප්‍රස්ථාරය</span>
                    </a>
                </li>
            </div>

            @if (Auth::user()->role_id == '1')
                <li>
                    <a href="{{url('doctor/baby-data-page')}}" class="text-uppercase li-edit">
                        <span class="icon">
                            <i class="fas fa-file-medical-alt" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමා සෞඛ්‍ය සටහන</span>
                    </a>
                </li>
            @elseif (Auth::user()->role_id == '3')
                <li>
                    <a href="{{url('baby/editable-page')}}" class="text-uppercase li-edit">
                        <span class="icon">
                            <i class="fas fa-table" aria-hidden="true"></i>
                        </span>
                        <span class="list">දත්ත සංස්කරණය</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role_id == '4')
                <li>
                    <a href="{{url('baby/inbox')}}" class="text-uppercase li-inbox">
                        <span class="icon">
                            <i class="fas fa-inbox" aria-hidden="true"></i>
                        </span>
                        <span class="list">එන පණිවිඩ</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('baby/send-messages')}}" class="text-uppercase li-send">
                        <span class="icon">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                        </span>
                        <span class="list">පණිවිඩ යවන්න</span>
                    </a>
                </li>
                
            @endif
            
            <li>
            <a href="{{url('baby/select')}}" class="text-uppercase li-select">
                    <span class="icon">
                        <i class="fas fa-baby" aria-hidden="true"></i>
                    </span>
                    <span class="list">දරුවා තෝරන්න</span>
                </a>
            </li>
        </ul>
        <!--end of sidebar items-->

        <!--normal and mobile hamburgers-->
        <div class="hamburger">
            <div class="inner-hamburger">
                <span class="arrow">
                    <i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i>
                    <i class="fas fa-long-arrow-alt-right" aria-hidden="true" style="display: none;"></i>
                </span>
            </div>
        </div>
        <div class="mob-hamburger" style="display: none;">
            <div class="mob-inner-hamburger">
                <span class="mob-arrow">
                    <i class="fas fa-long-arrow-alt-left" aria-hidden="true" style="display: none;"></i>
                    <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <!--end ofnormal and mobile hamburgers-->

    </div>
</div>