<?php
require_once 'database/connection.php';

function validateData($conn, $data)
{

    $nameErr = $emailErr = $passwordErr = $confirm_passwordErr = $contactErr = $role_asErr = "";
    $name  = $email = $password = $confirm_password = $contact = $role_as = "";
    extract($data);

    if (empty($name)) {
        $nameErr = "Name must be provided";
    } else {
        $name = test_input($name);

        if (!preg_match("/[a-zA-Z\s]{3,25}/", $name)) {
            $nameErr = "Invalid name";
        }
    }
    if (empty($email)) {
        $emailErr = "Email must be provided";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }
    if (empty($password)) {
        $passwordErr = "Password must be provided";
    } else {
        $password = test_input($password);
        if (!preg_match("/(?!.*\s).{4,10}/", $password)) {
            $passwordErr = "Invalid password";
        }
    }
    if (empty($confirm_password)) {
        $confirm_passwordErr = "Password must be provided";
    } else {
        $confirm_password = test_input($confirm_password);
        if (!preg_match("/(?!.*\s).{4,10}/", $confirm_password)) {
            $confirm_passwordErr = "Invalid password";
        }
    }
    if (empty($contact)) {
        $contactErr = "Contact must be provided";
    } else {
        $contact = test_input($contact);
        if (!preg_match("/01[3-9]{1}[0-9]{8}/", $contact)) {
            $contactErr = "Invalid contact";
        }
    }
    if (empty($role_as)) {
        $role_asErr = "Role must be provided";
    }

    function escapeString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }
    $name = $nameErr ? escapeString($conn, $nameErr) : escapeString($conn, $name);
    $email = $emailErr ? escapeString($conn, $emailErr) : escapeString($conn, $email);
    $contact = $contactErr ? escapeString($conn, $contactErr) : escapeString($conn, $contact);
    $password = $passwordErr ? escapeString($conn, $passwordErr) : escapeString($conn, $password);
    $confirm_password = $confirm_passwordErr ? escapeString($conn, $confirm_passwordErr) : escapeString($conn, $confirm_password);
    $role_as = $role_asErr ? escapeString($conn, $role_asErr) : escapeString($conn, $role_as);

    $arr = ["name" => $name, "email" => $email, "contact" => $contact, "password" => $password, "confirm_password" => $confirm_password, "role_as" => $role_as];
    return $arr;
}

function validateLoginData($conn, $loginData)
{

    $emailErr = $passwordErr = "";
    $email = $password = "";
    extract($loginData);
    // print_r($loginData);

    if (empty($email)) {
        $emailErr = "Email must be provided";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }
    if (empty($password)) {
        $passwordErr = "Password must be provided";
    } else {
        $password = test_input($password);
        if (!preg_match("/(?!.*\s).{4,10}/", $password)) {
            $passwordErr = "Invalid password";
        }
    }

    function escapeLoginString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }

    $email = $emailErr ? escapeLoginString($conn, $emailErr) : escapeLoginString($conn, $email);
    $password = $passwordErr ? escapeLoginString($conn, $passwordErr) : escapeLoginString($conn, $password);

    $loginArr = ["email" => $email, "password" => $password];
    return $loginArr;
}

function validateAdminLoginData($conn, $adminLoginData)
{

    $nameErr = $emailErr = "";
    $name = $email = "";
    extract($adminLoginData);
    // print_r($loginData);

    if (empty($name)) {
        $nameErr = "Name must be provided";
    } else {
        $name = test_input($name);

        if (!preg_match("/[a-zA-Z\s]{3,25}/", $name)) {
            $nameErr = "Invalid name";
        }
    }
    if (empty($email)) {
        $emailErr = "Email must be provided";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    }


    function escapeAdminLoginString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }

    $name = $nameErr ? escapeAdminLoginString($conn, $nameErr) : escapeAdminLoginString($conn, $name);
    $email = $emailErr ? escapeAdminLoginString($conn, $emailErr) : escapeAdminLoginString($conn, $email);

    $loginArr = ["name" => $name, "email" => $email];
    return $loginArr;
}

function validateAdminLoginPassData($conn, $adminLoginPassData)
{

    $previousPasswordErr = $newPasswordErr = $retypeNewPasswordErr = "";
    $previousPassword = $newPassword = $retypeNewPassword = "";
    extract($adminLoginPassData);
    // print_r($loginData);

    if (empty($previous_password)) {
        $previousPasswordErr = "Current Password must be provided";
    } else {
        $previousPassword = test_input($previous_password);
        if (!preg_match("/(?!.*\s).{4,10}/", $previousPassword)) {
            $previousPasswordErr = "Invalid password";
        }
    }
    if (empty($new_password)) {
        $newPasswordErr = "New Password must be provided";
    } else {
        $newPassword = test_input($new_password);
        if (!preg_match("/(?!.*\s).{4,10}/", $newPassword)) {
            $newPasswordErr = "Invalid password";
        }
    }
    if (empty($retype_new_password)) {
        $retypeNewPasswordErr = "Retype New Password must be provided";
    } else {
        $retypeNewPassword = test_input($retype_new_password);
        if (!preg_match("/(?!.*\s).{4,10}/", $retypeNewPassword)) {
            $retypeNewPasswordErr = "Invalid password";
        }
    }


    function escapeAdminLoginPassString($conn, $str)
    {
        return mysqli_real_escape_string($conn, $str);
    }

    $previousPassword = $previousPasswordErr ? escapeAdminLoginPassString($conn, $previousPasswordErr) : escapeAdminLoginPassString($conn, $previousPassword);
    $newPassword = $newPasswordErr ? escapeAdminLoginPassString($conn, $newPasswordErr) : escapeAdminLoginPassString($conn, $newPassword);
    $retypeNewPassword = $retypeNewPasswordErr ? escapeAdminLoginPassString($conn, $retypeNewPasswordErr) : escapeAdminLoginPassString($conn, $retypeNewPassword);


    $loginArr = ["previous_password" => $previousPassword, "new_password" => $newPassword, "retype_new_password" => $retypeNewPassword];
    return $loginArr;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
