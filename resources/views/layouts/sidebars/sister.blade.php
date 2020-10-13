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
                <a href="/sister/dashboard" class="text-uppercase ss-dash">
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
                    <a href="/sister/add-midwife" class="text-uppercase drop ss-add">
                        <span class="icon-active">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <span class="list add-midwife-bar">වින්නඹුවන්<span class="text-english">(Midwife)</span> එක් කරන්න</span>
                    </a>
                </li>
                <li>
                    <a href="/sister/view-midwife" class="text-uppercase drop ss-viewm">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list add-midwife-bar">වින්නඹුවන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
                <li>
                    <a href="/sister/view-babies" class="text-uppercase drop ss-viewb">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list add-midwife-bar">ළමුන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="/sister/reports" class="text-uppercase ss-table">
                    <span class="icon">
                        <i class="fas fa-file-medical-alt" aria-hidden="true"></i>
                    </span>
                    <span class="list">වාර්තා</span>
                </a>
            </li>
            <li>
                <a href="/sister/inbox" class="text-uppercase ss-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>

                        <?php
                           /*  $sql001="SELECT COUNT(status) AS unreadSMS FROM sister_message WHERE status='unread' AND sister_id='".$_SESSION['sister_id']."'";
                            $run001=mysqli_query($conn,$sql001);
                            $row001=mysqli_fetch_assoc($run001);
                            $count=$row001['unreadSMS'];

                            if(0<$count && $count<=9) {
                                echo "<span class='badge badge-danger'>";
                                echo $count;
                                echo "</span>";
                            }
                            else if($count>9) {
                                echo "<span class='badge badge-danger'>";
                                echo "9+";
                                echo "</span>";
                            } */
                        ?>
                    </span>
                    <span class="list">එන පණිවිඩ</span>
                </a>
            </li>
            <li>
                <a href="/sister/send-messages" class="text-uppercase ss-send">
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