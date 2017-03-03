<?php 
session_start();
include 'connection.php'; 
include 'functions/function-films.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Films - Available</title>

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
	
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Films</h1>
                <ol class="breadcrumb">
                    <li>
						<a href="index.php">Home</a>
                    </li>
                    <li class="active">
						<a href="index.php">Films</a>
					</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

		<?php 
		//Fetch all rows for each user
		while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
		extract ($row);
		?>
		
        <!-- Project -->
        <div class="row">
            <div class="col-md-7">
                <a href="film.php?id=<?php echo $FILM_ID; ?>">
                    <img class="img-responsive img-hover" src="img/film_img/700x300<?php echo $FILM_700x300; ?>" alt="<?php echo $FILM_TITLE;?>">
                </a>
            </div>
            <div class="col-md-5">
				<div class="col-lg-3" style="float:right;">
					<img class="img-responsive" src="img/age/<?php echo $FILM_AGE; ?>.jpg" alt="<?php echo $FILM_AGE;?>">
				</div>
                <h2><?php echo $FILM_TITLE;?></h2>
                <h3><?php echo $FILM_DIRECTOR; ?></h3>
				<h4><?php echo $FILM_CAST; ?></h4>
                <p><?php echo $FILM_DESCRIPTION; ?></p>
				<p>Duration: <?php echo $FILM_DURATION; ?> / Date Premiere: <?php echo $FILM_PREMIERE; ?></p>
                <a class="btn btn-info" href="film.php?id=<?php echo $FILM_ID; ?>">View Details</a>
				<?php if ($_SESSION["role"] == "Adult" || $_SESSION["role"] == "Admin" || $_SESSION["role"] == "Staff"){ ?>
					<a class="btn btn-danger" href="book.php?id=<?php echo $FILM_ID; ?>">Book</a>
				<?php } else { ?>
					Just adult users can book a film, <a href="register.php">Register here</a>!
				<?php }  ?>	
            </div>
        </div>
        <!-- /.row -->

        <hr>

		<?php  } ?>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Icinema 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
