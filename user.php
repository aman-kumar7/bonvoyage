<?php
error_reporting(0);
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
}
else{   
    echo "<script>";
  echo "alert('Please log in first to see this page.')";
     echo "</script>";
    header("Location: login.php");
}     
$conn=mysqli_connect('localhost','root','','voyage');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user=$_SESSION['username'];
$sql = "SELECT firstname,lastname,username,password,email,phone,gender,birthday,dp FROM signup1 WHERE username='$user'";
           $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            // output data of each row
                         while($row = $result->fetch_assoc()) {
                            $firstname=$row["firstname"];
                            $lastname=$row["lastname"];
                            $username=$row["username"];
                            $password=$row["password"];
                            $email=$row["email"];
                            $phone=$row["phone"];
                            $gender=$row["gender"];
                            $birthday=$row["birthday"];
                            $dp=$row["dp"];
                          
                        }
                    }

 
 $firstnameErr=$lastnameErr=$usernameErr=$passwordErr=$emailErr=$phoneErr=$genderErr=$birthdayErr="";    
 if($_POST['save'])
 {
   
     if(empty($_POST["firstname"]))
            {
                $firstnameErr = "Firstname is required";
            }
            else{
               $fname=test_input($_POST["firstname"]);
            }
            if(empty($_POST["lastname"]))
            {
                $lastnameErr = "Lastame is required";
            }
            else{
                $lname = test_input($_POST["lastname"]);
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
                $email1 = test_input($_POST["email"]);
            }

            if (empty($_POST["phone"])) 
            {
                $phoneErr = "Phone Number is required";
            } 
            else {
                $phone1 = test_input($_POST["phone"]);
            }
            
            if (empty($_POST["gender"])) 
            {
                $genderErr = "Gender is required";
            } 
            else {
                $gender1 = test_input($_POST["gender"]);
            }
            if(empty($_POST["birthday"]))
            {
                $birthdayErr = "Birthday is required";
            }
            else{
                $birthday1 = test_input($_POST["birthday"]);
            }
 
             if(!empty($fname) && !empty($lname) && !empty($email1) && !empty($phone1) && !empty($birthday1) && !empty($gender1)){
        $query="UPDATE signup1 SET firstname='$fname',lastname='$lname',email='$email1',phone='$phone1',gender='$gender1',birthday='$birthday1' WHERE username='$user'";
        $result=mysqli_query($conn,$query);
        if($result){
         echo "<script>";
         echo "alert('Record Updated Successfully')";
         echo "</script>";
         header("Refresh:0");
     }
    else{
     echo "<script>";
     echo "alert('Failed to Update Records')";
     echo "</script>";
    }
  }
} 
 
  if($_POST['savepassword'])
 {

    $code1=$_POST['password'];
     $pass = hash('md5', $code1);
    $query="UPDATE signup1 SET password='$pass' WHERE username='$user'";
    $result=mysqli_query($conn,$query);
    if($result){
         echo "<script>";
         echo "alert('Password Updated Successfully')";
         echo "</script>";
         header("Refresh:0");
     }
    else{
     echo "<script>";
     echo "alert('Failed to Update Password')";
     echo "</script>";
    }
   } 

  if($_POST['delete']){
   
 $query="DELETE FROM signup1 WHERE username ='$user'";
 $result=mysqli_query($conn,$query);
 if($result){
    echo "<script>alert('Account deleted');</script>";
    
   header("Location: login.php");
}
else{
    echo "<script>alert('Failed to delete Account');</script>";
}
}

if($_POST['upload']){
$target_path = "../voyage/uploads/";  
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
  
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
    $dp=$target_path;
    $query="UPDATE signup1 SET dp='$dp' WHERE username='$user'";
    $result=mysqli_query($conn,$query);
    if($result){ echo "<script>alert('Profile Picture Updated Successfully');</script>";
           }
} else{  
    echo "<script>alert('Failed to Update Profile Picture');</script>";
}  
}

