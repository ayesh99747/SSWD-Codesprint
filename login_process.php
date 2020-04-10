<?php
// linking the backend database of our website
include("db.php");

// creating a variable to store the name of the page
$pagename = "Your Login Results"; 

// stylesheet is linked to the page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

// the name of this page will appear as the title of the window
echo "<title>" . $pagename . "</title>";

echo "<body>";

// adding the header to this page
include("headfile.html"); 

// displaying the name of the page
echo "<h4>" . $pagename . "</h4>"; 

// creating two variables that will store the email and password values from login.php
$email = $_POST['email'];
$password = $_POST["pword"];

// if both the email and password are present
if (isset($email) || isset($password)) {

    // making variables to help with validation of the input fields
    $expression = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $isemail = (preg_match($expression, $email)) ? true : false;

    if ($isemail) {
        //populating the $SQL variable with user details where the email of the user is the same as the one entered
        $SQL = 'SELECT  * FROM Users WHERE userEmail="' . $email . '";';

        //run the following SQL query on the react database
        $result = mysqli_query($conn, $SQL);

        // if the email was not found in the database, then the following message will be printed
        if (!$arrayu = mysqli_fetch_array($result)) {
            echo "<p>Your email was not recognised. Please login again.</p>";
        } else {
            // if the password was not found in the database, then the following message will be printed
            if ($arrayu["userPassword"] != $password) {
                echo "<p>The password was not recognised. Please login again.</p>";
                echo "Go back to <a href=login.php>login</a>";
            } 
            
            // if both the email and password are correct
            else {

                // three session variables are made to store the data taken from the database
                $_SESSION['userid'] = $arrayu['userId'];
                $_SESSION['fname'] = $arrayu['userFName'];
                $_SESSION['sname'] = $arrayu['userSName'];

                // displaying login successful message with the use of the session variables
                echo "<p><b>Login successful!</b></p>";
                echo "<p>Hello, " . $_SESSION['fname'] . " " . $_SESSION['sname'] . "</p>";

                // if the user is an admin, this message will be printed
                if ($arrayu["userType"] == 'A') {
                    $_SESSION["user_type"] = "Administrator";
                    echo "<p>You have successfully logged in as a React Administrator</p>";
                    echo "<p><a href=index.php>React Main Page</a></p>";
                } 
                
                // if the user is a customer, a different message will be printed
                else if ($arrayu["userType"] == 'C') {
                    $_SESSION["user_type"] = "Customer";
                    echo "<p>You have successfully logged in as a React Customer</p>";
                    echo "<p>Continue shopping for <a href=index.php>React</a></p>";
                    echo "View your <a href=basket.php>SMART BASKET</a>";
                }
            }
        }
    } else {
        echo "<b>Login failed!</b>";
        echo "<p>Email is not valid.<br>";
        echo "Make sure you enter a correct email address.</p>";
        echo "Go back to <a href=login.php>login.</a>";
    }
} else {
    echo "<b>Sign-up failed!</b>";
    echo "<p>Both email and password fields need to be filled in.<br>";
    echo "Go back to <a href=login.php>login.</a>";
}
