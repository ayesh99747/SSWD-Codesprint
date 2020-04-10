<?php

// stylesheet is linked to the page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

// if there is a user id in the session variable, the following message will be printed
if (isset($_SESSION['userid'])) {
    echo "<p style='font-style:italic; float:right;'>".$_SESSION['fname']. " " .$_SESSION['sname']." / ".$_SESSION["user_type"]." No: " .$_SESSION['userid']. "</p>";
}