if($_POST['delete1']){
    
     $query="UPDATE signup1 SET dp='' WHERE username='$user'";
    $result=mysqli_query($conn,$query);
    if($result){ 
    echo "<script>alert('Profile Picture Removed Successfully');</script>";
          header("Refresh:0");
           }
else{  
    echo "<script>alert('Profile Picture Failed to Remove');</script>";
}  
}
if($_POST['cancel']){

     $id1=$_POST["hidden_id"];
     $query="DELETE FROM destination WHERE id='$id1'";
    $result=mysqli_query($conn,$query);
    if($result){ 
    echo "<script>alert('Trip Cancelled Successfully');</script>";
          header("Refresh:0");
           }
else{  
    echo "<script>alert('Cancellation Failed');</script>";
}  
}
if($_POST['cancel2']){

     $id2=$_POST["hidden_id2"];
     $query="DELETE FROM booked_room WHERE id='$id2'";
    $result=mysqli_query($conn,$query);
    if($result){ 
    echo "<script>alert('Hotel Booking Cancelled Successfully');</script>";
          header("Refresh:0");
           }
else{  
    echo "<script>alert('Cancellation Failed');</script>";
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



<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
body{
    background: url();
    background-size:cover;
    font-family: sans-serif;
    background-color: #f2f2f2;
    

}
.sidenav{
    margin-top: 20px;
    text-align: left;
    margin-left: 27%;
}
.sidenav1{
    margin-top: 0px;
    width: 80%;
}

.sidenav a{
font-size:20px;
text-decoration: none;
color: #686868;
padding: 10px 0px 10px 7px;
text-align: left;
}
.box1{
    width:75%;
    height: 64%;
    background: rgba(255,255,255, 0.9);
    position: relative;
    display:inline-block;
    box-sizing: border-box;
    transform: translate(20%,21%);
    padding: 30px 20px 10px 40px;
    z-index:1;
    border-radius: 15px;   
    box-shadow: 0px 10px 20px #bac3d1;
    text-align: left;
}
.box2{
    width:75%;
    height: 45%;
    background: rgba(255,255,255, 0.9);
    position: relative;
    display:block;
    box-sizing: border-box;
    transform: translate(53%,50%);
    padding: 30px 20px 10px 40px;
    z-index:1;
    border-radius: 15px;   
    box-shadow: 0px 10px 20px #bac3d1;
    text-align: left;
    margin-bottom: 5%;
}
.box3{
    width:75%;
    height: auto;
    background: rgba(255,255,255, 0.9);
    position: relative;
    display:block;
    box-sizing: border-box;
    transform: translate(53%,50%);
    padding: 30px 20px 30px 40px;
    z-index:1;
    border-radius: 15px;   
    box-shadow: 0px 10px 20px #bac3d1;
    text-align: left;
    margin-bottom: 7%;
    margin-right: 20px;
}
.insidebox1{
    float:left;
    padding-left: 20px;
    width:50%;
}
.insidebox2{
    float:right;
    padding-right: 20px;
    width:50%;
}
.login-box a:hover
{
    color: #39dc79;
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
    width: 25%;
    height: 85%;
    background: rgba(255,255,255, 0.9);
    color: #000;
    position:fixed;
    display: inline-block;
    transform: translate(10%,15%);
    box-sizing: border-box;
    padding: 30px 20px 10px 20px;
    z-index:1;
    border-radius: 15px;   
    box-shadow: 0px 10px 20px #bac3d1;
}

::placeholder {
    color: white;
    opacity: 0.5; 
}
h2{
    margin: 0;
    padding: 0 0 3px 0;
    text-align: center;
    font-size: 24px;
    color:grey;
}

.edit
{
    
    border: none;
    outline: none;
    height: 35px;
    background: #6666ff;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    margin:40px 0 0 12px;
    padding:7px 20px 5px 15px;
}
.save
{
    display:none;
    border: none;
    outline: none;
    height: 35px;
    background: #3CB371;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    margin:40px 0 0 12px;
    padding:7px 15px 5px 15px;
}

.savepassword
{
    display:none;
    border: none;
    outline: none;
    height: 35px;
    background:  #3CB371;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    margin:5px 0 0 12px;
    padding: 7px 15px 6px 15px;
}
.change
{
    border: none;
    outline: none;
    height: 35px;
    background: #6666ff;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    margin:30px 0 0 12px;
    padding: 7px 15px 6px 15px;
}
.upload
{

    border: none;
    outline: none;
    height: 35px;
    background: #3CB371;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    margin:0px 0 14px -4px;
    padding:7px 15px 6px 15px;
    display: inline-block;
}
.delete
{
    border: none;
    outline: none;
    height: 35px;
    background: #FF3F6C;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    margin:30px 0 0 250px;
    padding: 7px 15px 6px 15px;
}
.edit:hover,.change:hover,.upload:hover{
    cursor: pointer;
    opacity: 0.6;
    color: #fff;
}
.delete:hover{
    cursor: pointer;
    opacity: 0.6;
    color: #fff;

}

p{
    font-size: 17px;
    font-family: sans-serif;
    color: grey;
    
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

.insidebox1 input[type="text"],.insidebox2 input[type="text"],.insidebox1 input[type="date"],.insidebox1 input[type="email"],.insidebox2 input[type="number"],.insidebox2 input[type="password"]
{
    border: none;
    background: #fff;
    outline: none;
    height: 40px;
    color: grey;
    font-size: 16px;
}
.loginman {
    width: 55%;
    border-radius: 50%;
    position: relative;
    height: 30%;
 }
.fa-input1 {
  font-family: FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 35px;
  color:#3CB371;
  margin:0;
  
  border-radius: 50%;
} 
.fa-input2 {
  font-family: FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 35px;
  color:#FF3F6C;
  margin:0;
  border-radius: 50%;
} 
.fa-input1:hover,
.fa-input2:hover{
    cursor: pointer;
opacity:0.7;
}
#file{
    opacity: 0;
    position: absolute;
}
#delete1{
    opacity: 0;
    position: absolute;
}
.fa-input {
  font-family: FontAwesome, 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
.error {
  color: #FF0000;
  font-size: 15px;
  text-align: left;
}
.boooking{
  
  width: 20%;
}
</style>

    <title> Bon Voyage- My Account</title>
    </head>
  <body>
<nav><a href="index.php" >Home</a>
<a href="login.php" class="active">My Account</a>
<a href="Signup.php">Register</a>
<div class="dropdown">
    <button class="dropbtn">Book Now</button>
    <div class="dropdown-content">
      <a href="destination.php">Destination</a>
      <a href="hotel.php">Hotel</a>
      <a href="restaurant.php">Restaurant</a>
    </div>
  </div><a href="contact.php">Contact</a>
  <a href="index.php#about-section">About</a>
</nav>  
    
 <div>
 <form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">    
    <div class="login-box">
        <div class="text-center">
        <h2>My Account</h2><br>
                        <img src="<?php if(!empty($dp)){
                            echo $dp;
                        }
                        elseif($gender=='Female'){
                echo 'background/icon2.png';
            } else{
                echo 'background/icon1.jpg'; 
            }?>" alt="loginpicture" class="loginman"><br><br>
            <input type="submit" name="upload" class="upload" id="upload" value="Upload">
            <label for="file"><i class="far fa-plus-circle fa-input1" ></i></label><input type="file" class="file" id="file" name="fileToUpload">
            <label for="delete1"><i class="far fa-minus-circle fa-input2" ></i></label>
            <input type="submit" id="delete1" name="delete1" >
            <h2><?php echo $firstname.' '.$lastname; ?></h2>
            <div class="sidenav">
            <i class="fa fa-user" style='font-size:24px'></i><a href="#box1">Profile</a><br>
            <i class="fa fa-sign-in" style='font-size:24px'></i><a href="#box2">Login Details</a><br>
            <i class="fa fa-plane" aria-hidden="true" style='font-size:24px'></i><a href="#destination">Booked Destination</a><br>
            <i class="fa fa-hotel" aria-hidden="true" style='font-size:24px'></i><a href="#hotel">Booked Hotel</a><br>
            <i class="fa fa-sign-out" style='font-size:24px'></i> <a href="logout.php">Logout</a><br>
           
            </div>
        </div>
    </div>
           <div class="text-right">
               <div class="sidenav1">
            
                <div class="box1" id="box1">
                    <h2 class="text-left">Profile Details</h2> <br>
                    <p class="text-left">Basic info, for better User experience</p><br>
                    <div class="insidebox1"> 
                           
                         <label for="firstname">First name</label>
                         <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>"disabled><br><span class="error"><?php echo $firstnameErr;?></span><br>
                         <label for="email">Email</label>
                         <input type="email" id="email" name="email" value="<?php echo $email; ?>" disabled><br>
                         <span class="error"><?php echo $emailErr;?></span><br>
                         <label for="birthday">Birthday</label>
                         <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>" disabled><br><span class="error"><?php echo $birthdayErr;?></span>
                         
                    </div>
                    <div class="insidebox2">
                        <label for="lastname">Last name</label>
                         <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" disabled><br><span class="error"><?php echo $lastnameErr;?></span><br>
                         <label for="phone">Phone Number</label>
                         <input type="number" id="phone" name="phone" value="<?php echo $phone; ?>" disabled><br>
                         <span class="error"><?php echo $phoneErr;?></span><br>
                         <label for="gender">Gender</label>
                         <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>" disabled><br><span class="error"><?php echo $genderErr;?></span><br>
                    </div>
                  <input type="submit" name="edit" class="edit fa-input" id="edit" value="&#xf040; Edit">
                  <input type="submit" name="save" class="save fa-input" id="save" value="&#xf040; Save">
                
               </div>
               <div class="box2" id="box2">
                   <h2 class="text-left">Login Details</h2> <br>
                    <p class="text-left">Manage your Username and Password</p><br>
            <div class="insidebox1">
              <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" disabled><br>
            </div>
            <div class="insidebox2">     
              <label for="password">Password</label>
             <input type="password" id="password" name="password" value="<?php echo $password; ?>" disabled><br>
            </div>

            <input type="submit" name="change" class="change fa-input" id="change" value="&#xf040; Change Password" >
         <input type="submit" name="savepassword" class="savepassword fa-input" id="savepassword" value="&#xf040; Save Password" >
          <input type="submit" name="delete" class="delete fa-input" id="delete" value="&#xf014; Delete Account">
               </div>
              <div class="box3" id="destination">
               <h2 class="text-left">Booked Destination</h2> <br>
               <p class="text-left">Manage your travel bookings</p><br>
               <div class="row">
                <div class="col-md-3 "><h4>Destination</h4></div>
                <div class="col-md-3"><h4>Departure Date</h4></div>
                <div class="col-md-3"> <h4>Return Date</h4></div>
                </div>
                <?php
                $sql = "SELECT id,place,from_date,return_date FROM destination WHERE username='$user'";
                    $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            // output data of each row
                         while($row = $result->fetch_assoc()) {
                            ?>
                     
              <div class="row">
                <div class="col-md-3 "><h4><?php echo $row["place"]; ?></h4></div>
                <div class="col-md-3"><h4><?php echo $row["from_date"]; ?></h4></div>
                <div class="col-md-3"><h4><?php echo $row["return_date"]; ?></h4></div>  
                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
              <div class="col-md-3"><input type="submit" class="btn btn-danger" name="cancel" value="Cancel Trip"></div>             
              </div>
              <?php
               }
                    }
              
           ?>
           </div>
           <div class="box3" id="hotel">
               <h2 class="text-left">Booked Hotels</h2> <br>
               <p class="text-left">Manage your Hotel bookings</p><br>
           
           <div class="row">
                <div class="col-md-3 "><h4>Hotel</h4></div>
                <div class="col-md-3 "><h4>Room</h4></div>
                <div class="col-md-2"><h4>Check In</h4></div>
                <div class="col-md-2"> <h4>Check Out</h4></div>
                </div>
                <?php
                $sql = "SELECT id,hotel,room,checkin,checkout FROM booked_room WHERE username='$user'";
                    $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                            // output data of each row
                         while($row = $result->fetch_assoc()) {
                            ?>
                     
              <div class="row">
                <div class="col-md-3"><h4><?php echo $row["hotel"]; ?></h4></div>
                <div class="col-md-3"><h4><?php echo $row["room"]; ?></h4></div>
                <div class="col-md-2"><h4><?php echo $row["checkin"]; ?></h4></div>  
                <div class="col-md-2"><h4><?php echo $row["checkin"]; ?></h4></div> 
                <input type="hidden" name="hidden_id2" value="<?php echo $row["id"]; ?>" />
              <div class="col-md-2"><input type="submit" class="btn btn-danger" name="cancel2" value="Cancel"></div>             
              </div>
              <?php
               }
                    }
              
           ?>
         </div>
   </form>
