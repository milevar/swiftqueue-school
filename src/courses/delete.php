<?php
// Include the database connection file
require_once("../common/dbConnection.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM courses WHERE id = $id");

// Redirect to the main display page (index.php in our case)
header("Location:index.php");