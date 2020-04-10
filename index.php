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
echo "<table>";
    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<label for='searchValue'>Search - </label>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<input type='text' placeholder='Search' name='searchValue'>";
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<label for='options'>Search By - </label>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<select id='options'>";
    echo "<option value=''>Select Search Category</option>";
    echo "<option value='availability'>availability</option>";
    echo "<option value='cost'>cost</option>";
    echo "</select>";
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<label for='options'>Sort By - </label>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<select id='options'>";
    echo "<option value=''>Select Sorting</option>";
    echo "<option value='ascending'>ascending</option>";
    echo "<option value='descending'>descending</option>";
    echo "</select>";
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<input type='submit' value='Search'>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "</td>";
    echo "</tr>";
echo "</table>";
echo "</form>";

include("footfile.html"); //include foot layout

echo "</body>";
?>''