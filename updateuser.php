<?php 
include "connection.php";
if(isset($_POST['updbtn']))
{
    if(isset($_POST['emailToUpdate']))
    {
    $idtoupdate=$_POST['emailToUpdate'];
    $res=$con->query("Select * from `regform` where email='$idtoupdate' ");
foreach($res as $userinfo)
{
    $updtemail= $userinfo['email'];
    $updtname=$userinfo['name'];
    $updtgender = $userinfo['gender'];
    $updtphone= $userinfo['phone'];
    $updtdistrict= $userinfo['district'];
    $updtaddress=$userinfo['address'];
    $updtpin=$userinfo['pincode'];
}
    }
}

?>
<link rel="stylesheet" href='index.css'>
<style>.grid-container {
    display: grid;
    grid-template-columns: repeat(4, 0.1fr); /* 4 elements in each row */
    grid-gap: 6px; /* Adjust as needed for spacing between elements */
}

.loglbl {
    margin-bottom: 5px; /* Adjust spacing between labels */
}

    </style>
    <?php
    if(isset($updtemail,$updtname,$updtphone,$updtgender,$updtdistrict,$updtaddress,$updtpin))
    echo "
<form id='updateform' method='post' action='' style='width:50%;margin:auto'>
    <div class='grid-container'>
        <label class='loglbl'>Email</label>
        <input id='email1' required type='email' name='upemail' value='$updtemail' class='logfields' placeholder='Enter email'>
        
        <label class='loglbl'>Name</label>
        <input required type='text' name='upname' value='$updtname'; class='logfields' placeholder='Enter name'>
        
        <label class='loglbl'>Phone</label>
        <input required type='text' name='upphone' pattern='{10}[0-9]' value='$updtphone'  class='logfields' placeholder='Enter phone'>
        
        <label class='loglbl'>Gender</label>
        <input required type='text' name='upgender' value='$updtgender'; class='logfields' placeholder='Enter gender'>
        
        <label class='loglbl'>District</label>
        <input required type='text' name='updistrict' value='$updtdistrict'; class='logfields' placeholder='Enter district'>
        
        <label class='loglbl'>Address</label>
        <input required type='text' name='upaddress' value='$updtaddress'; class='logfields' placeholder='Enter address'>
        
        <label class='loglbl'>Pincode</label>
        <input required type='text' name='uppincode'  value='{$updtpin}'title='Enter valid pin number'  class='logfields' placeholder='Enter pincode'>
    </div>
    <button type='submit' name='updatenewuser'  id='logsubmit' class='logbtn'>Submit</button>
</form>
";
if(isset($_POST['updatenewuser']))
{
    $upemail=$_POST['upemail'];
    $upname=$_POST['upname'];
    $upphone=$_POST['upphone'];
    $upgender=$_POST['upgender'];
    $updistrict=$_POST['updistrict'];
    $upaddress=$_POST['upaddress'];
    $uppincode=$_POST['uppincode'];
    if(isset($upemail,$upname,$upphone,$upgender,$updistrict,$upaddress, $uppincode))
    {
        global $con;
        $query="UPDATE `regform` SET `name`='$upname',`gender`='$upgender',
        `phone`='$upphone',`address`='$upaddress',
        `district`='$updistrict',`pincode`='$uppincode'
         WHERE `email`='$upemail'";
         $res=$con->query($query);
         
    }
    else 
    echo "value not passed";
}
?>


