<?php
// Include the database connection file
require_once("../common/dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM courses WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$startDate = $resultData['start_date'];
$endDate = $resultData['end_date'];
$status = $resultData['status'];
?>
<html>
<head>
    <title>Edit Course</title>
</head>

<body>
<h2>Edit Course</h2>
<p>
    <a href="index.php">Home</a>
</p>

<form name="edit" method="post" action="editAction.php">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
            <td>Start Date</td>
            <td><input type="text" name="start_date" value="<?php echo $startDate; ?>"></td>
        </tr>

        <tr>
            <td>End Date</td>
            <td><input type="text" name="end_date" value="<?php echo $endDate; ?>"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status" value="<?php echo $status; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>