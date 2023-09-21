<?php

if (isset($_POST['add_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));


    move_uploaded_file($user_image_temp, "../images_users/$user_image");

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role, user_image) ";
    $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}', '{$user_image}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);

    echo '
                    <div class="alert alert-success">
                        <strong>Success!</strong> User has been added: <a href="users.php">View Users</a>
                    </div>';
}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>


    <br>

    <div class="form-group">
        <label for="author">Last Name</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="post_status">User Role</label>
        <br>
        <select name="user_role" class="form-control select2 select2-hidden-accessible" id="user_role">
            <option value="subscriber">Select an option</option>
            <option value="admin">Admin</option>
            <option value="publisher">Publisher</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>


    <br>

    <div class="form-group">
        <label for="post_status">Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="post_image">User Image</label>
        <br>
        <div class="form-group form-type-line file-group">
            <input type="text" class="form-control file-value file-browser" placeholder="Choose file..." readonly="">
            <input type="file" name="image" multiple="">
        </div>
    </div>

    <br>

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <label for="post_tags">password</label>
        <input type="password" name="user_password" class="form-control">
    </div>

    <br>

    <div class="form-group">
        <input type="submit" value="Add User" class="btn btn-primary" name="add_user">
    </div>

</form>