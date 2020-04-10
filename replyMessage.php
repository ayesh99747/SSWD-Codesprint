<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h5>Reply</h5>
    <?php
    if(isset($_GET['id']) & !empty($_GET['id'])){
      $id = $_GET['id'];

      echo "<form class='' action='replyMessage.php?id=$id' method='post'>
        
        <br><textarea name='message' rows='3' cols='80' placeholder='Write your reply here...'></textarea>
        <br><input type='submit' name='reply' value='Enter'>
      </form>";
    }
    ?>
  </body>
</html>

<?php

  require 'connect.php';

  if (isset($_POST['reply'])) {
    $username = $_SESSION["userId"];
    $message = $_POST["message"];
    $time = date("Y-m-d h:i:s");

    if(isset($_GET['id']) & !empty($_GET['id'])){
      $id = $_GET['id'];

      echo $username;

      mysqli_query($conn, "INSERT INTO messages VALUES ('', '$username', '$message', 'Reply to $id', '$time');");
      header("location: message.php");
    }
  }
?>
