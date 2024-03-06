<?php 
if(isset($_POST['name']) && isset($_POST['password'])) {
$servername="localhost";
$user="root";
$password="";
$con=mysqli_connect($servername,$user, $password);

if(!$con)
{
    die("Error");
}

$name=$_POST['name'];
$pass=$_POST['password'];
$logval=$con->query("SELECT * FROM `yatra`.`regform` WHERE email='$name' and password='$pass' ");

if($logval->num_rows>=1)
{
    Header("Location:userhomepage.html");
}
else{
    $res2=$con->query("Select * from `yatra`.`regform` where  email='$name'");
 if($res2->num_rows==1)
 {echo "<script>alert('password is not correct')</script>";}
else{echo "<script>alert(' $name is not registered');</script>";}
     
}
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
    <title>Yatra</title>
    <link rel="stylesheet" href="./index.css"> 
</head>
<body >
    <header id="navbar"><figure><img id="logo" src="yatra.jpg" width="80rem" height="80rem"> 
        <h4 style="display: inline;">Yatra</h4></figure>
    <div id="navlinks">
        <a href="index.html">About</a>
        <a href="adminlogin.html" class="highlight">Login</a>
        <a href="signup.php" id="signupanchor">Signup</a></div>
    </header>
      
    <div id="logdiv">
        
    <form id="logform" method="post" action="login.php">
        <h2>User Login</h2>
        <label class="loglbl">Name</label>
        <input id="email" required type="email" name="name" class="logfields" placeholder="Enter registered email" >
        <label class="loglbl">Password</label>
        <input required  type="password" name="password" class="logfields" id="logpassfield" placeholder="Enter password" >
        <img src="eye-icon.png" onclick="showpassword()" id="logshowpass" alt="show password" >
        
        <div style="display: flex;">
        <button type="reset" id="logreset" class="logbtn">Reset</button>
        <button type="submit" id="logsubmit" class="logbtn">Submit</button>
    </div>
    </form>
    
</div>
    
<script src="index.js"></script>
</body>
</html>
