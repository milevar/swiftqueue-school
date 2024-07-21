<?php
require_once("../auth/Auth.php");
$auth->checkSession();

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
                <form id="editForm" method="post" action="editAction.php">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name"
                               type="text"
                               name="name"
                               value="<?= $name ?>"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="<?= $email ?>"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input id="password"
                               type="password"
                               name="password"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">New Confirm Password</label>
                        <input id="confirm_password"
                               type="password"
                               name="confirm_password"
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
    <script>
        $(function () {
            $("#editForm").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        minlength: 8
                    },
                    confirm_password: {
                        minlength: 8,
                        equalTo: "#password"
                    },
                },
                messages: {
                    name: "Please enter User name",
                    email: "Please enter a valid email",
                    password: {
                        required: "Please enter a password",
                        minlength: " Your password must be consist of at least 8 characters"
                    },
                    confirm_password: {
                        required: "Please confirm a password",
                        minlength: "Your password must be consist of at least 8 characters",
                        equalTo: "Please enter the same password as above"
                    },
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>
<?php
require_once("../common/footer.php");
?>