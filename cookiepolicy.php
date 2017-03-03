<?php 
session_start();
include 'connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICINEMA - Cookies Policy</title>

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

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cookies Policy
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active"><a href="about.php">Cookies Policy</a></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-12">
                <script type="text/javascript" src="https://apps.optanon.com/cookie-policy/www.myicinemaproject.co.uk.js"></script>
<link rel="stylesheet" href="https://cdn.cookielaw.org/css/cookie-policy.css" />
<div class="optanon-cookie-policy">
    <h1>How We Use Cookies</h1>
    <p>Like many websites we use cookies to store and then retrieve small bits of information on your computer when you visit. This information
    is used to make the site work as you expect it to.  It is not personally identifiable to you, but it can be used to give you a more
    personalised web experience.</p>
    <p>Some of the information stored is put there by other companies whose software we have added to the site, and this can also impact your
    experience of other websites you may visit after leaving ours.</p>
    <p>If you continue to use this site without taking action to prevent the storage of this information, you are effectively agreeing to
    this use.</p>
    <p>If you want to learn more about the general uses of cookies, including how to stop them being stored by your computer, please visit
    <a href="https://cookiepedia.co.uk/all-about-cookies">Cookiepedia - all about cookies</a>.</p>
    <p>Below is a list of the different types of cookies used on this site, and an explanation of what they are used for.
    If you would like any more information, please get in touch.</p>
    <ul class="optanon-groups">
        <li class="optanon-group">
            <h2>Strictly Necessary Cookies</h2>
            <p>These cookies are necessary for the website to function. They are usually only set in response to actions 
            made by you which amount to a request for services, such as logging in or filling in forms.</p>
            <p>You can set your browser to block or alert you about these cookies, but some parts of the site will not 
            then work. These cookies do not store any personally identifiable information.</p>
            <ul class="optanon-cookies optanon-strictly-necessary"></ul>
        </li>
        <li class="optanon-group">
            <h2>Performance Cookies</h2>
            <p>These cookies allow us to count visits and traffic sources so we can measure and improve the performance 
            of our site. They help us to know which pages are the most and least popular and see how visitors move 
            around the site.</p>
            <p>All information these cookies collect is aggregated and therefore anonymous. If you do not allow these 
            cookies we will not know when you have visited our site, and will not be able to monitor its performance.</p>
            <ul class="optanon-cookies optanon-performance"></ul>
        </li>
        <li class="optanon-group">
            <h2>Functionality Cookies</h2>
            <p>These cookies enable the website to provide enhanced functionality and personalisation. They may be set 
            by us or by third party providers whose services we have added to our pages.</p>
            <p>If you do not allow these cookies then some or all of these services may not function properly.</p>
            <ul class="optanon-cookies optanon-functionality"></ul>
        </li>
        <li class="optanon-group">
            <h2>Targeting Cookies</h2>                
            <p>These cookies may be set through our site by our advertising partners. They may be used by those companies 
            to build a profile of your interests and show you relevant adverts on other sites.</p>
            <p>They do not store any personally identifiable information, but are based on uniquely identifying your browser 
            and internet device. If you do not allow these cookies, you will experience less targeted advertising.</p>
            <ul class="optanon-cookies optanon-targeting"></ul>
        </li>
        <li class="optanon-group">
            <h2>Other Cookies</h2>
            <p>The following cookies are also set by our site, however their purpose has not yet been identified. We are 
            conducting research into these cookies and will update this page as soon as possible.</p>
            <ul class="optanon-cookies optanon-unknown"></ul>
        </li>
    </ul>
</div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Icinema 2015</p>
					<p><a href="/cookiepolicy.php">Cookies Policy</a></p>
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
