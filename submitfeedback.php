<?php

include "connection.php";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['feedbtn']))
{
$uname=$_POST['uname'];

$email=$_POST['email'];
$message=addslashes($_POST['message']);

$checkIfRegistered="SELECT * FROM `user` WHERE email='$email';";
$result=$con->query($checkIfRegistered);
if($result->num_rows<=0){
echo "<script>alert('Your email is not registered');alert('Register before giving feedback');
window.location.href='signup.php';
</script>";}

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