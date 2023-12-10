<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    require_once 'signup_contr.inc.php';

        // Validate input data
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if(!$email) {
          echo "Invalid email format!";
          die();
        }

        if (empty($username) || empty($password)) {
            echo "Please fill in all fields!";
            die(); 
          }

       
        signupUser($username, $password, $email);

} else {
    // This script should only be accessed through a form submission.
    header("Location: ../bookstore.html");

    exit(); // Ensure that no further code is executed after redirection
}
