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
        a {color:#fff; }
    </style>
</head>
<body style = "background-image: url('https://cdn.pixabay.com/photo/2021/01/10/07/41/syringe-5904302_1280.jpg')";>
    <div class = "logout">
        <button><a href="http://localhost/dbms/user.php"><i class="fa fa-sign-out fa-2x"></i></a></button>
        <br>
    </div>
    <h1>NEW MEMBER</h1>
    <form method = "post">
        <label for="Name"><b>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>
        <br>
        <label for="gender"><b>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <select id="gender" name="gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
       
<br>
        <label for="dob"><b>Date of Birth:</b></label>
        <input type="date" name="dob" id="dob" min="1915-01-01" max="2007-01-01" required>
        <br>
        <label for="aadhaar"><b>Aadhaar No.:</b></label>
        <input type="text" name="member_id" id="member_id" pattern = "\d{12}"placeholder="Enter your aadhaar no" required>
        <br>
        <label for="phone"><b>Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="tell" name="phone_no" id = "phone_no" pattern="[6-9]{1}[0-9]{9}" placeholder="Enter your phone no" required>
        <br>
        
        <br>
        <br>       
        <button class="btn">Submit</button> 
        
    </form>
    
</body>
</html>
<?php  
    session_start();
    $host = 'localhost';  
    $user = 'root';  
    $pass = '';  
    $dbname = 'covid';  
    $conn = mysqli_connect($host, $user, $pass,$dbname);  
    if(!$conn){  
        die('Could not connect: '.mysqli_connect_error());  
    }  
    //echo 'Connected successfully<br/>';  
    if(isset($_POST['member_id'])){
    $sql2 = "select no_of_members from user where Userid = '{$_SESSION['Userid']}'";
    $result = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result);
    $x = $row["no_of_members"];
    while($x < 4){
        $Name =  $_POST['name'] ??"";
        $Member_id = $_POST['member_id'] ??"";
        $Phoneno =  $_POST['phone_no'] ??"";
        $DOB =  $_POST['dob'] ??"";
        $Gender =  $_POST['gender'] ??"";
        
        $sql = "insert into member (Name, Member_id, Phoneno, DOB,Gender,Userid) values ('$Name', '$Member_id', '$Phoneno','$DOB','$Gender','{$_SESSION['Userid']}')" ??"";
        mysqli_query($conn, $sql)??"";
        $sql1= "update user set no_of_members= no_of_members + 1 where Userid = '{$_SESSION['Userid']}'";
        mysqli_query($conn, $sql1);
        echo "<script>
    window.alert('Succesfully Updated');
    window.location.href='http://localhost/dbms/user.php';
    </script>";
   }
    
   echo "<script>
   window.alert('Cannot Add More Than 4 Members!');
   window.location.href='http://localhost/dbms/user.php';
   </script>";
    
}


    /*if (mysqli_query($conn, $sql)) {echo "New record created successfully";} else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}*/
    mysqli_close($conn);
?>