<?php
// Include the database connection file
require_once("../common/dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
$title = "Users";
$activePage = "Users";

require_once("../common/header.php");
?>
    <div class="container-fluid">
        <div class="d-grid mt-3 ps-0 justify-content-md-end">
            <a href="add.php" class='btn btn-primary me-md-2' role='button'>Add User</a>
        </div>
    </div>

    <table class="table table-hover mb-5 mt-5">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['email']."</td>";
            echo "<td class='text-end'>
                <a href=\"edit.php?id=$res[id]\" class='btn btn-secondary btn-sm' role='button'>Edit</a>
                <a href=\"delete.php?id=$res[id]\" 
                onClick=\"return confirm('Are you sure you want to delete?')\" 
                class='btn btn-secondary btn-sm' role='button'>Delete</a>
                </td>";
        }
        ?>
        </tbody>
    </table>
<?php
require_once("../common/footer.php");
?>
