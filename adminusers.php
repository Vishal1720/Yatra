<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin</title>
    <link rel="stylesheet" href="index.css">
    <style>
        #select{
            background-color: black;
            color: white;
            width: fit-content;
            text-align: center;
        }
        </style>
</head>
<body>
    <?php
    include "connection.php";
    
    if(!isset($_SESSION['userview']))$_SESSION['userview'] = 'User';

   
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
        <a href='adminUsers.php' > Users</a>
        <a href='superadminaddtravelpack.php' class='highlight'> Add Packages</a>
        </div>   
</header>  
<form id="viewform1" action="" method="post">
<select id='select' onchange='submitForm()' name='view'>
    <option <?php if($_SESSION['userview']=='User') echo "selected" ?> >User</option>
    <option <?php if($_SESSION['userview']=='Packages') echo "selected" ?> >Packages</option>
    
</select>
    </form>
<?php
 if($_SESSION['userview'] == 'User')
 {
     include "userdetails.php";
 }else if($_SESSION['userview'] == 'Packages'){
    include "tpackagesview.php";
}
?>
<script>
     function submitForm(){
document.getElementById("viewform1").submit();
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