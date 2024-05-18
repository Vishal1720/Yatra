<?php 
if(isset($_POST['name']) && isset($_POST['password'])) {
include 'connection.php';

if(!$con)
{
    die("Error");
}

$name=$_POST['name'];
$pass=$_POST['password'];
$logval=$con->query("SELECT * FROM `adminregform` WHERE email='$name' and password='$pass' ");

if($logval->num_rows>=1)
{
    session_start();
    $_SESSION['email']= $name;
    $_SESSION['status']='admin';
    Header("Location:adminhomepage.php");
}
else{
    $res2=$con->query("Select * from `yatra`.`regform` where  email='$name'");
 if($res2->num_rows==1)
 {echo "<script>alert('password is not correct');
    window.location.href='adminlogin.html'</script>";}
else{echo "<script>alert(' $name is not registered as an admin');
    window.location.href='adminlogin.php';</script>";}
     
}
$con->close();
}
