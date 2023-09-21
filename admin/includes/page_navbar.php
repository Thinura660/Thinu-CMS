<!--================================-->
<!-- Page Header Start -->
<!--================================-->
<div class="page-header">
    <div class="search-form">

    </div>
    <!--================================-->
    <!-- Page Header  Start -->
    <!--================================-->
    <nav class="navbar navbar-expand-lg">
        <ul class="list-inline list-unstyled mg-r-20">
            <!-- Mobile Toggle and Logo -->
            <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
            <!-- PC Toggle and Logo -->
            <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
        </ul>

        <div class="collapse navbar-collapse"></div>

        <!--================================-->
        <!--/ Brand and Logo End -->
        <!--================================-->

        <!--================================-->
        <!-- Header Right Start -->
        <!--================================-->
        <div class="header-right pull-right">
            <ul class="list-inline justify-content-end">
                <!-- Profile Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown">
                    <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="select-profile">Hi, <?php echo $_SESSION['username']; ?>!</span>

                        <?php
                        $session_user = $_SESSION['username'];
                        $user_img = "SELECT * FROM users WHERE username = '{$session_user}'";
                        $select_user_img = mysqli_query($connection, $user_img);

                        while ($row = mysqli_fetch_assoc($select_user_img)) {
                            $user_img = $row['user_image'];
                        }

                        ?>
                        <img src="../images_users/<?php echo $user_img ?>" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                        <div class="user-profile-area">
                            <div class="user-profile-heading">
                                <div class="profile-thumbnail">



                                    <img src="../images_users/<?php echo $user_img ?>" class="img-fluid wd-35 ht-35 rounded-circle" alt="">

                                </div>
                                <div class="profile-text">
                                    <h6><?php echo $_SESSION['username']; ?></h6>
                                    <span><?php echo $_SESSION['user_email'] ?></span>
                                </div>
                            </div>
                            <a href="profile.php" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> My
                                profile</a>
                            <a href="../includes/logout.php" class="dropdown-item"><i class="icon-power" aria-hidden="true"></i> Sign-out</a>
                        </div>
                    </div>
                </li>
                <!-- Profile Dropdown End -->
                <!--================================-->
            </ul>
        </div>
        <!--/ Header Right End -->
    </nav>
</div>
<!--/ Page Header End -->

<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <!--================================-->
        <!-- Breadcrumb Start -->
        <!--================================-->
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
                <h1 class="pd-0 mg-0 tx-20"><?php echo $title ?> Dashboard</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
                <a class="breadcrumb-item" href="index.php"><i class="icon ion-ios-home-outline"></i> Home</a>
                <a class="breadcrumb-item" href="index.php">Dashboard</a>
            </div>
        </div>