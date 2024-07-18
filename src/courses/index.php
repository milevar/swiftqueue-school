<?php
// Include the database connection file
require_once("../common/dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM courses ORDER BY id DESC");
$title = "Courses";

require_once("../common/header.php");
?>

<p>
    <a href="add.php">Add New Data</a>
</p>
<table width='80%' border=0>
    <tr bgcolor='#DDDDDD'>
        <td><strong>Name</strong></td>
        <td><strong>Start Date</strong></td>
        <td><strong>End Date</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    <?php
    // Fetch the next row of a result set as an associative array
    while ($res = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['start_date']."</td>";
        echo "<td>".$res['end_date']."</td>";
        echo "<td>".$res['status']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
			<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>
<?php
require_once("../common/header.php");
?>