<?php

include 'server/connection.php';

if(count($_POST) > 0){
    mysqli_query($conn,"UPDATE users set user_name='". $_POST['user_name']."', user_email='".
    $_POST['user_email']."' WHERE user_id='".
    $_POST['user_id']."'");
    $message = "<p style='color:green;'> Record Modified Successfully !</p>";
}


$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='" . $_GET['user_id'] . "'");
$row = mysqli_fetch_array($result);
header("location: welcome.php");
?>

