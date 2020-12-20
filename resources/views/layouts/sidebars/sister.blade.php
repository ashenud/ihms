<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            @yield('user-area')
            <?php
                /* $query00 = "SELECT * FROM sister WHERE sister_id='".$_SESSION['sister_id']."'";
                $result00= mysqli_query($conn,$query00);
                $row00=mysqli_fetch_assoc($result00); */
            ?>
            <a href="#"> <span><?php //echo $row00['sister_name'];?></span> </a>
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <a href="{{url('sister/dashboard')}}" class="text-uppercase li-dash">
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
                    <a href="{{url('sister/add-midwife')}}" class="text-uppercase drop li-add">
                        <span class="icon-active">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <span class="list add-midwife-bar">වින්නඹුවන්<span class="text-english">(Midwife)</span> එක් කරන්න</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('sister/view-midwife')}}" class="text-uppercase drop li-view-mid">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list add-midwife-bar">වින්නඹුවන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('sister/view-babies')}}" class="text-uppercase drop li-view-baby">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list add-midwife-bar">ළමුන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="{{url('sister/reports')}}" class="text-uppercase li-report">
                    <span class="icon">
                        <i class="fas fa-file-medical-alt" aria-hidden="true"></i>
                    </span>
                    <span class="list">වාර්තා</span>
                </a>
            </li>
            <li>
                <a href="{{url('sister/inbox')}}" class="text-uppercase li-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>

                        @php
                            $msg_count = DB::table('sister_messages')->where('sister_id', Auth::user()->user_id)
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
                <a href="{{url('sister/send-messages')}}" class="text-uppercase li-send">
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
        <!--end of normal and mobile hamburgers-->

    </div>
</div>