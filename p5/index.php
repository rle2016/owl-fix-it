<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<title>Project 5</title>
      	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
      	<link rel="stylesheet" href="css/loginForm.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
   	<div class="container">    
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    </body>
</html>
