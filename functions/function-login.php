<?php
	$error = 0;
	if (isset($_POST['login'])) {
		$username=$_POST["user"];
		$password=$_POST["password"];
		$encrypted = md5($password);

		$query = "SELECT * FROM user WHERE USER_EMAIL = '$username' 
					AND USER_PASSWORD = '$encrypted'";

		$result = mysqli_query ($connection,$query);
		
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_array($result);
		
		$id = $row["USER_ID"];
		$name = $row["USER_LASTNAME"];
		$role = $row["USER_ROLE"];
		
		if($row["USER_EMAIL"]==$username && $row["USER_PASSWORD"]==$encrypted){
			$_SESSION["id"] = $id;
			$_SESSION["surname"] = $name;
			$_SESSION["role"] = $role;
			/* Starting to check if he/she/it is still a junior member */
			date_default_timezone_set('Europe/London');
			$dob = $row["USER_DOB"];
			$dob = explode("-",$dob); 
			$curMonth = date("m");
			$curDay = date("j");
			$curYear = date("Y");
			$age = $curYear - $dob[0]; 
			if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2])) 
				$age--;
			
			if ($age > 18 && $role == "Junior")
				$role = "Adult";	
				
			$query = "UPDATE user SET USER_ROLE='$role' WHERE USER_ID='$id'";

			$result = mysqli_query ($connection,$query) or die ("You couldn’t execute query");	
			/* End of checking */
			header("Location:./index.php");
			}
			
		}
		
		else	
			$error = 1;
	}
	?>