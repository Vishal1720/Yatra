<?php 
$servername="localhost";
$username="root";
$password="";
$db="yatra";
$con=mysqli_connect($servername,$username,$password,$db);

if(!$con)
{
    die("Error");
}