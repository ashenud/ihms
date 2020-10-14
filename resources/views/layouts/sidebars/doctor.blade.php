<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            @yield('user-area')
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <a href="{{url('doctor/dashboard')}}" class="text-uppercase li-dash">
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
                    <a href="{{url('doctor/view-sisters')}}" class="text-uppercase drop li-sis">
                        <span class="icon-active">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">හෙදියන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('doctor/view-babies')}}" class="text-uppercase drop li-baby">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="{{url('doctor/inbox')}}" class="text-uppercase li-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>

                        @if ($data['msg_count'] > 0)
                            @if ($data['msg_count'] >= 10)
                                <span class='badge badge-danger'>
                                    9+
                                </span>
                            @else
                                <span class='badge badge-danger'>
                                    {{ $data['msg_count'] }}
                                </span>
                            @endif
                        @endif

                    </span>
                    <span class="list">එන පණිවිඩ</span>
                </a>
            </li>
            <li>
                <a href="{{url('doctor/send-messages')}}" class="text-uppercase li-send">
                    <span class="icon">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </span>
                    <span class="list">පණිවිඩ යවන්න</span>
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