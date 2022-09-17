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
    $Centre_id =  $_POST['centre_id'] ??"";
    $CName = $_POST['centre_name'] ??"";
    $Address =  $_POST['address'] ??"";
    $sql = "INSERT INTO vaccine_centre (Centre_id, CName, Address) VALUES ('$Centre_id', '$CName', '$Address')";
    //mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    echo "<script>
    window.alert('Succesfully Inserted');
    window.location.href='http://localhost/dbms/emp.php';
    </script>";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
        <button><a href="http://localhost/dbms/emp.php"><i class="fa fa-sign-out fa-2x"></i></a></button>
        <br>
    </div>
    <h1>ADD NEW CENTRE </h1>
    <form method = "post">
        <input type="text" name="centre_id" id="centre_id" pattern="\d{5}"placeholder="Enter your Centre ID" required>
        <br>
        <input type="text" name="centre_name" id="centre_name" placeholder="Enter your Centre Name" required>
        <br>
        <input type="text" name="address" id = "address" placeholder="Enter Centre Address" required >
        <br>
        <br>       
        <button class="btn">Submit</button> 
    </form>
</body>
</html>