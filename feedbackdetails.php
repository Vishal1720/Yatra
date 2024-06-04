<?php 
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <style>
        table{
            margin: auto;
            font-size: 1.4rem;
        }
        table,th,td{
            border: 3px solid black;
            border-collapse: collapse;
            
        }
        td,th{
            padding: 10px;
        }
        th{
            background-color: #FF9B71;
            color: #2D3047;
        }
        td{
            background-color: #FFFD82;
            color: #2D3047;
            
    
            font-weight: 500;
        }
        .msg{
            min-width: 277px;
            max-width:500px;
        }
        .dlt{
            color: white;
            background-color: red;
            padding: 5px;
            font-weight: bold;
            font-size: 1.2rem;
        }
        #updte{
            background-color: blue;
        }
    </style>
</head>
<body><?php
if($_SESSION['status'] == 'admin' or $_SESSION['status'] == 'superadmin')
{
    include "updateuser.php";
echo "
    <table>
        <tr>
        <th>Name</th><th>Email</th><th class='msg'>Message</th>
        </tr>";
    
    $query3="Select * from feedbackform";
    $res=$con->query($query3);
    if($res->num_rows>=1)
    {
        foreach ($res as $key) {
            
        
    echo "
    <tr>
        <td>{$key['username']}</td>
        <td>{$key['email']}</td>
        <td class='msg'>{$key['message']}</td>
    
   
    </tr>";
    }
}
    }
    else{
        echo "<script>alert('You are not permitted to view this');
        window.location.href='index.php'</script>";
    }
?>
    
    </table>
    
</body>
</html>