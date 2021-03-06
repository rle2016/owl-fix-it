<?php
require_once "php/db_connect.php";
require_once "php/functions.php";


session_start();

if(isset($_POST['location']) && isset($_POST['description']))
{    
    $location = sanitizeString($connection, $_POST['location']);
    $description = sanitizeString($connection, $_POST['description']);
    $user = $_SESSION['username_input'];
    
    $time = $_SERVER['REQUEST_TIME'];
    $file_name = $time . '.jpg';
    $post_Status = "In Progress";

    if ($_FILES)
    {
        $tmp_name = $_FILES['upload']['name'];
        $dstFolder = 'users';
        move_uploaded_file($_FILES['upload']['tmp_name'], $dstFolder . DIRECTORY_SEPARATOR . $file_name);
        //echo "Uploaded image '$file_name'<br /><img src='$dstFolder/$file_name'/>";
    }

    SavePostToDB($connection, $user, $description, $location, $time, $post_Status, $file_name);
}

  if (isset($_SESSION['username_input']))
  {
    $username = $_SESSION['username_input'];
    $password = $_SESSION['password_input'];

?>
<!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Owl-Fix-It</title>
    
    <link rel="stylesheet" href="css/styles.css">
    
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body id="page-top" class="index">
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
    <div id="container">

        <div class="row">
            <div class="col-lg-4 text-center col-lg-offset-4">
            <?php
            echo getPostcards($connection); 
            ?>
            </div>
        </div>
    </div>

   
    <!-- JavaScript placed at bottom for faster page loadtimes. -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>
</body>
</html>

<?php
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
<?php $connection->close(); ?>
