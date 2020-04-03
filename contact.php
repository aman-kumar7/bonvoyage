<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> 
<?php 
error_reporting(0);
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
    echo "<script>";
  echo "alert('Feel free to Contact Us')";
     echo "</script>";
} else {
 echo "<script>";
  echo "alert('Please log in to Continue.')";
     echo "</script>";
   
}
if($_POST['submit']){
$toEmail = $_POST['email'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$headers = "From: aman43407@gmail.com";
//$mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
if(mail($toEmail, $subject,$body, $headers)) {
echo "<script>alert('Your feedback is sent');</script>";
} else {
echo "<script>alert('Problem in sending Mail');</script>";
} 
}
?>  
<style>
body {font-family: Arial, Helvetica, sans-serif;
background-color: #f2f2f2;
margin:0;
}

#email,#name{
    width: 50%;
    padding: 12px;
    border: 1.5px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

textarea {
width: 50%;
    padding: 12px;
    border: 1.5px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
    margin:;
   
    resize: vertical;
}
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

input[type=submit]:hover {
    cursor: pointer;
    opacity:0.6;
}

.container {
    border-radius: 5px;
    width:60%;
    margin-top: :50%;
    padding:50px;
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
text-decoration: none;
}

.active{
  background-color:green;
color:white;
}
</style>
<title>Bon Voyage-Contact Us</title>
</head>

  <body>
<nav><a href="index.php" >Home</a>
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
          echo "<a href='user.php' >My Account</a>";
       } else { 
            echo "<a href='login.php'>Login</a>";
            echo "<a href='signup.php'>Register</a>";
             } ?>
    <div class="dropdown">
    <button class="dropbtn">Book Now</button>
    <div class="dropdown-content">
      <a href="destination.php">Destination</a>
      <a href="hotel.php">Hotel</a>
      <a href="restaurant.php">Restaurant</a>
    </div>
  </div><a href="contact.php" class="active">Contact</a>
</nav>  
<center>
    <br><br>
<section id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span class="subheading"><h6>Contact</h6></span>
            <h2>Contact Us</h2>
           
          </div>
        </div>
<br>
<div class="row block-12"><div class="col-md-1"></div>
          <div class="col-md-10">
            <form class="contact-form" name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ng-app="">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Type Your Name Here...">
              </div>
              <div class="form-group">
                <input type="email" class="form-control myemail" name="email" placeholder="Type Your Email Here..." ng-model="text2" name="myEmail">
              <span ng-show="myForm.myEmail.$error.email" style="color:red;"><br>&nbspNot a valid email address</span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" >
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" name="body" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary send"  >
              </div>
            </form>
          </div>
          </div>
</div>
</section>  
</center>
</body>
</html>
