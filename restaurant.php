<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "<script>";
  echo "alert('Welcome to Bon Voyage-Restaurant')";
     echo "</script>";
} else {
 echo "<script>";
  echo "alert('Please Login');";
     echo "</script>";
   
}
$connect = mysqli_connect('localhost','root','','voyage');

if(isset($_POST["add_to_cart"]))
{
     if(isset($_SESSION["order_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["order_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["order_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["order_cart"][$count] = $item_array; 
          }  
          else  
          {  
               echo '<script>alert("Item Already Added")</script>';  
               echo '<script>window.location="restaurant.php"</script>';  
          }  
     }  
     else  
     {  
          $item_array = array(  
               'item_id'               =>     $_GET["id"],  
               'item_name'               =>     $_POST["hidden_name"],  
               'item_price'          =>     $_POST["hidden_price"],  
               'item_quantity'          =>     $_POST["quantity"]  
          );  
          $_SESSION["order_cart"][0] = $item_array;  
     }  
}   
if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["order_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["order_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="restaurant.php"</script>';  
                }  
           }  
      }  
 }  
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Bon Voyage- Restaurant</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Bitter|Dancing+Script|Fira+Sans|Open+Sans|Gloria+Hallelujah|M+PLUS+1p|Lato|Josefin+Slab|Istok+Web|Indie+Flower|Montserrat|Raleway|Amatic+SC|Caveat|Dancing+Script|Indie+Flower|Kalam|Shadows+Into+Light|Nothing+You+Could+Do&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 
</head>

<style>


/* ---------------------------------
1. PRIMARY STYLES
--------------------------------- */

html { font-size: 100%; overflow-x: hidden; width: 100%; margin: 0px; padding: 0px;}

