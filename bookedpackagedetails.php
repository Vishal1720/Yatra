<link rel="stylesheet" href="index.css">
<?php 
include "connection.php";
if(isset($_POST['dlt']))
{
    if(isset($_POST['idToDelete']))
    {
    $idtodelete=$_POST['idToDelete'];
    deletebookedDetails($idtodelete);
    }
}
function deletebookedDetails($idtbd)
{
    global $con;
    $query="delete from `bookedpackages` where ID='$idtbd' "; 
    $con->query($query);  
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
            background-color: #DB162F;
            color: #DBDFAC;
        }
        td{
            background-color: #DBD3AD;
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
echo "
    <table>
        <tr>
        <th>ID</th><th>Email</th>
        <th>Pack Id</th>
        <th>Name</th>
        <th>Pickup</th>
        <th>Drop</th>
        <th>Time of Order</th>
        <th>Delete</th>
        <th>Update</th>
        </tr>";
    
    $query3="Select * from bookedpackages";
    $res=$con->query($query3);
    if($res->num_rows>=1)
    {
        foreach ($res as $key) {
    echo "
    <tr>
        <td>{$key['ID']}</td>
        <td>{$key['useremail']}</td>
        <td>{$key['packageid']}</td>
        <td>{$key['uname']}</td>
        <td>{$key['pickup']}</td>
        <td>{$key['droploc']}</td>
        <td>{$key['timeoforder']}</td>
    <td>
    <form method='post' onsubmit='return confirmDelete({$key['ID']} );'>
    <input name='idToDelete'  type='hidden' value='{$key['ID']}'>
    <button class='dlt' name='dlt' type='submit'>Delete </button>
    </form>
    </td>

    </form>
    </td>

    </tr>";
    }
    echo "</table>";
}
    }
    else{
        echo "<script>alert('You are not permitted to view this');
        window.location.href='index.html'</script>";
    }
?>

<script>confirmDelete=(a)=>{
var a=confirm("Are you sure you want to delete ID "+a);
if(a)return true;
else 
return false;
}

</script>
    
    