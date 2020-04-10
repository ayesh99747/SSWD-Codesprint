<?php
$pagename = "Delete Message"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include("headfile.html"); 

echo "<h4>" . $pagename . "</h4>";
  require 'db.php';

  if(isset($_GET['id']) & !empty($_GET['id'])){
  $id = $_GET['id'];

  $delsql="DELETE FROM `messages` WHERE msgID=$id";
  if(mysqli_query($conn, $delsql)){
    header("Location: message.php");
  }
  }
?>
