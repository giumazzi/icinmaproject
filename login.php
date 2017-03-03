<?php 
session_start();
include 'connection.php'; 
include 'functions/function-login.php';
?>	
<!DOCTYPE html>
<html class="full" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Icinema - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<?php if($_SESSION["role"] == "Admin" || $_SESSION["role"] == "Staff") {?>	
		<!-- Admin CSS -->
		<link href="css/modern-admin.css" rel="stylesheet">
	<?php } ?>

	<?php if($_SESSION["role"] == "Adult" || $_SESSION["role"] == "Unknown") {?>	
		<!-- Adult CSS -->
		<link href="css/modern-adult.css" rel="stylesheet">
	<?php } ?>
	
	<?php if($_SESSION["role"] == "Junior") {?>	
		<!-- Junior CSS -->
		<link href="css/modern-junior.css" rel="stylesheet">
	<?php } ?>
	
    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">

	
	<!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="index.php"><img class="logo-image" src="img/logo.png" alt="icinema-logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="films.php">Films</a>
                    </li>
                    <li>
                        <a href="about.php">About us</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact us</a>
                    </li>
					<li style="display:inline-flex;">
						<a href="login.php" style="padding-right: 0px;">Login</a>
						<a style="padding: 15px 5px 0px 5px;">|</a>
						<a href="register.php" style="padding-left: 0px;">Register</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Put your page content here! -->
	<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="form-box">
                <form action="login.php" method="post">
					<?php if($error == 1){ ?>
						<div class="alert alert-danger" role="alert">Your username or password are incorrect!</div>
					<?php } ?>
					<label for="user">Email: </label>
                    <input id="user" name="user" type="email">
					<label for="password">Password: </label>
                    <input id="password" name="password" type="password">
                    <button class="btn btn-info btn-block login" name="login" value="login" type="submit">LogIn</button>
					<br /><br />
					<p>Are you not register? <a href="register.php">Click Here!</a></p>
                </form>
            </div>
        </div>  
	</div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
