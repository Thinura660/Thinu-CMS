<?php include "includes/header.php" ?>

<br><br><br><br>
<?php //include "includes/navigation.php" 
?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Profile Settings </h1>

            <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                $query = "SELECT * FROM users WHERE username = '{$username}' ";
                $select_user_profile_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_user_profile_query)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $about = $row['about'];
                    $cover_image = $row['cover_image'];
                    $user_job = $row['user_job'];
                    $user_facebook = $row['user_facebook'];
                    $user_website = $row['user_website'];
                    $user_instagram = $row['user_instagram'];
                    $user_twitter = $row['user_twitter'];
                }
            }

            if (isset($_POST['update_profile'])) {
                $user_firstname = mysqli_real_escape_string($connection, $_POST['user_firstname']);
                $user_lastname = mysqli_real_escape_string($connection, $_POST['user_lastname']);

                $user_image = $_FILES['image']['name'];
                $user_image_temp = $_FILES['image']['tmp_name'];

                $cover_image = $_FILES['cover_image']['name'];
                $cover_image_temp = $_FILES['cover_image']['tmp_name'];

                $user_website = mysqli_real_escape_string($connection, $_POST['user_website']);
                $user_facebook = mysqli_real_escape_string($connection, $_POST['user_facebook']);
                $user_twitter = mysqli_real_escape_string($connection, $_POST['user_twitter']);
                $user_instagram = mysqli_real_escape_string($connection, $_POST['user_instagram']);

                if (!empty($user_website)) {
                    $user_website == 'none';
                } else if (!empty($user_facebook)) {
                    $user_facebook == 'none';
                } else if (!empty($user_instagram)) {
                    $user_instagram == 'none';
                } else if (!empty($user_twitter)) {
                    $user_twitter == 'none';
                }


                $username = mysqli_real_escape_string($connection, $_POST['username']);
                $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
                $user_job = mysqli_real_escape_string($connection, $_POST['user_job']);
                $about = $_POST['about'];
                $user_password = $_POST['user_password'];

                $new_about = mysqli_real_escape_string($connection, $about);

                $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

                move_uploaded_file($user_image_temp, "images_users/$user_image");
                move_uploaded_file($cover_image_temp, "cover_images/$cover_image");

                if (empty($user_image)) {
                    $query = "SELECT * FROM users WHERE username = '{$username}' ";
                    $select_image = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($select_image)) {
                        $user_image = $row['user_image'];
                    }
                }

                if (empty($cover_image)) {
                    $query = "SELECT * FROM users WHERE username = '{$username}' ";
                    $select_cover_image = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($select_cover_image)) {
                        $cover_image = $row['cover_image'];
                    }
                }

                $query = "UPDATE users SET ";
                $query .= "username = '{$username}', ";
                $query .= "user_password = '{$user_password}', ";
                $query .= "user_firstname = '{$user_firstname}', ";
                $query .= "user_lastname = '{$user_lastname}', ";
                $query .= "user_email = '{$user_email}', ";
                $query .= "user_job = '{$user_job}', ";
                $query .= "about = '{$new_about}', ";
                $query .= "user_website = '{$user_website}', ";
                $query .= "user_facebook = '{$user_facebook}', ";
                $query .= "user_instagram = '{$user_instagram}', ";
                $query .= "user_twitter = '{$user_twitter}', ";
                $query .= "cover_image = '{$cover_image}', ";
                $query .= "user_image = '{$user_image}' ";
                $query .= "WHERE user_id = '{$user_id}' ";

                $update_post = mysqli_query($connection, $query);
                if (!$update_post) {
                    echo "Failed" . mysqli_error($connection);
                }
            }


            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input value="<?php echo $user_firstname ?>" type="text" name="user_firstname" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="author">Last Name</label>
                            <input value="<?php echo $user_lastname ?>" type="text" name="user_lastname" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="post_status">Username</label>
                    <input value="<?php echo $username ?>" type="text" name="username" class="form-control" readonly>
                    <p class=""><span style="color: red;">*</span> Please contact the owner if you want to change your username</p>
                </div>

                <br>

                <div class="form-group">
                    <label for="post_image">User Image</label>
                    <br>
                    <img width="100" src="images_users/<?php echo $user_image; ?>" alt="image">
                    <br>
                    <br>
                    <input type="file" name="image">
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="post_tags">Email</label>
                            <input value="<?php echo $user_email ?>" type="email" name="user_email" class="form-control">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="post_tags">password</label>
                            <input autocomplete="off" type="password" name="user_password" class="form-control" required>
                        </div>
                    </div>

                </div>
                <hr>

                <label for="cover_img">Job Title</label>
                <input type="text" name="user_job" value="<?php echo $user_job ?>" class="form-control">

                <label for="cover_img">Cover Image</label>
                <br>
                <img width="100" src="cover_images/<?php echo $cover_image; ?>" alt="image">
                <br>
                <br>
                <input type="file" name="cover_image" class="form-control">

                <label for="about">About</label>
                <textarea class="form-control" name="about" id="about" cols="30" rows="10"><?php echo $about ?></textarea>


                <script>
                    tinymce.init({
                        selector: 'textarea',
                        height: 500,
                        plugins: [
                            "advlist autolink lists link image charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste"
                        ],
                        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',

                    });
                </script>


                <br>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="title">Website</label>
                            <input value="<?php echo $user_website ?>" type="url" name="user_website" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="author">Facebook</label>
                            <input value="<?php echo $user_facebook ?>" type="url" name="user_facebook" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="title">Instagram</label>
                            <input value="<?php echo $user_instagram ?>" type="url" name="user_instagram" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="author">Twitter</label>
                            <input value="<?php echo $user_twitter ?>" type="url" name="user_twitter" class="form-control">
                        </div>
                    </div>

                </div>
                <p class=""><span style="color: red;">*</span> Please enter the full link to your social media profiles including https://</p>

                <div class="form-group">
                    <input type="submit" value="Update Profile" class="btn btn-primary" name="update_profile">
                </div>

            </form>


        </div>


        <?php include "includes/footer.php" ?>