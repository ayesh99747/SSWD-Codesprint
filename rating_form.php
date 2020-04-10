<?php
include ("db.php");
include ("detectlogin.php");
//create and populate pagename variable
$pagename = "Submit Review";

//use the stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");

echo "<h4>".$pagename."</h4>";
$_SESSION['ratingproduct'] = $_GET['u_prodid'];
echo "<form id=reviewForm method=get action='process_rating.php'>";
	echo "<table style='border:0px'>";
		echo "<tr>";
			echo "<td style='border:0px'><label>Rating in short: </label></td>";
			echo "<td style='border:0px'><input type=text name=ratingshort></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td style='border:0px'><label>Your Review: </label></td>";
			echo "<td style='border:0px'><textarea form=reviewForm name=ratinglong rows=5 cols=80></textarea></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td style='border:0px'><input type=reset value='Clear'></td>";
			echo "<td style='border:0px'><input type=submit value='Submit Review'></td>";
		echo "</tr>";
	echo "</table>";
echo "</form>";

include ("footfile.html");
echo "</body>";

?>
