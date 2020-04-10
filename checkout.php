<?php
include("db.php"); //include db.php file to connect to DB

$pagename = "Order Confirmation"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include("headfile.html"); //include header layout file

include("detectlogin.php");

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page

$currentdatetime = date("Y-m-d H:i:s");
$currentUserId = $_SESSION['userid'];

$SQL = "insert into orders (userId, orderDateTime) values (" . $currentUserId . ",'" . $currentdatetime . "');";
//run SQL query for connected DB or exit and display error message
mysqli_query($conn, $SQL);
echo mysqli_error($conn);
if (mysqli_errno($conn) == 0) {
    $SQL = "select MAX(orderNo) as orderNo, orderDateTime, orderTotal from orders WHERE userId = " . $currentUserId . ";";
    //run SQL query for connected DB or exit and display error message
    $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
    $arrayord = mysqli_fetch_array($exeSQL);

    $orderNo = $arrayord['orderNo'];

    if (isset($_SESSION['basket'])) {
        echo "<p><b>Successful Order - </b> ORDER REFERENCE NO: " . $orderNo . "</p>";

        echo "<table>";
        echo "<tr>";
        echo "<th>Test Name</th>";
        echo "<th>Price</th>";
        echo "<th>Date</th>";
        echo "</tr>";
        $total = 0;

        foreach ($_SESSION['basket'] as $index => $value) {
            //create a $SQL variable and populate it with a SQL statement that retrieves product details
            $SQL = "select testId, testName, testPrice from tests WHERE testID = $index";
            //run SQL query for connected DB or exit and display error message
            $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

            while ($arrayb = mysqli_fetch_array($exeSQL)) {

                $total += $arrayb['testPrice'];

                // $SQL = "insert into order_line (orderNo, testId, testDate, testPrice) values (" . $orderNo . "," . $index . "," . $value . "," . $subtotal . ");";
                // //run SQL query for connected DB or exit and display error message
                // mysqli_query($conn, $SQL);

                echo "<tr>";
                echo "<td>" . $arrayb['testName'] . "</td>";
                echo "<td>&euro;" . $arrayb['testPrice'] . "</td>";
                echo "<td class='quantity'>" . $value . "</td>";
                echo "</tr>";
            }
        }

        // echo "<tr>";
        echo "<td id='total' colspan='2'>TOTAL</td>";
        echo "<td><b>&euro;" . number_format($total, 2) . "</b></td>";
        echo "</tr>";
        echo "</table>";

        $SQL = "update orders SET orderTotal = " . $total . " WHERE orderNo = " . $orderNo . ";";
        //run SQL query for connected DB or exit and display error message
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        echo "<p>To log out and leave the system <a href=logout.php>Logout</a>.</p>";
    
    } else {
        echo "<p>Basket is empty!</p>";
    }
} else {
    echo "<b>Checkout failed!</b>";
    echo "<p>An error occured while scheduling the test.</p>";
}

unset($_SESSION['basket']);

include("footfile.html"); //include foot layout

echo "</body>";
