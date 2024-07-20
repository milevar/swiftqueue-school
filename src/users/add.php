<?php
require_once("../auth/Auth.php");
$auth->checkSession();

$title = "Add User";
$activePage = "Users";
require_once("../common/header.php");
?>
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <form action="addAction.php" method="post" name="add">
                    <div class="mb-3">
                        <label for="nameField" class="form-label">Name</label>
                        <input id="nameField" type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="emailField" class="form-label">Email</label>
                        <input id="emailField" type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="passwordField" class="form-label">Password</label>
                        <input id="passwordField" type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordField" class="form-label">Confirm Password</label>
                        <input id="confirmPasswordField" type="password" name="confirm_password" class="form-control">
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="mt-4 col-lg-3">
                            <input type="submit" name="submit" value="Add User" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once("../common/footer.php");
?>
