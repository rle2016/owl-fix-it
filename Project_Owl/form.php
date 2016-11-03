<?php
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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Owl Fix It</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body onload="initialize();">
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
                    <li><a class="page-scroll" href="wall.php">Home</a></li>
                    <li><a class="page-scroll" href="form.php">Upload Photo</a></li>
                    <li><a class="page-scroll" href="settings.php">Settings</a></li>
                    <li><a class="page-scroll" href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
    </nav>
    <div class="container">    
        <div class="row">
            <div id="formParent" class="col-md-6 col-md-offset-3 text-center">
                <form id="form" class="form-horizontal" method="POST" action="wall.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Location" class="control-label col-xs-1">Location</label>
                            <div class="col-xs-11">
                            <div class="drop-down">
                                <select class="form-control" id="select" name="Location">
                                <option  value="76(BK)">76(BK)-Bookstore</option>
                                <option  value="69(CO)">69(CO)-Campus Operation Building</option>
                            </select>
                            </div>
                            </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="text" class="control-label col-xs-1">Text</label>
                        <div class="col-xs-11">
                            <div class="description">
                            <textarea class="form-control" id="text" name="text" maxlength="140" placeholder="140 characters" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="sr-only" for="image">Original Image</label>
                        <img id="image" name="image" src="images/default.png" width="50%">
                    </div>
                    <br>
                    <input type="file" id="upload" name="upload" accept="image/*" required="true" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true"> 
                    <hr>
                    <div id="buttonPost" class="form-group">         
                    <input type="submit" value="Upload Post" class="btn btn-primary col-md-offset-1" required="true">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer">
        <footer class="text-center">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; 2016 Team Petabyte
                </div>
            </div>
        </footer>
    </div>
    <!-- JavaScript placed at bottom for faster page loadtimes. -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/functions.js"></script>
    <script src="js/bootstrap-filestyle.min.js"></script>

</body>
</html>
<?php $connection->close(); ?>
