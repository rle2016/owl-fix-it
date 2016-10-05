<?php 
// Do not change the following two lines.
$teamURL = dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR;
$server_root = dirname($_SERVER['PHP_SELF']);

// You will need to require this file in EVERY php file that uses the database.
// Be sure to use $db->close(); at the end of each php file that includes this!

$dbhost = "localhost"; // Most likely will not need to be changed
$dbname = ""; // needs to be changed to your designated table name
$dbuser = ""; // needs to be changed to reflect LAMP server credentials
$dbpass = ""; // needs to be changed to reflect LAMP server credentials

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($connection->connect_errno > 0)
{
    die('Unable to connect to database [' . $connection->connect_error . ']');
}
?>
