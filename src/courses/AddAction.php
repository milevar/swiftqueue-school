<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");
require_once("../common/validation.php");

if (isset($_POST['submit'])) {
    $errors = [];

    // Escape special characters in string for use in SQL statement
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $startDate = mysqli_real_escape_string($mysqli, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($mysqli, $_POST['end_date']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

    // Validate fields
    $errors = validateCourse($name, $startDate, $endDate, $status);

    if ($errors) {
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // Insert data into database
        $result = mysqli_query($mysqli, "INSERT INTO courses (`name`, `start_date`, `end_date`, `status_id`) 
                              VALUES ('$name', '$startDate', '$endDate', '$status')");

        $_SESSION['message'] = [
            "type" => "alert-success",
            "text" => "Course added successfully."
        ];

        // Redirect to the main display page
        header("Location:index.php");
    }
}
