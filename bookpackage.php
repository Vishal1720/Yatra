<?php
include "connection.php";
if($_SESSION['status'] == 'user')
{
$uemail=isset($_SESSION["email"])?$_SESSION["email"]:null;
if($_SERVER['REQUEST_METHOD']=='POST')
{
$packid=isset($_POST["packid"])?$_POST["packid"]:null;
if(isset($packid,$uemail))
{
    $userDetailsQuery="SELECT * FROM `regform` WHERE `email`='vishal198shetty@gmail.com';";
    $userDetails=$con->query($userDetailsQuery);
    $userDetails=$userDetails->fetch_assoc();
    $uname=$userDetails['name'];

    $packageDetailsQuery="SELECT * FROM `tpackages` WHERE ID='$packid';";
    $packageDetails=$con->query($packageDetailsQuery);
    $packageDetails=$packageDetails->fetch_assoc();

    $packname=$packageDetails['title'];

    $packpickup=$packageDetails['pickuplocation'];

    $packdrop=$packageDetails['droplocation'];

    $insertquery="INSERT INTO `bookedpackages`(`useremail`, `packageid`, `uname`, `droploc`, `pickup`) VALUES ('$uemail','$packid','$uname','$packdrop','$packpickup')";
if($con->query($insertquery))
{
    echo "<script>
    alert('Successfully inserted');
    window.location.href='userhomepage.php';</script>";  
}
}
else
{
echo "No val for user email or pack id";
}

}
}
else{
    echo "<script>alert('Dear user please login since you are not logged in properly');
    window.location.href='login.php';</script>";
}