<?php
include "connection.php";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['feedbtn']))
{
$uname=$_POST['username'];
$email=$_POST['email'];
$message=addslashes($_POST['message']);
$query="INSERT INTO `feedbackform`(`username`, `email`, `message`)
 VALUES ('$uname','$email','$message')";
 $res=$con->query($query);
 if($res)
 {
echo "<script>alert('Feedback Submitted successfully');
window.location.href='index.php';
</script>";
 }
 else{
    echo "<script>alert('Error inserting');</script>";
 }
}