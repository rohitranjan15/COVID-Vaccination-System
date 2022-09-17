<?php

function check_login($con)
{

	if(isset($_SESSION['EID']))
	{

		$id = $_SESSION['EID'];
		$query = "select * from employee where EID = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$employee_data = mysqli_fetch_assoc($result);
			return $employee_data;
		}
	}

	//redirect to login
	header("Location: emp_login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}