<?php 
include "connection.php";
if(isset($_POST['dltbtn']))
{
    $idtodelete=$_POST['emailToDelete'];
    deleteadminuser($idtodelete);
}
function deleteadminuser($emtbd)
{global $con;
    $query="delete from `adminregform` where email='$emtbd' ";
    
    $res=$con->query($query);  
}
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
            font-size: 1.3rem;
        }
        table,th,td{
            border: 3px solid whitesmoke;
            border-collapse: collapse;
            
        }
        td,th{
            padding: 10px;
        }
        th{
            background-color: #14213D;
            color: white;
        }
        td{
            background-color: #56638A;
            color: azure;
            font-weight: 500;
        }
        .dlt{
            color: white;
            background-color: red;
            padding: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
  
    <?php
if( $_SESSION['status'] == 'superadmin')
{
echo "
    <table>
        <tr>
        <th>Name</th><th>Email</th><th>Contact</th><th>Delete</th></tr>";
    $query3="Select * from adminregform";
    $res=$con->query($query3);
    if($res->num_rows>=1)
    {
        foreach ($res as $key) {
    echo "
    <tr>
        <td>{$key['name']}</td>
        <td>{$key['email']}</td>        
        <td>{$key['contact']}</td>

    <td>
    <form method='post'>
    <input name='emailToDelete'  type='hidden' value='{$key['email']}'>
    <button class='dlt' name='dltbtn' type='submit'>Delete User</button>
    </form>
    </td>
    </tr>";
    }
}
    }
    else{
        echo "<script>alert('You are not permitted to view this');
        window.location.href='index.html'</script>";
    }
?>
    </table>
    
</body>
</html>