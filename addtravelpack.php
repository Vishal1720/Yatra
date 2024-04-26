<?php

require 'connection.php';
/*I have added addslashes to add slashes to quotes i.e escape special characters
 so now it allows quotes also and not throw errors*/
$title=addslashes($_POST['title']);
$desc=addslashes($_POST['desc']);

$date=$_POST['dt'];
$pickup=addslashes($_POST['pickup']);
$drop=addslashes($_POST['drop']);
$cost=$_POST['cost'];

if(isset($title) && isset($desc)    && isset($date) && isset($pickup) && isset($drop) && isset($cost))
{

 if (isset($_FILES["cover"]) && $_FILES["cover"]["error"] == 0) {
    $cover = addslashes(file_get_contents($_FILES["cover"]["tmp_name"]));

} else {
    echo "Error"; 
}

$query="INSERT INTO `tpackages`
 (`title`, `description`, `cover`, `date`, `pickuplocation`, `droplocation`, `cost`)
  VALUES ('$title','$desc','$cover','$date','$pickup','$drop','$cost') ";
$res = $con->query($query);

 if(!$res)
 {
die('Insertion failed');
 }

 if($_SESSION['status'] == 'admin' and isset($_SESSION['email']))
 echo "<script>alert('Inserted Successfully');window.location.href='adminhomepage.php'</script>";

 if($_SESSION['status'] == 'superadmin' and isset($_SESSION['email']))
 echo "<script>alert('Inserted Successfully');window.location.href='superadminhomepage.php'</script>";

}