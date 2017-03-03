<?php 
session_start();
include 'connection.php'; 
if($_SESSION["role"] != "Junior")
	header("Location:../index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

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

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="index.php"><img class="logo-image" src="img/logo.png" alt=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<?php if($_SESSION["role"] == "Junior") {?>	
						<!-- Junior Game! -->
						<li>
							<a href="game.php" class="quiz">Play Now!</a>
						</li>
					<?php } ?>
                    <li>
                        <a href="films.php">Films</a>
                    </li>
                    <li>
                        <a href="about.php">About us</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact us</a>
                    </li>
					<?php if(isset($_SESSION['surname']) && !empty($_SESSION['surname'])) {?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo "
								<i class='fa fa-user'></i>
								<b>" . $_SESSION["surname"] . "</b>"; ?>
						<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							</li>
						</ul>
					</li>
					<?php } else { ?>
					<li style="display:inline-flex;">
						<a href="login.php" style="padding-right: 0px;">Login</a>
						<a style="padding: 15px 5px 0px 5px;">|</a>
						<a href="register.php" style="padding-left: 0px;">Register</a>
					</li>
					<?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Row -->
        <div class="row" style="margin-top:30px;">
			<div class="col-md-4">
				<p>PlayLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.now!<p/>
    
			</div>

            <div class="col-md-8">
			
				<div class="gameplayer" data-sub="cdn" data-width="480" data-height="720" data-gid="576742227280295813"></div>
    
			</div>
			<hr>

		</div>
	
	<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Icinema 2015</p>
                </div>
            </div>
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Game JavaScript -->
	<script> (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'http://cdn.gameplayer.io/api/js/publisher.js'; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'gameplayer-publisher')); </script>

</body>

</html>
