<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Message</title>
  </head>
  <body>
    <?php
      require 'db.php';
      echo "<br>";
      $display_msgs = mysqli_query($conn, "SELECT * FROM messages;");
      while ($row = mysqli_fetch_assoc($display_msgs)) {
          $msgID = $row["msgID"];
          $username = $_SESSION["userId"];
          $message = $row["message"];
          $reply = $row["state"];
          $submitTime = $row["submitTime"];

          if (strpos($reply, 'Comment') !== false) {
            echo "<br><ul>
            <li>
            $username - $message - $submitTime <br> <a href='replyMessage.php?id=$msgID'>Reply </a>
          <a href='delMessage.php?id=$msgID'>Delete</a> <br>
            </li>
            </ul>";
          } else {
            echo "<ul style='list-style-type:none;'>
            <li>
            <ul style='list-style-type:none;'>
              <li>
              $username - $message <br> <a href='replyMessage.php?id=$msgID'>Reply </a>
            <a href='delMessage.php?id=$msgID'>Delete</a> <br>
              </li>
            </ul>
            </li>
            </ul>";
          }

          ;
      }
    ?>
    <br>
    <h1>New Message</h1>
    <form class="" action="addMessage.php" method="post">
<!--      <input type="text" name="username" placeholder="Your Name: "><br>-->
      <br><textarea name="message" rows="3" cols="80" placeholder="Write your message here..."></textarea>
      <br><input type="submit" name="submit" value="Enter">
    </form>
  </body>
</html>
