<div class="sidebar-menu">
    <div class="inner-sidebar-menu">

        <div class="user-area pb-2 mb-3">
            @yield('user-area')
            <?php
               /*  $query1 = "SELECT * FROM mother WHERE mother_nic='".$_SESSION['mother_id']."'";
                $result1= mysqli_query($conn,$query1);
                $row=mysqli_fetch_assoc($result1); */
            ?>
            <a href="#"> <span><?php //echo $row['mother_name'];?></span> </a>
        </div>

        <!--sidebar items-->
        <ul>
            <li>
                <?php
                    /* if(isset($_SESSION['doctor_id'])){
                        echo '<a href="/doctor/dashboard" class="text-uppercase">';
                        echo '<span class="icon">';
                        echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                        echo '</span>';
                        echo '<span class="list">තොරතුරු පුවරුව</span>';
                        echo '</a>';
                    }
                    if(isset($_SESSION['sister_id'])){
                        echo '<a href="/sister/dashboard" class="text-uppercase">';
                        echo '<span class="icon">';
                        echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                        echo '</span>';
                        echo '<span class="list">තොරතුරු පුවරුව</span>';
                        echo '</a>';
                    }
                    if(isset($_SESSION['midwife_id'])){
                        echo '<a href="/midwife/dashboard" class="text-uppercase">';
                        echo '<span class="icon">';
                        echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                        echo '</span>';
                        echo '<span class="list">තොරතුරු පුවරුව</span>';
                        echo '</a>';
                    }
                    if(isset($_SESSION['admin_id'])){
                        echo '<a href="/admin/dashboard" class="text-uppercase">';
                        echo '<span class="icon">';
                        echo '<i class="fas fa-chart-pie" aria-hidden="true"></i>';
                        echo '</span>';
                        echo '<span class="list">තොරතුරු පුවරුව</span>';
                        echo '</a>';
                    } */

                ?>
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