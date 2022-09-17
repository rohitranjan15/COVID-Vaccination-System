<?php  
    $host = 'localhost';  
    $user = 'root';  
    $pass = '';  
    $dbname = 'covid';  
    $conn = mysqli_connect($host, $user, $pass,$dbname);  
    if(!$conn){  
        die('Could not connect: '.mysqli_connect_error());  
    }  
    //echo 'Connected successfully<br/>';  
    if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name =  $_POST['name'] ??"";
            $user_id = $_POST['user_id'] ??"";
            $password =  $_POST['password'] ??"";
    $sql = "INSERT INTO user (Username, Userid, password) VALUES ('$name', '$user_id','$password')";
    mysqli_query($conn, $sql);
    echo "<script>
    window.alert('Succesfully Updated');
    window.location.href='http://localhost/dbms/log_user.php';
    </script>";
    }
    //if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
    //} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //}
    
    mysqli_close($conn);
    
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to COVID Vacinnation </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        input, textarea{
            border: 2px solid black;
            border-radius: 6px;
            outline: none;
            font-size: 20px;
            width: 80%;
            margin: 20px 0px;
            padding: 7px;
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
            width: 40%;
        }
        h1{text-align: center;}
        h2{text-align: center;}
        h3{text-align: center;}
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0%;
        }
        a {color:#fff; }
    </style>
</head>
<body style = "background-image: url('https://cdn.pixabay.com/photo/2021/01/10/07/41/syringe-5904302_1280.jpg')";>
    <div class = "logout">
        <button><a href="http://localhost/dbms/log_user.php"><i class="fa fa-sign-out fa-2x"></i></a></button>
        <br>
    </div>
    <h1>SIGN UP </h1>
    <h2>NEW USER</h2>
    <form method = "post">
        <label for="Name"><b>Name:</b></label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>
        <br>
        <label for="user_id"><b>User ID:</b></label>
        <input type="tel" id="user_id" name="user_id" pattern="[6-9]{1}[0-9]{9}" placeholder="Enter Phone no"required> 
        <br>
        <label for="password"><b>Password</b></label>
        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder = "Enter password" required>
        <br>
        <br>       
        <button class="btn">Submit</button> 
    </form>
</body>
</html>