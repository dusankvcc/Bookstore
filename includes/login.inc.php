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
      

      $_SESSION['data'] = ['loginsuccessfull' => true];

      // $_SESSION['sessionStorage']['loginSuccess'] = true; 
      //  // Include popup.js file
      //  echo '<script src="../js/popup.js"></script>';

      header("Location: ../bookstore.php");



      exit;
    } else {
      echo "Invalid login credentials";
      header("Location: ../bookstore.php");

      // include '../bookstore.html';
    }
  } else {
    header("Location: ../bookstore.php");
    
    die();
  }
} else {
  header("Location: ../bookstore.php");

  die();
}
