<?php 
session_start();
include 'connection.php';
include 'functions/id.php'; 
include 'functions/role.php';  
include 'functions/booking.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Icinema - Book</title>

	<!-- Booking CSS -->
    <link href="css/booking.css" rel="stylesheet">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<?php if($_SESSION["role"] == "Admin" || $_SESSION["role"] == "Staff") {?>	
		<!-- Admin CSS -->
		<link href="css/modern-admin.css" rel="stylesheet">
	<?php } ?>

	<?php if($_SESSION["role"] == "Adult") {?>	
		<!-- Adult CSS -->
		<link href="css/modern-adult.css" rel="stylesheet">
	<?php } ?>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,700' rel='stylesheet' type='text/css'>

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
								<?php echo "<i class='fa fa-user'></i><b>" . $_SESSION["surname"] . "</b>"; ?>
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
                <h1 class="page-header">Film Details</h1>
                <ol class="breadcrumb">
                    <li>
						<a href="index.php">Home</a>
                    </li>
                    <li>
						<a href="films.php">Films</a>
					</li>
                    <li>
						<a href="film.php?id=<?php echo $film_id; ?>">Details</a>
					</li>
					<li class="active">
						<a href="book.php">Booking</a>
					</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- Portfolio Item Row -->
        <div class="row">
            <div class="col-md-5">

				<div class="booking-details">
				<form role="form" id="myfrm1" action="book.php?id=<?php echo $FILM_ID; ?>" method="post">
					<p>
						<p>Date: <input type="date" class="form-control" id="date" name="date" value="2016-01-11" min="2016-01-11" max="2016-01-20" onchange="myfunctionDate(this.value)"></p>
					</p>
					<p>
					  <p for="session">Time:</p>
					  <select class="form-control" id="session" name="session" onchange="myfunctionTime(this.value)"> 
						<option selected="selected" value="12:00">12:00</option>
						<option value="16:00">16:00</option>
						<option value="20:00">20:00</option>
					  </select>
					</p>
					<button type="submit" style="display: block; width: 100%;" name="change" value="change" class="btn btn-info">Change dates</button>
				</form>
				
				<?php if (isset($_POST['change'])) {?>
				<?php 
				// Film session
				$session = isset($_POST['session']) ? $_POST['session'] : '12:00';
				
				// Film date
				$date = isset($_POST['date']) ? $_POST['date'] : '2016-01-11';
				
				$query = "SELECT * FROM booking WHERE (FILM_ID = '$film_id' AND BOOKING_SESSION = '$session' AND BOOKING_DATE = '$date')";
				$result = mysqli_query ($connection,$query) or die ("<div class='alert alert-danger' role='alert'>You couldn't execute booking query</div>");
				?>
				
				
				<div class="demo" style="margin-top:10px;min-width: 360px;">
					<div id="seat-map">
						<div class="front">SCREEN</div>		
					</div>
					<div id="legend"></div>
				</div>
				
				
				<form role="form" id="myfrm2" action="book.php?id=<?php echo $FILM_ID; ?>" method="post">
					<input type="hidden" name="session" value="<?php echo $session; ?>">
					<input type="hidden" name="date" value="<?php echo $date; ?>">
					<select class="form-control" style="display:none;" id="selected-seats" name="seat[]" multiple="multiple"></select>
					<p>Tickets: <input id="counter" name="counter" readonly></input></p>
					<p>Total: <b>&pound;<input id="total" name="total" readonly></input></b></p>
					<button type="submit" style="display: block; width: 100%;" name="book" value="book" class="btn btn-danger">Book</button>
				</form>
				<?php } ?>		
				</div>
				
				<div style="clear:both;padding-top: 70px;"></div>
            </div>
			

			<div class="col-md-7">
				<div class="col-lg-3" style="float:right;">
					<img class="img-responsive" src="img/age/<?php echo $FILM_AGE; ?>.jpg" alt="<?php echo $FILM_AGE;?>">
				</div>
                <h2><?php echo $FILM_TITLE;?></h2>
                <p><?php echo $FILM_DESCRIPTION; ?></p>
                <h2>Film Details</h2>
                <ul>
                    <li>Director: <?php echo $FILM_DIRECTOR; ?></li>
                    <li>Cast: <?php echo $FILM_CAST; ?></li>
                    <li>Duration: <?php echo $FILM_DURATION; ?></li>
                    <li>Date Premiere: <?php echo $FILM_PREMIERE; ?></li>
                </ul>
				<h2></h2>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="<?php echo $FILM_TRAILER; ?>"></iframe>
				</div>
            </div>
			
        </div>

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

	<!-- Booking JavaScript -->
	<script type="text/javascript" src="js/seat-charts.min.js"></script> 
	<script type="text/javascript" src="js/booking.js"></script>
	<script type="text/javascript">
	<?php 
	//Fetch all rows for each booking	
	echo " $(document).ready(function(){";
	while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
		extract ($row);
		echo "sc.get(['".$BOOKING_SEAT."']).status('unavailable'); \n";
	}
	echo "});";
	?>
	</script>
	
</body>

</html>