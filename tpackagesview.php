


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
    $query="delete from `tpackages` where ID='$idtbd' "; 
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
        }
    </style>


    <?php
if($_SESSION['status'] == 'admin' or $_SESSION['status'] == 'superadmin')
{
echo "
    <table>
        <tr>
        <th>ID</th><th>Title</th><th>description</th><th>date</th><th>Pickup</th><th>Drop</th><th>Delete</th>
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
    <td>
    <form method='post'>
    <input name='idToDelete'  type='hidden' value='{$key['ID']}'>
    <button class='dlt' name='dltbtnpack' type='submit'>Delete Package</button>
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
    
