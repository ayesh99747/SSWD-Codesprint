<?php
include("db.php"); //include db.php file to connect to DB
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
$pagename = "Tests"; //create and populate variable called $pagename

echo "<title>" . $pagename . "</title>"; //display name of the page as window title

echo "<body>";

include("headfile.html"); //include header layout file

include("detectlogin.php");

echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page




if (isset($_GET['searchValue']) && isset($_GET['searchBy']) && isset( $_GET['sortBy']) && isset($_GET['searchType'])) {
    $searchValue = $_GET['searchValue'];
    $searchCategory = $_GET['searchBy'];
    $sortOrder = $_GET['sortBy'];
    $searchType = $_GET['searchType'];
    if ($searchType == 'exact') {
        //create a $SQL variable and populate it with a SQL statement that retrieves product details
        $SQL = "SELECT `testId`, `testName`, `testPicNameSmall`, `testPicNameLarge`, `testDescripShort`, `testDescripLong`, `testPrice` FROM `tests` WHERE ".$searchCategory."=".$searchValue." ";
        //run SQL query for connected DB or exit and display error message
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        echo "<table style='border: 0px'>";
        //create an array of records (2 dimensional variable) called $arrayp.
        //populate it with the records retrieved by the SQL query previously executed.
        //Iterate through the array i.e while the end of the array has not been reached, run through it
        while ($arrayp = mysqli_fetch_array($exeSQL)) {
            if ($arrayp == null) {
            
                echo "<p><h5>No tests available!</h5>"; 
            } else {
                echo "<tr>";
                echo "<td style='border: 0px'>";
                echo "<a href=prodbuy.php?u_prod_id=" . $arrayp['testId'] . "&view=yes>";
                //display the small image whose name is contained in the array
                echo "<img src=images/" .$arrayp['testPicNameSmall']. " height=250 width=250>";
                echo "</a>";
                echo "</td>";
                echo "<td style='border: 0px'>";
                echo "<p><h5>" . $arrayp['testName'] . "</h5>"; //display product name as contained in the array
                echo "<p>" . $arrayp['testDescripShort'];
                echo "<p><b>&euro;" . $arrayp['testPrice'] . "</b>";
                echo "<p><a href=ratings.php?u_prodid=" . $arrayp['testId'] . ">Test Reviews</a></p>";
                echo "<p><a href=rating_form.php?u_prodid" . $arrayp['testId'] . ">Submit review</a></p>";
                echo "</td>";
                echo "</tr>";
            }
            
            
        }
        echo "</table>";
    }else{
        //create a $SQL variable and populate it with a SQL statement that retrieves product details
        $SQL = "SELECT `testId`, `testName`, `testPicNameSmall`, `testPicNameLarge`, `testDescripShort`, `testDescripLong`, `testPrice` FROM `tests` WHERE ".$searchCategory." LIKE '%".$searchValue."%'";
        //run SQL query for connected DB or exit and display error message
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        echo "<table style='border 0px'>";
        //create an array of records (2 dimensional variable) called $arrayp.
        //populate it with the records retrieved by the SQL query previously executed.
        //Iterate through the array i.e while the end of the array has not been reached, run through it
        while ($arrayp = mysqli_fetch_array($exeSQL)) {
            if ($arrayp == null) {
                echo "<p><h5>No tests available!</h5>"; 
            } else{}
                echo "<tr>";
                echo "<td style='border: 0px'>";
                echo "<a href=prodbuy.php?u_prod_id=" . $arrayp['testId'] . "&view=yes>";
                //display the small image whose name is contained in the array
                echo "<img src=images/" .$arrayp['testPicNameSmall']. " height=250 width=250>";
                echo "</a>";
                echo "</td>";
                echo "<td style='border: 0px'>";
                echo "<p><h5>" . $arrayp['testName'] . "</h5>"; //display product name as contained in the array
                echo "<p>" . $arrayp['testDescripShort'];
                echo "<p><b>&euro;" . $arrayp['testPrice'] . "</b>";
                echo "<p><a href=ratings.php?u_prodid=" . $arrayp['testId'] . ">Test Reviews</a></p>";
                echo "<p><a href=rating_form.php?u_prodid" . $arrayp['testId'] . ">Submit review</a></p>";
                echo "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
} else {
    //create a $SQL variable and populate it with a SQL statement that retrieves product details

    $SQL = "select testId, testName, testPicNameSmall, testDescripShort, testPrice from tests";
    //run SQL query for connected DB or exit and display error message
    $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
    echo "<table style='border: 0px'>";
    //create an array of records (2 dimensional variable) called $arrayp.
    //populate it with the records retrieved by the SQL query previously executed.
    //Iterate through the array i.e while the end of the array has not been reached, run through it
    while ($arrayp = mysqli_fetch_array($exeSQL)) {
        echo "<tr>";
            echo "<td style='border: 0px'>";
            echo "<a href=prodbuy.php?u_prod_id=" . $arrayp['testId'] . "&view=yes>";
            //display the small image whose name is contained in the array
            echo "<img src=images/" .$arrayp['testPicNameSmall']. " height=250 width=250>";
            echo "</a>";
            echo "</td>";
            echo "<td style='border: 0px'>";
            echo "<p><h5>" . $arrayp['testName'] . "</h5>"; //display product name as contained in the array
            echo "<p>" . $arrayp['testDescripShort'];
            echo "<p><b>&euro;" . $arrayp['testPrice'] . "</b>";
            echo "<p><a href=ratings.php?u_prodid=" . $arrayp['testId'] . ">Test Reviews</a></p>";
            echo "<p><a href=rating_form.php?u_prodid" . $arrayp['testId'] . ">Submit review</a></p>";
            echo "</td>";
            echo "</tr>";
    }
    echo "</table>";
}






include("footfile.html"); //include foot layout

echo "</body>";
?>''
