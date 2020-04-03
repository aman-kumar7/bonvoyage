<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
    echo "<script>";
  echo "alert('Welcome to Bon Voyage')";
     echo "</script>";
} else {
 echo "<script>";
  echo "var show = function() {
 document.getElementById('id01').style.display='block';
 document.getElementById('id01').style.width='auto';
}
window.onload = function() {
  setTimeout(show, 3000);
}";
     echo "</script>";
   
}
$conn=mysqli_connect('localhost','root','', 'voyage');
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
     echo "alert('Please fill your  Username or Password')";#"swal({position: 'center',icon: 'warning',title: 'Empty',showConfirmButton: false,timer: 7000})";
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
?>
<!DOCTYPE html>
<html>
<head>
<title>Bon Voyage</title>
<link href="https://fonts.googleapis.com/css?family=Bitter|Dancing+Script|Fira+Sans|Open+Sans|Gloria+Hallelujah|M+PLUS+1p|Lato|Josefin+Slab|Istok+Web|Indie+Flower|Montserrat|Raleway|Amatic+SC|Caveat|Dancing+Script|Indie+Flower|Kalam|Shadows+Into+Light|Nothing+You+Could+Do&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> 
  
<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.documentElement.scrollTop > 10) {
    document.getElementById("top").style.padding = "40px 20px 2% 0";
    document.getElementById("top").style.margin = "-1px 0 0 0";
    document.getElementById("a1").style.color = "black";
    document.getElementById("a2").style.color = "black";
    document.getElementById("a3").style.color = "black";
    document.getElementById("a4").style.color = "black";
    document.getElementById("a5").style.color = "black";
    document.getElementById("a6").style.color = "black";
    document.getElementById("a7").style.color = "black";
     document.getElementById("a8").style.color = "black";
    document.getElementById("pagename").style.color = "black";
    document.getElementById("top").style.backgroundColor = "#fff";
    document.getElementById("top").style.position = "fixed";
    document.getElementById("top").style.width = "101%";
    document.getElementById("top").style.zIndex = "2";
    document.getElementById("top").style.transition= "4s";
    document.getElementById("top").style.transitionDelay = "2s";
    document.getElementById("top").style.transitionProperty = "height";
    document.getElementById("top").style.boxShadow = "0px 10px 20px grey"; 
    document.getElementById("ca").style.color = "black";              
  } else {
    document.getElementById("top").style= "none";
    document.getElementById("a1").style.color = "#fff";
    document.getElementById("a2").style.color = "#fff";
    document.getElementById("a3").style.color = "#fff";
    document.getElementById("a4").style.color = "#fff";
    document.getElementById("a5").style.color = "#fff";
    document.getElementById("a6").style.color = "#fff";
    document.getElementById("a7").style.color = "#fff";
    document.getElementById("a8").style.color = "#fff";
    document.getElementById("pagename").style.color ="#fff";
    document.getElementById("top").style.transitionDelay = "40ms";
    document.getElementById("ca").style.color = "white";
    
  }
}
function myFunction() {
  var x = document.getElementById("top");
  if (x.className === "topnav") {
    x.className += " responsive";
    document.getElementById("top").style.padding = "10px 0 0 0";
    document.getElementById("top").style.margin = "-1px 0 0 0";
    document.getElementById("pagename").style.display = "none";
    document.getElementById("a1").style.color = "black";
    document.getElementById("a2").style.color = "black";
    document.getElementById("a3").style.color = "black";
    document.getElementById("a4").style.color = "black";
    document.getElementById("a5").style.color = "black";
    document.getElementById("a6").style.color = "black";
    document.getElementById("a7").style.color = "black";
    document.getElementById("a8").style.color = "black";
    document.getElementById("ca").style.color = "black";
    document.getElementById("top").style.backgroundColor = "#fff";
    document.getElementById("top").style.position = "fixed";
    document.getElementById("top").style.width = "100%";
    document.getElementById("top").style.zIndex = "3";
    document.getElementById("top").style.transition= "4s";
    document.getElementById("top").style.transitionDelay = "2s";
    document.getElementById("top").style.transitionProperty = "height";
    document.getElementById("top").style.boxShadow = "5px 10px 20px grey";                  
  } else {
    x.className = "topnav";
    document.getElementById("pagename").style.display = "block";
    return true;
 }
}
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>
<style>

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.login{
    background-color: #3333FF;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 35%;
    border-radius: 3px;
    font-size: 18px;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */




.container1 {
  width: 100%;
    padding: 16px;
}


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 30%; /* Could be more or less, depending on screen size */
    height: 80%;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 40px;
    top: 0;
    color: #000;
    font-size: 40px;
    font-weight: bold;
    margin-right: -25px;
    margin-top: -10px;
    padding-top: 10px;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    .p1,.p2{
       display: block;
       float: left;
    }
    
}

