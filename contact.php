<?php include "includes/header.php"; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div style="display: none" class="loader-img loader-div loadingio-spinner-double-ring-a1kqjil1zsq">
    <div class="ldio-nuoslg0rjqe">
        <div></div>
        <div></div>
        <div>
            <div></div>
        </div>
        <div>
            <div></div>
        </div>
    </div>
</div>

<?php

$get_config_query = "SELECT * FROM email_config";
$send_config_query = mysqli_query($connection, $get_config_query);

while($row = mysqli_fetch_assoc($send_config_query)) {
    $smtp_host = $row['smtp_host'];
    $smtp_username = $row['smtp_username'];
    $smtp_password = $row['smtp_password'];
    $smtp_port = $row['smtp_port'];
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

include("vendor/phpmailer/phpmailer/src/PHPMailer.php");
include("vendor/phpmailer/phpmailer/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $message = mysqli_real_escape_string($connection, $_POST['body']);


    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = $smtp_host;                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = $smtp_username;                     //SMTP username
        $mail->Password = $smtp_password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = $smtp_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("{$blog_email}", $_POST['name']);
        $mail->addAddress("{$blog_email}", $_POST['name']);     //Add a recipient
        $mail->addAddress("{$blog_email}");               //Name is optional
        $mail->addReplyTo("{$blog_email}", 'Information');
        //    $mail->addCC('cc@example.com');
        //    $mail->addBCC('bcc@example.com');

        //Attachments
        //    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $_POST['subject'];
        $mail->Body = 
        'Name: ' . $_POST['name'] . '<br>' .'Email: ' . $_POST['email'] . '<br>' .'Subject: ' . $_POST['subject'] . '<br>' . 'Message: ' . $_POST['body'];
        
        
        
        $mail->addCustomHeader('MIME-Version: 1.0');
        $mail->addCustomHeader('From: Your name <' . $_POST["email"] . '>');
        $mail->addCustomHeader('Content-Type: text/html; charset=ISO-8859-1');
        //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script>$(".loader-div").hide();</script>';
        header("Location: contact.php?message=success");
    } catch (Exception $e) {
        header("Location: contact.php?message=failed");
        echo '<script>$(".loader-div").hide();</script>';
    }

    $query = "INSERT INTO contacts(contact_user, contact_email, contact_date, contact_message) VALUES('{$name}', '{$email}', now(), '{$message}')";
    $send_query = mysqli_query($connection, $query);
}

?>




<br>
<br>
<br>
<br>
<br>
<!-- Page Content -->
<?php
if (!empty($_SESSION['username'])) {
    $login == 1;
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $username = $_SESSION['username'];
    $user_email = $_SESSION['user_email'];
}
?>
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-wrap">
                        <h1>Contact Us</h1>
                        <?php
                        if (isset($_GET["message"]) && $_GET["message"] == 'success') {
                            echo
                            '<div class="alert alert-success">
                                Your message sent successfully
                            </div>';
                        } else if (isset($_GET["message"]) && $_GET["message"] == 'failed') {

                            echo
                            '<div class="alert alert-danger">
                                    Something went wrong
                             </div>';
                        }
                        ?>
                        <form role="form" action="" method="post" class="login-form" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="name" class="sr-only">Email</label>
                                <input required type="text" name="name" id="name" class="form-control" placeholder="John Doe" value="<?php if ($login == 1) {
                                                                                                                                            echo $firstname;
                                                                                                                                        } ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input required type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" value="<?php if ($login == 1) {
                                                                                                                                                                                                    echo $user_email;
                                                                                                                                                                                                } ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Subject</label>
                                <input required type="text" name="subject" id="Subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <label for="body" class="sr-only">Message</label>
                                <textarea placeholder="Message" class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                            </div>
                            <input onclick="display_data()" style="color: white;" type="submit" name="submit" id="btn-login getDataBtn" class="btn btn-outline-primary btn-lg btn-block" value='Submit '>
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
</div>

<script type="text/javascript">
    function display_data() {
        var a = document.forms["login-form"]["name"].value;
        var b = document.forms["login-form"]["email"].value;
        var c = document.forms["login-form"]["subject"].value;
        var d = document.forms["login-form"]["body"].value;
        if (a == null || a == "" || b == null || a == "" || b == null || c == "" || c == null || a == "" || d == null || d == "") {

            return false;
        } else {
            $(".loader-div").show(); // show loader
        }
    }
</script>


<hr>