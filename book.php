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
    <h1>BOOK SLOTS</h1>
    <form method = "post">
        
    <select name="member_id" id ="member_id" required>
        <option value="value" selected>--Select Member--</option>
            <?php 
            session_start();
                include('connection.php');
                $a = "Select Member_id from member where Userid = '{$_SESSION['Userid']}' ";
                $b = mysqli_query($con,$a);
                while ($c = mysqli_fetch_array($b,MYSQLI_ASSOC)):; 
            ?>
                <option>
                    <?php echo $c["Member_id"];?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
        <select name="address" id ="address" required>
        <option value="value" selected>--Select Address--</option>
            <?php 
                
                include('connection.php');
                $a = "Select Distinct Address from vaccine_centre";
                $b = mysqli_query($con,$a);
                while ($c = mysqli_fetch_array($b,MYSQLI_ASSOC)):; 
            ?>
                <option>
                    <?php echo $c["Address"];?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
        <select name="HOSPITAL" id ="HOSPITAL" required>
        <option value="value" selected>--Select Hospital--</option>
            <?php 
                include('connection.php');
                $a = "Select CName from vaccine_centre ";
                $b = mysqli_query($con,$a);
                while ($c = mysqli_fetch_array($b,MYSQLI_ASSOC)):; 
            ?>
                <option>
                    <?php echo $c["CName"];?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
        <select name="VACCINE" id ="VACCINE" required>
        <option value="value" selected>--Select Vaccine--</option>
            <?php 
                include('connection.php');
                $p = "Select Name from Vaccine";
                $t = mysqli_query($con,$p);
                while ($category = mysqli_fetch_array($t,MYSQLI_ASSOC)):; 
            ?>
                <option>
                    <?php echo $category["Name"];?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
        <label>Select Dose No</label><br>
        <select id="DOSE_NO" name="DOSE_NO" required>
            <option value="1">1st Dose</option>
            <option value="2">2nd Dose</option>
        </select>
        <br>
        <label>Select Slot Date</label>
        <input type="date" name="date" id = "date" min="2022-01-25" max="2022-04-01">
        <br>
        <label> Select Slot Time between 09:00 am to 04:00 pm</label>
        <input type="time" name="time" id = "time" min="09:00:00" max="16:00:00">
        <br>
        <br>       
        <button class="btn">Submit</button> 
    </form>
</body>
</html>
<?php
include('connection.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $member_id=$_POST['member_id'] ??"";
    $Location=$_POST['address']??"";
    $Cname=$_POST['HOSPITAL']??"";
    $Vaccine=$_POST['VACCINE']??"";
    $Dose_No =$_POST['DOSE_NO']??"";
    $time =$_POST['time']??"";
    $date =$_POST['date']??"";
    try{
        $sql2 = "SELECT COUNT(*) FROM SLOTS WHERE Member_id = $member_id GROUP BY Member_id;";
        $result = mysqli_query($con, $sql2);
        $row = mysqli_fetch_array($result);
        $x = $row["COUNT(*)"];
        if ($x < 2){
        $sql="insert into slots(Slots, Member_id) values ('$date $time','$member_id')";
        $res2=mysqli_query($con, $sql);
        $updatequery="UPDATE member SET Centre_id=(SELECT Centre_id from vaccine_centre A WHERE A.Address='$Location' AND A.Cname='$Cname') WHERE Member_id='$member_id'";
        $res=mysqli_query($con,$updatequery);
        $updatequery2="update member set Status = (CASE WHEN '$Dose_No' = 1 THEN 'Partial ' WHEN '$Dose_No' = 2 THEN 'Full' END) WHERE Member_id = '$member_id'";
        $res3=mysqli_query($con,$updatequery2);
        $updatequery1="UPDATE member SET VID=(SELECT VID FROM vaccine B WHERE B.Name='$Vaccine')WHERE Member_id='$member_id'";
        $res1=mysqli_query($con,$updatequery1);
        echo "<script>
            window.alert('Succesfully Updated');
            window.location.href='http://localhost/dbms/user.php';
            </script>";
        }
        else{
            echo "<script>
            window.alert('Slots already booked');
            window.location.href='http://localhost/dbms/user.php';
            </script>";
    }
    }catch (Exception $e){
        $errString = $e->getMessage();
    }

        
    
    if (isset($errString) && $errString !== '') { ?>
        <script>
        var error = "<?php echo 'error : ' . $errString; ?>";
        alert(error);
        window.location.href='http://localhost/dbms/user.php';
        </script>
        <?php } 
    }
    mysqli_close($con);
?>