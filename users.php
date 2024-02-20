<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>



        <?php

        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }
        switch ($source) {
            case 'add_user';
                include "includes/add_user.php";
                break;

            case 'edit_user';
                include "includes/edit_user.php";
                break;

            case '36';
                echo "Nice2";
                break;

            default:
                include "includes/view_all_users.php";
        }

        ?>

        <?php include "includes/footer.php" ?>