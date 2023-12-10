<?php
// Insert user into database

function insertUser($userData){
    


  // DB connection
  require_once "dbh.inc.php";

  $username = $userData['username']; 
  $hashedPwd = $userData['password'];
  $email = $userData['email'];



  // SQL insert query using array data
 $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
 $stmt = $pdo->prepare($query);
  // Execute query
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":password", $hashedPwd);
  $stmt->bindParam(":email", $email);

  if ($stmt->execute()) {
    echo "User successfully inserted!";
    header("Location: ../bookstore.html");
    $pdo = null;
    $stmt = null;
    exit(); // Ensure that no further code is executed after redirection
} else {
    echo "Error inserting user: " . $stmt->errorInfo()[2];
}


  // Return true on success else false
}