<?php 
	$error = 0;
	$success = 0;
	if (isset($_POST['register'])) {
		$lastname = $_POST["last_name"];
		$name = $_POST["name"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$postcode = $_POST["postcode"];
		$dob = $_POST["dob"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$cpassword = $_POST["cpassword"];
		
		if (!empty($lastname)  && !empty($name)  && !empty($dob)  && !empty($email)  && !empty($password)  && !empty($cpassword)){
			$encrypted = md5($password);
			
			date_default_timezone_set('Europe/London');
			$dob_post = $dob;
			$dob = explode("-",$dob); 
			$curMonth = date("m");
			$curDay = date("j");
			$curYear = date("Y");
			$age = $curYear - $dob[0]; 
			if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2])) 
				$age--;
							
			if ($age < 18)
				$role = "Junior";	
			else
				$role = "Adult";
				
			$query = "INSERT INTO user(USER_LASTNAME, USER_FIRTSNAME, USER_PHONE,USER_ADDRESS,USER_POSTCODE,
				USER_DOB,USER_EMAIL,USER_PASSWORD,USER_ROLE) VALUES ('$lastname','$name','$phone','$address','$postcode',
				'$dob_post','$email','$encrypted','$role')";
				
			$result = mysqli_query ($connection,$query)
				or die ("You couldn’t insert the data into de DDBB.");
			
			$success = 1;
		}
		else{
			$error = 1;
		} 
	} 
?>