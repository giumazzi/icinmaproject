<?php 
session_start();
include '../connection.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel > Bookings</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.php"><?php echo $_SESSION["role"]; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<li>
                        <a href="../index.php">Back to Icinema</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php if(isset($_SESSION['surname']) && !empty($_SESSION['surname'])) {?>
							<?php echo "
							<i class='fa fa-user'></i>
							<b>" . $_SESSION["surname"] . "</b>"; ?>
					<?php } else {
							header("Location:../index.php");}?>
					<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> My Profile</a>
                    </li>
					<?php if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Staff') {?>
						<li>
							<a href="user.php"><i class="glyphicon glyphicon-user"></i> Users</a>
						</li>
						<li>
							<a href="film.php"><i class="glyphicon glyphicon-film"></i> Films</a>
						</li>
						<li class="active">
							<a href="booked.php"><i class="glyphicon glyphicon-facetime-video"></i> Booked</a>
						</li>	
					<?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
			<!-- Page Heading -->
            <div class="container-fluid">
			    <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="glyphicon glyphicon-facetime-video"></i> Booked
                            </li>
                        </ol>
                    </div>
                </div>
				<!-- Delete User -->
				<?php 
				if (isset($_POST['delete'])) {
					$id=$_POST['id'];

					$query = "DELETE FROM booking where BOOKING_ID='$id'";
						
					$result = mysqli_query ($connection,$query)
						or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");
							
				?>
				<div class="alert alert-success" role="alert">The booking has been deleted.</div>
				<?php } ?>				
                <!-- /.row -->
				<h2>Booking list</h2>
				<!-- List bookeds -->	
				<div class="row">
					<div class="panel panel-info">
					  <div class="panel-heading">Booking list</div>
						<div class="panel-body">          
							<table class="table table-hover">
							<thead>
							  <tr>
								<th>Booking ID</th>
								<th>User ID</th>
								<th>Film ID</th>
								<th>Session</th>
								<th>Date</th>
								<th>Seat</th>
								<th>Price</th>
								<th>Tickets</th>
								<th></th>
								<th></th>
							  </tr>
							</thead>
							
							<tbody>
							<?php 
							$query = "SELECT * FROM booking;";
							$result = mysqli_query ($connection,$query) or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");

							//Fetch all rows for each booking
							while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
							extract ($row);
							?>	
							<tr>
								<form role="form" action="booked.php" method="post">
									<th>
										<input class="form-control" name="id" type="hidden" value="<?php echo $BOOKING_ID; ?>"><?php echo $BOOKING_ID; ?><?php echo $BOOKING_ID;?>
									</th>
									<th><?php echo $USER_ID;?></th>
									<th><?php echo $FILM_ID;?></th>
									<th><?php echo $BOOKING_SESSION;?></th>
									<th><?php echo $BOOKING_DATE;?></th>
									<th><?php echo $BOOKING_SEAT;?></th>
									<th><?php echo $BOOKING_PRICE;?></th>
									<th><?php echo $BOOKING_NUM;?></th>
									<th><button type="submit" name="update" value="update" class="btn btn-info">Print</button></th>
									<th><button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</button></th>
								</form>
							</tr>
							<?php  } ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
		
	</div>
<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>