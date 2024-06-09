<?php
require "connection.php";
if(isset($_POST['email']))
{
$name= $_POST['name'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$address=$_POST['address'];
$pincode=$_POST['pin'];
$dist=$_POST['district'];
$fullname=$name." ".$lname;


//checking for duplicate entries for email
$query2=$con->query("SELECT * FROM `user` WHERE email='$email' ");
if($query2->num_rows>=1)
{
   echo "<script>alert('Email already exists. Please try another one')</script>";
}
else{
$query="INSERT INTO `user`(`email`, `name`, `password`, `gender`, `phone`, `address`, `district`, `pincode`) 
VALUES 
('$email','$fullname','$password','$gender','$phone','$address','$dist','$pincode')";
$res=$con->query($query);
if(!$res)
{
   die("error");
}
else{
   echo "<script>alert('Account created successfully');window.location.href='signup.php'</script>";
}

}
$con->close();
}?>
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
    <header id="navbar" style="transition:0s"><figure>
        <img id="logo" src="yatra.jpg" width="80rem" height="80rem"> 
        <h4 style="display: inline;">Yatra</h4></figure>

    <div id="navlinks">
        <a href="index.php">About</a>
        <a href="login.php" >Login</a>
        <a href="" class="highlight" id="signupanchor">Signup</a>
    </div>
</header>
    <form id="signform" method="post" action="signup.php" onsubmit="validatesignup()">
        <h2>Sign Up Form</h2>
        <div>
        <label class="loglbl" for="usernname">First name</label>
        <label class="loglbl" for="lname" style="margin-left:38%;">Last name</label>
    </div>
        <div style="display: flex;">
            <input required type="text" id="username" name="name" class="logfields" placeholder="Enter First Name" >
            <input required type="text" id="lname" name="lname" class="logfields" placeholder="Enter Last Name" >
        </div>
        <label class="loglbl" for="email">Email</label>
        <input required type="email" id="email" name="email" class="logfields" placeholder="Enter Email" >

         <div>
        <label class="loglbl"  for="email">Phone Number</label>
        <label class="loglbl"  for="male" style="margin-left: 33.7%;">Gender</label>
    </div>
        <div style="display: flex;">
        <input required type="number" id="telnumber" 
        name="phone" class="logfields" placeholder="Enter phone number">
        <div id="gdiv">
        <label id="male"><input type="radio" id="radio" class="radio" value="male" name="gender">Male</label>
        <label id="female"><input name="gender" class="radio"  value="female" type="radio">Female</label>
    </div>
    </div>
        <label class="loglbl" for="initpass">Password</label>
        <input required type="password" id="initpass"
         name="password" class="logfields" placeholder="Password" >
        <label class="loglbl" for="confirmpass"> Confirm Password</label>
        <input required type="password" id="confirmpass"
         name="password" class="logfields" placeholder="Password" >
        <img src='eye-icon.png'  id="eyesignup" onclick="eyeswitchsign()">
        <div>
        <label class="loglbl" for="add"> Address </label>
        <label class="loglbl" for="district"  style="margin-left:52%;"> District </label>
        
    </div>
        <div style="display: flex;">
            <textarea required rows="2" id="address" name="address" 
            class="logfields" placeholder="Enter address" ></textarea>
            <div>
            <input class="logfields" style="margin-bottom: 0px;" 
            placeholder="Enter district" id="district" name="district" list="districts">
            <datalist id="districts">
                <option>Udupi</option>
                <option>Dakshina Kannada</option>
            </datalist>
            <input type="number" id="pin" name="pin"
             style="margin-top: 0.4rem;" class="logfields" pattern="[0-9]{6}" required placeholder="Enter pincode"/>
        </div>
        </div>

        
        
        <div style="display: flex;">
        <button type="reset" id="signreset" class="logbtn">Reset</button>
        <button type="submit" id="signsubmit" class="logbtn">Submit</button>
    </div>
    </form>
    
<script src="index.js"></script>
</body>
</html>