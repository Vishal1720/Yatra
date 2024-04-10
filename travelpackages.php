<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Packages</title>
    <link rel="stylesheet" href="index.css">
    <style> 
div{
    margin: 0px;
    padding: 0px;
 
}
.contentdiv{
    background-color: blueviolet;
    width: 80%;
}

.package{
    display: flex;
    margin: auto;
    width: 70%;
    background-color: #9FB1BC;
    border: 1.5px solid #412234;
    margin-top: 2%;
    box-shadow: 3px 3px 4px black,-3px -3px 4px black;
    
 

}
.travelimg{
width: 45%;
height: 100%;
padding: 0.2%;
object-fit: contain;

}

.h1{
    background-color: #E2C044;
    padding: 3px;
    height: 25%;
     display: flex; /*  using flex to align items vertically and horizontally */
    align-items: center;
    justify-content: center;
    
}
.description{
    display: flex;
    
}
p{
    background-color: #D3D0CB;
    height: 75%;
    padding: 3px;
    font-size: 1.2rem;
    /* display: flex;
    justify-content: center; */
   
}
.form{
    width: 100%;
    height: 100%;
}

    </style>
</head>
<body>
    <?php 
    require "connection.php";
   
    $status= $_SESSION['status'];
    $useremail=$_SESSION['email'];
    $query="Select * from tpackages";
    $res=$con->query($query);

if(($status == 'user' or $status == 'admin' or $status == 'superadmin') and isset($useremail))
{
    foreach($res as $item)
        {
             echo"<div class='package'>"
?>
   
    <?php if (!empty($item['cover'])) : ?>
        <img class='travelimg' src='data:image/jpeg;base64,<?php echo base64_encode($item['cover']); ?>' alt='Image from Database'>
      <?php else : ?>
        <p>No image found.</p>
      <?php endif; ?>
<?php
echo "
<div class='contentdiv'>
<form action='billingpage.php' class='form' method='post'>
 
    <h1 class='h1'>{$item['title']}</h1>
    
    <p>
    <span>{$item['description']}</span><br>
    <span><strong>Cost per person:</strong><span>{$item['cost']}</span><br>
    <span><strong>Pick up Location:</strong><span>{$item['pickuplocation']}</span><br>
    <span><strong>Drop Location:</strong><span>{$item['droplocation']}</span><br>
    <span><strong>Date:</strong><span>{$item['date']}</span><br>
 <input type='number' name='tid' value={$item['ID']} style='display:none;'>
    <button id='signsubmit' type='submit' style='width:fit-content;'class='logbtn'>Book</button>
    </p>
    </form>
</div>
    </div>";
        }
    }
    ?>
        
</body>
</html>