.modal-header,.head1,.close {
    background-color: #3333FF;
    color:white !important;
    text-align: center;
    font-size: 30px;
  }
.p1{
width: 50%;
}  
.p2{
width: 50%;
float:right;
}  
.slider {
  max-width: 100vw;
  height: 100vh;
  margin:-10px; 
  z-index:10; 
}

.slide{
 background-image: linear-gradient(rgb(0,0,0,0.5),rgb(0,0,0,0.5)),url(background/bg_7.jpg);      
 background-repeat:no-repeat;      
background-size: cover; 
  position: absolute;
  width: 100%;
  height: 100%;
  margin-top:-25px; 
  z-index:1;
  top:0;
} 

.topnav{
position: relative; 
text-decoration:none;
font-size:20px;
font-family: 'Fira Sans','Montserrat', sans-serif;
text-align:right;
margin:2% 10% 10px 0;
z-index:2;
}

.topnav a{
text-decoration:none;
font-size:18px;
font-family: 'Montserrat', sans-serif;
color:white;
text-align:right;
padding-top:2%;
margin:20px 15px 15px 20px;
}


.topnav .icon {
  display: none;
}

h1{
font-family:'Nothing You Could Do','Kalam','Shadows Into Light', sans-serif;
margin:5% 0 3% 0;
padding-top:5%;
font-size:80px;
padding-bottom:0;
text-align:center;
}
h2{
justify-content: center;
align-items: center;
display: flex;
font-family: 'Open Sans','Indie Flower';
font-size:30px;
margin:5% 0 0 24%;
opacity:0.8;
color:#2F4F4F;
width:600px;
font-weight:bold;
}
h3{
font-size:40px;
font-family:'Nothing You Could Do';
margin:-1% 0 0 4%;
color:#fff;
float:left;
}
p{
font-family: 'Raleway', sans-serif;
color:grey;
font-size:24px;
line-height:2;
}

#about-section{
padding:10% 10% 10% 10%;
}
q{
color:#fff;
font-size:58px;
text-align:center;
margin:0 0 0 27%;
font-family: 'Amatic SC','Roboto Mono', monospace;
}

#writer{
color:#fff;
font-size:20px;
text-align:center;
margin:5px 0 0 45%;
font-family: 'Roboto Mono', monospace;
}

@media screen and (max-width: 1250px) {
  .topnav a{
    display: none;
z-index:2;
  }
#top{
padding-bottom:-10%;
}
  .topnav a.icon {
    color:white;
    float: right;
    display: block;
    text-decoration:none;
  }
}
@media screen and (max-width: 1250px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;

}  

}
@media screen and (max-width: 900px) {
h3{
padding-top:4%;
}
h1{
padding-top:30%;
font-size:60px;
}
q{
font-size:50px;
margin-left:15%;
}

}
@media screen and (max-width: 700px) {
h3{
padding-top:4%;
}
h1{
padding-top:30%;
font-size:45px;
}
q{
font-size:40px;
margin-left:15%;
}
.join
{
margin-left:33%;
}
}
.instagram_area {
  position: relative; 
 margin-left:12%;}
  
    
  .instagram_area.top_pad {
    padding-top: 120px;
    }

.instagram_image {
  margin-bottom: -120px !important; }

  .instagram_image a {
    flex: 0 0 16.667%;
    max-width: 16.667%;
    display: inline-block;
    overflow: hidden; 
    z-index:4;
margin:-2px;}

    .instagram_image a img {
      width: 100%;
      transition: all 300ms ease;
      }
    .instagram_image a:hover img {
      transform: scale(1.05); }


