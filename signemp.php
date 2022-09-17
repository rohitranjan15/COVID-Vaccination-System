<?php  
    $host = 'localhost';  
    $user = 'root';  
    $pass = '';  
    $dbname = 'covid';  
    $conn = mysqli_connect($host, $user, $pass,$dbname);  
    if(!$conn){  
        die('Could not connect: '.mysqli_connect_error());  
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name =  $_POST['name'] ??"";
            $emp_id = $_POST['emp_id'] ??"";
            $phone =  $_POST['Phone'] ??"";
            $gender =  $_POST['Gender'] ??"";
            $centre_id =  $_POST['Centre_id'] ??"";
            $password =  $_POST['password'] ??"";
    $sql = "INSERT INTO employee (EID, Name, Phone, Gender,Centre_id, password) VALUES ('$emp_id', '$name','$phone','$gender','$centre_id','$password')";
    mysqli_query($conn, $sql);
    echo "<script>
    window.alert('Succesfully Updated');
    window.location.href='http://localhost/dbms/log_emp.php';
    </script>";
    }
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
        select{
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
        <button><a href="http://localhost/dbms/log_emp.php"><i class="fa fa-sign-out fa-2x"></i></a></button>
        <br>
    </div>
    <h1>SIGN UP </h1>
    <h2>NEW EMPLOYEE</h2>
    <form method = "post">
        <label for="name"><b>Name:</b></label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required >
        <br>
        <label for="emp_id"><b>Employee ID:</b></label>
        <input type="text" name="emp_id" id="emp_id" pattern="\d{5}"placeholder="Enter your Employee ID" required>
        <br>
        <label for="Phone"><b>Phone:</b></label>
        <input type="tel" name="Phone" id="Phone" pattern="[6-9]{1}[0-9]{9}" placeholder="Enter your Phone" required>
        <br>
        <label for="Gender"><b>Gender:</b></label>
        <select id="Gender" name="Gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
  <br>
        <label for="Centre_id"><b>Centre_id:</b></label>
        <input type="text" name="Centre_id" id = "Centre_id" pattern="\d{5}" placeholder="Enter the Centre_id" required >
        <br>
        <label for="password"><b>Password:</b></label>
        <input type="text" name="password" id = "password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter the password of your choice" required>
        <br>
        <br>       
        <button class="btn">Submit</button> 
    </form>
</body>
</html>