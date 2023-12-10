<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

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



        $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $pdo->prepare($query);

        // Hash the password
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPwd);
        $stmt->bindParam(":email", $email);

        if ($stmt->execute()) {
            echo "User successfully inserted!";
            header("Location: ../bookstore.html");
            exit(); // Ensure that no further code is executed after redirection
        } else {
            echo "Error inserting user: " . $stmt->errorInfo()[2];
        }

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // This script should only be accessed through a form submission.
    header("Location: ../bookstore.html");

    exit(); // Ensure that no further code is executed after redirection
}
