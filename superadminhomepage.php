<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php session_start();
    if ($_SESSION['status'] == 'superadmin' and isset( $_SESSION["email"])) { 
        echo "
    <header id='navbar'><figure><img id='logo' src='yatra.jpg' width='80rem' height='80rem'> 
        <h4 style='display: inline;'>Yatra</h4></figure>
        
     
</header>
<form id='logform' method='post' action='addadmin.php' onsubmit='validateform(e)' style='background-color: rgba(11,161,22,0.3);'>
    <h2 class='loglbl' style='font-size:2rem;text-shadow: 2px 2px 2px black;'>Add Admin </h2>
    
    <label class='loglbl'>Admin's Name</label>
    <input required type='text' name='name' class='logfields'  placeholder='Enter name of the admin' >
    
    <label class='loglbl'>Admin's Email</label>
    <input required type='email' name='email' class='logfields' placeholder='Enter email' >
    
    <label class='loglbl'> Password</label>
    <input required type='password' id='initpass' name='password' class='logfields' placeholder='Enter password' >
    
    <label class='loglbl'>Confirm Password</label>
    <input required type='password' id='confirmpass'  class='logfields'  placeholder='Re-enter password' >
    
    <label class='loglbl'>Contact</label>
    <input required type='number' name='phone' class='logfields' placeholder='Enter password' >
   
    
    
<div style='display: flex;'>
    <button type='reset' id='logreset' class='logbtn'>Reset</button>
    <button type='submit' id='logsubmit' class='logbtn'>Submit</button>
</div>
</form>
<script>
    function validateform(e){
        var pwd1=document.getElementById('initpass');
        var pwd2=document.getElementById('confirmpass');
        console.log(pwd1.value);
        console.log(pwd2.value);
if(pwd1.value != pwd2.value)
{
    alert('Passwords not match');
    e.preventDefault();
return false;
}
return true;

    }
    </script>";}
    else{
echo "<script>alert('Superadmin login first');window.location.href='superadminlogin.html';</script>";
    }
?>
</body>
</html>