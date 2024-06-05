<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin homepage</title>
    <link rel="stylesheet" href="index.css">
    <style>
        body{
            background-image: url("bg3.jpeg");
        }
        
    </style>
    <?php include "favicon.php";?>
</head>
<body >
<header id='navbar'><figure><img id='logo' src='yatra.jpg' width='80rem' height='80rem'> 
        <h4 style='display: inline;'>Yatra</h4></figure>
        <div id='navlinks'> 
        <a href='adminUsers.php' > Users</a>
        <a href='' class='highlight'> Add Packages</a>
        </div>
</header>
   <?php
   include 'connection.php';
    include 'logoutfield.php';
    include 'addtravelpackform.php';
   ?>
</body>
</html>