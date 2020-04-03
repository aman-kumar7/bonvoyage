<?php
 session_start();
 $user=$_SESSION['username'];
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
    echo "<script>";
  echo "alert('Book Your Dream Hotel')";
     echo "</script>";
} else {
 echo "<script>
alert('Please Login to Bon Voyage');
window.location.href='login.php';
</script>";
}
$conn = mysqli_connect("localhost", "root", "", 'voyage');
if(isset($_POST["book"]))
{
  $_SESSION['hotel']=$_POST["hidden_name"];
  $_SESSION['image2']=$_POST["hidden_image"];
  header("Location: room.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bon Voyage - Destination</title>
<link href="https://fonts.googleapis.com/css?family=Bitter|Dancing+Script|Fira+Sans|Open+Sans|Gloria+Hallelujah|M+PLUS+1p|Lato|Josefin+Slab|Istok+Web|Indie+Flower|Montserrat|Raleway|Amatic+SC|Caveat|Dancing+Script|Indie+Flower|Kalam|Shadows+Into+Light|Nothing+You+Could+Do&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<style>
body{
    background-image: linear-gradient(rgb(0,0,0,0.5),rgb(0,0,0,0.5)),url(background/bg_9.jpg);
    background-size:100% 30%;
    background-repeat:no-repeat;
    font-family: sans-serif;
    margin:0;
}
.topnav{
position: relative; 
text-decoration:none;
font-size:20px;
font-family: 'Fira Sans','Montserrat', sans-serif;
text-align:right;
margin:2% 10% 10px 0;
background-color:transparent;
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


@media screen and (max-width: 1450px) {
body{
 background-size: 100% 25%;
 transition:1s;
}
#container{
padding:5% 10% 10% 10%;
}
q{
padding:0 0 0 5%;
justify-content: center;
display: flex;
}
}


@media screen and (max-width: 950px) {
body{
 background-size: 100% 20%;
 transition:1s;
}
#container{
padding:50% 10% 10% 10%;
transition:2s;
}
q{
padding:0;
justify-content: center;
display: flex;

}
}
@media screen and (max-width: 750px) {
#container{
padding:10% 10% 10% 10%;
transition:2s;
}
h2{

margin:5% 0 0 0;
width:10px;

}
}
@media screen and (max-width: 650px) {
  .topnav a{
    display: none;
z-index:2;
  }
  .topnav a.icon {
    color:white;
    float: right;
    display: block;
    text-decoration:none;
  }
}
@media screen and (max-width: 650px) {
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
  .topnav.responsive .dropdown {float: none;}  
}




h1{
font-family:'Nothing You Could Do','Kalam', sans-serif;
margin:5% 0 3% 0;
padding-top:5%;
font-size:80px;
padding-bottom:0;
text-align:center;
color:white;
}
p{
font-family: 'Raleway', sans-serif;
color:grey;
font-size:24px;
line-height:2;
}
h2{
justify-content: center;
align-items: center;

font-family: 'Open Sans','Indie Flower';
font-size:30px;
margin:5% 0 0 24%;
opacity:0.8;
color:#000;
width:600px;
font-weight:bold;
}

footer{
  margin: 0 0 0 0;
  background-color: #000;
  padding: 10px;
  color:white;
  text-align:center;
 width:100%;
}

h3{
font-size:40px;
font-family:'Nothing You Could Do';
margin:-1.2% 0 0 4%;
color:#fff;
float:left;
}
h4
{
font-family: 'Raleway', sans-serif;
font-size:20px;
color:grey;
text-align:left;
padding-left:10px;
}

h5
{
align-items: center;
display: flex;
font-family:'Open Sans', sans-serif;
font-size:30px;
color:#3366ff;
text-align:center;
margin-bottom:-30px;
width:600px;
margin-left:25%;
margin-top:10%;
}
.text-center{
text-align:center;
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
span {
    margin-top: 5px;
    display: flex;
    justify-content: center;
    font-size: 15px;
    color: grey;
  }

q{
color:#fff;
font-size:58px;
text-align:center;
margin:0 0 0 0%;
font-family: 'Amatic SC','Roboto Mono', monospace;
}
#writer{
color:#fff;
font-size:20px;
text-align:center;
margin:5px 0 0 45%;
font-family: 'Roboto Mono', monospace;
}



