<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yatra</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php 
    include 'connection.php';
   $status=$_SESSION['status'];
   $email=$_SESSION['email'];
   
    if($status=='user' and isset($email))
    {
    echo "
    <header id='navbar'><figure><img id='logo' src='yatra.jpg' width='80rem' height='80rem'> 
        <h4 style='display: inline;'>Yatra</h4></figure>
    <div id='navlinks'>
        <a href='userhomepage.php' class='highlight'> Packages</a>
        <a href='usernotifications.php' >Notifications</a>

        
        </div>";
        include 'logoutfield.php';
        include 'travelpackages.php';
    }
    else{
        echo "<script>alert('Log in first');
        window.location.href = 'login.php';</scrip>";
    }
     ?>


</body>
</html>