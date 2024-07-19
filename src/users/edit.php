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
$email = $resultData['email'];
$password = $resultData['password'];

$title = "Edit User";
$activePage = "Users";
require_once("../common/header.php");
?>
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <form name="edit" method="post" action="editAction.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="nameField" class="form-label">Name</label>
                        <input id="nameField"
                               type="text"
                               name="name"
                               value="<?php echo $name; ?>"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="emailField" class="form-label">Email</label>
                        <input id="emailField"
                               type="email"
                               name="email"
                               value="<?php echo $email; ?>"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="passwordField" class="form-label">New Password</label>
                        <input id="passwordField"
                               type="password"
                               name="password"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordField" class="form-label">New Confirm Password</label>
                        <input id="confirmPasswordField"
                               type="password"
                               name="confirmPassword"
                               class="form-control">
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="mt-4 col-lg-3">
                            <input type="submit" name="update" value="Edit User" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once("../common/footer.php");
?>