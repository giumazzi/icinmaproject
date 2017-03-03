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

    <title>Admin Panel > Users</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<strongody>

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
							<strong>" . $_SESSION["surname"] . "</strong>"; ?>
					<?php } else {
							header("Location:../index.php");}?>
					<strong class="caret"></strong></a>
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
						<li class="active">
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
        <div id="page-wrapper">
			<!-- Page Heading -->
            <div class="container-fluid">
			    <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="glyphicon glyphicon-user"></i> Users
                            </li>
                        </ol>
                    </div>
                </div>
				
				<!-- Insert User -->
				<?php 
				if (isset($_POST['insert'])) {
					$lastname = $_POST["lastname"];
					$name = $_POST["name"];
					$phone = $_POST["phone"];
					$address = $_POST["address"];
					$postcode = $_POST["postcode"];
					$dob = $_POST["dob"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					$role = $_POST["role"];
					
					
					$query = "INSERT INTO user(USER_LASTNAME, USER_FIRTSNAME, USER_PHONE,USER_ADDRESS,USER_POSTCODE,
					USER_DOB,USER_EMAIL,USER_PASSWORD,USER_ROLE) VALUES ('$lastname','$name','$phone','$address','$postcode',
					'$dob','$email','$password','$role')";
					
					$result = mysqli_query ($connection,$query)
						or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");			
				?>
				<div class="alert alert-success" role="alert">A new user has been inserted.</div>
				<?php } ?>
				
				<!-- /.row -->
				<div class="row">
						<div class="col-lg-12">
                        <h2>Insert User</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone</th>
										<th>Address</th>
										<th>Postcode</th>
										<th>Date of Birth</th>
										<th>Email</th>
										<th>Password</th>
										<th>Role</th>
										<th>Insert</th>
                                    </tr>
                                </thead>
								<form role="form" action="user.php" method="post">
                                <tbody>
                                    <tr>
										<td><input class="form-control" name="name" value=""></td>
										<td><input class="form-control" name="lastname" value=""></td>
										<td><input class="form-control" name="phone" value=""></td>
										<td><input class="form-control" name="address" value=""></td>
										<td><input class="form-control" name="postcode" value=""></td>
										<td><input type="date" class="form-control" name="dob" value=""></td>
										<td><input class="form-control" name="email" value=""></td>
										<td><input class="form-control" name="password" type="password" value=""></td>
										<td><input class="form-control" name="role" type="hidden" value="">
										<select name='role' id='role'>
											  <option value='Staff'>Staff</option>
											  <option value='Adult'>Adult</option>
											  <option value='Junior'>Junior</option>
										</select></td>
										<td><button type="submit" name="insert" value="insert" class="btn btn-info">Insert</button></td>
                                    </tr>
                                </tbody>
								</form>
                            </table>
                        </div>
                    </div>
				</div>
				
				<!-- Edit User -->
				<?php 
				if (isset($_POST['update'])) {
				
					$id=$_POST['id'];	
					$lastname = $_POST["lastname"];
					$name = $_POST["name"];
					$phone = $_POST["phone"];
					$address = $_POST["address"];
					$postcode = $_POST["postcode"];
					$dob = $_POST["dob"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					$encrypted = md5($password);
					$role = $_POST["role"];
					
					date_default_timezone_set('Europe/London');
					$dob_post = $dob;
					$dob = explode("-",$dob); 
					$curMonth = date("m");
					$curDay = date("j");
					$curYear = date("Y");
					$age = $curYear - $dob[0]; 
					if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2])) 
						$age--;
					
					if ($role == "Junior" && $age > 18)
							$role = "Adult";
							
					if ($role == "Adult" && $age < 18)
							$role = "Junior";
													
					$query = "UPDATE user SET USER_LASTNAME='$lastname',USER_FIRTSNAME='$name',
								USER_PHONE='$phone', USER_ADDRESS='$address', USER_POSTCODE='$postcode', USER_DOB='$dob_post',
								USER_EMAIL='$email', USER_PASSWORD='$encrypted', USER_ROLE='$role' WHERE USER_ID='$id'";
					
					$result = mysqli_query ($connection,$query) 
						or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");	
							
				?>
				<div class="alert alert-success" role="alert">The user has been updated.</div>
				<?php } ?>
				
				<!-- Delete User -->
				<?php 
				if (isset($_POST['delete'])) {
					$id=$_POST['id'];

					$query = "DELETE FROM user where USER_ID='$id'";
						
					$result = mysqli_query ($connection,$query)
						or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");
							
				?>
				<div class="alert alert-success" role="alert">The user has been deleted.</div>
				<?php } ?>
				
                <!-- /.row -->
				<div class="row">
						<div class="col-lg-12">
                        <h2>Users Table</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone</th>
										<th>Address</th>
										<th>Postcode</th>
										<th>Date of Birth</th>
										<th>Email</th>
										<th>Password</th>
										<th>Role</th>
										<th>Edit</th>
										<th>Delete</th>
                                    </tr>
                                </thead>
								<?php 
								$query = "SELECT * FROM user;";
								$result = mysqli_query ($connection,$query) or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");

								//Fetch all rows for each user
								while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
								extract ($row);
								?>
								<form role="form" action="user.php" method="post">
                                <tbody>
                                    <tr>
										<td><input class="form-control" name="id" type="hidden" value="<?php echo $USER_ID; ?>"><?php echo $USER_ID; ?></td>
										<td><input class="form-control" name="name" value="<?php echo $USER_FIRTSNAME; ?>"></td>
										<td><input class="form-control" name="lastname" value="<?php echo $USER_LASTNAME; ?>"></td>
										<td><input class="form-control" name="phone" value="<?php echo $USER_PHONE; ?>"></td>
										<td><input class="form-control" name="address" value="<?php echo $USER_ADDRESS; ?>"></td>
										<td><input class="form-control" name="postcode" value="<?php echo $USER_POSTCODE; ?>"></td>
										<td><input type="date" class="form-control" name="dob" value="<?php echo $USER_DOB; ?>"></td>
										<td><input class="form-control" name="email" value="<?php echo $USER_EMAIL; ?>"></td>
										<td><input class="form-control" name="password" type="text" value="<?php echo $USER_PASSWORD; ?>"></td>
										<td><input class="form-control" name="role" type="hidden" value="<?php echo $USER_ROLE; ?>"><?php echo $USER_ROLE; ?></td>
										<td><button type="submit" name="update" value="update" class="btn btn-info">Update</button></td>
										<td><button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button></td>
                                    </tr>
                                </tbody>
								</form>
								<?php  } ?>
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