</div>

<script>
$(document).ready(function(){
  $("#edit").click(function(){
    $("#firstname,#lastname,#email,#phone,#gender,#birthday").removeAttr("disabled");
    //$("#firstname,#lastname,#email,#phone,#gender").attr("border","1px solid black");
     return false;
  });
 
  $("#edit").click(function(){
     $("#edit").hide();
     $("#save").show();
      return false;
  });
  $("#save").click(function(){
    $("#edit").show();
    $("#save").hide();
     return true;
  }); 

  $("#save").click(function(){
    $("#firstname,#lastname,#email,#phone,#gender.#birthday").attr("disabled", true);
     return false;
  });
  $("#change").click(function(){
    $("#password").removeAttr("disabled");
     return false;
  });

  $("#change").click(function(){
     $("#change").hide();
     $("#savepassword").show();
      return false;
  });
  $("#savepassword").click(function(){
    $("#change").show();
    $("#savepassword").hide();
     return true;
  });
 $("#savepassword").click(function(){
    $("#password").attr("disabled", true);
     return true;
  }); 
});
</script>
    </body>
</html>

<!--
$('.edit').click(function() {
    $('.edit').hide();
    $('.save').show();
 });
 $('.save').click(function() {
    $('.save').hide();
    $('.edit').show();
        
});
$(document).ready(function(){
-->