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

    <title>Admin Panel > My Profile</title>

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
        <nav class="navbar navbar-inverse navbar-fixed-top">
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
                    <li class="active">
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> My Profile</a>
                    </li>
					<?php if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Staff') {?>
						<li>
							<a href="user.php"><i class="glyphicon glyphicon-user"></i> Users</a>
						</li>
						<li>
							<a href="film.php"><i class="glyphicon glyphicon-film"></i> Films</a>
						</li>
						<li>
							<a href="booked.php"><i class="glyphicon glyphicon-facetime-video"></i> Booked</a>
						</li>	
					<?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
		<?php 
		if (isset($_POST['update'])) {
			$id=$_SESSION['id'];	
			$lastname = $_POST["lastname"];
			$name = $_POST["name"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];
			$postcode = $_POST["postcode"];
			$dob = $_POST["dob"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$encrypted = md5($password);
			$role = $_SESSION['role'];
			
			date_default_timezone_set('Europe/London');
			$dob_post = $dob;
			$dob = explode("-",$dob); 
			$curMonth = date("m");
			$curDay = date("j");
			$curYear = date("Y");
			$age = $curYear - $dob[0]; 
			if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2])) 
				$age--;
							
			if (($role == "" || $role == "Junior") && $age > 18)
				$role = "Adult";
					
			if (($role == "" ||$role == "Adult") && $age < 18)
				$role = "Junior";
				
			$_SESSION["role"] = $role;

			$query = "UPDATE user SET USER_LASTNAME='$lastname',USER_FIRTSNAME='$name',
						USER_PHONE='$phone', USER_ADDRESS='$address', USER_POSTCODE='$postcode', USER_DOB='$dob_post',
						USER_EMAIL='$email', USER_PASSWORD='$encrypted',USER_ROLE='$role' WHERE USER_ID='$id'";
			
			
			$result = mysqli_query ($connection,$query) 
				or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");	
				
		?>				
		<div class="alert alert-success" role="alert">Your data has been updated.</div>
		<?php } ?>
        <div id="page-wrapper">

            <div class="container-fluid">
				<?php 
				$id = $_SESSION['id'];
				$query = "SELECT * FROM user WHERE USER_ID='$id'";
				$result = mysqli_query ($connection,$query) or die ("You couldn’t execute query");
				//Fetch all rows for each user
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				extract ($row);
				?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> My Profile
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<form role="form" action="profile.php" method="post">
						<div class="col-lg-6">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" name="name" value="<?php echo $USER_FIRTSNAME; ?>">
								</div>
								<div class="form-group">
									<label>Surname</label>
									<input class="form-control" name="lastname" value="<?php echo $USER_LASTNAME; ?>">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" name="phone" value="<?php echo $USER_PHONE; ?>">
								</div>
								 <div class="form-group">
									<label>Address</label>
									<input class="form-control" name="address" value="<?php echo $USER_ADDRESS; ?>">
								</div>
						</div>
						<div class="col-lg-6">
								<div class="form-group">
									<label>Postcode</label>
									<input class="form-control" name="postcode" value="<?php echo $USER_POSTCODE; ?>">
								</div>
								<div class="form-group">
									<label>Date of Birth</label>
									<input type="date" class="form-control" name="dob" value="<?php echo $USER_DOB; ?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" name="email" value="<?php echo $USER_EMAIL; ?>">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password" value="<?php echo $USER_PASSWORD; ?>">
								</div>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="update" value="update" class="btn btn-info">Update</button>
						</div>
					</form>
				</div>
				<?php  } ?>
				
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
