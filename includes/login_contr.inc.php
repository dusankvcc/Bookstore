<?php

declare(strict_types=1);

function processLogin($username, $password) {
    // Validate password

    // Verify user
    if (!isset($_SESSION['username'])) {
        $isValid = verifyUser($username, $password);

        if ($isValid) {
            $_SESSION['success'] = "Logged in successfully!";
            session_start();
            return true; // The user was successfully logged in
        } else {
            return false; // The login attempt was unsuccessful
        }
    } else {
        // The user is already logged in
        return true;
    }
}
