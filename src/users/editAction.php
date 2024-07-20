<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");
require_once("../common/validation.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Check for empty fields
    $errors = validateUser($name, $email, $password);

    if ($errors) {
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }  else {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $result = mysqli_query($mysqli, "UPDATE users 
                      SET `name` = '$name', `email` = '$email', `password` = '$password' WHERE `id` = $id");

        $_SESSION['message'] = [
            "type" => "alert-success",
            "text" => "User updated successfully."
        ];
        // Redirect to the main display page
        header("Location:index.php");
    }
}