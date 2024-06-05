<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin</title>
    <link rel="stylesheet" href="index.css">
    <?php include "favicon.php";?>
</head>
<body>
    <?php
    include "connection.php";
    include 'logoutfield.php';
    
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
    <select  name="view" onchange="submitForm()" 
    style="background-color:black;color:white;text-align:center;font-size:1.3rem;margin-left:82%;margin-right:0px;height:fit-content;" >
<option <?php if($_SESSION['userview'] == 'User') echo 'selected'; ?> >User</option>
<option <?php if($_SESSION['userview'] == 'Admin') echo 'selected'; ?>>Admin</option> 
<option <?php if($_SESSION['userview'] == 'Packages') echo 'selected'; ?>>Packages</option>
<option value='BookedTable' <?php if($_SESSION['userview'] == 'BookedTable') echo 'selected'; ?>>BookedTable</option> 
<option value="Feedback" <?php if($_SESSION['userview']=='Feedback') echo "selected" ?> >Feedback</option>
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
    else if($_SESSION['userview'] == 'BookedTable'){
        include "bookedpackagedetails.php";
    }else if($_SESSION['userview'] == 'Feedback'){
        include "feedbackdetails.php";
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