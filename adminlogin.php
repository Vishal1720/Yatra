<?php 
if(isset($_POST['name']) && isset($_POST['password'])) {
$servername="localhost";
$user="root";
$password="";
$con=mysqli_connect($servername,$user, $password);

if(!$con)
{
    die("Error");
}

$name=$_POST['name'];
$pass=$_POST['password'];
$logval=$con->query("SELECT * FROM `yatra`.`adminregform` WHERE email='$name' and password='$pass' ");

if($logval->num_rows>=1)
{
    Header("Location:adminhomepage.html");
}
else{
    $res2=$con->query("Select * from `yatra`.`regform` where  email='$name'");
 if($res2->num_rows==1)
 {echo "<script>alert('password is not correct')</script>";}
else{echo "<script>alert(' $name is not registered as an admin');</script>";}
     
}
$con->close();
}
