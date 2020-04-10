<?php

// creating a variable to store the name of the page
$pagename="Make your home smart"; 

// stylesheet is linked to the page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

// the name of this page will appear as the title of the window
echo "<title>".$pagename."</title>"; 

echo "<body>";

// adding the header to this page
include ("headfile.html"); 

//linking the detectlogin.php 
include("detectlogin.php");

// displaying the name of the page
echo "<h4>".$pagename."</h4>"; 

// displaying thank you message with the use of session varaibles
echo "<p>Thank you, " .$_SESSION['fname']. " " .$_SESSION['sname']. "<p>";

// stopping the session as the user now wants to logs out
unset($_SESSION['userid']);
session_destroy();

// printing final message
echo "<p>Your are now logged out.</p>";

// adding the footer to this page
include("footfile.html"); 

echo "</body>";
?>