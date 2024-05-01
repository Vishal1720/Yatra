<?php 
include "connection.php";
if(isset($_POST['dltbtn']))
{
    if(isset($_POST['emailToDelete']))
    {
    $idtodelete=$_POST['emailToDelete'];
    deleteuser($idtodelete);
    }
}
function deleteuser($emtbd)
{global $con;
    $query="delete from `regform` where email='$emtbd' ";
    
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
        <th>Name</th><th>Email</th><th>Gender</th><th>Phone</th><th>Address</th><th>District</th><th>pincode</th>
    <th>Delete</th><th>Update</th></tr>";
    
    $query3="Select * from regform";
    $res=$con->query($query3);
    if($res->num_rows>=1)
    {
        foreach ($res as $key) {
            
        
    echo "
    <tr>
        <td>{$key['name']}</td>
        <td>{$key['email']}</td>
        <td>{$key['gender']}</td>
        <td>{$key['phone']}</td>
        <td>{$key['address']}</td>
        <td>{$key['district']}</td>
        <td>{$key['pincode']}</td>
    <td>
    <form method='post' onsubmit='return confirmsubmission();'>
    <input name='emailToDelete'  type='hidden' value='{$key['email']}'>
    <button class='dlt' name='dltbtn' type='submit'>Delete User</button>
    </form>
    </td>
    <td>
    <form method='post' action=''>
    <input name='emailToUpdate'  type='hidden' value='{$key['email']}'>
    <button class='dlt' id='updte' name='updbtn' type='submit'>Update</button>
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