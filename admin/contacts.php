<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>
<?php
include "includes/delete_modal.php";
?>



        <?php

        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }
        switch ($source) {
            case 'view';
                include "includes/view_contact.php";
                break;

            default:
                include "includes/view_all_contacts.php";
        }

        ?>


    </div>



    <?php include "includes/footer.php" ?>