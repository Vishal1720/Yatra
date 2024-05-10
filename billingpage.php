<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
    <title>Yatra</title>
    <link rel="stylesheet" href="./index.css"> 
   
</head>
<body >
    <header id="navbar"><figure><img id="logo" src="yatra.jpg" width="80rem" height="80rem"> 
        <h4 style="display: inline;">Yatra</h4></figure>
    <div id="navlinks">
    </div>
    </header>
      
    <?php
    require "connection.php";
    $id=isset($_POST['tid'])?$_POST['tid']:'';
    $query="Select *  from tpackages where ID = '$id' ";
    $res=$con->query($query);
    foreach($res as $item)
    {echo "
        <form style='background-color: rgba(69,177,141,0.3);' id='logform' method='post' action='bookpackage.php'>
        <h1 class='loglbl'>{$item['title']}</h1>
        <input type='hidden' name='packid' value='{$id}'>
        <label class='loglbl'>Date</label>
        <input class='logfields' type='text' value={$item['date']} disabled>
        <label class='loglbl'>Pickup Location</label>
        <input class='logfields' type='text' value={$item['pickuplocation']} disabled>
        <label class='loglbl'>Drop Location</label>
        <input class='logfields' type='text' value={$item['droplocation']} disabled>
        <label class='loglbl'>Cost</label>
        <input class='logfields' type='text' value={$item['cost']} disabled>
        <input class='logbtn' id='logsubmit' style='width:100%;' type='submit' value='Pay'>
    </div>
    </form>";
    }
    
    ?>
        
    
    

    
<script src="index.js"></script>
</body>
</html>

