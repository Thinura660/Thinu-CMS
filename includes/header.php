<!DOCTYPE html>
<?php ob_start() ?>
<?php session_start(); ?>
<?php include_once "db_conn.php"; ?>
<?php include_once "admin/includes/functions.php"; ?>

<?php

$method = $_ENV['APP_ENV'];

if ($method == "localhost") {
    $projectFolderName = "/" . explode('/', $_SERVER['PHP_SELF'])[1];
} else {
    if (isset($_SERVER['HTTPS'])) {
        $server = "https://";
    } else {
        $server = "http://";
    }

    $domain = $_SERVER['SERVER_NAME'];
    $projectFolderName = $server . $domain;
}
?>


<?php
if (!empty($_SESSION['username']) and !empty($_SESSION['user_role'])) {
    $login = 1;
} else {
    $login = 0;
}

$query = "SELECT * FROM settings";
$select_settings = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($select_settings)) {
    $blog_name = $row['blog_name'];
    $blog_theme = $row['theme_color'];
    $blog_image = $row['blog_icon'];
    $blog_email = $row['blog_email'];
    $blog_description = $row['blog_description'];
    $keywords = $row['keywords'];
    $hero_title = $row['hero_title'];
    $footer_text = $row['footer_text'];
}

$query = "SELECT * FROM navigation";
$select_nav = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($select_nav)) {
    $showHome = $row['showHome'];
    $showContact = $row['showContact'];
    $showAdmin = $row['showAdmin'];
    $showReg = $row['showReg'];
    $showLogin = $row['showLogin'];
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $blog_description ?>">
    <title><?php echo $blog_name ?></title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo $projectFolderName . '/' ?>admin/other_images/<?php echo $blog_image ?>">
    <link rel="apple-touch-icon" href="<?php echo  $projectFolderName . '/' ?>admin/other_images/<?php echo $blog_image ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $projectFolderName . '/' ?>admin/other_images/<?php echo $blog_image ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo  $projectFolderName . '/' ?>admin/other_images/<?php echo $blog_image ?>">
    <!-- Web Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7cPlayfair+Display:400i" rel="stylesheet">
    <link href="../../../use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Plugins-->
    <link href="<?php echo $projectFolderName . '/' ?>assets/css/plugins.min.css" rel="stylesheet">
    <!-- Template core CSS-->
    <link href="<?php echo $projectFolderName . '/' ?>assets/css/template.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/c3d2d0zcu3f00qqgrdfxkuxgu4cwex1uvnecm6dlfup7ei0n/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Custom CSS -->
    <?php include "assets/css/custom.php" ?>



    <!-- Ad Provider Integration -->
    <?php

    $provider = "SELECT * FROM ad_providers";
    $get_provider = mysqli_query($connection, $provider);

    while ($row = mysqli_fetch_assoc($get_provider)) {
        $provider_code = $row['provider_code'];

        echo $provider_code;
    }

    ?>

</head>

<body>



    <!-- Preloader-->
    <!-- <div class="page-loader">
        <div class="page-loader-inner">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
    <!-- Preloader end-->

    <nav>
        <div class="wrapper">
            <div class="logo item">
                <a class="item" href="<?php echo $projectFolderName ?>/index"><?php echo $blog_name ?></a>
            </div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>

                <?php if ($showHome == 'on') : ?>
                    <li><a class="item" href="<?php echo $projectFolderName ?>/index.php">Home</a></li>
                <?php endif ?>

                <?php if ($login == 1 and $showAdmin == 'on' and $_SESSION['user_role'] !== 'subscriber') : ?>

                    <?php

                    echo "<li><a class='item' href='{$projectFolderName}/admin/'>Admin</a></li>";

                    ?>

                <?php else : ?>

                    <?php if ($showLogin == 'on') : ?>
                        <li><a class="item" href='<?php echo  $projectFolderName . "/" ?>login.php'>Login</a></li>
                    <?php endif; ?>

                <?php endif; ?>


                <?php

                $query = "SELECT * FROM categories";
                $select_all_categories = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<li><a class='item' href='/{$projectFolderName}/category/$cat_id'>{$cat_title}</a></li>";
                }

                ?>


                <?php if ($showContact == 'on') : ?>

                    <li><a class="item" href="<?php echo $projectFolderName . "/" ?>contact.php">Contact Us</a></li>

                <?php endif ?>

                <li>

                    <?php
                    if ($login !== 1) {
                        $username = 'Profile';
                    } else {
                        $username = $_SESSION['username'];
                    }
                    ?>

                    <a href="<?php if ($login !== 1) {
                                    echo $projectFolderName . '/registration.php';
                                } else {
                                    echo '#';
                                } ?>" class="desktop-item item"><?php if ($login == 1) {
                                                                    echo 'Hi, ' . $username . ' <i class="fas fa-angle-down"></i>';
                                                                } else {
                                                                    echo 'Sign Up';
                                                                } ?> </a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item"><?php if ($login == 1) {
                                                                    echo 'Hi, ' . $username . ' <i class="fas fa-angle-down"></i>';
                                                                } else {
                                                                    echo 'Sign Up';
                                                                } ?></label>

                    <?php

                    if ($login == 1) {
                        echo
                        '
                                <ul class="drop-menu">
                                    <li><a href="' .  $projectFolderName . "/" . 'user/' . $username . '" class="item">My Profile</a></li>
                                    <li><a href="' . $projectFolderName . "/" . 'profile.php" class="item">Settings</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="item" onclick="logout_confirm()" href="#">Logout</a></li>
                                </ul>
                                
                                ';
                    }

                    ?>

                </li>

            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>

    <script>
        function logout_confirm() {
            Swal.fire({
                position: 'top-end',
                title: 'Are you sure to logout?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?php echo $projectFolderName . '/' ?>includes/logout.php";
                }
            })
        }
    </script>