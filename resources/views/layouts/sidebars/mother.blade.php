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
                @endif
            </li>
            <li>
                <a href="/baby/select" class="text-uppercase active">
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