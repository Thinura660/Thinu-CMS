<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>
<?php
include "includes/delete_modal.php";
?>

<link rel="stylesheet" href="assets/css/misc.css">
<link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="assets/plugins/flag-icon/flag-icon.min.css" />
<link type="text/css" rel="stylesheet" href="assets/plugins/simple-line-icons/css/simple-line-icons.css">
<link type="text/css" rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.css">
<link type="text/css" rel="stylesheet" href="assets/plugins/steps/jquery.steps.css">
<link type="text/css" rel="stylesheet" href="assets/css/app.min.css" />
<link type="text/css" rel="stylesheet" href="assets/css/style.min.css" />



        <?php

        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }
        switch ($source) {
            case 'sidebar';
                include "includes/ads/sidebar.php";
                break;

            case 'home-top';
                include "includes/ads/home-top.php";
                break;

            case 'home-bottom';
                include "includes/ads/home-bottom.php";
                break;

            default:
        }

        ?>


    </div>



    <?php include "includes/footer.php" ?>