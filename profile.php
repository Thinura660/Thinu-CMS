<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>




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
            }
        }

        if (isset($_POST['update_profile'])) {
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];

            $user_image = $_FILES['image']['name'];
            $user_image_temp = $_FILES['image']['tmp_name'];

            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

            move_uploaded_file($user_image_temp, "../images_users/$user_image");

            if (empty($user_image)) {
                $query = "SELECT * FROM users WHERE username = '{$username}' ";
                $select_image = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($select_image)) {
                    $user_image = $row['user_image'];
                }
            }

            $query = "UPDATE users SET ";
            $query .= "username = '{$username}', ";
            $query .= "user_password = '{$user_password}', ";
            $query .= "user_firstname = '{$user_firstname}', ";
            $query .= "user_lastname = '{$user_lastname}', ";
            $query .= "user_email = '{$user_email}', ";
            $query .= "user_image = '{$user_image}' ";
            $query .= "WHERE user_id = '{$user_id}' ";

            $update_post = mysqli_query($connection, $query);
            confirm($update_post);
        }


        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">First Name</label>
                <input value="<?php echo $user_firstname ?>" type="text" name="user_firstname" class="form-control">
            </div>


            <br>

            <div class="form-group">
                <label for="author">Last Name</label>
                <input value="<?php echo $user_lastname ?>" type="text" name="user_lastname" class="form-control">
            </div>

            <br>

            <div class="form-group">
                <label for="post_status">Username</label>
                <input value="<?php echo $username ?>" type="text" name="username" class="form-control" readonly>
                <p class=""><span style="color: red;">*</span> You cannot change username</p>
            </div>

            <br>


            <div class="form-group">
                <label for="post_image">User Image</label>
                <br>
                <img width="50" src="../images_users/<?php echo $user_image; ?>" alt="image">
                <br>
                <br>
                <input type="file" name="image">
            </div>
            <br>

            <div class="form-group">
                <label for="post_tags">User Role</label>
                <input value="<?php echo $user_role ?>" disabled readoly type="email" name="user_email" class="form-control">
            </div>

            <br>

            <div class="form-group">
                <label for="post_tags">Email</label>
                <input value="<?php echo $user_email ?>" type="email" name="user_email" class="form-control">
            </div>

            <br>

            <div class="form-group">
                <label for="post_tags">password</label>
                <input autocomplete="off" type="password" name="user_password" class="form-control" required>
            </div>

            <br>

            <div class="form-group">
                <input type="submit" value="Update Profile" class="btn btn-primary" name="update_profile">
            </div>

        </form>




        <?php include "includes/footer.php" ?>