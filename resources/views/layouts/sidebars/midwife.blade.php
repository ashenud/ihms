<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            @yield('user-area')
            <?php
            /*  $query1 = "SELECT * FROM midwife WHERE midwife_id='".$_SESSION['midwife_id']."'";
                $result1= mysqli_query($conn,$query1);
                $row=mysqli_fetch_assoc($result1); */
            ?>
            <a href="#"> <span><?php //echo $row['midwife_name'];?></span> </a>
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <a href="/midwife/dashboard" class="text-uppercase d-dash">
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
                    <a href="/midwife/add-babies" class="text-uppercase drop mm-add">
                        <span class="icon">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන්ගේ තොරතුරු ඇතුලත් කිරීම</span>
                    </a>
                </li>
                <li>
                    <a href="/midwife/view-babies" class="text-uppercase drop mm-view">
                        <span class="icon">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                        <span class="list">ළමුන්ගේ තොරතුරු බලන්න</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="/midwife/reports" class="text-uppercase mm-chart">
                    <span class="icon">
                        <i class="fas fa-copy" aria-hidden="true"></i>
                    </span>
                    <span class="list">සටහන්</span>
                </a>
            </li>
            <li>
                <a href="/midwife/inbox" class="text-uppercase mm-inbox">
                    <span class="icon">
                        <i class="fas fa-inbox" aria-hidden="true"></i>

                        <?php 
                            /* include "php/selectdb.php";
                            $sql001="SELECT COUNT(status) AS unreadSMS FROM midwife_message WHERE status='unread' AND midwife_id='".$_SESSION['midwife_id']."'";
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
                <a class="text-uppercase" data-toggle="collapse" href="#location" id="map-location">
                    <span class="icon">
                        <i class="fas fa-map-marked-alt" aria-hidden="true"></i>
                    </span>
                    <span class="list map-bar">සිතියම් <span class="text-english">(Map)</span></span>
                </a>
            </li>
            <div class="collapse collapse-location" id="location">
                <li>
                    <a href="/midwife/visit-today" class="text-uppercase drop mm-visit">
                        <span class="icon">
                            <i class="fas fa-map-pin" aria-hidden="true"></i>
                        </span>
                        <span class="list map-drop-bar">අදට නියමිත ස්ථාන</span>
                    </a>
                </li>
                <li>
                    <a href="/midwife/give-directions" class="text-uppercase drop mm-direc">
                        <span class="icon">
                            <i class="fas fa-map-signs" aria-hidden="true"></i>
                        </span>
                        <span class="list map-drop-bar">දිශාව දැක්වීම <span class="text-english">(Directions)</span></span>
                    </a>
                </li>
                <li>
                    <a href="/midwife/show-all-locations" class="text-uppercase drop mm-all">
                        <span class="icon">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                        </span>
                        <span class="list map-drop-bar">සියලුම ස්ථාන</span>
                    </a>
                </li>
            </div>
            <li>
                <a href="/midwife/visiting-record" class="text-uppercase mm-record">
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