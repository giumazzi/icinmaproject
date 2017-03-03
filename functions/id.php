<?php 
// Check if the film exist
if (empty($_GET['id']))
	header("Location:../films.php");
else	
	$film_id = $_GET['id'];
?>