.footer_area {
  background: #000;
  padding-top: 150px;
z-index:2;
 }


.ab_widget p {
  font-size: 14px;
  line-height: 24px;
  font-family: "Roboto", sans-serif;
  color: #777777;
  margin-bottom: 30px; }

  .ab_widget p a {
    color: #fa333f; }

 
.social_widget{
  font-family: "Roboto", sans-serif;
  color: #777777;
  margin: 0 0 0 16%;
  
   }

.social_widget .list li {
  padding-right:30px;
 display: inline-block;

  }

.social_widget .list li a {
    color: #cccccc;
    font-size: 25px;
    transition: all 300ms linear 0s; 
 }
  
.social_widget .list li:hover a {
    color: #fa333f; }



.loginman {
    width:200px;
    height:200px;
    border-radius: 50%;
    margin:7% 0 0 25%;
 }
.developer
{
margin:5%;
}
h6
{
font-family: 'Raleway', sans-serif;
font-size:15px;
color:grey;
text-align:center;
padding-left:10px;
margin-top:-20px;
opacity:0.7;
}
.img-fluid{
width:95%;
height:60vh;
border-radius:15px;

}
.img{
overflow: hidden;
max-width: 95%;
max-height:60vh;
margin:10px 0 10px 0;
border-radius:15px;
}
 .img-fluid:hover{
 transform: scale(1.06); 
transition:2s;
}


.tagline{
color:white;
}
.search
{ 
    border: 1.7px solid white;
    outline: none;
    height: 40px;
    width: 200px;
    background:transparent;
    color: #fff;
    font-size: 20px;
    border-radius:25px;
    margin:5% 0 5px 0%;
    padding-bottom:5px;
   font-family: 'Open Sans',,'Istok Web','Josefin Slab',sans-serif;

}
.search:hover{
    cursor: pointer;
    background-color:white;
    color:black;    
}
.pic-head{
color:white;
padding-bottom:20px;
}
#destination-section{
margin-top:10%;
background-size:100% 100%;
height:60vh;
}
#hotel-section{
margin-top:10%;
background-size:100% 100%;
height:60vh;
}
.img-head{
width:95%;
height:90vh;
border-radius:5px;

}
.des{
font-size:20px;
}
.name{
text-align:center;
color:#0774F9;
padding-bottom:2px;
}
.text-center{
text-align:center;
}
h4 a:hover{
text-decoration:none;
}

.book1{
  text-align:center;
}
.body{
  overflow-x: hidden;
}
span{
  opacity: 0.8;
  color:grey;
}
</style>

</head>
<body>
<div class='slider'>
<nav class="topnav" id="top">
        <a href="#"  id="a1" class="active">Home</a>
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
          echo "<a href='user.php'  id='a2'>My Account</a>";
       } else { 
            echo "<a href='login.php'  id='a2'>Login</a>";
            echo "<a href='signup.php'  id='a3'>Register</a>";
             } ?>
        <a href="#destination-section"  id="a4">Destination</a>
        <a href="#hotel-section"  id="a5">Hotel</a>
         <a href="#restaurant-section"  id="a6">Restaurant</a>
        <a href="#about-section" class="active"  id="a7">About</a>
        <a href="#contact-section" id="a8">Contact</a>
       <h3 id="pagename">Bon Voyage</h3>
        <a href="" style="font-size:25px;" class="icon" onclick="myFunction()" id="ca">&#9776;</a>       
</nav> 
<div class="slide"><h1 style="color:white">Travel around the World</h1>
<q>Not all those who wander are lost.</q><p id="writer">-J.R.R. Tolkien</p>
<center><a href="#destination-section" class="btn btn-white search">Explore More</a></center></div>
</div>


<!-- (Services Section) -->
<div id="service-section" class="text-center">
<div class="container">
          	
            <h2>Our Services</h2>
            <p>Always happy to serve !</p>
          </div>
<br>
  <h6>What we offer</h6>
  <br>
<div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      <p>We are certified by international comunity.</p>
    </div>
  
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>LOVE</h4>
      <p>We spread love with our work.</p>
    </div>
    
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>We support nature with donations</p>
    </div>

