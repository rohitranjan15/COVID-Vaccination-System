<?php
session_start();
?>
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
        A {text-decoration: none;}
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
        h1{
            text-align: center;
        }
        h3{
            text-align: center;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 10%;
            padding: 15px;
        }
        a {color:#fff; }
    </style>
</head>
<body style = "background-image: url('https://cdn.pixabay.com/photo/2021/01/10/07/41/syringe-5904302_1280.jpg')";>
    <div class = "logout">
        <button><a href="http://localhost/dbms/index.php"><i class="fa fa-sign-out fa-2x"></i></a></button>
        <br>
    </div>
    
    <h1>USER</h1>

    <button><a href = "http://localhost/dbms/book.php">BOOK SLOTS</a></button>
    <br>
    <button><a href = "http://localhost/dbms/det_mem.php">SEE MEMBER INFORMATION</a></button>
    <br>
    <button><a href="http://localhost/dbms/new_mem.php">REGISTER NEW MEMBER</a></button>
    <br>
</body>
</html>