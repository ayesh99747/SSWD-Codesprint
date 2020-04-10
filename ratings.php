<?php
include ("db.php");
include ("detectlogin.php");
//create and populate pagename variable
$pagename = "User Rating";

//use the stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");

echo "<h4>".$pagename."</h4>";
$testid=$_GET['u_prod_id'];

$RET = 'select * from customer_rating where prodId='.$testid."";
$exeRET = mysqli_query($conn, $RET) or die (mysqli_error($conn));
	
	while($arrrating = mysqli_fetch_array($exeRET)){
		echo "<table style='border:0px'>";
			$short = $arrrating['ratingShort'];
			$long = $arrrating['ratingLong'];
			$date = $arrrating['ratingDate'];
			echo "<tr>";
				echo "<td style='border:0px>".$short."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td style='border:0px><p>".$long."<br/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td style='border:0px><p>".$date."</td>";
			echo "</tr>";
		echo "</table>";
	}

include ("footfile.html");
echo "</body>";

?>