</div>
</div>
<br><br>
<!-- (Destination Section) -->
 <section id="destination-section" style="background-image: url(background/destination-single1.jpg);">
			
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="pic-head">Popular Destination</h2>
						<p class="tagline">We can make your dreams come true with us</p>
             <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
          echo "<p><a href='destination.php' class='btn btn-white search'>Book Destinations</a></p>";
       } else { 
           echo "<p><a href='login.php' class='btn btn-white search'>Book Destinations</a></p>";
            
             } ?>
						
					</div>
				</div>
			</div>
		</section>

    <section >
    	<div class="container">
    		<div class="row">
          <div class="col-md-12 text-center"><br><br>
          	<br><br><h6>Best Destination</h6>
            <h2 class="mb-4">Best Place to Travel</h2><br>
            <p>What a glorious greeting the sun gives the mountains</p>
          </div>
        </div>
    		<div class="row">
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
    						
		    				<a href="destination.php" target="_blank"><img src="background/destination-1.jpg" class="img-fluid" alt="Destination"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					<h4><a href="destination.php" target="_blank">Amalfi, Italy</a></h4>
	    					<span>15 Days Tour</span>
	    				</div>
	    				 
    				</div>
    			</div>
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
		    				<a href="destination.php" target="_blank"><img src="background/bg_25.jpg" class="img-fluid" alt="Destination"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					<h4><a href="destination.php" target="_blank">Agra, India</a></h4>
	    					<span>15 Days Tour</span>
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-4">
    				<div class="project">
    					<div class="img">
		    				<a href="destination.php" target="_blank"><img src="background/bg-26.jpg" class="img-fluid" alt="Destination"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					
	    					<h4><a href="destination.php" target="_blank">Rome, Italy</a></h4>
	    					<span>15 Days Tour</span>
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
		    				<a href="destination.php" target="_blank"><img src="background/bg-22.jpg" class="img-fluid" alt="Destination"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					<h4><a href="destination.php" target="_blank">The Great Wall, China</a></h4>
	    					<span>15 Days Tour</span>
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
		    				<a href="destination.php" target="_blank"><img src="background/destination-7.jpg" class="img-fluid" alt="Destination"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					<h4><a href="destination.php" target="_blank">Paris, France</a></h4>
	    					<span>15 Days Tour</span>
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
		    				<a href="destination.php" target="_blank"><img src="background/destination-13.jpg" class="img-fluid" alt="Destination"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					<h4><a href="destination.php" target="_blank">Pyramids,Egypt</a></h4>
	    					<span>15 Days Tour</span>
	    				</div>
	    				
	    				</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
<!--hotel-->
<section id="hotel-section" style="background-image: url(background/bg_10.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="pic-head">Stay with us, and feel like home</h2>
						<p class="tagline">Come In As Guests. Leave As Family.</p>
             <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
          echo "<p><a href='hotel.php' class='btn btn-white search'>Book a room now</a></p>";
       } else { 
           echo "<p><a href='login.php' class='btn btn-white search'>Book Destinations</a></p>";
            
             } ?>
						
					</div>
				</div>
			</div>
		</section>

		<section>
    	<div class="container">
    		<div class="row">
          <div class="col-md-12 text-center">
          <br><br>	
            <h6><span class="subheading">Suggested Hotel</span>
            <h2>Find Nearest Hotel</h2></h6>
            <p>Discover a hotel that defines a new dimension of luxury.</p>
          </div>
        </div>
    		<div class="row">
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
    						
		    				<a href="hotel.php" target="_blank"><img src="background/hotel-1.jpg" class="img-fluid" alt="Hotels"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					<h4><a href="hotel.php" target="_blank">Emirates Palace, Abu Dhabi</a></h4>
	    					<span>3 Days 2 Nights</span>
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
		    				<a href="hotel.php" target="_blank"><img src="background/hotel-2.jpg" class="img-fluid" alt="Hotels"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					
	    					<h4><a href="hotel.php" target="_blank">Burj Al Arab Hotel, Dubai</a></h4>
	    					<span>3 Days 2 Nights</span>
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-sm-4">
    				<div class="project">
    					<div class="img">
		    				<a href="hotel.php" target="_blank"><img src="background/hotel-7.jpg" class="img-fluid" alt="Hotels"></a>
	    				</div>
	    				<div class="text-center">
	    					
	    					<h4><a href="hotel.php" target="_blank">The Westin Excelsior, Rome</a></h4>
	    					<span>3 Days 2 Nights</span>
	    				</div>
	    				
    				</div>
    			</div>
    		</div>
    		



