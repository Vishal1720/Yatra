<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php 
    session_start();
   $status=$_SESSION['status'];
   $email=$_SESSION['email'];
   
    if($status=='user' and isset($email))
    {
    echo "
    <header id='navbar'><figure><img id='logo' src='yatra.jpg' width='80rem' height='80rem'> 
        <h4 style='display: inline;'>Yatra</h4></figure>
    <div id='navlinks'>
        <a href='travelpackages.php' class='highlight'> Packages</a>
        </div>";
    }
    else{
        echo "<script>alert('Log in first');window.location.href = 'login.php';</script>";
        
        
    }
     ?>
</header>

</body>
</html>