<?php
$servername="localhost";
$username="root";
$password="";
$con=mysqli_connect($servername,$username,$password);

if(!$con)
{
   die("Done"); 
}
echo "Connection done";


$name= $_POST['name'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$address=$_POST['address'];
$pincode=$_POST['pin'];
$dist=$_POST['district'];
$fullname=$name." ".$lname;


$query="INSERT INTO `yatra`.`regform`(`email`, `name`, `password`, `gender`, `phone`, `address`, `district`, `pincode`) 
VALUES 
('$email','$fullname','$password','$gender','$phone','$address','$dist','$pincode')";
$res=$con->query($query);

if(!$res)
{
   die("error");
}
else{
   Header("location:login.html");
}
echo "<h1>Fname-$name Lname-$lname -Email-$email -Phone$phone
 -gender$gender pass$password 
address$address pincode$pincode district$dist</h1>";
$con->close();