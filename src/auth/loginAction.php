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
                $auth->startSession($row["id"], $row["name"], $row["email"]);
            }
        }
    }

    if ($isSuccess == 0) {
        $_SESSION['message'] = [
            "type" => "alert-danger",
            "text" => "The email address or password is incorrect."
        ];
        header("Location: /auth/login.php");
    } else {
        header("Location: /courses");
    }
}
?>