<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'dbh.inc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'login_model.inc.php';
    require_once 'login_contr.inc.php';

    if (!isset($_SESSION['username'])) {
        $isValid = processLogin($username, $password);

        if ($isValid) {
            $_SESSION['success'] = "Logged in successfully!";
            session_start();
            header("Location: ../bookstore.html");
            exit;
        } else {
            echo "Invalid login credentials";
            include '../bookstore.html';
        }
    } else {
        header("Location: ../bookstore.html");
        die();
    }
} else {
    header("Location: ../bookstore.html");
    die();
}
