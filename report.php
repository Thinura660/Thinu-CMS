<?php 
include "db_conn.php";

$report_post = $_GET['post_id'];
$report_user = $_GET['username'];

$query = "INSERT INTO reports(report_user, report_post, report_date) VALUES('{$report_user}', '{$report_post}', now())";
$send_query = mysqli_query($connection, $query);

if($send_query) {
    echo "<script>alert('Successfully Reported the post')</script>";
    echo "<script>window.history.back()</script>";
} else {
    echo "<script>alert('Something went wrong')</script>";
    echo "<script>window.history.back()</script>";
}

?>