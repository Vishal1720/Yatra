<?php 
include "connection.php";
if(isset($_POST['updbtn']))
{
    if(isset($_POST['emailToUpdate']))
    {
    $idtoupdate=$_POST['emailToUpdate'];
    $res=$con->query("Select * from `user` where email='$idtoupdate' ");
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

<style>.grid-container {
    display: grid;
    grid-template-columns: repeat(4, 0.1fr); /* 4 elements in each row */
    grid-gap: 6px; 
}

.loglbl {
    margin-bottom: 5px; /* Adjust spacing between labels */
}
#updateform
{
    background-color: rgba(20, 33, 61,0.75);
    backdrop-filter: blur(30px);
    padding:20px;
    padding-bottom: 10px;
    border:2px solid white;
}
    </style>

    <?php
    if(isset($updtemail,$updtname,$updtphone,$updtgender,$updtdistrict,$updtaddress,$updtpin))
   {?> 

<form id="updateform" method="post" action="" style="width:50%;margin:auto;margin-bottom:20px;">
<h2 class="loglbl">Update <?php echo $updtemail;?></h2>    
<div class="grid-container">
        <label class="loglbl">Email</label>
        <input id="email1" readonly required type="email" name="upemail" value="<?php echo $updtemail;?>" class="logfields" placeholder="Enter email">
        
        <label class="loglbl">Name</label>
        <input required type="text" name="upname" value="<?php echo $updtname;?>"  class="logfields" placeholder="Enter name">
        
        <label class="loglbl">Phone</label>
        <input required type="text" name="upphone" maxlength="10" pattern="[0-9]" value="<?php echo $updtphone;?>"  class="logfields" placeholder="Enter phone">
        
        <label class="loglbl">Gender</label>
        <input required type="text" name="upgender" value="<?php echo $updtgender;?>" class="logfields" placeholder="Enter gender">
        
        <label class="loglbl">District</label>
        <input required type="text" name="updistrict" value="<?php echo $updtdistrict;?>" class="logfields" placeholder="Enter district">
        
        <label class="loglbl">Address</label>
        <input required type="text" name="upaddress" value="<?php echo $updtaddress;?>" class="logfields" placeholder="Enter address">
        
        <label class="loglbl">Pincode</label>
        <input required type="text" name="uppincode"  value="<?php echo $updtpin;?>" title="Enter valid pin number"  class="logfields" placeholder="Enter pincode">
    </div>
    <button type="submit" style="width:70%;margin-left:15%"  name="updatenewuser"  id="logsubmit" class="logbtn">Update</button>
</form>

<?php } ?>

<?php
if(isset($_POST['updatenewuser']))
{
    $upemail=$_POST['upemail'];
    $upname=$_POST['upname'];
    $upphone=$_POST['upphone'];
    $upgender=$_POST['upgender'];
    $updistrict=$_POST['updistrict'];
    $upaddress=addslashes($_POST['upaddress']);
    $uppincode=$_POST['uppincode'];
    if(isset($upemail,$upname,$upphone,$upgender,$updistrict,$upaddress, $uppincode))
    {
        global $con;
        $query="UPDATE `user` SET `name`='$upname',`gender`='$upgender',
        `phone`='$upphone',`address`='$upaddress',
        `district`='$updistrict',`pincode`='$uppincode'
         WHERE `email`='$upemail'";
         $res=$con->query($query);
         
    }
    else 
    echo "value not passed";
}
?>


