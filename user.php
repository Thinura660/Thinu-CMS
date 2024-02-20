<?php ob_start() ?>
<?php include_once "admin/includes/functions.php"; ?>
<?php include_once "db_conn.php"; ?>
<?php include_once "includes/header.php"; ?>




<?php $the_user_id = $_SESSION['user_id']; ?>

<?php

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
} else {
    header("Location: index.php");
}


$select_user = "SELECT * FROM users WHERE username = '{$user_id}'";
$send_query = mysqli_query($connection, $select_user);

while ($row = mysqli_fetch_assoc($send_query)) {
    $db_user_id = $row['user_id'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
    $user_job = $row['user_job'];
    $about = $row['about'];
    $cover_image = $row['cover_image'];
    $user_image = $row['user_image'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_facebook = $row['user_facebook'];
    $user_website = $row['user_website'];
    $user_instagram = $row['user_instagram'];
    $user_twitter = $row['user_twitter'];
}

$select_posts = "SELECT * FROM posts WHERE post_author = '{$username}'";
$send_post_query = mysqli_query($connection, $select_posts);

$rows = mysqli_num_rows($send_post_query);


?>


<link rel="stylesheet" href="<?php echo $projectFolderName . '/' ?>assets/css/user_style.css">

<div class="container">
    <header>
    </header>
    <main>
        <div class="row">
            <div class="left col-lg-4">
                <div class="photo-left">
                    <img class="photo" src="<?php echo $projectFolderName . '/' ?>images_users/<?php echo $user_image ?>" />
                    <div class="active"></div>
                </div>
                <h4 class="name"><?php echo $user_firstname . " " . $user_lastname ?></h4>
                <p class="info"><?php echo $user_job ?></p>
                <p class="info"><?php echo $user_email ?></p>
                <div class="stats row">
                    <div class="stat col-xs-4" style="padding-right: 50px;">
                        <p class="number-stat"><?php echo $rows ?></p>
                        <p class="desc-stat">Post(s)</p>
                    </div>
                </div>
                <p class="desc"><?php echo $about ?></p>

                <div class="social">

                    <?php if (!empty($user_website)) { ?>
                        <i class="fa-solid fa-globe" onclick="window.open('<?php echo $user_website ?>', '_blank');"></i>
                    <?php } ?>

                    <?php if (!empty($user_facebook)) { ?>
                        <i class="fa-brands fa-facebook" onclick="window.open('<?php echo $user_facebook ?>', '_blank');"></i>
                    <?php } ?>

                    <?php if (!empty($user_twitter)) { ?>
                        <i class="fa-brands fa-twitter" onclick="window.open('<?php echo $user_twitter ?>', '_blank');"></i>
                    <?php } ?>

                    <?php if (!empty($user_instagram)) { ?>
                        <i class="fa-brands fa-instagram" onclick="window.open('<?php echo $user_instagram ?>', '_blank');"></i>
                    <?php } ?>

                </div>
            </div>
            <div class="right col-lg-8">
                <ul class="nav">
                    <li>Recent Posts</li>
                </ul>

                <?php

                if (!empty($_SESSION['username']) and $_SESSION['username'] == $username) { ?>
                    <a href="<?php echo $projectFolderName ?>/profile.php"><span class="follow"><i class="fas fa-note"></i> Edit</span></a>
                <?php } ?>


                <div class="row gallery">

                    <?php

                    while ($row = mysqli_fetch_assoc($send_post_query)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_image = $row['post_image'];

                    ?>


                        <div class="col-md-4">
                            <a href="<?php echo $projectFolderName . '/' ?>post/<?php echo $seo_title ?>"><label for="title"><?php echo $post_title ?></label></a>
                            <a href="<?php echo $projectFolderName . '/' ?>post/<?php echo $seo_title ?>"><img src="<?php echo '/' . $projectFolderName . '/' ?>images/<?php echo $post_image ?>" /></a>
                        </div>

                    <?php }

                    ?>

                </div>
            </div>
    </main>
</div>
</body>

<style>
    header {
        background: #eee;
        background-image: url("<?php echo  $projectFolderName . '/' ?>cover_images/<?php echo $cover_image ?>");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 250px;
    }
</style>