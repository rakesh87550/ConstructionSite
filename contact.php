<?php
// php code for contact form
// database connection
include_once("database_con.php");
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    $inquery = "INSERT INTO contact (name, subject, email, msg) VALUES('$name', '$subject', '$email', '$msg')";
    mysqli_query($conn, $inquery);
    header("location:index.php");
}
?>