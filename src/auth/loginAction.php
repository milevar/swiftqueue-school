<?php
require_once("Auth.php");
require_once("../common/dbConnection.php");

if (count($_POST) > 0) {
    $isSuccess = 0;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";

    $statement = $mysqli->prepare($sql);
    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_assoc()) {
        if (!empty($row)) {
            $hashedPassword = $row["password"];

            if (password_verify($password, $hashedPassword)) {
                $isSuccess = 1;
                // Prevent session hijacking as it regenerates the user's session ID that is stored on the server and as a cookie in the browser
                session_regenerate_id();
                $_SESSION['LoggedIn'] = [];
                $_SESSION['LoggedIn']['id'] = $row["id"];
                $_SESSION['LoggedIn']['email'] = $row["email"];
                $_SESSION['LoggedIn']['name'] = $row["name"];
            }
        }
    }

    if ($isSuccess == 0) {
        $_SESSION['message'] = "Invalid Username or Password!";
        header("Location: /auth/login.php");
    } else {
        header("Location: /courses");
    }
}
?>