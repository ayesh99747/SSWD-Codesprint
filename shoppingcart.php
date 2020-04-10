<?php
include("db.php"); //include db.php file to connect to DB

$pagename = "Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include("headfile.html"); //include header layout file

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

include("detectlogin.php");

if (isset($_POST['hidden_prodid'])) {
    $delprodid = $_POST['hidden_prodid'];
    unset($_SESSION['basket'][$delprodid]);
    echo "1 item removed!";
}

if (isset($_POST['h_prodid'])) {
    $newprodid = $_POST['h_prodid'];
    $testDate = $_POST['testDate'];

    //create a new cell in the basket session array. Index this cell with the new product id.
    //Inside the cell store the required product quantity
    $_SESSION['basket'][$newprodid] = $testDate;
    //echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
    echo "<p>1 test added to the basket</p>";
} else {
    echo "<p>Current basket unchanged</p>";
}


echo "<table>";
echo "<tr>";
echo "<th>Test Name</th>";
echo "<th>Price</th>";
echo "<th>Date</th>";
echo "<th></th>";
echo "</tr>";
$total = 0;
if (isset($_SESSION['basket'])) {
    foreach ($_SESSION['basket'] as $index => $value) {
        //create a $SQL variable and populate it with a SQL statement that retrieves product details
        $SQL = "select testId, testName, testPrice from tests WHERE testID = $index";
        //run SQL query for connected DB or exit and display error message
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        while ($arrayp = mysqli_fetch_array($exeSQL)) {
            echo "<tr>";
            echo "<td>" . $arrayp['testName'] . "</td>";
            echo "<td>&euro;" . $arrayp['testPrice'] . "</td>";
            echo "<td class='quantity'>" .  $_SESSION['basket'][$index] . "</td>";
            $total += $arrayp['testPrice'];
            echo "<form action=shoppingcart.php method=post>";
            echo "<td><input type=submit value='Remove'></td>";
            //pass the product id to the next page basket.php as a hidden value
            echo "<input type=hidden name='hidden_prodid' value=" . $arrayp['testId'] . ">";
            echo "</form>";
            echo "</tr>";
        }
    }
} else {
    echo "<p>Basket is empty!</p>";
}
echo "<tr>";
echo "<td id='total' colspan='2'>TOTAL</td>";
echo "<td><b>&euro;" . number_format($total, 2) . "</b></td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";

echo "<br><a href=clearcart.php>CLEAR BASKET</a>";

if (isset($_SESSION['userid'])) {
    echo "<br><br><br>To finalise your order: <a href=checkout.php>Checkout</a>";    
} else {
    echo "<br><br><br>New homteq customers: <a href=signup.php>Sign up</a>";
    echo "<br><br>Returning homteq customers: <a href=login.php>Login</a>";
}

include("footfile.html"); //include foot layout

echo "</body>";
