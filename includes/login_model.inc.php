<?php

declare(strict_types=1);
function verifyUser($username, $password){

    // Connect to database
    require 'dbh.inc.php'; 
    
    // Prepare query
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    
    // Get user row
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verify password
    if($user && password_verify($password, $user['password'])){
      return true;
    } else {
      return false;
    }
  
  }