.topnav .icon {
  display: none;
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

.img-head{
width:95%;
height:100vh;
border-radius:5px;
}
.footer_area {
  margin-top:100px;
  background: #000;
  height:20vh;
  margin-bottom:0;
  padding-top:50px;
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


.destination{
margin-top:25%;
}
.heading1{
  text-align: center;
}
.btn-primary{
  border-radius: 5px;
  margin:10px;
  font-size: 16px;
}
.btn-success{
  border-radius: 5px;
  margin:10px;
  font-size: 16px;
}
</style>
 <script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.documentElement.scrollTop > 90) {
    document.getElementById("top").style.padding = "60px 100px 2.5% 0";
    document.getElementById("top").style.margin = "-100px 20px 0 0";
    document.getElementById("a1").style.color = "black";
    document.getElementById("a2").style.color = "black";
    document.getElementById("a3").style.color = "black";
    document.getElementById("a4").style.color = "black";
    document.getElementById("a5").style.color = "black";
    document.getElementById("a6").style.color = "black";
    document.getElementById("a7").style.color = "black";
    document.getElementById("pagename").style.color = "black";
    document.getElementById("top").style.backgroundColor = "#fff";
    document.getElementById("top").style.position = "fixed";
    document.getElementById("top").style.width = "100%";
    document.getElementById("top").style.zIndex = "2";
    document.getElementById("top").style.transition= "4s";
    document.getElementById("top").style.transitionDelay = "2s";
    document.getElementById("top").style.transitionProperty = "height";
    document.getElementById("top").style.boxShadow = "5px 10px 20px grey"; 
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
    document.getElementById("pagename").style.color ="#fff";
    document.getElementById("top").style.transitionDelay = "40ms";
    document.getElementById("ca").style.color = "white";
    
  }
}
function myFunction() {
  var x = document.getElementById("top");
  if (x.className === "topnav") {
    x.className += " responsive";
    document.getElementById("top").style.padding = "50px 0 0 0";
    document.getElementById("top").style.margin = "-100px 20px 0 0";
    document.getElementById("a1").style.color = "black";
    document.getElementById("a2").style.color = "black";
    document.getElementById("a3").style.color = "black";
    document.getElementById("a4").style.color = "black";
    document.getElementById("a5").style.color = "black";
    document.getElementById("a6").style.color = "black";
    document.getElementById("a7").style.color = "black";
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
 }
}

 </script>
</head>
<body>
<section>

<nav class="topnav" id="top">
       
        <a href="index.php"  id="a1">Home</a>
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
          echo "<a href='user.php'  id='a2'>My Account</a>";
       } else { 
            echo "<a href='login.php'  id='a2'>Login</a>";
            echo "<a href='signup.php'  id='a3'>Register</a>";
             } ?>
         <a href="destination.php" class="active" id="a4">Destination</a>
        <a href="hotel.php"  id="a5">Hotel</a>
        <a href="restaurant.php"  id="a6">Restaurant</a>
        <a href="index.php#contact" id="a7">Contact</a>
        <a href="index.php#about-section" id="a8">About</a>
         <h3 id="pagename">Bon Voyage</h3>
        <a href="#" style="font-size:25px;" class="icon" onclick="myFunction()" id="ca">&#9776;</a>    
</nav>  
<h1 style="color:white">Enjoy a Luxury Stay<br><br><br>Hotel</h1>

</section>

 <section class="destination">
    	<div class="container">
    		<div class="row">
          <div class="col-md-12 text-center"><br><br>
          	 <h6><span class="subheading">Suggested Hotel</span>
            <h2 class="mb-4">Find Nearest Hotel</h2></h6>
            <p>Discover a hotel that defines a new dimension of luxury.</p>
        </div>
        <div class="row">
    		<?php
        $query = "SELECT * FROM hotel ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>
        <form method="post" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
          <div class="col-sm-4">
            <div class="project">
              <div class="img">
                <img src="images/<?php echo $row["image"]; ?>" class="img-fluid" alt="Destination"/><br />
                <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
              </div>
              <div class="text-center">
                <h4 class="text-info heading1"><?php echo $row["name"]; ?></h4>
                
                <span>15 Days Tour</span>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
               
                <input type="submit" name="book" class="btn btn-success" value="Book Now" />
                
              </div>
               
            </div>
          </div>
          
        </form>
        <?php
          }
        }
      ?>
      </div>
    </section>
    
<!-- Footer -->
 <footer class="footer_area text-center">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-8  social_widget">
        			
        					<ul class="list">
        						<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        						<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
        						<li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
        						<li><a href="https://github.com/" target="_blank"><i class="fa fa-github"></i></a></li>

        					</ul>
        			</div>
        		</div>
        	</div>
 <div class="row">
         <div class="col-md-12 f_widget ab_widget">
           <div class="border-top">
            <p>
  Copyright &copy; 2019 All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank" >Voyage</a>
           </p>
           </div>
        </div>
     </div>
  </footer>

</body>
</html>