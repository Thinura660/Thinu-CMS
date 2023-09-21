<?php include "includes/header.php"; ?>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (username_exists($username)) {
        header("Location: registration.php?error=username");
    } elseif (email_exists($email)) {
        header("Location: registration.php?error=email");
    } elseif (email_exists($email) || email_exists($email)) {
        header("Location: registration.php?error=both");
    } else {

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

        //        $query_randSalt = "SELECT randSalt FROM users";
        //        $select_randSalt_query = mysqli_query($connection, $query_randSalt);
        //
        ////        while ($row = mysqli_fetch_array($select_randSalt_query)) {
        ////            $randSalt = $row['randSalt'];
        ////
        ////            $password = crypt($password, $randSalt);
        ////


        $query = "INSERT INTO users(username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber')  ";
        $register = mysqli_query($connection, $query);
        //        confirm($register);

        header("Location: registration.php?error=success");
    }
}

?>




<br>
<br>
<br>
<br>
<br>
<!-- Page Content -->

<section id="login" class="vh-100">

    <div class="form-wrap">

        <?php

        if (isset($_GET["error"]) && $_GET["error"] == 'username') {
            echo '
                            
                                <div class="alert alert-danger">
                                   <strong>Error:</strong> This username already taken.
                                </div>
                            
                            ';
        } elseif (isset($_GET["error"]) && $_GET["error"] == 'email') {
            echo '
                            
                                <div class="alert alert-danger">
                                   <strong>Error:</strong> This email already exists.
                                </div>
                            
                            ';
        } elseif (isset($_GET["error"]) && $_GET["error"] == 'both') {
            echo '
                            
                                <div class="alert alert-danger">
                                   <strong>Error:</strong> This account is already exists.
                                </div>
                            
                            ';
        } elseif (isset($_GET["error"]) && $_GET["error"] == 'success') {
            echo '
                            
                                <div class="alert alert-success">
                                   <strong>Success</strong> You successfully registered.
                                </div>
                            
                            ';
        }

        ?>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://img.freepik.com/free-vector/user-verification-unauthorized-access-prevention-private-account-authentication-cyber-security-people-entering-login-password-safety-measures_335657-3530.jpg?w=740&t=st=1681036442~exp=1681037042~hmac=4e18b5131ada507eb2361b79a918a510fe76646ed949025db51786e433f8ce32" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input required type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input required type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input required type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <input style="color: white;" type="submit" name="submit" id="btn-login" class="btn btn-outline-primary btn-lg btn-block" value="Register">
                    </form>
                </div>
            </div>
        </div>
</section>

<br><br>


<hr>