<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agri Equipment BOOKING</title>
    <!-- <link  rel="stylesheet" href=""> -->
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>



</head>
<body >
<style>
    body {
    background: url("images/indexbook.png") no-repeat fixed center;
    background-size: cover;
}

*{
    margin: 0;
    padding: 0;

}

div.main{
    width: 400px;
    margin: 100px auto 0px auto;
}
.btnn{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    margin-left: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.btnn:hover{
    background: #f3f5f6;
    color:#ff6300;
}

.btnn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

h2{
    text-align: center;
    padding: 20px;
    font-family:Times;

}
div.register{
    background-color:light green;
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    color: #;f4f5f6

}

form#register{
    margin: 40px;

}

label{
    font-family:Times;
    font-size: 20px;
    font-style: bold;
}

input#name{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color:light blue;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

input#dfield{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: light blue;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

input#datefield{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color:light blue;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}

*{
    margin: 0;
    padding: 0;

}
.hai{
    width: 100%;
    height: 0px;
    
    
}
.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%);
    background-position: center;
    background-size: cover;
    
  
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width:200px;
    float: left;
    height : 70px;
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float:left;
    padding-top: 10px;

}
.menu{
    width: 400px;
    float: left;
    height: 70px;

}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
}

ul li{
    list-style: none;
    margin-left: 80px;
    margin-top: 20px;
    font-size: 14px;
    color: black;

}

ul li a{
    text-decoration: none;
    color:white;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;

}

ul li a:hover{
    color:green;

}

.nn{
    width:100px;
    background: #ff7200;

    border:none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:white;
    transition: 0.4s ease;
    

}

.nn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
    
}

.circle{
    border-radius:48%;
    width:65px;
}

.phello{
    width: 200px;
    margin-left: -50px;
    padding: 0px;
}




</style>


<?php 

require_once('connection.php');
session_start();

// Retrieve car ID from GET parameter
$equipid = $_GET['id'];

// Fetch equipment details
$sql = "SELECT * FROM Equipmentdetails WHERE EQUIP_ID='$equipid'";
$cname = mysqli_query($con, $sql);
$email = mysqli_fetch_assoc($cname);
$equipprice = $email['PRICE'];

// Fetch user details
$value = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE EMAIL='$value'";
$name = mysqli_query($con, $sql);
$rows = mysqli_fetch_assoc($name);
$uemail = $rows['EMAIL'];

if(isset($_POST['book'])){
    $bplace = mysqli_real_escape_string($con, $_POST['place']);
    $bdate = date('Y-m-d', strtotime($_POST['date']));
    $dur = mysqli_real_escape_string($con, $_POST['dur']);
    $phno = mysqli_real_escape_string($con, $_POST['ph']);
    $rdate = date('Y-m-d', strtotime($_POST['rdate']));

    if(empty($bplace) || empty($bdate) || empty($dur) || empty($phno) || empty($rdate)){
        echo '<script>alert("Please fill all the fields.")</script>';
    } else {
        if($bdate < $rdate){
            $price = ($dur * $equipprice);
            $sql = "INSERT INTO booking (EQUIP_ID, EMAIL, BOOK_PLACE, BOOK_DATE, DURATION, PHONE_NUMBER, PRICE, RETURN_DATE) VALUES ('$equipid', '$uemail', '$bplace', '$bdate', '$dur', '$phno', '$price', '$rdate')";
            $result = mysqli_query($con, $sql);

            if($result){
                $_SESSION['email'] = $uemail;
                header("Location: payment.php");
                exit(); // Exit to prevent further execution
            } else {
                echo '<script>alert("Failed to book. Please try again.")</script>';
            }
        } else {
            echo '<script>alert("Please enter a correct return date.")</script>';
        }
    }
}

?>



    
       <div class="hai">
            <div class="navbar">
                <div class="icon">
                    <h1 class="logo">AgRi</h1>
                </div>
                <div class="menu" >
                    <ul>
                        <li ><a href="Equipmentdetails.php">HOME</a></li>
                        <li><a href="aboutus.html">ABOUT</a></li>
                        <li><a href="#">DESIGN</a></li>
                        <li><a href="contactus2.html">CONTACT</a></li>
                        <li><button class="nn"><a href="index.html">LOGOUT</a></button></li>
                        <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                    <li><p class="phello">HELLO! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p></li>

                    
                    </ul>
                </div>
            </div>
       </div>
                
                
         <div class="main"> 
        
        <div class="register">
            <h2>BOOKING</h2>
        <form id="register" method="POST"  >
            <h2>EQuipment NAME : <?php echo isset($email['EQUIP_NAME']) ? $email['EQUIP_NAME'] : 'Equipment Name Not Available' ?></h2>

            <label>BOOKING PLACE : </label>
            <br>
            <input type="text" name="place"
            id="name" placeholder="Enter Your Place">
            <br><br>

            <label>BOOKING DATE : </label>
            <br>
            <input type ="date" name="date"
            id="datefield" min='1899-01-01' max='2000-13-13'  placeholder="ENTER THE DATE FOR BOOKING">
            <br><br>

            <label>DURATION : </label>
            <br>
            <input type ="number" name="dur" min="1" max="30" 
            id="name" placeholder="Enter Rent Period (in days)">
            <br><br>

            <label>PHONE NUMBER : </label>
            <br>
            <input type="tel" name="ph" maxlength="10"
            id="name" placeholder="Enter Your Phone Number">
            <br><br>

            <label>Return date : </label>
            <br>
            <input type ="date" name="rdate"
            id="dfield"  min='1899-01-01' placeholder="Enter The Return Date">
            <br><br>
            <input type="submit"  class="btnn" value="BOOK" name="book" >
            
        </form>
        </div>
    </div>
    
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
             dd = '0' + dd
        }
        if (mm < 10) {
              mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today);
        document.getElementById("datefield").setAttribute("max", today);


    </script>
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
             dd = '0' + dd
        }
        if (mm < 10) {
              mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("dfield").setAttribute("min", today);
        


    </script>
    
    
    
    
</body>
</html>