<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
session_start();
$conn=mysqli_connect("localhost", "root", "", "voyage");
$name1=$_SESSION['name'];
$price1=$_SESSION['price'];
$image1=$_SESSION['image'];
$user=$_SESSION['username'];
if(isset($_POST["book1"]))
{
  $from_date=$_POST['from_date'];
  $to_date=$_POST['to_date'];
  $cur_date = date('d').date('m').date('y');
  $invoice = '#ref'.$cur_date;
  $customer_id = rand(00000 , 99999);
  $uref = $invoice.'-'.$customer_id;
  
  $sql = "INSERT INTO destination (username,place,from_date,return_date,ref) VALUES ('$user','$name1','$from_date','$to_date','$uref')";
         #"UPDATE signup1 SET destination='$name1' where username='$user'";
         if ($conn->query($sql) === TRUE){
           echo '<script>alert("Booking Confirmed!")</script>';
         }
         else{
            echo '<script>alert("Booking Failed!")</script>';
         }
}

if(isset($_POST["cancel"]))
{
  
       unset($_SESSION['name']);
       unset($_SESSION['price']);
       unset($_SESSION['image']);
        echo '<script>alert("Booking Cancelled")</script>';
        echo '<script>window.location="destination.php"</script>';   
  
} 
 ?>

  <head>
    <style>
    body{
    z-index: 1;
    font-family: sans-serif;
    margin-top:100px;
}
#pagename{
  font-family:'Nothing You Could Do';
  margin:-0.5% 0 0 4%;
  font-size: 32px;
  float: left;
}
.topnav{
position: fixed;
width: 100%; 
text-decoration:none;
font-size:20px;
font-family: 'Fira Sans','Montserrat', sans-serif;
text-align:right;
margin:0;
height: 10%;
background-color:#fff;
box-shadow:5px 10px 20px grey; 
padding: 20px 0  20px 0;
z-index: 2;
}


