<?php
if (isset($_SESSION['message']) && $_SESSION['message']) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['message']."</div>";
    $_SESSION['message'] = "";
}