<?php 
require "connection.php";//stops execution if connection.php is not found

if(isset($_POST['name']) && isset($_POST['password'])) {
$name=$_POST['name'];
$pass=$_POST['password'];
$logval=$con->query("SELECT * FROM `yatra`.`superadminform` WHERE email='$name' and password='$pass' ");

if($logval->num_rows>=1)
{
  $_SESSION['email']= $name;
    $_SESSION['status']='superadmin';
    Header("Location:superadminhomepage.php");
}
else{
    $res2=$con->query("Select * from `yatra`.`superadminform` where  email='$name'");
 if($res2->num_rows==1)
 {
    echo "<script>alert('password is not correct')</script>";
}
else{echo "<script>alert(' $name is not registered');</script>";}
     
}
$con->close();
}
?>