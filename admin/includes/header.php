<?php ob_start() ?>

<?php session_start(); ?>

<?php include "../db_conn.php" ?>

<?php include "functions.php" ?>


<?php

$user_role = $_SESSION['user_role'];

if (isset($_SESSION['user_role']) and $_SESSION['user_role'] == 'publisher' or $_SESSION['user_role'] == 'admin') {
} else {
   header("Location: ../index.php");
}

$settings = "SELECT * FROM settings";
$import_settings = mysqli_query($connection, $settings);

while ($row = mysqli_fetch_assoc($import_settings)) {
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

<!DOCTYPE html>
<html lang="zxx">

<head>
   <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="keyword" content="">
   <meta name="author" content="" />
   <!-- Page Title -->
   <title><?php echo $title ?></title>
   <!-- Main CSS -->
   <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
   <link type="text/css" rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css" />
   <link type="text/css" rel="stylesheet" href="assets/plugins/flag-icon/flag-icon.min.css" />
   <link type="text/css" rel="stylesheet" href="assets/plugins/simple-line-icons/css/simple-line-icons.css">
   <link type="text/css" rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.css">
   <link type="text/css" rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
   <link type="text/css" rel="stylesheet" href="assets/plugins/chartist/chartist.css">
   <link type="text/css" rel="stylesheet" href="assets/plugins/dropify/css/dropify.min.css">
   <link type="text/css" rel="stylesheet" href="assets/plugins/dropzone/dropzone.css">
   <link type="text/css" rel="stylesheet" href="assets/css/app.min.css" />
   <link type="text/css" rel="stylesheet" href="assets/plugins/apex-chart/apexcharts.css">
   <link type="text/css" rel="stylesheet" href="assets/css/app.min.css" />
   <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
   <link type="text/css" rel="stylesheet" href="assets/css/style.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link type="text/css" rel="stylesheet" href="assets/plugins/steps/jquery.steps.css">

   <!-- Important JS -->
   <script src="assets/plugins/chartist/chartist.js"></script>
   <script src="assets/js/app.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/tinymce.min.js" integrity="sha512-in/06qQzsmVw+4UashY2Ta0TE3diKAm8D4aquSWAwVwsmm1wLJZnDRiM6e2lWhX+cSqJXWuodoqUq91LlTo1EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


   <!-- Favicon -->
   <link rel="icon" href="other_images/<?php echo $blog_icon ?>" type="image/x-icon">
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
   <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>