<?php 
$servername="localhost";
$username="root";
$password="";
$con=mysqli_connect($servername,$username,$password);

if(!$con)
{
    die("Error");
}