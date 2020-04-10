<?php
// creating a variable to store the name of the page
$pagename="Sign Up"; 

// stylesheet is linked to the page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

// the name of this page will appear as the title of the window
echo "<title>".$pagename."</title>";

echo "<body>";

// adding the header to this page
include ("headfile.html"); 

// displaying the name of the page
echo "<h4>".$pagename."</h4>"; 

// creating a form to enter all the user details. upon sign up, it will lead to signup_process.php page
echo "<form action='signup_process.php' method='post'>";

// creating a table to organise the fields neatly
echo "<table style='border:0px'>";
echo "<tr><td style='border:0px' class='signuptable'>";

// the first field is asking for the first name of the user
echo "<label>*First name:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='text' class='signupinput' name='fname'><br>";
echo "</td></tr>";

// the second field is asking for the last name of the user
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Last name:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='text' class='signupinput' name='lname'><br>";
echo "</td></tr>";

// the third field is asking for the address of the user
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Address:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='text' class='signupinput' name='address'><br>";
echo "</td></tr>";

// the fourth field is asking for the potcode of the user
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Postcode:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='text' class='signupinput' name='pcode'><br>";
echo "</td></tr>";

// the fifth field is asking for the telephone number of the user
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Telephone Number:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='text' class='signupinput' name='telno'><br>";
echo "</td></tr>";

// the sixth field is asking for the email of the user
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Email Address:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='text' class='signupinput' name='email'><br>";
echo "</td></tr>";

// the seventh field is asking for the password of the user
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Password:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='password' class='signupinput' name='password'><br>";
echo "</td></tr>";

// the last field is asking the user to confirm their password
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<label>*Confirm Password:</label><br></td>";
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='password' class='signupinput' name='cpassword'><br>";
echo "</td></tr>";

// adding a button to reset the form
echo "<tr><td style='border:0px' class='signuptable'>";
echo "<input type='reset' value='Clear Form'>";

// adding a button to sign up as a customer
echo "<td style='border:0px' class='signuptable'>";
echo "<input type='submit' value='Sign Up'>";
echo "</td></tr>";
echo "</table>";
echo "</form>";

// adding the custom footer to this page
include("footfile.html"); 

echo "</body>";
?>