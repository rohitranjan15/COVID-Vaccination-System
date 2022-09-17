
<?php 
session_start();

	include("connection.php");
	include("usr_functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Userid = $_POST['Userid'];
		$password = $_POST['password'];

		if(!empty($Userid) && !empty($password))
		{

			//read from database
			$query = "select * from user where Userid = '$Userid' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] == $password)
					{

						$_SESSION['Userid'] = $user_data['Userid'];
						header("Location: http://localhost/dbms/user.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Welcome to COVID Vacinnation </title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 5%;
            padding: 10px;
        }
        form {border: 2px solid #0c0808;
        background-color: white;}
        input[type=text], input[type=password] {
            width: 15%;
            padding: 12px 50px;
            margin: 8px ;
            display: inline-block;
            border: 1px solid #ccc;
            border-color: black;
            box-sizing: content-box;
            background-color: ;
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
        a {color:#fff;}
        .container {
            padding: 16px;
            
        }
        span.psw {
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
            <label for="UID"><b>User ID&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" placeholder="Enter User ID" name="Userid" id="Userid" required>
            <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
            <br>
            
            <button type="submit" name = "button" id="button" >Login</a></button>
            <br>
            <p>New User? <a href ="http://localhost/dbms/sign_up.php" style="color: #0c0808;">Sign Up</a></p>
        </form>
    </div>
</body>
</html>