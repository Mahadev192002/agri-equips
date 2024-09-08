<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>REGISTRATION</title>
   <link rel="stylesheet" href="css/regs.css" type="text/css">
</head>
<body>
    
<?php

require_once('connection.php');

if(isset($_POST['regs'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $ph = mysqli_real_escape_string($con, $_POST['ph']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
    $Pass = md5($pass);

    if(empty($fname) || empty($lname) || empty($email)|| empty($ph) || empty($pass)) {
        echo '<script>alert("Please fill all fields")</script>';
    } else {
        if($pass == $cpass) {
            $sql_check_email = "SELECT * FROM users WHERE EMAIL='$email'";
            $res_check_email = mysqli_query($con, $sql_check_email);

            if(mysqli_num_rows($res_check_email) > 0) {
                echo '<script>alert("Email already exists. Please login!")</script>';
            } else {
                $sql_insert_user = "INSERT INTO users (FNAME, LNAME, EMAIL,PHONE_NUMBER, PASSWORD) VALUES ('$fname', '$lname', '$email', '$ph', '$Pass')";
                $result_insert_user = mysqli_query($con, $sql_insert_user);

                if($result_insert_user) {
                    echo '<script>alert("Registration Successful")</script>';
                    // Redirect or show success message
                } else {
                    echo '<script>alert("Registration Failed. Please try again!")</script>';
                }
            }
        } else {
            echo '<script>alert("Passwords do not match")</script>';
        }
    }
}

?>




  <style>
    *{
    margin: 0;
    padding: 0;

}
body{
    background-image: url("C:\xampp\htdocs\agri_equips\images\regs.jpg");
    
    
    background-size: cover;
    background-position: center;
    margin-top: 0px;
    
}
.main{
    width: 400px;
    margin: 100px auto 0px auto;
    margin-top: 30px;
}
.btnn{
    width: 240px;
    height: 40px;
    background: #1b5b15;
    border:none;
    margin-top: 30px;
    margin-left: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}


.btnn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

h2{
    text-align: center;
    padding: 20px;
    font-family: sans-serif;

}
#register{
  .box {
    background-color: rgba(0,0,0,0.6);
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: inset 2px 2px 15px rgba(0,0,0,0.3); /* Add 'inset' keyword */
    color: #fff;
    margin: auto;
}


}

form#register{
    margin: 40px;
    

}

label{
    font-family: sans-serif;
    font-size: 18px;
    font-style:italic;
    
}

input#name{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}


#back{
    width: 100px;
    height: 40px;
    background: #0f4a08;
    border:none;
    margin-top: 10px;
    margin-left: 20px;
    font-size: 18px;
   

}

#back:hover{
    background: #fff;
    color:#18401a;
}

#back a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

#fam{
    color: #1e6f42;
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top:-10px;
    text-align: center;
    letter-spacing: 2px;
    display: inline;
    margin-left: 250px;
}

.reg{
    width: 100%;
}
input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
  }
  
  /* Style the submit button */
  /* input[type=submit] {
    background-color: #04AA6D;
    color: white;
  } */
  
  /* Style the container for inputs */
  .container {
    background-color: #f1f1f1;
    padding: 20px;
  }
  
  /* The message box is shown when the user clicks on the password field */
  #message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
  }
  
  #message p {
    padding: 10px 35px;
    font-size: 18px;
  }
  
  /* Add a green text color and a checkmark when the requirements are right */
  .valid {
    color: green;
  }
  
  .valid:before {
    position: relative;
    left: -35px;
    content: "&#10004;";
  }
  
  /* Add a red text color and an "x" icon when the requirements are wrong */
  .invalid {
    color: red;
  }
  
  .invalid:before {
    position: relative;
    left: -35px;
    content: "&#10006;";
  }
    #register {
        background-image: url('');
        background-size: cover; /* Adjust as needed */
        background-repeat: no-repeat;
        padding: 20px; /* Adjust padding as needed */
    }

      body {
    background-image: url('images/regs.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    /* Optionally set background position */
    background-position: center; /* or any other desired value */
}

      #register {
        
        background-size: cover; /* Adjust as needed */
        background-repeat: no-repeat;
        padding: 10px; /* Adjust padding as needed */
    }
      input#psw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 1px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
input#cpsw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
  #message {
  display:none;
  background: #fff;
  color: #000;
  position: relative;
  padding: 20px;
  
  width: 400px;
  margin-left:1000px;
  margin-top: -500px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}</style> 

    <button id="back"><a href="index.php">HOME</a></button>
    <h1 id="fam">JOIN OUR FAMILY OF FORMERS!</h1>
 <div class="main">
        
        <div class="register">
        <h2>Register Here</h2>
        
        <form id="register" action="register.php" method="POST">    
            <label>First Name : </label>
            <br>
            <input type ="text" name="fname"
            id="name" placeholder="Enter Your First Name" required>
            <br><br>

            <label>Last Name : </label>
            <br>
            <input type ="text" name="lname"
            id="name" placeholder="Enter Your Last Name" required>
            <br><br>

            <label>Email : </label>
            <br>
            <input type="email" name="email"
            id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com"placeholder="Enter Valid Email" required>
            <br><br>

            <label>Phone Number : </label>
            <br>
            <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
            id="name" placeholder="Enter Your Phone Number" required>
            <br><br>

            

            <label>Password : </label>
            <br>
            <input type="password" name="pass" maxlength="12"
            id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br><br>
            <label>Confirm Password : </label>
            <br>
            <input type="password" name="cpass" 
            id="cpsw" placeholder="Renter the password" required>
            <br><br>
            <input type="submit" class="btnn"  value="REGISTER" name="regs" style="background-color: #ff7200;color: white">
            
        
        
        </input>
            
        </form>
        </div> 
    </div>
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>  
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</body>
</html>