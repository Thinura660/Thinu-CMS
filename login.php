<?php include "includes/header.php"; ?>

<?php
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />


<br>
<br>
<br>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://img.freepik.com/free-vector/man-sitting-desk-unlocking-computer-computer-settings-login-flat-illustration_74855-20645.jpg?w=2000" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="includes/login.php" method="post">
                    <?php
                    if (isset($_GET["login"]) && $_GET["login"] == 'failed') {
                        echo
                        '<div class="alert alert-danger">
                                                Incorrect Username or Password
                                            </div>';
                    }
                    ?>


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Email address</label>
                        <input name="username" type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a your username" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example4">Password</label>
                        <input name="password" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />

                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="forgot.php?forgot='?><?php echo uniqid(true) ?>" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">

                        <button name="login" type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="registration.php" class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

