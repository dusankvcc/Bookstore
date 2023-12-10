<?php

declare(strict_types=1);

function processLogin($username, $password){

    // Validate password 
   
    // Verify user
    require 'login_model.inc.php';
    $isValid = verifyUser($username, $password);
    
    // Start session if valid
    if($isValid){
        $_SESSION['success'] = "Logged in successfully!";
      session_start();
      // set session data
      
    }
  
  }