<?php
include("db.php"); //include db.php file to connect to DB
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
$pagename = "Make your home smart"; //create and populate variable called $pagename

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include("headfile.html"); //include header layout file

include("detectlogin.php");

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

echo "<form action='/products.php' method='GET'>";
    echo "<label for='searchValue'>Search - </label>";
    echo "<input type='text' placeholder='Search' name='searchValue'>";

    echo "<label for='options'>Search By - </label>";
    echo "<select id='options'>";
    echo "<option value='availability'>availability</option>";
    echo "<option value='cost'>cost</option>";
    echo "</select>";
    
    echo "<input type='submit' value='Submit'>";
echo "</form>";
    
          
include("footfile.html"); //include foot layout

echo "</body>";
?>''