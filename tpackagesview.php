


<?php 
include "connection.php";
if(isset($_POST['dltbtnpack']))
{
    if(isset($_POST['idToDelete']))
    {
    $idtodelete=$_POST['idToDelete'];
    deletepack($idtodelete);
    }
}
function deletepack($idtbd)
{
    global $con;
$query="select * from `bookedpackages` where packageid='$idtbd' ";
$res=$con->query($query);
if($res->num_rows>=1)
{
    echo "<script>alert('Can not delete this since it is already has been booked by some user');</script>";
}else{
    $query="delete from `tpackages` where ID='$idtbd' "; 
    $con->query($query);  
}
}
?>

    
    <style>
        table{
            margin: auto;
            font-size: 1.3rem;
        }
        table,th,td{
            border: 3px solid black;
            border-collapse: collapse;
            
        }
        td,th{
            padding: 10px;
            text-align: center;
        }
        th{
            background-color: #23CE6B;
            color: #272D2D;
        }
        td{
            background-color: #B8C5D6;
            color: #272D2D;
            font-weight: 500;
        }
        .dlt{
            color: white;
            background-color: red;
            padding: 5px;
            font-weight: bold;
            font-size: 1.1rem;
        }
    </style>


    <?php
if($_SESSION['status'] == 'admin' or $_SESSION['status'] == 'superadmin')
{
    include 'updatepackage.php';
echo "
    <table>
        <tr>
        <th>ID</th><th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Pickup</th>
        <th>Drop</th>
        <th>Cost</th>
        <th>Delete</th>
        <th>Update</th>
        </tr>";
    
    $query3="Select * from tpackages";
    $res=$con->query($query3);
    if($res->num_rows>=1)
    {
        foreach ($res as $key) {
            
        
    echo "
    <tr>
        <td>{$key['ID']}</td>
        <td>{$key['title']}</td>
        <td>{$key['description']}</td>
        <td>{$key['date']}</td>
        <td>{$key['pickuplocation']}</td>
        <td>{$key['droplocation']}</td>
        <td>{$key['cost']}</td>
    <td>
    <form method='post' onsubmit='return confirmsubmission();'>
    <input name='idToDelete'  type='hidden' value='{$key['ID']}'>
    <button class='dlt' name='dltbtnpack' type='submit'>Delete Package</button>
    </form>
    </td>

    <td>
    <form method='post' action=''>
    <input name='packtoUpdate'  type='hidden' value='{$key['ID']}'>
    <button class='dlt' style='background-color:blue;' name='updbtnpack' type='submit'>Update Package</button>
    </form>
    </td>

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
    
