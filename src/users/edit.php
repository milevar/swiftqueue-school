<?php
// Include the database connection file
require_once("../common/dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$startDate = $resultData['email'];
$status = $resultData['password'];
?>
<html>
<head>
    <title>Edit User</title>
</head>

<body>
<h2>Edit User</h2>
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
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $startDate; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $status; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>