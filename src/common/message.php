<?php
/*
 * Types: alert-primary, alert-secondary, alert-success, alert-danger
 * alert-warning, alert-info, alert—check, alert—check, alert—check
 */
if (isset($_SESSION['message']) && $_SESSION['message']) {
    $type = $_SESSION['message']['type'];
    $text = $_SESSION['message']['text'];
    echo "<div class=\"alert $type\" role=\"alert\">$text</div>";
    $_SESSION['message'] = [];
}
