<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");

if (isset($_POST['submit'])) {
    // Escape special characters in string for use in SQL statement
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $passwd = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Check for empty fields
    if (empty($name) || empty($email)  || empty($passwd)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        if (empty($passwd)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }

        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // If all the fields are filled (not empty)

        // Insert data into database
        $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$passwd')");

        // Redirect to the main display page
        header("Location:index.php");
    }
}
