<?php
function validateCourse($name, $startDate, $endDate, $status) {
    $errors = [];

    if (empty($name)) {
        $errors["name"] = "Name field is empty";
    }

    if (empty($startDate)) {
        $errors["start_date"] = "Start Date field is empty";
    } elseif (!validateDateTime($startDate)) {
        $errors["start_date"] = "Start Date format is not valid";
    }

    if (empty($endDate)) {
        $errors["end_date"] = "End Date field is empty";
    } elseif (!validateDateTime($endDate)) {
        $errors["end_date"] = "End Date format is not valid";
    }

    if (empty($status)) {
        $errors["status"] = "Status field is empty";
    }

    return $errors;
}

function validateUser($name, $email, $password) {
    $errors = [];

    if (empty($name)) {
        $errors["name"] = "Name field is empty";
    }

    if (empty($email)) {
        $errors["email"] = "Email field is empty";
    }

    if (empty($password)) {
        $errors["password"] = "Password field is empty";
    }

    return $errors;
}
function validateDateTime($dateTime)
{
    $format = 'Y-m-d\TH:i';
    $dt = DateTimeImmutable::createFromFormat($format, $dateTime);
    return $dt && $dt->format($format) == $dateTime;
}
