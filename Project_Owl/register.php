<?php //setupusers.php
  require_once 'login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  $error = '';


  if (isset($_POST['registerUser_input']) && !empty($_POST['registerUser_input']) && isset($_POST['registerPassword_input']) && !empty($_POST['registerPassword_input'])
    && isset($_POST['confirmPassword_input']) && !empty($_POST['confirmPassword_input'])) {

    $username = $_POST['registerUser_input'];
    $salt1    = "qm&h*";
    $salt2    = "pg!@";

    $password = $_POST['registerPassword_input'];
    $token    = hash('ripemd128', "$salt1$password$salt2");

    $select = "SELECT * FROM `USERS` WHERE `username` = '$username';";
    $selectResult = $connection->query($select);
    if ($selectResult->num_rows > 0) {
    $error = "<br>Username is taken<br>";
  } else {
    add_user($connection, $username, $token);
    echo "<script type='text/javascript'>alert('Registration successful!');window.location.href='index.php'</script>";
  }
}

  function add_user($connection, $un, $pw)
  {
    $query  = "INSERT INTO USERS VALUES('$un', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project 5</title>
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
                        <li><a class="page-scroll" href="#">Meet Our Team</a></li>
                        <li><a class="page-scroll" href="#">Contact</a></li>
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
                        <div class="panel-title">Register</div>
                    </div>     

                    <div id="style" class="panel-body" >

                        <div id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="signupform" class="form-horizontal" role="form" action="register.php" method="post">
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Z-Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="registerUser" name="registerUser_input" placeholder="Username" required="true">
                                        <?php echo $error ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="registerPassword" name="registerPassword_input" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword_input" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" value="Register" name="submit" id="submit" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div id="middle" >
                                        <a href="index.php">Sign-In</a>
                                        </div>
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
    // just for the demos, avoids form submit
    jQuery.validator.setDefaults({
    success: "valid"
    });
    $( "#signupform" ).validate({
        rules: {
            registerPassword_input: "required",
            confirmPassword_input: {
                equalTo: "#registerPassword"
            }
        }
    });
    </script>
    </body>
</html>
