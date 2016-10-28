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
    
    <title>Project 5</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    
    <link rel="stylesheet" href="css/styles.css">
    
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
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
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="wall.php">Wall</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <hr>
    <br>
    <div class="container">    
        <div class="row">
            <div id="formParent" class="col-md-6 col-md-offset-3 text-center">
                <form id="form" class="form-horizontal" method="POST" action="wall.php" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="title" class="control-label col-xs-1">Title</label>
                        <div class="col-xs-11">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-header fa-fw"></span></span>
                                <input type="text" class="form-control" id="title" name="title" 
                            maxlength="20" size="20" value="" required autofocus>
                            </div>
                        </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="text" class="control-label col-xs-1">Text</label>
                        <div class="col-xs-11">
                            <textarea class="form-control" id="text" name="text" maxlength="140" placeholder="140 characters" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="sr-only" for="image">Original Image</label>
                        <img id="image" name="image" src="img/default.png" width="50%">
                    </div>
                    <br>
                        <input type="file" id="upload" name="upload" accept="image/*" required="true" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true">
                    <div class="form-group">
                        <h3>Filter Photo</h3>
                        <div class="checkbox-inline">
                            <label for="myNostalgia">My Nostalgia</label>
                            <input type="radio" name="filter" id="myNostalgia" value="myNostalgia" onclick="applyMyNostalgiaFilter();" required="true">
                        </div>
                        <div class="checkbox-inline">
                            <label for="grayscale">Grayscale</label>
                            <input type="radio" name="filter" id="grayscale" value="grayscale" onclick="applyGrayscaleFilter();" required="true">
                        </div>
                        <div class="checkbox-inline">
                            <label for="original">Original</label>
                            <input type="radio" name="filter" id="lomo" value="lomo" onclick="revertToOriginal();">
                        </div>
                    </div>       
                    <div class="form-group">         
                    <input type="submit" value="Upload image to wall!" class="btn btn-primary col-md-offset-1" required="true">
                    <input type="button" id="resetForm" value="Start over!" class="btn btn-default">
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
                        Copyright &copy; Ryan Le 2016
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