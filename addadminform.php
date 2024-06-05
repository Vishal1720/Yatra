<?php
include "connection.php";
if ($_SESSION['status'] == 'superadmin' and isset( $_SESSION["email"])) 
{ 
         ?>
    
<h2 class="loglbl" style="font-size:2rem;text-shadow: 2px 2px 2px black;text-align:center;">Add Employee </h2>
<form id="logform" method="post" action="addadmin.php" onsubmit="validateform();" style="margin-top:0%;background-color: rgba(11,161,22,0.3);">
    
    <label class="loglbl">Employee"s Name</label>
    <input required type="text" name="name" class="logfields"  placeholder="Enter name of the admin" >
    
    <label class="loglbl">Admin"s Email</label>
    <input required type="email" name="email" class="logfields" placeholder="Enter email" >
    
    <label class="loglbl"> Password</label>
    <input required type="password" id="initpass" name="password" class="logfields" placeholder="Enter password" >
    
    <label class="loglbl">Confirm Password</label>
    <input required type="password" id="confirmpass" name="repass"  class="logfields"  placeholder="Re-enter password" >
    
    <label class="loglbl">Contact</label>
    <input required type="number" id="telnumber" style="width:100%" pattern="{10}[0-9]" name="phone" class="logfields" placeholder="Enter Phone Number" >
     
<div style="display: flex;">
    <button type="reset" id="logreset" class="logbtn">Reset</button>
    <button type="submit" id="logsubmit" class="logbtn">Submit</button>
</div>
</form>
<script>
        var telnumber=document.getElementById("telnumber");
    telnumber.addEventListener("input",()=>{
  if(telnumber.value.length > 10)
  {
    telnumber.value=telnumber.value.slice(0,10);
    console.log(document.getElementById("initpass").value);
  }
});
    
    </script>
    <?php
    }
    else{
echo  "<script>alert('You are not permitted to view this');
window.location.href='index.php';</script>";
    }
    ?>