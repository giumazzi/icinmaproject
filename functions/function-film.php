<?php 
if (empty($_GET['id']))
	header("Location:films.php");
else	
	$film_id = $_GET['id'];

if ($_SESSION["role"] == "Junior"){
	$query = "SELECT * FROM film WHERE (FILM_AGE = '12A' OR FILM_AGE = 'U' OR FILM_AGE = '12' OR FILM_AGE = 'PG' OR FILM_AGE = '15') AND FILM_ID='$film_id';";
	$result = mysqli_query ($connection,$query) or die ("You couldn�t execute query");
}
else {
	$query = "SELECT * FROM film WHERE FILM_ID='$film_id'";
	$result = mysqli_query ($connection,$query) or die ("You couldn�t execute query");
}
?>