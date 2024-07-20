<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $startDate = mysqli_real_escape_string($mysqli, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($mysqli, $_POST['end_date']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    // Check for empty fields
    if (empty($name) || empty($startDate) ||  empty($endDate) || empty($status)) {
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
    } else {
        // Update the database table
        $result = mysqli_query($mysqli, "UPDATE courses 
                  SET `name` = '$name', `start_date` = '$startDate', `end_date` = '$endDate', `status_id` = '$status'
                  WHERE `id` = $id");

        // Redirect to the main display page
        header("Location:index.php");

    }
}