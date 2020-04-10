<?php

//create and populate pagename variable
$pagename = "Submit Review";

//use the stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

echo "<title>".$pagename."</title>";
echo "<body>";

include ("headfile.html");

echo "<h4>".$pagename."</h4>";
if(($_POST['ratingshort']!=null) && ($_POST['ratinglong']!=null)){
	$id = $_SESSION['ratingproduct'];
	$user = $_SESSION['userid'];
	$date = date("Y/m/d");
	$short = $_GET['ratingshort'];
	$long = $_GET['ratinglong'];
	$SQL = "insert into customer_rating (prodId, userId, ratingDate, ratingShort, ratingLong) values ('".$id."', '".$user."', '".$date."', '".$short."', '".$long."')";
	$exe = mysqli_query($conn, $SQL);
	if($exe==true){
		echo "Process successful<br/><br/>";
		echo "Review Submitted</br>";
	}
}
else{
	echo "Please fill all the fields<br/><br/>";
	echo "Could not submit review<br/>";
}

include ("footfile.html");
echo "</body>";

?>
