<?php 
if ($_SESSION["role"] == "Junior"){
	$query = "SELECT * FROM film WHERE FILM_AGE = '12A' OR FILM_AGE = 'U' OR FILM_AGE = '12' OR FILM_AGE = 'PG' OR FILM_AGE = '15';";
	$result = mysqli_query ($connection,$query) or die ("You couldn’t execute query");
}
else {
	$query = "SELECT * FROM film;";
	$result = mysqli_query ($connection,$query) or die ("You couldn’t execute query");
}
?>