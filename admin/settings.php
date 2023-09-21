<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>




        <?php 
        
        $settings = "SELECT * FROM settings";
        $import_settings = mysqli_query($connection, $settings);

        while($row = mysqli_fetch_assoc($import_settings)) {
            $title = $row['blog_name'];
            $blog_email = $row['blog_email'];
            $theme_color = $row['theme_color'];
            $blog_description = $row['blog_description'];
            $blog_icon = $row['blog_icon'];
            $keywords = $row['keywords'];
            $hero_title = $row['hero_title'];
            $footer_text = $row['footer_text'];
        }
        
        ?>



        <?php

        if (isset($_POST['update'])) {
            $title = mysqli_real_escape_string($connection, $_POST['title']);
            $keywords = mysqli_real_escape_string($connection, $_POST['keywords']);
            $hero_title = mysqli_real_escape_string($connection, $_POST['hero_title']);
            $footer_text = mysqli_real_escape_string($connection, $_POST['footer_text']);
            $theme_color = mysqli_real_escape_string($connection, $_POST['theme_color']);
            $email = mysqli_real_escape_string($connection, $_POST['contact_email']);

            $logo = mysqli_real_escape_string($connection, $_FILES['blog_logo']['name']);
            $logo_temp = $_FILES['blog_logo']['tmp_name'];

            if(empty($logo)) {
                $img_query = "SELECT * FROM settings";
                $send_img_query = mysqli_query($connection, $img_query);

                while($row = mysqli_fetch_assoc($send_img_query)) {
                    $logo = $row['blog_icon'];
                }
            }
            move_uploaded_file($logo_temp, "other_images/$logo");

            $description = mysqli_real_escape_string($connection, $_POST['description']);

            $query = "UPDATE settings SET blog_name = '{$title}', hero_title = '{$hero_title}', theme_color = '{$theme_color}', blog_email = '{$email}', blog_icon = '{$logo}', blog_description = '{$description}', keywords = '{$keywords}', footer_text = '{$footer_text}'";
            $send_query = mysqli_query($connection, $query);

            if($send_query) {
                header("Location: settings.php");
            }
        }


        ?>


        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="title">Blog Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Thinu-CMS" value="<?php echo $title ?>">
                </div>
                <div class="col">
                    <label for="title">Keywords</label>
                    <input type="text" name="keywords" class="form-control" placeholder="tech, thinu, blog" value="<?php echo $keywords ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="description">Hero Section Title</label>
                    <input type="text" name="hero_title" class="form-control" placeholder="Explore Tech News" value="<?php echo $hero_title ?>">
                </div>
                <div class="col">
                    <label for="color">Theme Color</label>
                    <input type="color" name="theme_color" class="form-control" value="<?php echo $theme_color ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="description">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" placeholder="info@example.com" value="<?php echo $blog_email ?>">
                </div>
                <div class="col">
                    <label for="footer">Footer Text</label>
                    <input type="text" class="form-control" name="footer_text" value="<?php echo $footer_text ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="icon">Blog Logo</label>
                    <br>
                    <img src="other_images/<?php echo $blog_icon ?>" alt="" width="200px">
                    <br><br>
                    <input type="file" name="blog_logo" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="description">Blog Description</label>
                    <textarea name="description" cols="30" rows="10" class="form-control"><?php echo $blog_description ?></textarea>
                </div>
            </div>
            <br>
            <input type="submit" value="Save Changes" name="update" class="btn btn-primary">

            <br>
            <br>

        </form>



        <?php include "includes/footer.php" ?>