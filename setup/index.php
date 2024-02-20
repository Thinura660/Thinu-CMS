<?php
if (isset($_POST['submit'])) {

  $db_host = $_POST['host'];
  $db_user =  $_POST['username'];
  $db_password =  $_POST['password'];
  $db_name =  $_POST['database'];

try {
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
}

catch(Exception $e) {
  echo "<script>alert('Invalid Database Information');</script>";
}

  if ($connection) {

    $web_name = mysqli_real_escape_string($connection, $_POST['web_name']);
    $web_icon = mysqli_real_escape_string($connection, $_FILES['web_icon']['name']);
    $web_icon_temp = $_FILES['web_icon']['tmp_name'];
    move_uploaded_file($web_icon_temp, "../admin/other_images/$web_icon");
    $web_email = mysqli_real_escape_string($connection, $_POST['web_email']);
    $web_keywords = mysqli_real_escape_string($connection, $_POST['web_keywords']);
    $web_description = mysqli_real_escape_string($connection, $_POST['web_description']);

    $method = $_POST['method'];

    $admin_name = mysqli_real_escape_string($connection, $_POST['admin_username']);
    $admin_email = mysqli_real_escape_string($connection, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($connection, $_POST['admin_password']);
    $admin_password = password_hash($admin_password, PASSWORD_BCRYPT, array('cost' => 10));


    $query_settings = "UPDATE settings SET ";
    $query_settings .= "blog_name = '{$web_name}', ";
    $query_settings .= "home_icon = '{$web_icon}', ";
    $query_settings .= "blog_icon = '{$web_icon}', ";
    $query_settings .= "blog_email = '{$web_email}', ";
    $query_settings .= "keywords = '{$web_keywords}', ";
    $query_settings .= "blog_description = '{$web_description}'";

    $send_query = mysqli_query($connection, $query_settings);

    $query_user = "INSERT INTO users(username, user_email, user_password, user_role) ";
    $query_user .= "VALUES('{$admin_name}', '{$admin_email}', '{$admin_password}', 'admin')  ";
    $register = mysqli_query($connection, $query_user);

    $connect_code = "
APP_ENV=$method
MYSQL_DATABASE=$db_name
MYSQL_HOST=$db_host
MYSQL_PASSWORD=$db_password
MYSQL_PORT=
MYSQL_USER=$db_user
        ";
    $fp = fopen('../.env', 'w');
    fwrite($fp, $connect_code);
    fclose($fp);
  } else {
    echo "<script>alert('Database information is invalid')</script>";
  }

  if($register) {
    header("Location: ../index.php");
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <section class="wizard-section">
    <div class="row no-gutters">
      <div class="col-lg-6 col-md-6">
        <div class="wizard-content-left d-flex justify-content-center align-items-center">
          <h1>Setup your CMS</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="form-wizard">
          <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-wizard-header">
              <p>Fill all form field to go next step</p>
              <ul class="list-unstyled form-wizard-steps clearfix">
                <li class="active"><span>1</span></li>
                <li><span>2</span></li>
                <li><span>3</span></li>
                <li><span>4</span></li>
              </ul>
            </div>
            <fieldset class="wizard-fieldset show">
              <h5>CMS Information</h5>
              <div class="form-group">
                <input type="text" class="form-control wizard-required" id="name" name="web_name">
                <label for="fname" class="wizard-form-text-label">Website Name*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group">
                <input type="file" class="form-control wizard-required" id="name" name="web_icon" placeholder="web_icon">
                <label for="fname" class="wizard-form-text-label">Website Icon*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control wizard-required" id="email" name="web_email">
                <label for="lname" class="wizard-form-text-label">Website Email*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group">
                <input type="keywords" class="form-control wizard-required" id="keywords" name="web_keywords">
                <label for="keywords" class="wizard-form-text-label">Website Keywords*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group">
                <textarea name="web_description" id="" cols="30" rows="5" class="form-control wizard-required"></textarea>
                <label for="lname" class="wizard-form-text-label">Website Description*</label>
                <div class="wizard-form-error"></div>
              </div>

              <div class="form-group clearfix">
                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
              </div>
            </fieldset>
            <fieldset class="wizard-fieldset">
              <h5>Database Information</h5>
              <div class="form-group">
                Method
                <div class="wizard-form-radio">
                  <input class="form-control wizard-required" name="method" id="localhost" type="radio" value="localhost">
                  <label for="radio1">Localhost</label>
                </div>
                <div class="wizard-form-radio">
                  <input class="form-control wizard-required" name="method" id="server" type="radio" value="sever">
                  <label for="radio2">Server</label>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control wizard-required" id="username" name="host">
                <label for="username" class="wizard-form-text-label">MYSQL HOSTNAME*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control wizard-required" id="db" name="database">
                <label for="pwd" class="wizard-form-text-label">MYSQL Database Name*</label>
                <div class="wizard-form-error"></div>
                <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="" name="username">
                <label for="pwd" class="wizard-form-text-label">MYSQL Username*</label>
                <div class="wizard-form-error"></div>
                <span class="wizard-password-eye"><i class="far fa-eye"></i></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control " id="cpwd" name="password">
                <label for="cpwd" class="wizard-form-text-label">MYSQL Password*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group clearfix">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
              </div>
            </fieldset>
            <fieldset class="wizard-fieldset">
              <h5>Admin Information</h5>
              <div class="form-group">
                <input type="text" class="form-control wizard-required" id="bname" name="admin_username">
                <label for="bname" class="wizard-form-text-label">Username*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control wizard-required" id="brname" name="admin_email">
                <label for="brname" class="wizard-form-text-label">Email*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control wizard-required" id="acname" name="admin_password">
                <label for="acname" class="wizard-form-text-label">Password*</label>
                <div class="wizard-form-error"></div>
              </div>
              <div class="form-group clearfix">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
              </div>
            </fieldset>
            <fieldset class="wizard-fieldset">
              <h5>Confirm Settings</h5>
              <div class="form-group">

                <p>Kindly review and approve all changes before submitting.</p>
              </div>
              <div class="form-group clearfix">
                <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                <input type="submit" value="Submit" class="form-wizard-submit float-right" name="submit">
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

<script src="script.js"></script>

</html>