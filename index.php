<?php
include("db.php"); //include db.php file to connect to DB
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
$pagename = "Make your home smart"; //create and populate variable called $pagename

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include("headfile.html"); //include header layout file

include("detectlogin.php");

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

echo "<form action='/SSWD-Codesprint/products.php' method='GET'>";
echo "<table>";
    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<label for='searchValue'>Search - </label>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<input type='text' placeholder='Search' name='searchValue' required>";
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<label for='options'>Search By - </label>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<select name='searchBy' required>";
    echo "<option value=''>Select Search Category</option>";
    echo "<option value='testName'>Test Name</option>";
    echo "<option value='testPrice'>price</option>";
    echo "</select>";
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<label for='sortBy'>Sort By - </label>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<select name='sortBy'>";
    echo "<option value='ASC' selected>Ascending</option>";
    echo "<option value='DESC'>Descending</option>";
    echo "</select>";
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td style='border: 0px'>";
    echo "<input type='radio' id='approx' name='searchType' value='approx' checked>";
    echo "<label for='approx'>Approximate</label>";
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<input type='radio' id='exact' name='searchType' value='exact'>";
    echo "<label for='exact'>Exact</label>";
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