<?php
require 'connect.php';

$username = $_POST["username"];
$message = $_POST["message"];
$time = date("Y-m-d h:i:s");

mysqli_query($conn, "INSERT INTO messages VALUES ('', '$username', '$message', 'Comment', '$time');");
header("location: message.php");

?>
