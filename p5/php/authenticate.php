<?php // authenticate.php
     require_once 'db_connect.php';

  if ($connection->connect_error) die($connection->connect_error);

  if (isset($_POST['username_input']) &&
      isset($_POST['password_input']))
  {
    $un_temp = $_POST['username_input'];
    $pw_temp = $_POST['password_input'];

    $query  = "SELECT * FROM USERS WHERE username='$un_temp'";
    $result = $connection->query($query);

    if (!$result) 
      die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		    $result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");

        if ($token == $row[1]) {
          session_start();
          $_SESSION['username_input'] = $un_temp;
          $_SESSION['password_input'] = $pw_temp;
          header ("Location: http://lamp.cse.fau.edu/~rle2016/p5/wall.php");

        }
         echo "<script type='text/javascript'>alert('Invalid username/password combination');window.location.href='http://lamp.cse.fau.edu/~rle2016/p5/index.php'</script>";
    }
    else 
      echo "<script type='text/javascript'>alert('Invalid username/password combination');window.location.href='http://lamp.cse.fau.edu/~rle2016/p5/index.php'</script>";
  }

  $connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
?>
