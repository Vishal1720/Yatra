<?php
include "connection.php";

if($_SESSION['status'] == 'user')
{
$uemail=isset($_SESSION["email"])?$_SESSION["email"]:null;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $noOfPeople=isset($_POST['noOfPerson'])?$_POST['noOfPerson']:1;
    echo $noOfPeople;
    
$packid=isset($_POST["packid"])?$_POST["packid"]:null;
$totalCost=isset($_POST["cost"])?$_POST["cost"]:null;;
if(isset($packid,$uemail,$totalCost))
{
    
    $userDetailsQuery="SELECT * FROM `user` WHERE `email`='$uemail';";
    $userDetails=$con->query($userDetailsQuery);
    $userDetails=$userDetails->fetch_assoc();
    $uname=$userDetails['name'];

    $packageDetailsQuery="SELECT * FROM `tpackages` WHERE ID='$packid';";
    $packageDetails=$con->query($packageDetailsQuery);
    $packageDetails=$packageDetails->fetch_assoc();

    $packname=addslashes($packageDetails['title']);

    $packpickup=addslashes($packageDetails['pickuplocation']);

    $packdrop=addslashes($packageDetails['droplocation']);


    $insertquery="INSERT INTO `bookedpackages`(`useremail`, 
    `packageid`, `uname`, `droploc`, `pickup`,`people`,`totalcost`,`payid`)
     VALUES ('$uemail','$packid','$uname','$packdrop',
     '$packpickup','$noOfPeople','$totalCost','{$_POST['payid']}')";
if($con->query($insertquery))
{
    echo "<script>
    alert('You have successfully booked $packname  package');
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
    echo "<script>
    alert('Dear user please login since you are not logged in properly');
    window.location.href='login.php';</script>";
}
