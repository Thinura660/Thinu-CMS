<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/page_navbar.php" ?>

<?php

$get_config_query = "SELECT * FROM email_config";
$send_config_query = mysqli_query($connection, $get_config_query);

while($row = mysqli_fetch_assoc($send_config_query)) {
    $smtp_host = $row['smtp_host'];
    $smtp_username = $row['smtp_username'];
    $smtp_password = $row['smtp_password'];
    $smtp_port = $row['smtp_port'];
}

if (isset($_POST['submit'])) {
    $host = $_POST['host'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $port = $_POST['port'];

    $update_query = "UPDATE email_config SET ";
    $update_query .= "smtp_host = '{$host}', ";
    $update_query .= "smtp_username = '{$username}', ";
    $update_query .= "smtp_password = '{$password}', ";
    $update_query .= "smtp_port = '{$port}'";

    $send_update_query = mysqli_query($connection, $update_query);

    if($send_update_query) {
        echo "
          <div class='alert alert-success'>
               <strong>Success! </strong>Changes are saved
          </div>
          ";
    } else {
        echo "
          <div class='alert alert-danger'>
               <strong>Failed! </strong>Something went wrong
          </div>
          ";
    }
}

?>

        <h3>Email Configuration</h3>

        <div class="row">
            <div class="col-6">


                <form action="" method="post">

                    <div class="form-group">
                        <label for="cat_title">SMTP Host:</label>
                        <input class="form-control" type="text" name="host" value="<?php echo $smtp_host ?>">
                    </div>

                    <div class="form-group">
                        <label for="cat_title">SMTP Username:</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $smtp_username ?>">
                    </div>

                    <div class="form-group">
                        <label for="cat_title">SMTP Password:</label>
                        <input class="form-control" type="password" name="password" ">
                    </div>

                    <div class="form-group">
                        <label for="cat_title">SMTP Port:</label>
                        <input class="form-control" type="number" name="port" value="<?php echo $smtp_port ?>">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Update">
                    </div>

                </form>


            </div>




            <?php include "includes/footer.php" ?>