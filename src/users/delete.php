<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id = $id");

$_SESSION['message'] = [
    "type" => "alert-success",
    "text" => "User deleted successfully."
];
// Redirect to the main display page (index.php in our case)
header("Location:index.php");