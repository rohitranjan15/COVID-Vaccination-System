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
    $VID =  $_POST['VID'] ??"";
    $Name = $_POST['Name'] ??"";
    $Duration =  $_POST['Duration'] ??"";
    $Doses =  $_POST['Doses'] ??"";
    $Manufacturer =  $_POST['Manufacturer'] ??"";
    $sql = "INSERT INTO vaccine (VID,Name, Duration,Manufacturer, Doses) VALUES ('$VID', '$Name', '$Duration','$Manufacturer','$Doses')";
    mysqli_query($conn, $sql);
    echo "<script>
    window.alert('Succesfully Updated');
    window.location.href='http://localhost/dbms/emp.php';
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
        select{
            border: 2px solid black;
            border-radius: 6px;
            outline: none;
            font-size: 20px;
            width: 80%;
            margin: 20px 0px;
            padding: 7px;
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
        h3{text-align: center;}
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0%;
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
        a {color:#fff; }
    </style>
</head>
<body style = "background-image: url('https://cdn.pixabay.com/photo/2021/01/10/07/41/syringe-5904302_1280.jpg')";>
    <div class = "logout">
        <button><a href="http://localhost/dbms/emp.php">
            <i class="fa fa-sign-out fa-2x"></i></a>
        </button>
        <br>
    </div>
    <h1>ADD NEW VACCINE </h1>
    <form method = "POST">
        <input type="text" name="VID" id="VID" pattern="(\d{2})(\d)}"placeholder="Enter the Vaccine ID" >
        <br>
        <input type="text" name="Name" id="Name" placeholder="Enter the Name" required>
        <br>
        <label>Enter no of Doses</label>
        <select id="Doses" name="Doses" required>
    <option value="1">1st Dose</option>
    <option value="2">2nd Dose</option>
  </select>  
  <br>  
        <input type="text" name="Duration" id="Duration" placeholder="Enter your Duration" disabled >
        <br>
        <script>
        var Doses = document.getElementById("Doses");
Doses.addEventListener("input", function () {
    document.getElementById("Duration").disabled = this.value != "2";
});
</script>
        <input type="text" name="Manufacturer" id="Manufacturer" placeholder="Enter the Manufacturer" required>
        <br> 
        
        <button class="btn">Submit</button> 
    </form>
</body>
</html>
