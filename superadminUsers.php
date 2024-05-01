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
    include "connection.php";
    
    if(!isset($_SESSION['userview']))$_SESSION['userview'] = 'User';?>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['view']))
        {
$view=$_POST['view'];
$userview=$view;
$_SESSION['userview']=$view;
        }
    }
    ?>
    <header id='navbar'><figure><img id='logo' src='yatra.jpg' width='80rem' height='80rem'> 
        <h4 style='display: inline;'>Yatra</h4></figure>
        <div id='navlinks'>
        <a href='superadminhomepage.php' > Add Admin</a>
        <a href='' class='highlight'> Users</a>
        <a href='superadminaddtravelpack.php' > Add Packages</a>
        </div>
</header>

<form id="viewform" action="" method="post">
    <select onchange="submitForm()" 
    style="background-color:black;color:white;text-align:center;font-size:1.3rem;margin-left:89%;margin-right:0px;height:fit-content;" name="view">
<option <?php if($_SESSION['userview'] == 'User') echo 'selected'; ?> >User</option>
<option <?php if($_SESSION['userview'] == 'Admin') echo 'selected'; ?>>Admin</option> 
<option <?php if($_SESSION['userview'] == 'Packages') echo 'selected'; ?>>Packages</option> 
</select>
</form>
    <?php
    if($_SESSION['userview'] == 'User')
    {
        include "userdetails.php";
    }
    else if($_SESSION['userview'] == 'Admin')
    {
        include 'updateadmin.php';
        include "superadminAdminUsers.php";
    }
    else if($_SESSION['userview'] == 'Packages'){
        include "tpackagesview.php";
    }

    ?>
<script>
    function submitForm(){
document.getElementById("viewform").submit();
    }
    function confirmsubmission()
    {
        var a=window.confirm("Are you sure")
        if(a)return true;
        else
        return false;
    }
    </script>
</body>
</html>