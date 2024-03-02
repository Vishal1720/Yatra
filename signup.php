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


//checking for duplicate entries for email
$query2=$con->query("SELECT * FROM `yatra`.`regform` WHERE email='$email' ");
if($query2->num_rows>=1)
{
   echo "<script>alert('Email already exists. Please try another one')</script>";
    exit();
}
else{
$query="INSERT INTO `yatra`.`regform`(`email`, `name`, `password`, `gender`, `phone`, `address`, `district`, `pincode`) 
VALUES 
('$email','$fullname','$password','$gender','$phone','$address','$dist','$pincode')";
$res=$con->query($query);

if(!$res)
{
   die("error");
}
else{
   Header("location:login.php");
}

}
$con->close();