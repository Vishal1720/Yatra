<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    include "connection.php";?>
   <header id='navbar'><figure><img id='logo' src='yatra.jpg' width='80rem' height='80rem'> 
        <h4 style='display: inline;'>Yatra</h4></figure>
        <div id='navlinks'>
        <a href='adminUsers.php' > Users</a>
        <a href='superadminaddtravelpack.php' class='highlight'> Add Packages</a>
        </div>   
</header>  
<?php
    include "userdetails.php";
?>
</body>
</html>