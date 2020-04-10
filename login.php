<?php
// linking the backend database of our website 
include ("db.php");

// creating a variable to store the name of the page
$pagename="Login"; 

// stylesheet is linked to the page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

// the name of this page will appear as the title of the window
echo "<title>".$pagename."</title>"; 

echo "<body>";

// adding the header to this page
include ("headfile.html"); 

// displaying the name of the page
echo "<h4>".$pagename."</h4>"; 

// creating a form to enter the email and password in order to login
echo "<form action='login_process.php' method='post'>";

// creating a table to organise the fields neatly
echo "<table style='border:0px'>";
echo "<tr><td style='border:0px' class='signuptable'>";

// the first field is asking for the email of the user
echo "<label>*Email:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='text' class='signupinput' name='email'><br>";
echo "</td></tr>";

// the second field is asking the user to enter their password
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Password:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='password' class='signupinput' name='pword'><br>";
echo "</td></tr>";

// adding a button to reset the form
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<input type='reset' value='Clear Form'>";

// adding a button to login
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='submit' value='Login'>";
echo "</td></tr>";
echo "</table>";
echo "</form>";

// adding the custom footer to this page
include("footfile.html");

echo "</body>";
?>