<?php
// Session security is crucial to prevent unauthorized access and data theft from session variables.
// Session ID security is essential to ensure that only the intended user can access their session data.
// Common session hijacking methods include session ID sniffing, session ID prediction, session fixation, and cross-site scripting attacks.
// Always validate and sanitize user data when handling sessions to prevent security vulnerabilities.
// Avoid storing sensitive information like addresses, phone numbers, or emails in session variables.
// Delete old session data that is no longer needed to reduce the risk of unauthorized access.
// Balancing security and user convenience is essential when implementing session security measures.
// Some session security settings can be configured in the php.ini file, but it's possible to set them using code as well.
// Using the session.use_only_cookies setting ensures that session IDscan only be passed via cookies and not in URLs.
// Enabling session.use_strict_mode enhances session security by restricting the use of session IDs created by the server.
// Setting secure parameters for session cookies, such as lifetime, domain, path, secure, and httpOnly, enhances security.
// Regenerating session IDs periodically and after login helps strengthen session security.
// Creating a unique session ID, combining it with a user ID from a database, can further enhance security for login sessions.

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
  'lifetime'=> 1800,
  'domain' => 'localhost',
  'path'=> '/',
  'secure'=> true,
  'httponly'=> true,

]);


session_start();


if (isset($_SESSION['last_regeneration'])) {
  session_regenerate_id(true);
  $_SESSION['last_regeneration'] = time();


}else{
//            sec   min
   $interval = 60 * 30;

  if(time() - $_SESSION['last_regeneration'] >= $interval){

    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();

  }
}