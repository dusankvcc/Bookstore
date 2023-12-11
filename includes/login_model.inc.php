<?php

declare(strict_types=1);

function verifyUser($username, $password) {
    // Connect to database
    require 'dbh.inc.php';

    // Check if user is already logged in
    if (isset($_SESSION['username'])) {
        return true; // The user is already logged in
    }

    // Otherwise, verify user credentials
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;

    if ($user && password_verify($password, $user['password'])) {
        return true; // The verification was successful
    } else {
        return false; // The verification was not successful
    }
}
