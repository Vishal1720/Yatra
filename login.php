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

if($logval->num_rows>=1)
{
    Header("Location:userhomepage.html");
}
else{
    Header("Location:login.html");
    echo '<script>window.alert("Error  in login");</script>';
     
}