<div class="row">
          <div class="col-md-12 text-center">
          	<br><br><br><br><h6><span class="subheading">Rooms &amp; Suites</span><h6>
            <h2>Best Rooms Offer</h2>
            <p>Making your stay comfortable</p>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="row">
    					<div class="col-md-7">
    						<div class="img img-head" style="background-image: url(background/room-5.jpg);"></div>
    					</div>
    					<div class="col-md-5">
    						<div class="text">
    							<h4><a href="hotel.php">Classic Balcony Room</a></h4>
    						
    							<p class="des">No matter what kind of home or room you have to share, Voyage makes it simple and secure to host travellers. You’re in full control of your availability, prices, house rules, and how you interact with guests.
                                                        To keep you, your home, and your belongings safe, we cover every booking with $1M USD in property damage protection and insurance against accidents.</p>
                    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
          echo "<p><a href='hotel.php' class='btn btn-primary'>Book now</a></p>";
       } else { 
           echo "<p><a href='login.php' class='btn btn-primary'>Book now</a></p>";
            
             } ?>                                  
    							
<p><details>
  <summary style="font-size:20px; color:#3ea4c4;">Details</summary>
<p style="font-size:20px;"> Voyage always requires guests to provide certain information before they can make a reservation such as a confirmed phone number and email address. 
You may asked for a verified ID proof.</p>
</details></p>
    						</div>
    					</div>
    				</div>
    			</div>



    			
    </section>
<section id="restaurant-section">
    	<div class="container">
    		<div class="row">
          <div class="col-md-12 text-center ">
          	<br><br><br><h6><span class="subheading">Restaurant</span></h6>
            <h2>Near Resturant</h2>
            <p>One thousand flavors in one place</p>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-4">
    				<div class="project">
    					<div class="img">
		    				<a href="restaurant.php" target="_blank"><img src="background/resto-1.jpg" class="img-fluid" alt="Restaurant"></a>
	    				</div>
	    				<div class="text-center">
	    					<h4 class="price"><span>Twins Garden</span></h4>
	    				
	    					<h4><a href="restaurant.php" target="_blank">Moscow, Russia</a></h4>
	    					
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="project">
    					<div class="img">
		    				<a href="restaurant.php" target="_blank"><img src="background/resto-2.jpg" class="img-fluid" alt="Restaurant"></a>
	    				</div>
	    				<div class="text-center">
	    					<h4 class="price"><span> Disfrutar</span></h4>
	    					
	    					<h4><a href="restaurant.php" target="_blank">Barcelona, Spain</a></h4>
	    					
	    				</div>
	    				
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="project">
    					<div class="img">
		    				<a href="restaurant.php" target="_blank"><img src="background/resto-3.jpg" class="img-fluid" alt="Restaurant"></a>
	    				</div>
	    				<div class="text-center">
	    					<h4 class="price"><span>Arpège</span></h4>
	    					
	    					<h4><a href="restaurant.php" target="_blank">Paris, France</a></h4>

	    				
	    				</div>
	    			
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


<div id="about-section" class="row">
    			<div class="col-md-12">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="img-head" style="background-image: url(background/about.jpg);"></div>
    					</div>
    					<div class="col-md-6">
    						<div >
    							<h2>Know About Us</h2>
    						<br>
  <p class="des">Here at Bon Voyage we provide you with the best travelling opportunity. 
Our team has highly experienced members who will help you round the clock to plan yout trip.
The one and only thing that matters to us is to make your trip comfortable and hassle free.
So sit back, relax we have our team to help you in choosing the best deal for you which fits your pocket.We hope our travellers will love it.  </p>     
				</div>
    					</div>
    				</div>
    			</div>
              </div>

