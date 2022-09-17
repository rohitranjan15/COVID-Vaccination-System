<?php 
session_start();

	include("connection.php");
	include("emp_functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Eid = $_POST['EID'];
		$password = $_POST['psw'];

		if(!empty($Eid) && !empty($password))
		{

			//read from database
			$query = "select * from employee where EID = '$Eid' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] == $password)
					{

						$_SESSION['EID'] = $user_data['EID'];
						header("Location: http://localhost/dbms/emp.php");
						//die;
					}
				}
			}
			
			echo '<script>alert("wrong username or password!")</script>';
		}else
		{
			echo '<script>alert("wrong username or password!")</script>';
            
		}
	}
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to COVID Vacinnation </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 10%;
            padding: 15px;}
        form {border: 3px solid #0c0808;
        background-color: white;}
        .logout {
            color: rgb(252, 245, 245);
            position: fixed;
            right:90px;
            top: 5px;
            background-color:rgb(64, 61, 57);
            margin-left:100%;
            display:block;
            
            margin-bottom:100%;
            width: 0%
        }
        input[type=text], input[type=password] {
            width: 25%;
            padding: 12px 50px;
            margin: 8px ;
            display: inline-block;
            border: 1px solid #ccc;
            border-color: black;
            box-sizing: content-box;
        }
        h1{text-align: center;}
        h3{text-align: center;}
        form{
            margin-left: 25%;
            width: 50%;
            text-align: center;
        }
        button {
            color: rgb(252, 245, 245);
            padding: 12px 50px;
            background-color:rgb(64, 61, 57);
            margin-left:auto;
            margin-right:auto;
            display:block;
            margin-top:0%;
            margin-bottom:0%;
            border: none;
            cursor: pointer;
            width: 20%;
        }
        a {color:#fff; }
        .container {
            padding: 16px;
        }span.psw {
            float: right;
            padding-top: 16px;
        }
    </style>
</head>
<body style = "background-image: url('https://cdn.pixabay.com/photo/2021/01/10/07/41/syringe-5904302_1280.jpg')";>
    <div class = "logout">
        <button><a href="http://localhost/dbms/index.php"><i class="fa fa-sign-out fa-2x"></i></a></button>
        <br>
    </div>
    <h1 style="text-align: center;">LOGIN FORM</h1>
    <div class="container">
        <form method = "post">
            <label for="EID"><b>Employee ID</b></label>
            <input type="text" placeholder="Enter employee ID" name="EID" required>
            <br>
            <label for="psw"><b>Password&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <br>
            <button type="submit" >Login</a></button>
            <br>
            <p>New User? <a href ="http://localhost/dbms/signemp.php" style="color: #0c0808;">Sign Up</a></p>
            </form>
    </div>
</body>
</html>