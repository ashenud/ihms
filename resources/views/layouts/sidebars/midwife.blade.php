<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            @yield('user-area')
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <a href="{{url('midwife/dashboard')}}" class="text-uppercase li-dash">
                    <span class="icon">
                        <i class="fas fa-chart-pie" aria-hidden="true"></i>
                    </span>
                    <span class="list">තොරතුරු පුවරුව</span>
                </a>
            </li>
            <li>
                <a class="text-uppercase" data-toggle="collapse" href="#manage" id="manage-users">
                    <span class="icon">
                        <i class="fas fa-users-cog" aria-hidden="true"></i>
                    </span>
                    <span class="list">කළමනාකරණය</span>
                </a>
            </li>
            <div class="collapse collapse-manage" id="manage">
                <li>
                    <a href="{{url('midwife/add-babies')}}" class="text-uppercase drop li-add">
                        <span class="icon">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන්ගේ තොරතුරු ඇතුලත් කිරීම</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('midwife/view-babies')}}" class="text-uppercase drop li-view">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="{{url('midwife/reports')}}" class="text-uppercase li-chart">
                    <span class="icon">
                        <i class="fas fa-copy" aria-hidden="true"></i>
                    </span>
                    <span class="list">සටහන්</span>
                </a>
            </li>
            <li>
                <a href="{{url('midwife/inbox')}}" class="text-uppercase li-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>

                        @php
                            $msg_count = DB::table('midwife_messages')->where('midwife_id', Auth::user()->user_id)
                                                        ->where('read_status',1)
                                                        ->where('status',1)
                                                        ->count();
                        @endphp

                        @if ($msg_count > 0)
                            @if ($msg_count >= 10)
                                <span class='badge badge-danger'>
                                    9+
                                </span>
                            @else
                                <span class='badge badge-danger'>
                                    {{ $msg_count }}
                                </span>
                            @endif
                        @endif

                    </span>
                    <span class="list">එන පණිවිඩ</span>
                </a>
            </li>
            <li>
                <a class="text-uppercase" data-toggle="collapse" href="#location" id="map-location">
                    <span class="icon">
                        <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
                    </span>
                    <span class="list map-bar">සිතියම් <span class="text-english">(Map)</span></span>
                </a>
            </li>
            <div class="collapse collapse-location" id="location">
                <li>
                    <a href="{{url('midwife/visit-today')}}" class="text-uppercase drop li-visit">
                        <span class="icon">
                            <i class="fas fa-map-pin" aria-hidden="true"></i>
                        </span>
                        <span class="list map-drop-bar">අදට නියමිත ස්ථාන</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('midwife/give-directions')}}" class="text-uppercase drop li-direc">
                        <span class="icon">
                            <i class="fas fa-map-signs" aria-hidden="true"></i>
                        </span>
                        <span class="list map-drop-bar">දිශාව දැක්වීම <span class="text-english">(Directions)</span></span>
                    </a>
                </li>
                <li>
                    <a href="{{url('midwife/show-all-locations')}}" class="text-uppercase drop li-all">
                        <span class="icon">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        </span>
                        <span class="list map-drop-bar">සියලුම ස්ථාන</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="{{url('midwife/visiting-record')}}" class="text-uppercase li-record">
                    <span class="icon">
                        <i class="fas fa-location-arrow" aria-hidden="true"></i>
                    </span>
                    <span class="list">නිවාසවලට යෑම්</span>
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
        <!--end of normal and mobile hamburgers-->

    </div>
</div>