<?php
include "connection.php";
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
$phone=$_POST['phone'];
if(isset($name) and isset($email) and isset($pass) and isset($phone))
{
$query="INSERT INTO `adminregform`(`email`, `name`, `password`, `contact`) 
VALUES ('$email','$name','$pass','$phone')";
$query2="Select * from `adminregform` where email='$email'";//checking if email is already registered
$res2=$con->query($query2);
if($res2->num_rows == 0)
{
$res=$con->query($query);
if($res)
{
    echo "<script>alert('{$name} has been added as admin');
    window.location.href='superadminhomepage.php';</script>";
}
else{
    echo "<script>alert('Error in Inserting');
    window.location.href='superadminhomepage.php';</script>";
}

}
else
{
    echo "<script>alert('$email is already registered');
    window.location.href='superadminhomepage.php'</script>";
}
}