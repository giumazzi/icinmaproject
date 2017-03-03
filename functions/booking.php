<?php 
if (isset($_POST['book'])) {
	$date = $_POST["date"];
	$session = $_POST["session"];
	$counter = $_POST["counter"];
	$total = $_POST["total"];
	$user_id = $_SESSION["id"];
	$film_id = $_GET['id'];
	$seat = (isset($_POST['seat']) ? $_POST['seat']:array());
	if (is_array($seat)) {					
		foreach ($seat as $selectedOption){
			$query = "INSERT INTO booking(USER_ID, FILM_ID, BOOKING_SESSION, BOOKING_DATE, BOOKING_SEAT, BOOKING_PRICE, BOOKING_NUM) 
						VALUES ('$user_id','$film_id','$session','$date','$selectedOption','$total','$counter')";
	
			$result = mysqli_query ($connection,$query)
				or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");	
			}
		echo "	<div class='alert alert-success' role='success'>
					Congrats your booking has been done! Print the tickets <a href='./fpdf18/generate-pdf.php?film=$film_id' target='_blank'>here</a>!
				</div>";
	}
	
} 
?>