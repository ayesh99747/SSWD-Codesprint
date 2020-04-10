<?php

  require 'connect.php';

  if(isset($_GET['id']) & !empty($_GET['id'])){
  $id = $_GET['id'];

  $delsql="DELETE FROM `messages` WHERE msgID=$id";
  if(mysqli_query($conn, $delsql)){
    header("Location: message.php");
  }
  }
?>
