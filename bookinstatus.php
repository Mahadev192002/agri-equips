<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
</head>
<body>
<style>

*{
    margin: 0;
    padding: 0;

}

body{
    background: url("images/carbg2.jpg");
    background-position: center;
   
}
.box{
    
    position:center;    
    top: 50%;
    left: 50%;
    padding: 20px;
    box-sizing: border-box;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    background: linear-gradient(to top, rgba(255, 251, 251, 1)70%,rgba(250, 246, 246, 1)90%);
    display: flex;
    align-content: center;
    width: 700px;
    height: 250px;
    margin-top: 100px;
    margin-left: 350px;
  
    
}


.box .content{
    margin-left: 5px;
    font-size: larger;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.button{
    width: 200px;
    height: 40px;
   
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
    margin-top: 10px;
    margin-left: 10px;
}
.utton a{
    text-decoration: none;
    color: white;
    font-weight: bold;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
}

ul li{
    list-style: none;
    margin-left: 200px;
    margin-top: -130px;
    font-size: 35px;

}
.name{
    font-weight: bold;
}

</style>



<?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql="SELECT * FROM booking WHERE EMAIL='$email' ORDER BY BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    if($rows == null){
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script>window.location.href = "Equipmentdetails.php";</script>';
    }
    else {
        $sql2="SELECT * FROM users WHERE EMAIL='$email'";
        $name2 = mysqli_query($con,$sql2);
        $rows2=mysqli_fetch_assoc($name2);
        $equip_id = $rows['EQUIP_ID']; // Corrected variable name
        $sql3="SELECT * FROM Equipmentdetails WHERE EQUIP_ID='$equip_id'";
        $name3 = mysqli_query($con,$sql3);
        $rows3=mysqli_fetch_assoc($name3);

        // Display booking and equipment details
    }
?>

<ul>
    <li><button class="button"><a href="Equipmentdetails.php">Go to Home</a></button></li>
    <li class="name">HELLO! <?php echo $rows2['FNAME']." ".$rows2['LNAME']?></li>
</ul>
<div class="box">
    <div class="content">
        <h1>EQUIP NAME : <?php echo isset($rows3['EQUIP_NAME']) ? $rows3['EQUIP_NAME'] : 'Equipment Name Not Available' ?></h1><br>
        <h1>NO OF DAYS : <?php echo isset($rows['DURATION']) ? $rows['DURATION'] : 'Duration Not Available' ?></h1><br>
        <h1>BOOKING STATUS : <?php echo isset($rows['BOOK_STATUS']) ? $rows['BOOK_STATUS'] : 'Booking Status Not Available' ?></h1><br>
    </div>
</div>

<?php 
?>
    
</body>
</html>