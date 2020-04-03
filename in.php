<?php
$con = mysqli_connect('localhost','root','',);

if(!$con)
{
    echo "Not Connected!";
}
if(!mysqli_select_db($con,'voyage'))
{
    echo "Database not selected!";
}

$Name = $_POST['username'];
$Email = $_POST['email'];
$Phone_no = $_POST['phone_no'];
$Address = $_POST['address'];

$sql = "INSERT INTO order_placed (username,email,phone_no,address) VALUES('$Name','$Email','$Phone_no','$Address')";

if(!mysqli_query($con,$sql))
{
     echo "Order Not Placed...Try Again!";
}
else
{
    echo "<script>alert('Order Placed Successfully!');</script>";
}
header("refresh:2; url=restaurant.php");
?>
