<link rel="stylesheet" href="index.css">
<style>
.notification{
    background-color: rgba(102, 11, 23, 0.8);
    text-shadow: 1.5px 1.5px 2px black;
    color:white;
    border-radius: 10px;
   
    width:66%;
    padding:20px;
    
    font-size:1.2rem;
    display:flex;
    margin:auto;
    margin-top:10px;
}
</style>
<?php
include ("connection.php");
if(isset($_SESSION['email'],$_SESSION['status']))
{
    $query="SELECT * FROM `bookedpackages` WHERE useremail='{$_SESSION['email']}';";
    $res=$con->query($query);
    if($res->num_rows == 0)
    {
        echo "<div class='notification'>";
        echo "You have No new notifications<br>";
        echo "</div>";
    }
    else{
    while($row=$res->fetch_assoc() )
    {
        echo "<div class='notification'>";
        $query2="SELECT * FROM `tpackages` where ID='{$row['packageid']}'";
        $res2=$con->query($query2);
        $row2=$res2->fetch_assoc();

        echo "You have successfully booked package {$row2['title']} from {$row2['pickuplocation']} to {$row2['droplocation']} on {$row2['date']} <br>";
        echo "</div>";

    }
}
}