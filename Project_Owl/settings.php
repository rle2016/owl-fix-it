<?
$db_hostname = "localhost";
$db_username = "rle2016";
$db_password = "RakPjEua7n";
$db_database = "rle2016";

require_once "php/db_connect.php";
require_once "php/functions.php";

session_start();

if (isset($_SESSION['username_input']))
  {
    $username = $_SESSION['username_input'];
    $password = $_SESSION['password_input'];
 }
  else {
    echo "<script type='text/javascript'>alert('Please Sign-In to Access This');window.location.href='index.php'</script>";
}

  function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
  }

//Connect to database
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($connection->connect_error) die($connection->connect_error);

  $error = '';

  if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])
    && isset($_POST['password_again']) && !empty($_POST['password_again']))
    
        
        $result = mysql_query("SELECT password FROM users WHERE login='$u'");
        if(!$result)
        {
        echo "The password you have entered does not exist";
        }
        else if($password!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }
        if($newpassword=$confirmnewpassword)
        $sql=mysql_query("UPDATE users SET password='$newpassword' where login='$password'");
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "The new password and confirm new password fields must be the same";
       }
      ?>

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Owl-Fix-It</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/loginForm.css">
        <link rel="sytlesheet" href="css/register.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php"><img src="images/owl-logo.png" class="img-responsive" height="260" width="160" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     <ul class="nav navbar-nav navbar-right">
                    <li class="hidden"><a href="#page-top"></a></li>
                    <li><a class="page-scroll" href="#top">Home</a></li>
                    <li><a class="page-scroll" href="form.php">Upload Photo</a></li>
                    <li><a class="page-scroll" href="settings.php">Settings</a></li>
                    <li><a class="page-scroll" href="logout.php">Logout</a></li>
                </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <br>
    <div class="container">    
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Change Password</div>
                    </div>     

                    <div id="style" class="panel-body" >

                        <div id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="signupform" class="form-horizontal" role="form" action="settings.php" method="post">
                
                            <div class="form-group">
                                    <label class="col-md-3 control-label">Current Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="new_password" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password_again" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" name="submit" value="submit" />
                                    </div>
                                </div>
                            </form>
                        </div>                     
                    </div>  
        </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="js/jquery.validate.js"></script>
    <script>
    </script>
    </body>
</html>
