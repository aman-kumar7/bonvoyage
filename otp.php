<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
session_start();
$conn=mysqli_connect('localhost','root','', 'voyage');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
  $code1=$_SESSION['otp'];
  $code2=$_POST['otp1'];
  
  if($code1==$code2){
  echo "<script>alert('Successful Submission of OTP');</script>";
  header("Location: password.php");
}else{
  echo "<script>alert('Your OTP does not match!');</script>";
}
}
?>

<head>
<style>
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

nav{
background-color:black;
text-align:left;
position:fixed;
z-index:2;
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
body{
    background: url(background/bg_27.jpg);
    background-size:cover;
    font-family: sans-serif;
margin:0;
}
.dropdown {
display:inline-block;

}

.dropbtn {
  font-size: 17px;  
  color: white;
outline:none;
border:none;
 padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color:black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

}

.dropdown-content a {
  color: white;
  text-decoration: none;
  display: block;
  text-align: left;
}
.dropbtn:hover{
background-color: rgb(255,255,255,0.5);
color:#ffffff;
}
.dropdown-content a:hover {
  background-color: rgb(255,255,255,0.5);

}
.dropdown:hover .dropdown-content {
  display: block;
}
.login-box{
    width: 360px;
    height: 450px;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    top: 52%;
    left: 50%;
    position: relative;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 60px 30px 0 40px;
    z-index:1;
    
}

::placeholder {
  padding-left: 5px;
    color: grey;
    opacity: 0.5; 
}
h2{
    margin: 0;
    padding: 0 30px 0px 0;
    text-align: center;
    font-size: 22px;
}
.login-box p{
    margin-bottom: 7px;
    padding:0;
    
}
.login-box input{
    width: 90%;
    height:50%;
    margin-bottom: 7px;
}
.login-box input[type="number"]
{
    border: 0.5px solid grey;
    background: #fff;
    border-radius: 0px 5px 5px 0;
    height: 40px;
    color: grey;
    font-size: 16px;
    width: 80%;
    padding-left: 10px;
}
.login-box input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background:#3CB371;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    width:96%;
    margin-left: -10px;
}
.login-box input[type="submit"]:hover{
    cursor: pointer;
    opacity:0.9;
}
.login-box input[type="button"]
{
    border: none;
    outline: none;
    height: 40px;
    background:red;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.login-box input[type="button"]:hover{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}

.login-box a{
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}

.login-box a:hover
{
    color: #39dc79;
}
.tagline{
  margin-top: 5%;
}
.fa-input {
  font-family: FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 35px;
  color:grey;
  margin:0;
  
  border-radius: 5px 0 0 5px;
} 
.icon {
  padding: 10px;
  background: grey;
  color: white;
  min-width: 50px;
  text-align: center;
  height: 40px;
  border-radius: 5px 0 0 5px;
}
</style>
<head>
    <title>Forget Password</title>
    
     <nav><a href="index.php">Home</a>
      <a href="login.php">Login</a>
      <a href="signup.php">Signup</a>
      <a href="forget.php" class="active">Forget Password</a>
<div class="dropdown">
    <button class="dropbtn">Book Now      
    </button>
    <div class="dropdown-content"><center>
      <a href="destination.php">Destination</a>
      <a href="hotel.php">Hotel</a>
      <a href="restaurant.php">Restaurant</a></center>
    </div>
  </div><a href="contact.php">Contact</a>
</nav>
</head>
    <body>
    <div class="login-box">
            <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="text-center">
            <h2>Forget Password?</h2><br>
             <h3><i class="fa fa-lock fa-4x"></i></h3>
            <p class="tagline"></p>
            <div class="form-group">
            <div class="input-container">
            <i class="fa fa-key icon"></i><input type="number" name="otp1" placeholder="Enter 4-digit OTP" maxlength="10">
          </div>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit OTP"><br>
          </div>
        </div>
            &nbsp<a href="Home Page.html">Go back to Home</a>

        </form>
        </div>
    </body>
</html>
