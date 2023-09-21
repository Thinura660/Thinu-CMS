<?php
if (isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];
}

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users_by_id)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    $user_image = $row['user_image'];
}

if (isset($_POST['update_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    move_uploaded_file($user_image_temp, "../images_users/$user_image");

    if (empty($user_image)) {
        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $user_image = $row['user_image'];
        }
    }
    if (!empty($user_password)) {
        $query_password = "SELECT user_password FROM users WHERE user_id = $user_id";
        $get_user = mysqli_query($connection, $query);

        $row = mysqli_fetch_array($get_user);
        $db_user_password = $row['user_password'];

        if ($db_user_password != $user_password) {
            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
        }

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$hashed_password}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_image = '{$user_image}' ";
        $query .= "WHERE user_id = {$the_user_id} ";

        $update_user = mysqli_query($connection, $query);
        confirm($update_user);
        if ($update_user) {
            header('Location: users.php');
        }
    }
} else {
    //   header("Location: index.php");
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
        <label for="user_role">User Role</label>
        <br>
        <select name="user_role" class="form-control select2 select2-hidden-accessible" id="user_role">

            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>

            <?php
            if ($user_role == 'admin') {
                echo "<option value='publisher'>Publisher</option>";
                echo "<option value='subscriber'>Subscriber</option>";
            }
            elseif ($user_role == 'publisher') {
                echo "<option value='admin'>Admin</option>";
                echo "<option value='subscriber'>Subscriber</option>";
            } else {
                echo "<option value='admin'>Admin</option>";
                echo "<option value='publisher'>Publisher</option>";
            }
            ?>


        </select>
    </div>


    <br>

    <div class="form-group">
        <label for="post_status">Username</label>
        <input value="<?php echo $username ?>" type="text" name="username" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="post_image">User Image</label>
        <br>
        <img width="50" src="../images_users/<?php echo $user_image; ?>" alt="image">
        <br>
        <br>
        <div class="form-group form-type-line file-group">
            <input type="text" class="form-control file-value file-browser" placeholder="Choose file..." readonly="">
            <input type="file" name="image" multiple="">
        </div>
    </div>


    <br>

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input value="<?php echo $user_email ?>" type="email" name="user_email" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="post_tags">password</label>
        <input autocomplete="off" type="password" name="user_password" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <input type="submit" value="Update User" class="btn btn-primary" name="update_user">
    </div>

</form>