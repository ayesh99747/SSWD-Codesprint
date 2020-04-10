<?php
// linking the backend database of our website 
include("db.php");

// creating a variable to store the name of the page
$pagename = "Your Sign Up Results"; 

// stylesheet is linked to the page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

// the name of this page will appear as the title of the window
echo "<title>" . $pagename . "</title>"; 

echo "<body>";

// adding the header to this page
include("headfile.html"); 

// displaying the name of the page
echo "<h4>" . $pagename . "</h4>"; 

// creating variables to store the values entered in signup.php. using post metthod as http request method
$fname = $_POST['fname'];
$lname = $_POST["lname"];
$address = $_POST["address"];
$pcode = $_POST["pcode"];
$telno = $_POST["telno"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

if ($fname!="" && $lname!="" && $address!="" && $pcode!="" && $telno!="" && $email!="" && $password!=""&& $cpassword!="") {

    // validating for password and confirm password. they both have to be the same.
    if (!($password == $cpassword)) {
        echo "<b>Sign-up failed!</b>";
        echo "<p>The 2 passwords are not matching.<br>";
        echo "Make sure you enter them correctly.</p>";
        echo "Go back to <a href=signup.php>sign up</a>";
    } else {

        // making variables to help with validation of the input fields
        $expression = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        $isemail = (preg_match($expression, $email)) ? true : false;

        if ($isemail) {
            //create a $SQL variable that contains a SQL query as a string. This query will isert all the user details into the Users table in the database
            $SQL = "insert into users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) values ('C','" . $fname . "','" . $lname . "','" . $address . "','" . $pcode . "','" . $telno . "','" . $email . "','" . $password . "');";

            //run the above SQL query on the react database
            mysqli_query($conn, $SQL);

            // if there are no errors, then sign up is successful
            if (mysqli_errno($conn) == 0) {
                echo "<b>Sign-up successful!</b>";
                echo "<p>To continue, please <a href=login.php>login</a></p>";
            } 
            
            else {
                echo "<b>Sign-up failed!</b>";

                // if the email address entered is already in use, the following error message will be printed 
                if (mysqli_errno($conn) == 1062) {
                    echo "<p>Email already in use.<br>";
                    echo "You may be already registered or try another email address.</p>";
                    echo "Go back to <a href=signup.php>sign up</a>";
                }

                // if invalid characters were entered into the form, the following error message will be printed 
                if (mysqli_errno($conn) == 1064) {
                    echo "<p>Invalid characters entered in the form.<br>";
                    echo "Make sure you avoid the following characters: apostrophes like ['] and backslashes like [\].</p>";
                    echo "Go back to <a href=signup.php>Sign Up page.</a>";
                }
            }
        } 
        
        // if the email address is not correct, the following error message will be printed  
        else {
            echo "<b>Sign-up failed!</b>";
            echo "<p>Email not valid.<br>";
            echo "Make sure you enter a correct email address.</p>";
            echo "Go back to <a href=signup.php>sign up</a>";
        }
    }
} 
// if the fields are left empty, the following error message will be displayed 
else {
    echo "<b>Sign-up failed!</b>";
    echo "<p>Your signup form is incomplete as all fields are mandatory.<br>";
    echo "Make sure to provide all the required details.</p>";
    echo "Go back to <a href=signup.php>Sign Up page.</a>";
}
