<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'dbh.inc.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate input
  if(empty($username)) {
    $errors[] = 'Enter username';
  }

  require_once 'dbh.inc.php';
  require_once 'login_model.inc.php';
  require_once 'login_contr.inc.php';

   


        require_once 'config_session.php'; // Include session configuration.

    // If there are any errors, save them in the session and redirect back to the form.
  


    require 'login_contr.inc.php';

    processLogin($username, $password);

    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']); 
      }

      
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result["id"];
    session_id($sessionId);

        // Your successful login logic here...
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        // Additional post-login actions, if needed...

        $_SESSION['last_regeneration'] = time();

        header("Location: ../bookstore.html?login=success");

        $pdo = null;
        $stmt = null;

        die();
    
} else {
    header("Location: ../bookstore.html");


    die();
}
