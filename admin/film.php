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

    <title>Admin Panel > Films</title>

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
						<li class="active">
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
                                <i class="glyphicon glyphicon-film"></i> Films
                            </li>
                        </ol>
                    </div>
                </div>
				
				<!-- Insert Film -->
				<?php 
				if (isset($_POST['insert'])) {
					$title = $_POST["title"];
					$description = $_POST["description"];
					$director = $_POST["director"];
					$cast = $_POST["cast"];
					$premiere = $_POST["premiere"];
					$duration = $_POST["duration"];
					$age = $_POST["age"];
					$slider = $_POST["slider"];
					$i700x300 = $_POST["700x300"];
					$i700x500 = $_POST["700x500"];
					$i700x501 = $_POST["700x501"];
					$i700x502 = $_POST["700x502"];
					
					
					$query = "INSERT INTO film(FILM_TITLE, FILM_DESCRIPTION, FILM_DIRECTOR, FILM_CAST, FILM_PREMIERE, 			FILM_DURATION,FILM_AGE,FILM_SLIDER, FILM_700x300, FILM_750x500, FILM_750x501, FILM_750x502) 
											VALUES ('$title','$description','$director','$cast','$premiere','$duration','$age','$slider','$i700x300','$i700x500','$i700x501','$i700x502')";
					
					$result = mysqli_query ($connection,$query)
								or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");			
				?>
				<div class="alert alert-success" role="alert">A new film has been inserted.</div>
				<?php } ?>
				
				<!-- /.row -->
				<div class="row">
                    <div class="panel panel-primary">
					<div class="panel-heading">Insert Film</div>
						<div class="panel-body">
						<form role="form" action="film.php" method="post">
								<div class="col-lg-6">
									<p>Title<input class="form-control" name="title" value=""></p>
									<p>Description<textarea class="form-control" rows="5" name="description" value=""></textarea></p>
									<p>Director<input class="form-control" name="director" value=""></p>
									<p>Casting<input class="form-control" name="cast" value=""></p>
									<p>Premiere<input type="date" class="form-control" name="premiere" value=""></p>
									<p>Duration<input type="time" class="form-control" name="duration" value=""></p>
								</div>
								<div class="col-lg-6">
									<p>Age Restriction<input class="form-control" name="age" value=""></p>
									<p>Slider<input class="form-control" name="slider" value=""></p>
									<p>700x300<input class="form-control" name="700x300" value=""></p>
									<p>700x500 - 1<input class="form-control" name="750x500" value="">
									<p>700x500 - 2<input class="form-control" name="750x501" value=""></p>
									<p>700x500 - 3<input class="form-control" name="750x502" value="">
									<p><button type="submit" name="insert" value="insert" class="btn btn-info">Insert</button></p>
								</div>
						</form>
						</div>
					</div>		
				</div>
				
				<!-- Edit Film -->
				<?php 
				if (isset($_POST['update'])) {
				
					$id=$_POST['id'];	
					$title=$_POST['title'];
					$description=$_POST['description'];
					$director=$_POST['director'];
					$cast=$_POST['cast'];
					$premiere=$_POST['premiere'];
					$duration=$_POST['duration'];
					$age=$_POST['age'];
					$slider=$_POST['slider'];
					$i700x300=$_POST['700x300'];
					$i750x500=$_POST['750x500'];
					$i750x501=$_POST['750x501'];
					$i750x502=$_POST['750x502'];
					
					$query = "UPDATE film SET FILM_TITLE='$title',FILM_DESCRIPTION='$description',
								FILM_DIRECTOR='$director', FILM_CAST='$cast', FILM_PREMIERE='$premiere', FILM_DURATION='$duration',
								FILM_AGE='$age', FILM_SLIDER='$slider', FILM_700x300='$i700x300', FILM_750x500='$i750x500'
									, FILM_750x501='$i750x501', FILM_750x502='$i750x502' WHERE FILM_ID='$id'";
					
					
					$result = mysqli_query ($connection,$query) 
						or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");	
							
				?>
				<div class="alert alert-success" role="alert">The user has been updated.</div>
				<?php } ?>
				
				<!-- Delete Film -->
				<?php 
				if (isset($_POST['delete'])) {
					$id=$_POST['id'];

					$query = "DELETE FROM film where FILM_ID='$id'";
						
					$result = mysqli_query ($connection,$query)
						or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");
							
				?>
				<div class="alert alert-success" role="alert">The film has been deleted.</div>
				<?php } ?>
				
				
                <!-- /.row -->
				<h2>Films</h2>
				<!-- List Films -->
				<?php 
				$query = "SELECT * FROM film;";
				$result = mysqli_query ($connection,$query) or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");

				//Fetch all rows for each film
				while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
				extract ($row);
				?>
					
				<div class="row">
				<div class="panel panel-info">
				  <div class="panel-heading"><?php echo $FILM_ID; ?></div>
				  <div class="panel-body">
					<form role="form" action="film.php" method="post">
						<div class="col-lg-8">				
							<p>
								<input class="form-control" name="id" type="hidden" value="<?php echo $FILM_ID; ?>">
								<h4>Title: </h4><input class="form-control" name="title" value="<?php echo $FILM_TITLE; ?>">
								<h4>Description: </h4><textarea class="form-control" rows="9" name="description"><?php echo $FILM_DESCRIPTION; ?></textarea>
								<h4>Director: </h4><input class="form-control" name="director" value="<?php echo $FILM_DIRECTOR; ?>">
								<h4>Casting: </h4><input class="form-control" name="cast" value="<?php echo $FILM_CAST; ?>">
								<h4>Premiere: </h4><input type="date" class="form-control" name="premiere" value="<?php echo $FILM_PREMIERE; ?>">
								<h4>Duration: </h4><input type="time" class="form-control" name="duration" value="<?php echo $FILM_DURATION; ?>">
								</p>
								<p>
								<button type="submit" name="update" value="update" class="btn btn-info">Update</button>
								<button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
							</p>
						</div>
						<div class="col-lg-4">
							<p>	
								<div class="form-group col-lg-8">
								  <label for="age">Age Restriction:</label>
								  <select class="form-control" id="age" name="age"> 
									<option value="U">Suitable for all</option>
									<option value="PG">Parent guidance</option>
									<option value="12A">12 and Adult</option>
									<option value="12">12 years and over</option>
									<option value="15">15 years and over</option>
									<option value="18">Adults</option>
									<option value="R18">Adult licensed</option>
								  </select>
								</div>
								<div class="col-lg-4">
									<img class="img-responsive" src="../img/age/<?php echo $FILM_AGE; ?>.jpg" alt="<?php echo $FILM_AGE;?>">
								</div>
								<img class="img-thumbnail" src="../img/film_img/700x300<?php echo $FILM_700x300; ?>" alt="<?php echo $FILM_TITLE;?>">
								<h4>Slider: </h4><input class="form-control" name="slider" value="<?php echo $FILM_SLIDER; ?>">
								<h4>700x300: </h4><input class="form-control" name="700x300" value="<?php echo $FILM_700x300; ?>">
								<h4>700x500 - 1: </h4><input class="form-control" name="750x500" value="<?php echo $FILM_750x500; ?>">
								<h4>700x500 - 2: </h4><input class="form-control" name="750x501" value="<?php echo $FILM_750x501; ?>">
								<h4>700x500 - 3: </h4><input class="form-control" name="750x502" value="<?php echo $FILM_750x502; ?>">
							</p>
						</div>
					</form>
				  </div>
				</div>
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
