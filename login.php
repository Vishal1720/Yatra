<?php 
if(isset($_POST['name'])) {
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
    echo '<script>alert("Error  in login");</script>';
     
}

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
        <a href="" class="highlight">Login</a>
        <a href="signup.html" id="signupanchor">Signup</a></div>
    </header>
      
    <form id="logform" method="post" action="login.php">
        <h2>Login Form</h2>
        <label class="loglbl">Name</label>
        <input id="email" required type="email" name="name" class="logfields" placeholder="Enter registered email" >
        <label class="loglbl">Password</label>
        <input required  type="password" name="password" class="logfields" id="logpassfield" placeholder="Enter password" >
        <img src="eye-icon.png" onclick="showpassword()" id="logshowpass" alt="show password" >
        <button type="reset" class="logbtn">Reset</button>
        <button type="submit" class="logbtn">Submit</button>
    </form>
    
<script src="index.js"></script>
</body>
</html>
