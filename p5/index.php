<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<title>Owl-Fix-It</title>
      	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
      	<link rel="stylesheet" href="css/loginForm.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body id="top">
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
                        <li><a class="page-scroll" href="#">Services</a></li>
                        <li><a class="page-scroll" href="#">Most Voted</a></li>
                        <li><a class="page-scroll" href="#">Meet Our Team</a></li>
                        <li><a class="page-scroll" href="#">Contact</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <br>
       	<div class="container-fluid">    
            <div class="row">
                <div class="col-md-4"></div>
                <div id="loginbox" class="col-md-4">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">
                            <div class="panel-title">Sign In</div>
                        </div>     

                        <div id="style" class="panel-body" >
                            <div id="login-alert" class="alert alert-danger col-sm-12"></div>    
                                <form id="loginform" class="form-horizontal" role="form" action="php/authenticate.php" method="post">         
                                    <div id="bottom" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username_id" type="text" class="form-control" name="username_input" value="" placeholder="Username" required="true">                      
                                    </div>
                                        
                                    <div id="bottom" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input id="password_id" type="password" class="form-control" name="password_input" placeholder="Password" required="true">
                                    </div>
                                        <div id="top" class="form-group">
                                            <!-- Button -->
                                            <div class="col-sm-12 controls">
                                                <input type="submit" value="Login">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <div class="col-md-12 control">
                                            <div id="middle" >
                                                <a href="register.php">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                        </div>                     
                    </div>  
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    </body>
</html>
