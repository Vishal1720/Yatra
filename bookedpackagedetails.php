<link rel="stylesheet" href="index.css">
<?php 
include "connection.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['dlt']))
    {
        $idtbd=$_POST['idToDelete'];
        $query="Update `bookedpackages` SET status='canceled' where ID='$idtbd'";
        $con->query($query);  
    }
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['confirm']))
    {
        $idtbd=$_POST['idToDelete'];
        $query="Update `bookedpackages` SET status='confirmed' where ID='$idtbd'";
        $con->query($query);  
    }
}
?>

    
    <style>
        table{
            margin: auto;
            font-size: 1.1rem;
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
        <th>Payment</th>
        <th>People</th>
        <th>Time of Order</th>
        <th>PaymentID</th>
        <th>Cancel</th>
        </tr>";
    
    $query3="Select * from bookedpackages";
    $res=$con->query($query3);
    if($res->num_rows>=1)
    {
        
        foreach ($res as $key) {
            $cancel='Cancel';
            $bg='';
            $nameofbtn='dlt';
            if($key['status']=='canceled'){
                $cancel="Confirm";
                $bg='background-color:green;color:white';
                $nameofbtn='confirm';};
    echo "
    <tr>
        <td>{$key['ID']}</td>
        <td>{$key['useremail']}</td>
        <td>{$key['packageid']}</td>
        <td>{$key['uname']}</td>
        <td>{$key['pickup']}</td>
        <td>{$key['droploc']}</td>
        <td>{$key['totalcost']}</td>
        <td>{$key['people']}</td>
        <td>{$key['timeoforder']}</td>
        <td>{$key['payid']}</td>
    <td>
    <form method='post' action='' onsubmit='return confirmDelete({$key['ID']});'>
    <input name='idToDelete'  type='hidden' value='{$key['ID']}'>
    <button class='dlt' name='$nameofbtn' type='submit' style='".$bg."'>$cancel</button>
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
        window.location.href='index.php'</script>";
    }
?>

<script>confirmDelete=(a)=>{
var a=confirm("Are you sure you want to perform this action for ID "+a);
if(a)return true;
else 
return false;
}

</script>
    
    