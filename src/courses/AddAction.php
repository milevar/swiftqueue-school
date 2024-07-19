<?php
require_once("../common/dbConnection.php");

if (isset($_POST['submit'])) {
    // Escape special characters in string for use in SQL statement
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $startDate = mysqli_real_escape_string($mysqli, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($mysqli, $_POST['end_date']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    // Check for empty fields
    if (empty($name) || empty($startDate) || empty($endDate)  || empty($status)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if (empty($startDate)) {
            echo "<font color='red'>Start Date field is empty.</font><br/>";
        }

        if (empty($endDate)) {
            echo "<font color='red'>End Date field is empty.</font><br/>";
        }

        if (empty($status)) {
            echo "<font color='red'>Status field is empty.</font><br/>";
        }

        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Insert data into database
        $result = mysqli_query($mysqli, "INSERT INTO courses (`name`, `status`, `start_date`, `end_date`) VALUES ('$name', '$status', '$startDate', '$endDate')");

        // Redirect to the main display page
        header("Location:index.php");
    }
}

