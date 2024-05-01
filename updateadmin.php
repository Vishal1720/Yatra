<?php
include "connection.php";
if(isset($_POST['updadminbtn']))
{
    if(isset($_POST['adminemailToUpdate']))
    {
        $adminemail= $_POST['adminemailToUpdate'];
        $res=$con->query("Select * from `adminregform` where email='$adminemail' ");
        if($res->num_rows >=1)
        {
            foreach($res as $item)
              {
                 $adminphone= $item['contact'];
                 $adminname= $item['name'];
              }
        }
       
    }
}
?><link rel="stylesheet" href="index.css">
<style>
    .container{
        display: grid;
        grid-template-columns: repeat(4,0.2fr);
        grid-gap:7px ;
        width: min-content;
        place-items: center;
    }
    #upAdminForm{
        background-color: rgba(12,12,12,0.8);
        backdrop-filter: blur(10px);
        padding:20px;
        border-radius: 4px;
    }
</style><?php
if(isset($adminemail,$adminphone,$adminname))
echo "
<form  method='post' id='upAdminForm' action='' style='width:50%;margin:auto;margin-bottom:20px;'>
<h2 class='loglbl'>Update Admin</h2>
<div class='container'>
        <label class='loglbl'>Email</label>
        <input  readonly required type='email' name='upadminemail' value='$adminemail' class='logfields' placeholder='Enter email'>
        <label class='loglbl'>Contact</label>
        <input   required type='text' name='upadmincontact' value='$adminphone' title='Enter valid 10 digit number' pattern='[0-9]{10}'  
        value='$adminemail' class='logfields' placeholder='Enter phone number'>
        <label class='loglbl'>Name</label>
        <input   required type='text' name='upadminname'   value='$adminname' class='logfields' placeholder='Enter phone number'>
        <button type='submit' id='logsubmit'class='logbtn' style='width:100%;' name='updateadminbtn'>Update</button>
        </div></form>";
        if(isset($_POST['updateadminbtn']))
        {
            
             if(isset($_POST['upadminemail'],$_POST['upadmincontact'],$_POST['upadmincontact']))
           {
            $ademail=$_POST['upadminemail'];
             $adphone=$_POST['upadmincontact'];
             $adname=$_POST['upadminname'];
             $upadquery="UPDATE `adminregform` SET `email`='$ademail',`name`='$adname',`contact`='$adphone' WHERE `email`='$ademail'";
           $res=$con->query($upadquery);
            }
        }
        ?>