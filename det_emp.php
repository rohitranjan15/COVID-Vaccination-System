
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to COVID Vacinnation </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
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
        table,th, td {
    border:1px solid black;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr{background-color: white;}

th {
  background-color: #338BA8;
  color: white;
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
        h1{text-align: center;}
        h3{text-align: center;}
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0%;
            padding: 15px;
        }
        a {color:#fff; }
    </style>
</head>
<body style = "background-image: url('https://cdn.pixabay.com/photo/2021/01/10/07/41/syringe-5904302_1280.jpg')";>
    <div class = "logout">
        <button><a href="http://localhost/dbms/emp.php"><i class="fa fa-sign-out fa-2x"></i></a></button>
        <br>
    </div>
    <div class = "container">
        <h3>DETAILS OF EMPLOYEE</h3>
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
            $sql = 'SELECT * FROM `employee` where EID='.$_SESSION['EID'].'';  
            $retval=mysqli_query($conn, $sql);  
            if(mysqli_num_rows($retval) > 0){  
                echo "<table><tr><th>Employee ID</th><th>Name</th><th>Phone</th><th>Gender</th><th>Centre ID</th></tr>";
                while($row = mysqli_fetch_assoc($retval)){  
                    echo "<tr><td>" . $row["EID"]. "</td><td>" . $row["Name"]. " <td>" . $row["Phone"]. "</td><td>" . $row["Gender"]. "</td><td>" . $row["Centre_id"]. "</td></td></tr>";  
                        
                }  
                echo "</table>";
            }
            else{  
                echo "0 results";  
            }  
            mysqli_close($conn);  
        ?> 
    </div>
</body>
</html>