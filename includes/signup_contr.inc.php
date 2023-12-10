<?php

// Handle signup
require_once 'signup_model.inc.php';
function signupUser($username, $password, $email) {

 // Hash the password
 $hashedPwd = password_hash($password, PASSWORD_BCRYPT, array(""=> 12));

  // User data array
  $userData = [
     'username' => $username,
     'password' => $hashedPwd,
     'email' => $email
  ];
  
  // Insert user 
  require_once 'signup_model.inc.php';
  insertUser($userData);
  
  // Redirect on success 
}