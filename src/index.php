<?php
require_once("auth/Auth.php");
$auth->checkSession();
header('Location: /courses');