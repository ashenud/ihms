<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            @yield('user-area')
            <?php
               /*  $query00 = "SELECT * FROM doctor WHERE doctor_id='".$_SESSION['doctor_id']."'";
                $result00= mysqli_query($conn,$query00);
                $row00=mysqli_fetch_assoc($result00); */
            ?>
            <a href="#"> <span><?php //echo $row00['doctor_name'];?></span> </a>
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <a href="/doctor/dashboard" class="text-uppercase d-dash">
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
                    <a href="/doctor/view-sisters" class="text-uppercase drop d-sis">
                        <span class="icon-active">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">හෙදියන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
                <li>
                    <a href="/doctor/view-babies" class="text-uppercase drop d-baby">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="/doctor/inbox" class="text-uppercase d-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>

                        <?php
                            /* $sql001="SELECT COUNT(status) AS unreadSMS FROM doctor_message WHERE status='unread' AND doctor_id='".$_SESSION['doctor_id']."'";
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
                <a href="/doctor/send-messages" class="text-uppercase d-send">
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