.topnav a{
text-decoration:none;
font-size:18px;
font-family: 'Montserrat', sans-serif;
color:#000;
text-align:right;
padding-top:2%;
margin:20px 15px 15px 20px;
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

h3{
font-size:40px;
font-family:'Nothing You Could Do';
color:#fff;
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

footer{
  margin: -5% 0 0 -10%;
  background-color: #000;
  padding: 10px;
  color:white;
  text-align:center;
 width:120%;
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
.img-fluid1{
width:95%;
height:80vh;
border-radius:5px;
overflow:hidden;

}
.container{
  padding-top: 10%;
}
.btn-success{
  border-radius: 5px;
  margin:10px;
  font-size: 16px;
}
.btn-danger{
  border-radius: 5px;
  margin:10px;
  font-size: 16px;
}
#from_date, #to_date{
  width:40%;
}
</style>
    <title>Bon Voyage - Booking Destination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Bitter|Dancing+Script|Fira+Sans|Open+Sans|Gloria+Hallelujah|M+PLUS+1p|Lato|Josefin+Slab|Istok+Web|Indie+Flower|Montserrat|Raleway|Amatic+SC|Caveat|Dancing+Script|Indie+Flower|Kalam|Shadows+Into+Light|Nothing+You+Could+Do&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  </head>
 
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
	  
	  
 <body>
    <section class="ftco-section ftco-services-2 ftco-no-pt">
      <div class="container">
        <div class="row">
        	<div class="col-md-12 tour-wrap mb-5">
    				<div class="row">
    					<div class="col-md-6 d-flex ftco-animate">
    						<img src="images/<?php echo $image1; ?>" class="img-fluid1" alt="Hotels">
    					</div>
    					<div class="col-md-6 ftco-animate">
    						<div class="text py-5">
    						
    						  <h3 class="text-info heading1"><?php echo $name1; ?></h3>
    							<p><?php echo $name1; ?> is the perfect home base for any tourist.  It's where the beautiful beaches, shopping, tons of restaurants and lot of tour options. Stay in hotel (4 night stay).
It caught our attention for a few reasons: much smaller crowd, sleepy colorful towns and beach club, mineral water, plenty of museums, aqueducts, fountains, churches, palaces, historical buildings, the monuments and easy ability to explore on your own with car. </p>
    							
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-12 tour-wrap">
    				<div class="day-wrap">
    					<h3 class="pl-5">Day 1</h3>
    					<p>Its the one of the most beautiful city in the world. <?php echo $name1; ?> is graceful place travel is considered to be very safe travel by both Italians standards and as well as larger international standards.  Children are welcome as visitors with families. College-age student travel to the area alone or with friends. </p>
    					
    				</div>
    			</div>
    			<div class="col-md-12 tour-wrap">
    				<div class="day-wrap">
    					<h3 class="pl-5">Day 2</h3>
    					<p><?php echo $name1; ?> is one of the most important tourist destinations of the world, due to the incalculable immensity of its archaeological and art treasures, as well as for the charm of its unique traditions, the beauty of its panoramic views, and the majesty of its magnificent "villas" (parks).   It became a worldwide centre of pilgrimage, and later in the Renaissance, as the city became a major capital of the arts, education, philosophy and trade.</p>
    				</div>
    			</div>
    			<div class="col-md-12 tour-wrap">
    				<div class="day-wrap">
    					<h3 class="pl-5">Day 3</h3>
    					<p>Get up bright and early on the first of your 2 days in <?php echo $name1; ?>, grab a croissant, and head to the Arc du Triomphe. This is one of the icons of <?php echo $name1; ?> and is not to be missed. This giant structure was built in the early 1800s.</p>
    				</div>
    			</div>
    			
    		<div class="container" id="#details"> 
        <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
    			<div class="col-md-12 tour-wrap">
            <p class="text-danger">Booking Details</p>
    				<table class="table">
					    <tbody>
					      <tr>
				      	  <th scope="row"><h4>Destination</h4></th>
					        <td>
					        	<p><?php echo $name1; ?></p>
					        </td>
					        <td></td>
					      </tr><!-- END TR-->

					      <tr><div class="input-daterange">
				      	  <th scope="row"><h4>Departure Date</h4></th>
					        <td>
					        	<p><input type="date" name="from_date" id="from_date" class="form-control" required/></p>
					        </td>
					        </div>
					      </tr><!-- END TR-->

					      <tr>
				      	  <th scope="row input-daterange"><h4>Return Date</h4></th>
					        <td>
					        	<p><input type="date" name="to_date" id="to_date" class="form-control" required="" /></p>
					        </td>
					        <td></td>
					      </tr><!-- END TR-->
                 <tr>
                  <th scope="row"><h4>Package Price</h4></th>
                  <td>
                    <p>Approximately $<?php echo $price1; ?></p>
                  </td>
                  <td></td>
                </tr><!-- END TR--> 
					      <tr>
				      	  <th scope="row"><h4>Included</h4></th>
					        <td class="d-flex">
					        	<ul>
					        		<li><h4>Airfare</h4></li>
					        		<li><h4>5 star accomodation</h4></li>					 
					        		<li><h4>Local transportation</h4></li>
					        		
					        	</ul>
					        </td>
					        <td></td>
					      </tr><!-- END TR-->

					      
					    </tbody>
					  </table>
    			</div>
        
    			<div class="col-md-12 tour-wrap">
            
            <p><input type="submit" name="book1" class="btn btn-success" value="Book Now" /> 
		    <button name="cancel" class="btn btn-danger" >Cancel Booking</button>
          </div>
          </form>
         </div>     
 <br><br><br><br><br><br>
       <!-- Footer -->
 <footer class="footer_area text-center">
          
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
          
 <div class="row">
         <div class="col-md-12 f_widget ab_widget">
           <div class="border-top">
            <p>
  Copyright &copy; 2019 All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank" >Bon Voyage</a>
           </p>
           </div>
        </div>
     </div>
  </footer>

  
  </body>
</html>
