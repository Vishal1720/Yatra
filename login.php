<?php $servername="localhost";
$user="root";
$password="";
$con=mysqli_connect($servername,$user, $password);

if(!$con)
{
    die("Error");
}
echo "Hello";
$name=$_POST['name'];
$pass=$_POST['password'];
$logval=$con->query("SELECT * FROM `yatra`.`regform` WHERE email='$name' and password='$pass' ");

if($logval)
{
    Header("Location:userhomepage.html");
}
else{
    echo 'alert("Error  in login");';
}
