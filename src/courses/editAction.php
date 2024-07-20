<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");
require_once("../common/validation.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $startDate = mysqli_real_escape_string($mysqli, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($mysqli, $_POST['end_date']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    // Check for empty fields
    $errors = validateCourse($name, $startDate, $endDate, $status);

    if ($errors) {
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Update the database table
        $result = mysqli_query($mysqli, "UPDATE courses 
                  SET `name` = '$name', `start_date` = '$startDate', `end_date` = '$endDate', `status_id` = '$status'
                  WHERE `id` = $id");

        $_SESSION['message'] = [
            "type" => "alert-success",
            "text" => "Course updated successfully."
        ];

        // Redirect to the main display page
        header("Location:index.php");
    }
}