body { font-size: 14px; font-family: 'Open Sans', sans-serif; width: 100%; height: 100%; margin: 0; font-weight: 400;
         word-wrap: break-word; overflow-x: hidden; color: #333; }



h1, h2, h3, .font-beyond { font-family:'Beyond The Mountains','Nothing You Could Do', sans-serif; }

p { line-height: 1.7; font-size: 1.5em; font-weight: 400; color: #555; }

h1 { font-size: 7.5em; line-height: 1.4; }

h2 { font-size: 4em; line-height: 1.4; }

h3 { font-size: 3em; }

h4 {   font-size: 1.8em; }

h5 { font-size: 1.3em; }

h6 {  font-size: .95em; letter-spacing: 1px; }

a, button { display: inline-block; text-decoration: none; color: inherit; line-height: 1.3; -webkit-transition: all .10s ease-in-out; transition: all .10s ease-in-out;}

a:focus, a:active, a:hover,
button:focus, button:active, button:hover,
a b.light-color:hover { text-decoration: none; color: #EF0031;}

b {  font-weight: 700; }

img { width: 100%;}

li { list-style: none; display: inline-block; line-height: 1.6; font-size: 1.1em; }

span { display: inline-block; }

button { outline: 0; border: 0; background: none; cursor: pointer; }

.icon { font-size: 1.1em;display: inline-block;line-height: inherit; }


/* ---------------------------------
3. HEADER
--------------------------------- */

header {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 2;
        padding: 25px 0;
        font-weight: 600;
        color: #fff;
     
}

header .logo {
        float: left;
        height: 70px;
}

header .logo img {
        height: 100%;
        width: auto;
}

header ul.main-menu > li > a {
        height: 100%;
        line-height: 70px;
        padding: 0px 15px;
}



section {
        padding: 100px 0 70px;
}

.heading {
        position: relative;
        text-align: center;
        margin-bottom: 70px;
}

.heading-img {
        height: auto;
        width: 40px;
        margin-bottom: 20px;
}


/*ICONS*/

.icon-gradient{ 
display: block; 
height: 80px; 
width: 80px;  
margin-left:90px;
 }



/* ALIGNMENT */

.float-left {float: left !important;}

.float-right { float: right !important;}

.center-text { text-align: center!important; }

.left-text { text-align: left !important; }

.right-text { text-align: right !important;}







/* MENU-BORDER */

.brdr-b-primary{ border-bottom: 2px solid #EF0031; }
.food-menu{ 

}
.food-menu.active{
 opacity: 0; 
display: block!important; 
animation: full-opacity-anim .3s forwards ;
}


/*SELECTION*/

ul.selecton{ text-align: center;  font-size: 1.2em;  }

ul.selecton li > a{ padding: 15px 30px;   }

ul.selecton li:hover a,
ul.selecton li a.active{ 
border-radius: 3px 3px 0 0;
 background: #EF0031; 
color: #FFFFFF;  }


@keyframes full-opacity-anim{
        100%{ opacity: 1; }
}




.color-light{ color: #cccccc; }

.semi-black{ color: #666666; }



.section1{
background-image:linear-gradient(rgb(0,0,0,0.5),rgb(0,0,0,0.5)),url(background/bg-14.jpg);
height:800px;
position:relative;
margin-top:0 ;
}
.div1{
margin-top:17%;
color:white;
}
.section3{
color:white;
position:relative;
background-image:linear-gradient(rgb(0,0,0,0.7),rgb(0,0,0,0.9)),url(background/bg-15.jpg);
repeat:no-repeat; 
background-size: cover; 
position: relative; 
z-index: 1;
}
.btn1{
border: 1px solid #DC143C;
padding:15px 30px 15px 30px;
color:#DC143C;
background-color:transparent;
color:#fff;
}
.btn1:hover{
color:#fff;
background-color:#DC143C;
}
.a1{
color:#DC143C;
}
.a1:hover{
color:#fff;
}
.menu_pic_left{
height:90px;
width:90px;
float:left;
margin:20px;
}
.menu_pic_right{
height:90px;
width:90px;
float:right;
}
.link{
text-decoration:none;
font-size:16px;
font-family: mountainsre;
color:white;
text-align:right;
margin:20px 15px 15px 20px;
}

.mb-10{
margin:10px;
}
.pr-70{
padding-right:70px;}

.mb-10 {
        margin-bottom: 10px !important;
}
.color-primary {
        color: #EF0031;
}
.mb-30{
margin-bottom:30px;
}
.mt-5{
margin-top:5px;
}
.mt-5{
margin-top:5px;
}
.mt-20{
margin-top:20px;
}
.pb-50{
padding-bottom:50px;}
.pt-70{
padding-top:70px;
}
.font-9 { font-size: .9em; }
.mt-50 {
margin-top:50px;
}

.heading1{
margin-top:30px;
margin-bottom;
}

.footer_area {
  background: #000;
  height:20vh;
  margin-bottom:0;
  margin-left:0px;
  padding-top:40px;
  margin-top:5%;
 }


.ab_widget p {
  font-size: 14px;
  line-height: 24px;
  font-family: "Roboto", sans-serif;
  color: #777777;
  margin-bottom: 30px; }
  .ab_widget p a {
    color: #fa333f; }
  .ab_widget p + p {
    margin-bottom: 0px; }

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


.center-text { text-align: center!important; }

.title1{
float:left;
margin:3px 0 0 20px;

}
.box{
     width:15em;
     height:27em;
}
.btn btn-success{
     margin-right:-50em;
}
.image1{
  height:200px;
}
.btn3{
  float:right;
  padding: 10px 20px 10px 20px;
  font-size: 16px;
}
.remove{
  color:red;
}

.food-item{
    font-size: 17px;
}
.main-menu{
    margin-top: -2%;
    padding: 20px;
    background-color: rgb(0,0,0,0.7);
}
</style>


<body>

<header>
    
 <ul class="main-menu" id="main-menu">
                        <h3 class="title1">Bon Voyage</h3>
                        <li><a href="index.php">HOME</a></li>
                        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
                         echo "<li><a href='user.php'  id='a2'>MY ACCOUNT</a></li>";
                         } else { 
                        echo "<li><a href='login.php'  id='a2'>LOGIN</a></li>";
                         echo "<li><a href='signup.php'  id='a3'>REGISTER</a></li>";
                        } ?>
                         <li><a href="restaurant.php" class="active">RESTAURANT</a></li>
                        <li><a href="destination.php">DESTINATION</a></li>
                        <li><a href="hotel.php">HOTEL</a></li>
                        <li><a href="#menu">MENU</a></li>
                        <li><a href="#services">SERVICES</a></li>
                        <li><a href="index.php#contact">CONTACT</a></li>
                        
                </ul>
       
</header>


<section class="section1">   
        <div class="container">
                
                        <div class="center-text div1">

                                <h5><b>BEST IN TOWN</b></h5>
                                <h1 class="heading1">Restaurant</h1>
                                
                        </div>
                
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text pos-relative section2">
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="heading_logo.png" alt="">
                        <h2>Our Story</h2>
                </div>

                <div class="row">
                        <div class="col-md-12">
                                <p class="mb-30">Eating is an agricultural act and The Perennial is part of a larger movement to make delicious food part of the climate solution.
 At the restaurant, we are creating a market for climate beneficial ingredients and our non-profits are working to make restaurants part of the climate solution. We are committed to uniting fresh, locally grown produce with farm-raised and wild-caught seafood to make the freshest dishes you’ll find anywhere. 
Our signature raw bar offers a variety of Rhode Island oysters, crisp cherrystones, littleneck clams, and jumbo shrimp. </p>
                        </div><!-- col-md-6 -->

                       
                </div><!-- row -->
        </div><!-- container -->
</section>


<section class="section3" id="best-seller">
      
       
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="heading_logo.png" alt="">
                        <h2>Best Sellers</h2>
                </div>

                <div class="row">
                      

                        <div class="col-lg-3 col-md-4  col-sm-6">
                                <div class="center-text mb-30">
                                        <div class="pos-relative"><img src="background/dishes_5.jpg" alt=""></div>
                                        <h5 class="mt-20">Pizza Margherita</h5>
                                        <h4 class="mt-5"><b>$11.90</b></h4>
                                        <h6 class="mt-20"><button class="btn1"><a href="#menu" class="a1"><b>Order Now</b></a></button></h6>
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->

                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="pos-relative"><img src="background/dishes_1.jpg" alt=""></div>
                                        <h5 class="mt-20">Pizza Margherita</h5>
                                        <h4 class="mt-5"><b>$11.90</b></h4>
                                         <h6 class="mt-20"><button class="btn1"><a href="#menu" class="a1"><b>Order Now</b></a></button></h6>
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->

                        

                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="pos-relative"><img src="background/dishes_2.jpg" alt=""></div>
                                        <h5 class="mt-20">Pizza Margherita</h5>
                                        <h4 class="mt-5"><b>$11.90</b></h4>
                                        <h6 class="mt-20"><button class="btn1"><a href="#menu" class="a1"><b>Order Now</b></a></button></h6>
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->

                        

                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="pos-relative"><img src="background/dishes_4.jpg" alt=""></div>
                                        <h5 class="mt-20">Pizza Margherita</h5>
                                        <h4 class="mt-5"><b>$11.90</b></h4>
                                        <h6 class="mt-20"><button class="btn1"><a href="#menu" class="a1"><b>Order Now</b></a></button></h6>
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->
                </div><!-- row -->

                <h6 class="center-text "><button class="btn1"><a href="#menu" class="a1"><b>SEE TODAYS MENU</b></button></a></h6>
        </div><!-- container -->
</section>
<section class="counter-section section center-text" id="services">
        <div class="container">
                <div class="row">
                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30 ">
                                        <i class="icon-gradient"><img src="background/icon-1.png"></i>
                                        <h2><b><span class="counter-value">574</span></b>
                                        </h2>
                                        <h5 class="semi-black"><b>Pizza per day</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30">
                                        <i class="icon-gradient"><img src="background/icon-2.png"></i>
                                        <h2><b><span class="counter-value">127</span></b>
                                        </h2>
                                        <h5 class="semi-black"><b>Sea Food Dshes</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30">
                                        <i class="icon-gradient"><img src="background/icon-3.png"></i>
                                        <h2><b><span class="counter-value">51</span></b></h2>
                                        <h5 class="semi-black"><b>Pasta Chefs</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                        <div class="col-sm-6 col-md-3">
                                <div class="mb-30">
                                        <i class="icon-gradient"><img src="background/icon-4.png"></i>
                                        <h2><b><span class="counter-value" >72</span></b>
                                        </h2>
                                        <h5 class="semi-black"><b>Salads per day</b></h5>
                                </div><!-- margin-b-30 -->
                        </div><!-- col-md-3-->

                </div><!-- row-->
        </div><!-- container-->
</section><!-- counter-section-->


<section>
        <div class="container" id="menu">
                <div class="heading">
                        <img class="heading-img" src="background/heading_logo.png" alt="">
                        <h2>Our Menu</h2>
                </div>
                <div class="col-sm-12">
                                <ul class="selecton brdr-b-primary mb-70">
                                        <li><a class="active" href="#" data-select="*" ><b>MENU</b></a></li>
                                </ul>
                        </div><!--col-sm-12-->
                
               <div class="container" style="width:90%">
     
    
     <br><br><br><br><br><br><br>
     <?php
     $query = "SELECT * FROM foodlist ORDER BY id ASC";
     $result = mysqli_query($connect, $query);
     if(mysqli_num_rows($result) > 0)
     {
          while($row = mysqli_fetch_array($result))
          {
     ?>
     
     <div class="col-md-3">
          <form method="post" action="restaurant.php?action=add&id=<?php echo $row["id"]; ?>">  
               <div class="box" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:18px; width:100%; height: 65%;" align="center">  
               <img src="images/<?php echo $row["image"]; ?>" class="img-responsive image1" /><br />  
               <h4 class="food-item"><?php echo $row["name"]; ?></h4>  
               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
               <input type="text" name="quantity" class="form-control" value="1" />  
               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                </div>  <br><br>
          </form>  
     </div>
   
     <?php  
          }  
     }  
     ?>  
     
       </div>

                
        </div><!-- container -->
</section>
<section>
        <div class="container" id="order">
                <div class="heading">
                        <img class="heading-img" src="background/heading_logo.png" alt="">
                        <h2>Feeling Hungry?</h2>
                </div>

                

               <div class="row">
                        <div class="col-sm-12">
                                <ul class="selecton brdr-b-primary mb-70">
                                        <li><a class="active"><b>Order Now</b></a></li>
                                </ul>
                                <div style="clear:both">
                <br />  
                <h3 style="line-height: 1.7; font-size: 2em; ">Order Details</h3>  
                <div class="table-responsive" >  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="4%" >Item Name</th>  
                               <th width="2%">Quantity</th>  
                               <th width="5%">Price</th>  
                               <th width="5%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          
                          <?php   
                          if(!empty($_SESSION["order_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["order_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td class="remove"><a href="restaurant.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          
                          <?php  
                          }  
                          ?>  
                     </table>
                     <div>
                     <form action="pay.html">
                     <button type="submit" name="payment" style="margin-top:5px; margin-right:2em;" class="btn btn-success btn3">Pay Now</button> 
                     </form>
                     
          </div>
                </div>  
           </div>
                        </div><!--col-sm-12-->
                </div><!--row-->
</section>

<!-- Footer -->
 <footer class="footer_area text-center" id="contact">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-8 col-xs-10 social_widget">
        			
        					<ul class="list">
        						<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        						<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
        						<li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
        						<li><a href="https://github.com/" target="_blank"><i class="fa fa-github"></i></a></li>

        					</ul>
        			</div>
        		</div>
        	</div>
 <div class="row pt-5 mt-5 text-center">
         <div class="col-md-12 f_widget ab_widget">
           <div class="border-top pt-5 ">
            <p>
  Copyright &copy; 
  <script>
  document.write(new Date().getFullYear());
  </script>
  All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank" >Voyage</a>
           </p>
           </div>
        </div>
     </div>
  </footer>

</body>
</html>
