<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    include "connection.php";
    include 'logoutfield.php';?>
    <header id='navbar'><figure>
        <img id='logo' src='yatra.jpg' width='80rem' height='80rem'> 
        <h4 style='display: inline;'>Yatra</h4></figure>
        <div id='navlinks'>
        <a href='' class='highlight'> Add Emp</a>
        <a href='superadminUsers.php' > Users</a>
        <a href='superadminaddtravelpack.php' > Add Packages</a>
        </div>
        
     
</header><?php
    include "addadminform.php";
    
?>
</body>
</html>