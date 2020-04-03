<html>
 <title> Bon Voyage- Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<head>
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php 
error_reporting(0);
if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$conn=mysqli_connect('localhost','root','','voyage');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username=$password="";
if(isset($_POST['submit'])){
 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
    return $data;
  }

 
}
if ( isset($_POST['username']) && isset($_POST['password']) ) {
    if ( strlen($_POST['password']) < 1 || strlen($_POST['username']) < 1 ) {
    echo "<script>";
     echo "alert('Please fill your Password or username')";#"swal({position: 'center',icon: 'warning',title: 'Empty',showConfirmButton: false,timer: 7000})";
  echo "</script>";
    } else {
          $code="";
         $username=test_input($_POST["username"]);
         # $code=test_input($_POST["password"]);
           $password = hash('md5', $_POST['password']);
        
           $sql = "SELECT username,password FROM signup1 WHERE username='$username'";
           $result = $conn->query($sql);
         if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($username==$row["username"] && $password==$row["password"]){ 
            echo "<script>";
            echo "alert('Welcome to Bon Voyage')";
            echo "</script>";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            #"swal({position: 'center',icon: 'success',title: 'Welcome',showConfirmButton: false,timer: 7000})";
  
        } else {
            
           echo "<script>";
    echo "alert('Username or Password is Incorrect')";#"swal({position: 'center',icon: 'error',title: 'Wrong', text: 'Incorrect Username or Password',showConfirmButton: true,footer: '<a href>Forget Password</a>'})";
  echo "</script>";
        }

        
} 
}else {
    echo "0 results";
}   
}
 

}
}
$conn->close(); 
?>
<style>
body{
    background: url(background/bg_27.jpg);
    background-size:cover;
    font-family: sans-serif;
margin:0;
}
nav{
margin:0;
background-color:black;
text-align:left;
position:fixed;
width:100%;
z-index:2;
}
nav a
{
padding:1vw;
display:inline-block;
text-decoration:none;
color:white;
font-size:16px;
}
nav a:hover{
background-color: rgb(255,255,255,0.5);
color:#ffffff;
}

.active{
  background-color:green;
color:white;
}
@media screen and (max-width: 1000px) {
.loginbtn
{
    border: none;
    outline: none;
    height: 40px;
    width: 25%;
    background: #4d4dff;
    color: #fff;
    font-size: 20px;
    border-radius: 20px;
}
.cancelbtn
{
    border: none;
    outline: none;
    height: 45px;
     width: 25%;
    background: #4d4dff;
    color: #fff;
    font-size: 20px;
    border-radius: 20px;
    margin-bottom:10px;
}
}
</style>
<body>
<nav><a href="index.php" >Home</a>
<a href="login.php" class="active">Login</a>
<a href="signup.php">Register</a>
<div class="dropdown">
    <button class="dropbtn">Book Now</button>
    <div class="dropdown-content">
      <a href="destination.php">Destination</a>
      <a href="hotel.php">Hotel</a>
      <a href="restaurant.php">Restaurant</a></center>
    </div>
  </div><a href="contact.php">Contact</a>
</nav>  

    <div class="login-box">
        <h2>Login </h2> 
            <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Your Username" id="user" >
            <p>Password</p>
            <input type="Password" name="password" placeholder="Enter Your Password" id="pass">
    
            <input type="submit" class="loginbtn" value="Login" name="submit" >
            <input type="button" class="cancelbtn" value="Cancel" name="cancel">
            &nbsp<br><a href="forget.php">Forget Password</a>&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
            <a href="signup.php">Create Account</a>
        </form>
        </div>
    </body>
</html>
