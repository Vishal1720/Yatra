<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include "favicon.php";?>    

    <title>Yatra</title>
    <link rel="stylesheet" href="./index.css"> 
    <style>
        #img1{
            transition: margin-left 10s ease-in-out;
        }
        .sliderimgs{
            width:1117px;
            height: 600px;
           
           
        }
        .imgcontainer{
            margin: auto;
        }
    </style>
</head>
<body >
 
    <header id="navbar"><figure><img id="logo" src="yatra.jpg" width="80rem" height="80rem"> 
        <h4 style="display: inline;">Yatra</h4></figure>
    <div id="navlinks">
        <a href="" class="highlight">About</a>
        <a href="login.php">Login</a>
        <a href="signup.php" id="signupanchor">Signup</a></div>
        
</header>
<div id="cover"><h1 id="tagline">Your Gateway to Unforgettable Adventures</h1></div>

<?php include "connection.php";include "Home_yatra.php";?>
<script src="index.js">

</script>
</body>
</html>
