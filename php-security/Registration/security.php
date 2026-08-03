<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";


    if (empty($username)) {

        $message = "Username is required.";

    } elseif (empty($email)) {

        $message = "Email is required.";

    } elseif (empty($password)) {

        $message = "Password is required.";

    }


    



    elseif (preg_match('/\s/', $username)) {

        $message = "Username cannot contain spaces.";

    }


    elseif (strlen($username) < 5 || strlen($username) > 10) {

        $message = "Username must be between 5 and 10 characters long.";

    }


    elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {

        $message = "Username can only contain letters and numbers.";

    }


    
    elseif (preg_match('/\s+/u', $email) || preg_match('/\p{Z}/u', $email)) {

        $message = "Email cannot contain spaces.";

    }


    elseif (
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        !preg_match('/@(gmail\.com|hotmail\.com|yahoo\.com)$/i', $email)
    ) {

        $message = "Only Gmail, Hotmail and Yahoo emails are allowed.";

    }


    
    elseif (preg_match('/\s+/u', $password) || preg_match('/\p{Z}/u', $password)) {

        $message = "Password cannot contain spaces.";

    }


    elseif (
        strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[^A-Za-z0-9]/', $password)
    ) {

        $message = "Password must be at least 8 characters and contain uppercase, lowercase, number and special character.";

    }


    else {

        if (defined('PASSWORD_ARGON2ID')) {

            $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        }


        $message = "Registration Successful!<br><br>";
        $message .= "Username: " . htmlspecialchars($username) . "<br>";
        $message .= "Email: " . htmlspecialchars($email) . "<br>";
        $message .= "Password Hash:<br>" . htmlspecialchars($hashedPassword);

    }

}

?>