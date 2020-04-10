<?php
$pagename = "Add Message"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include("headfile.html"); 

echo "<h4>" . $pagename . "</h4>";
  require 'db.php';

$username = $_SESSION["userid"];
$message = $_POST["message"];
$time = date("Y-m-d h:i:s");
mysqli_query($conn, "INSERT INTO messages(userId, message,state, submitTime) VALUES ('$username', '$message', 'Comment', '$time');");
header("location: message.php");

?>
