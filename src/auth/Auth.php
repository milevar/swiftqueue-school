<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
$auth = new Auth();

class Auth
{

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['LoggedIn']);
    }

    /**
     * If the user is not logged in redirect to the login page
     */
    public function checkSession()
    {
        if (!$this->isLoggedIn()) {
            header('Location: /auth/login.php');
            exit;
        }
    }

    /**
     * Logout and redirect to the index page
     */
    public function logout()
    {
        session_destroy();
        header('Location: /index.php');
    }

    public function getLoggedInUsername() {
        return $_SESSION['LoggedIn']['name'];
    }
}
