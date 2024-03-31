<?php
require 'connection.php';
$title=$_POST['title'];
$desc=$_POST['desc'];
$cover=$_POST['cover'];
$date=$_POST['dt'];
$pickup=$_POST['pickup'];
$drop=$_POST['drop'];
$cost=$_POST['cost'];

if(isset($title) && isset($desc) && isset ($cover) && isset($date) && isset($pickup) && isset($drop) && isset($cost))
{

//echo "$title $desc $cover $date $pickup $drop $cost";
$query="INSERT INTO `tpackages` (`title`, `description`, 
`cover`, `date`, `pickuplocation`, `droplocation`, `cost`)
 VALUES ('$title','$desc','$cover','$date',
 '$pickup','$drop','$cost') ";

 if(!$con->query($query))
 {
die("End");
 }
 echo "<script>alert('Inserted Successfully');window.location.href='adminhomepage.php'</script>";
}