<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="style3.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
  input[type="number"]
{
    border: none;
    border: 1px solid #fff;
    background: transparent;
    outline:none;
    height: 20px;
    color:#fff;
    font-size: 16px;
    width:50%;
    padding: 10px;
    margin:15px;
}
nav{
background-color:black;
text-align:left;
z-index:1;
position:fixed;
top:0;
width:100%;
}
nav a
{
padding:1vw;
display:inline-block;
text-decoration:none;
color:white;
font-size:18px;
}
nav a:hover{
background-color: rgb(255,255,255,0.5);
color:#ffffff;
}
.active{
  background-color:green;
color:white;
   
}
.dropdown {
display:inline-block;
}
.dropbtn:hover{
background-color: rgb(255,255,255,0.5);
color:#ffffff;
}

.dropbtn {
  font-size: 18px;  
  color: white;
outline:none;
border:none;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropbtn1{
  font-size: 18px;  
  color: white;
outline:1px solid white;
border:none;
  padding: 8px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropbtn1:hover{
background-color: rgb(255,255,255,0.5);
color:#000;
}
select
{
  display:inline- block;
  
background-color:inherit;
color:black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
drop-content{
display: none;
  position: absolute;
  background-color:black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
color:black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
option{
background-color:rgb(16, 203, 181,0.5);
color:black;}
.dropdown-content a {
  color: #fff;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
option:hover{
background-color: rgb(255,255,255,0.5);
color:#000;
}
.dropdown-content a:hover {
  background-color: rgb(255,255,255,0.5);

}
.dropdown:hover .dropdown-content {
  display: block;
}
::placeholder{
color:#fff;
opacity:0.8;
}
body{
 margin: 0;
    padding:0;
    background: url(background/bg_10.jpg)no-repeat fixed;
    background-size: cover;
    font-family: sans-serif;
}

.p{ padding-top: 10px;
padding-bottom: 30px;
}


.signup-box{
    width: 90%;
    height:97%;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    margin:5% 2% 2% 5%;
    position:absolute;
  
    padding-top:2vh;
    padding-bottom:5vh;
}
.loginman {
    width: 250px;
    border-radius: 50%;
 }
.signup-box input{
height:50%;
    width: 50%;
    margin-bottom: 20px;
}

.signup-box input[type="text"], input[type="password"], input[type="email"], input[type="number"],input[type="date"]

{
    border: none;
    border: 1px solid #fff;
    background: transparent;
    outline:none;
    height: 20px;
    color:#fff;
    font-size: 16px;
    width:50%;
    padding: 10px;
    margin:15px 15px 5px 15px;
}


.signup-box input[type="submit"], input[type="reset"]
{
    border: none;
    outline: none;
    height: 35px;
    width: 120px;
    background:orange;
    color:#fff;
    font-size: 18px;
    border-radius: 20px;
}
.btnsignup{
margin-left: -10%;
float:left;    
}

.signup-box input[type="submit"]:hover{
    cursor: pointer;
    background:green;
    color:white;
    opacity: 0.8;
    
}
.signup-box input[type="reset"]:hover{
    cursor: pointer;
    background:red;
    color:white;
    

}
.signup-box a{
    padding:10px;
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}
.signup-box a:hover
{
    color: #39dc79;
}
.left{
  margin:0% 4% 0% 4%;
  width:40%;
  border: none;
  float:left;
  padding:20px 0 20px 0;
}
.right{
  margin:0% 4% 0% 4%;
  float:right;
  height:200%;
  border: none;
  width:40%;
  padding:20px 0 20px 0;
}
label{
  float:left;
  margin-left:23%;
}
.error {
  color: #FF0000;
  font-size: 15px;
  text-align: left;
}
</style>
</head>
  <?php
  $conn=mysqli_connect('localhost','root','','voyage');
 // Check connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }/*
 //sql to create table
  $sql = "CREATE TABLE signup3 (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(10) NOT NULL,
  lastname VARCHAR(10) NOT NULL,
 username VARCHAR(20) NOT NULL UNIQUE,
 password VARCHAR(50) NOT NULL,
 email VARCHAR(20) NOT NULL,
 phone INT(15) NOT NULL,
 gender VARCHAR(10) NOT NULL,
 birthday DATE,
 UNIQUE(username)
 )";
 if ($conn->query($sql) === TRUE) {
    echo "Table SignUp created successfully";
 } else {
    echo "Error creating table: " . $conn->error;
 }  */
        //define variables and set to empty values
       $firstname=$lastname=$username=$password=$email=$phone=$gender=$birthday=$code="";
       $firstnameErr=$lastnameErr=$usernameErr=$passwordErr=$emailErr=$phoneErr=$genderErr=$birthdayErr="";


        if($_POST["submit"])
        {
            if(empty($_POST["firstname"]))
            {
                $firstnameErr = "Firstname is required";
            }
            else{
                $firstname = test_input($_POST["firstname"]);
            }
            if(empty($_POST["lastname"]))
            {
                $lastnameErr = "Lastame is required";
            }
            else{
                $lastname = test_input($_POST["lastname"]);
            }
            
            if(empty($_POST["email"]))
            {
                $emailErr = "Email is required";
            }
            elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Invalid email format";
            }
            else
            {
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["username"]))
            {
                $usernameErr = "Username is required";
            } 
             else{
             $username=test_input($_POST["username"]);
             }
            if (empty($_POST["phone"])) 
            {
                $phoneErr = "Phone Number is required";
            } 
            else {
                $phone = test_input($_POST["phone"]);
            }
            
            if (empty($_POST["gender"])) 
            {
                $genderErr = "Gender is required";
            } 
            else {
                $gender = test_input($_POST["gender"]);
            }
            if(empty($_POST["birthday"]))
            {
                $birthdayErr = "Birthday is required";
            }
            else{
                $birthday = test_input($_POST["birthday"]);
            }
            $code=test_input($_POST["password"]);
            if (strlen($code)<8 || empty($code)){
    /*echo "<script>";
    echo #"swal({position: 'center',icon: 'warning',title: 'Password length should be equal to 8 or more than it.',showConfirmButton: true,timer: 7000}) "; 
    "alert('Password length should be equal to 8 or more than it.')";
    echo "</script>"; */
             $passwordErr = "Password should be equal to 8 or more than it.";  
              } 
            else {
             $password = hash('md5', $code);
              }
          if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($password) && !empty($email) && !empty($phone) && !empty($birthday) && !empty($gender)){
    $sql = "INSERT INTO signup1 (firstname, lastname, username, password, email,phone,gender,birthday) VALUES ('$firstname', '$lastname','$username','$password', '$email','$phone','$gender','$birthday')";
         if ($conn->query($sql) === TRUE){
          
     #echo "<script>";
     #echo "swal({position: 'center',icon: 'success',title: 'Your Account has been Successfully created',showConfirmButton: true,timer: 7000}) ";
     #echo "</script>";
     $subject = "Welcome To Bon Voayge!";
     $body = "Hey, ".$firstname." ".$lastname."
     Welcome to Bon Voyage!
     You have just taken a big step! in starting your journey of Travelling. 
     Millions of happy travellers have started their journey right here on Bon Voayge! 
     Whatever your idea of travel, you will find Bon Voayge is the right choice. 
     See yourself the convenience of booking travel online.
     Thankyou!
     Best Regards,
     Bon Voyage";
     $headers = "From: rsk.19977@gmail.com";                   
     if(mail($email, $subject,$body, $headers)) {
     echo "<script>alert('Your Account has been Successfully created');</script>";
     header("Location: login.php");
     } else {
     echo "<script>alert('Problem in Sending Mail.');</script>";
     }  
   } 
    else {
    echo "<script>";
    echo #"swal({position: 'center',icon: 'error',title: 'Your Attempt to create an account has been failed',showConfirmButton: true,timer: 7000}) ";
    "alert('Already exisiting Account with same Username or Email')";
     echo "</script>";
     }
  }  
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

<body>
<nav>
  <a href="index.php" >Home</a>
  <a href="login.php">Login</a>
  <a href="signup.php" class="active">Register</a>
    <div class="dropdown">
       <button class="dropbtn">Book Now</button>
    <div class="dropdown-content"><center>
      <a href="destination.php">Destination</a>
      <a href="hotel.php">Hotel</a>
      <a href="restaurant.php">Restaurant</a></center>
    </div>
  </div>
  <a href="contact.php">Contact</a>
</nav>  
<center>
<div class="signup-box">
  <h3>Register</h3>
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <p>

  <div class="left">
     <label >First Name</label><br>
     <input type="text" name="firstname"  placeholder="Enter your firstname" value="<?php  echo $firstname;?>">
    <br>
          <span class="error"><?php echo $firstnameErr;?></span><br>
     <label >Create Username</label><br>
        <input type="text" name="username" placeholder="Enter Username" value="<?php  echo $username;?>"><br>
          <span class="error"><?php echo $usernameErr;?></span><br>
     <label >Email Id</label><br>
        <input type="email" name="email" placeholder="eg. John27@gmail.com" value="<?php  echo $email;?>"><br>
          <span class="error"><?php echo $emailErr;?></span><br>
     <label>Birthday</label><br>
        <input type="date" name="birthday" placeholder="Birthday" value="<?php  echo $birthday;?>"><br>
          <span class="error"><?php echo $birthdayErr;?></span><br>
  </div>

  <div class="right">
     <label >Last Name</label><br>
       <input type="text" name="lastname" placeholder="Enter your lastname" value="<?php  echo $lastname;?>">
       <br>
         <span class="error"><?php echo $lastnameErr;?></span><br>
     <label>Create Password</label><br>
       <input type="password" name="password" placeholder="Create Password" value="<?php  echo $code;?>"> 
       <!--minlength="8"  required--><br>
        <span class="error"><?php echo $passwordErr;?></span><br>
     <label >Phone Number</label><br>
       <input type="number" name="phone" placeholder="Phone Number" maxlength="10" value="<?php  echo $phone;?>"><br>
         <span class="error"><?php echo $phoneErr;?></span><br>
     <label >Gender</label><br><br>
        <select class="dropbtn1" name="gender">
           <option class="drop-content">Male</option>
           <option class="drop-content" value="Female">Female</option>
           <option class="drop-content" value="Other">Other</option>
        </select><br>
        <span class="error"><?php echo $genderErr;?></span><br>
  </div>  
  </p>    

  <div class="btnsignup">
     <input type="submit" value="Submit" name="submit">
     <input type="reset" name="reset" value="Reset" /> <br>
     <p>Already have an account? <a href="login.php">Sign in</a></p>
  </div>
  </form> 
  </div>  
</center>
</body>
</html>
