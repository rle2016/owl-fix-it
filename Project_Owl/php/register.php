<?php //setupusers.php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if (isset($_POST['registerUser_input']) && !empty($_POST['registerUser_input']) && isset($_POST['registerPassword_input']) && !empty($_POST['registerPassword_input'])) {

  $salt1    = "qm&h*";
  $salt2    = "pg!@";

  $username = $_POST['registerUser_input'];
  $password = $_POST['registerPassword_input'];
  $token    = hash('ripemd128', "$salt1$password$salt2");

  add_user($connection, $username, $token);

  function add_user($connection, $un, $pw)
  {
    $query  = "INSERT INTO USERS VALUES('$un', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
  }
?>