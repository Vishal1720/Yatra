<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin</title>
    <link rel="stylesheet" href="index.css">
    <style>
        #select{
            background-color: rgb(19, 42, 19);
            color: white;
            width:12%;
            text-align: center;
            font-size: 1.5rem;
            margin-left: 87%;
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
        <a href='adminUsers.php' class='highlight'> Users</a>
        <a href='adminhomepage.php' > Add Packages</a>
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