<div class="developer">
<h6 id="team">TEAM</h6><br>
<div class="row block-12">
<div class="col-md-3">
<img src="background/aman.jpeg" alt="Developer Profile" class="loginman"/><br>
<br>
<h4 class="name">Aman Kumar</h4><br>
<h6>DEVELOPER</h6>
<p id="about">Developer is an organism that turns coffee into code.</p>
</div>
<div class="col-md-3">
<img src="background/simran.jpeg" alt="Developer Profile" class="loginman"/><br>
<br>
<h4 class="name">Simran Kashyap</h4><br>
<h6>DEVELOPER</h6>
<p id="about">If brute force doesn’t solve your problems, then you aren’t doing enough.</p>
</div>
<div class="col-md-3">
<img src="background/aditya.jpeg" alt="Developer Profile" class="loginman"/><br>
<br>
<h4 class="name">Aditya Gupta</h4><br>
<h6>DEVELOPER</h6>
<p id="about">The work of developer is the soul of the website. 
It's an art.</p>
</div>
<div class="col-md-3">
<img src="background/diksha.jpeg" alt="Developer Profile" class="loginman"/><br>
<br>
<h4 class="name">Diksha Puri</h4><br>
<h6>DEVELOPER</h6>
<p id="about">If brute force doesn’t solve your problems, then you aren’t doing enough.</p>
</div>
</div>
</div>
<br><br><br>

 <section id="contact-section">
      <div class="container">
      	<div class="row">
          <div class="col-md-12">
            <span class="subheading"><h6>Contact</h6></span>
            <h2>Contact Us</h2>
           
          </div>
        </div>
<br>
<?php 
error_reporting(0);
if($_POST['submit1']){
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
<div class="row block-12"><div class="col-md-2"></div>
          <div class="col-md-8">
           <form class="contact-form" name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ng-app="">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Type Your Name Here...">
              </div>
              <div class="form-group">
                <input type="email" class="form-control myemail" placeholder="Type Your Email Here..." ng-model="text2" name="myEmail">
              <span ng-show="myForm.myEmail.$error.email" style="color:red;"><br>&nbspNot a valid email address</span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" >
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit1" value="Send Message" class="btn btn-primary send"  >
              </div>
            </form>
          </div>
          </div>
</div>
</section>  
<br><br><br><br><br><br><br><br><br>

<section class="instagram_area">
        		<div class="instagram_image row">
                               
        			<a href="#"><img src="background/ins-1.jpg" alt=""></a>
        			<a href="#"><img src="background/ins-2.jpg" alt=""></a>
        			<a href="#"><img src="background/ins-4.jpg" alt=""></a>
        			<a href="#"><img src="background/ins-5.jpg" alt=""></a>
        			<a href="#"><img src="background/ins-6.jpg" alt=""></a>
        		</div>
        	
        </section>
<!-- Footer -->
 <footer class="footer_area text-center">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-8 social_widget">
        			
        					<ul class="list">
        						<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        						<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
        						<li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
        						<li><a href="https://github.com/" target="_blank"><i class="fa fa-github"></i></a></li>

        					</ul>
        			</div>
        		</div>
        	</div>
 <div class="row text-center">
         <div class="col-md-12 f_widget ab_widget">
           <div>
            <p>
  Copyright &copy; 2019 All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank" >Voyage</a>
           </p>
           </div>
        </div>
     </div>
  </footer>

  <div id="id01" class="modal">
  
  <form class="modal-content animate"method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="modal-header" style="padding:25px 50px;">
    <div>
      <h4 class="head1"><span class="glyphicon glyphicon-lock"></span> Login</h4>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    </div>
    <div class="container1">
      <label for="username"><span class="glyphicon glyphicon-user"></span><b> Username</b></label><br>
      <input type="text" placeholder="Enter Your Username" name="username"><br>
      <br>
      <label for="password"><span class="glyphicon glyphicon-eye-open"></span><b> Password</b></label><br>
      <input type="password" placeholder="Enter Your Password" name="password"><br>
       
      <input type="submit" name="submit" value="Login" class="login"><br><br>
      <span class="text-left p1">Not a member? <a href="signup.php">Sign Up</a></span>
      <span class="text-right p2">Forgot <a href="forget.php">password?</a></span>
      
    </div>

 
  </form>
</div>
</body>
</html>