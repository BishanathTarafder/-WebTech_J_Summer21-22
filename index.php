<?php 

	$fname = $lname = "";
	$firstnameErrMsg = "";
	$adressErrMsg = "";

	if ($_SERVER['REQUEST_METHOD'] === "POST") 
	{

		function test_input($data) 
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$fname = $_POST['fn'];
		$lname = $_POST['ln'];


		$email = $_POST['e'];
		$mobilenumber = $_POST['mn'];
        $shr = $_POST['shr']; 
		$country = $_POST['c'];



		$message = "";
		if (empty($fname))
	    {

			$firstnameErrMsg = "First Name is Empty";
			$message .= "First Name is Empty";
			$message .= "<br>";
		}
		else 
		{
			if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) 
			{
				$firstnameErrMsg = "Only letters and spaces";
			}
		}
		if (empty($lname))
		{

			$firstnameErrMsg = "Last Name is Empty";
			$message .= "Last Name is Empty";
			$message .= "<br>";
		}
		else 
		{
			if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) 
			{
				$firstnameErrMsg = "Only letters and spaces";
			}
		}

		if (empty($email))
	    {
			$message .= "Email is Empty";
			$message .= "<br>";
		}
		else 
		{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$message .= "Please correct your email";
				$message .= "<br>";
			}
		}
		if (empty($mobilenumber))
		{
			$message .= "Mobileno is Empty";
			$message .= "<br>";
		}
		else
		{
			if(preg_match('/^[0-9]{11}+$/', $mobilenumber)) 
		    {
		    	$message .= "Valid Phone Number";
				$message .= "<br>";
		    } 
		    else 
		    {
		    	$message .= "Invalid Phone Number";
		    	$message .= "<br>";
		    }
		}
		if (!isset($_POST['gender'])) 
		{
			$message .= "Gender not Selected";
			$message .= "<br>";
		}

		if (empty($shr)) 
		{
			$message .= "Street/House/Road is Empty";
			$message .= "<br>";
		}
		else 
		{
			if (!preg_match('/^[^@]{1,63}@[^@]{1,255}$/', $shr)) 
			{
			    $adressErrMsg = "not match";
			    $message .= "not match";
			    $message .= "<br>";
			} 
		}

		if($_POST['c'] == -1)
		{
			$message .= "Country not Seletect";
			$message .= "<br>";
		}

		if ($message === "") 
		{
			echo "Registration Successful";
		}
		else 
		{
			echo $message;
		}

	}
?>
