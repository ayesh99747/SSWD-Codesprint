<?php
$pagename = "Add Tests"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include("headfile.html"); 

echo "<h4>" . $pagename . "</h4>"; 
if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "Administrator") {
    echo "<form action='addproduct_conf.php' method='post'>";
    echo "<table style='border:0px'>";
    echo "<tr><td style='border:0px' class='signuptable'>";
    echo "<label>*Test Name:</label><br></td>";
    echo "<td style='border:0px' class='signuptable'>";
    echo "<input type='text' class='signupinput' name='pname'><br>";
    echo "</td></tr>";

    echo "<tr><td style='border:0px' class='signuptable'>";
    echo "<label>*Small Picture Name:</label><br></td>";
    echo "<td style='border:0px' class='signuptable'>";
    echo "<input type='text' class='signupinput' name='spname'><br>";
    echo "</td></tr>";

    echo "<tr><td style='border:0px' class='signuptable'>";
    echo "<label>*large Picture Name:</label><br></td>";
    echo "<td style='border:0px' class='signuptable'>";
    echo "<input type='text' class='signupinput' name='lpname'><br>";
    echo "</td></tr>";

    echo "<tr><td style='border:0px' class='signuptable'>";
    echo "<label>*Short Description:</label><br></td>";
    echo "<td style='border:0px' class='signuptable'>";
    echo "<input type='text' class='signupinput' name='sdescrip'><br>";
    echo "</td></tr>";

    echo "<tr><td style='border:0px' class='signuptable'>";
    echo "<label>*Long Description:</label><br></td>";
    echo "<td style='border:0px' class='signuptable'>";
    echo "<input type='text' class='signupinput' name='ldescrip'><br>";
    echo "</td></tr>";

    echo "<tr><td style='border:0px' class='signuptable'>";
    echo "<label>*Price:</label><br></td>";
    echo "<td style='border:0px' class='signuptable'>";
    echo "<input type='text' class='signupinput' name='price'><br>";
    echo "</td></tr>";

    echo "<tr><td style='border:0px' class='signuptable'>";
    echo "<input type='submit' value='Add Product'>";
    echo "<td style='border:0px' class='signuptable'>";
    echo "<input type='reset' value='Clear Form'>";
    echo "</td></tr>";
    echo "</table>";
    echo "</form>";
} else {
    echo "Only Admins can add products";
}

include("footfile.html");

echo "</body>";
