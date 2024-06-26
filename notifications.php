<link rel="stylesheet" href="index.css">
<style>
.notification{
    
    text-shadow: 1.5px 1.5px 2px black;
    color:white;
    border-radius: 10px;
   
    width:66%;
    padding:26px;
    
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
    
    $query="SELECT * FROM `bookedpackages` WHERE useremail='{$_SESSION['email']}' order by timeoforder desc;";
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
        $message="You have successfully booked package";
        $endmsg="";
        $bg='background-color: rgba(11, 102, 223, 0.6);';
        if($row['status']=='canceled'){
        $message="Unfortunately your package";
        $endmsg=" has been canceled by an admin or an employee";  
        $bg="background-color:rgba(102, 11, 23, 0.8);";  
    }
        echo "<div class='notification' style='".$bg."'>";
        $query2="SELECT * FROM `tpackages` where ID='{$row['packageid']}' ";
        $res2=$con->query($query2);
        $row2=$res2->fetch_assoc();

        echo "$message  {$row2['title']} 
        from {$row2['pickuplocation']} to {$row2['droplocation']} scheduled on
         date {$row2['date']} for
        {$row['people']} persons with total cost of {$row['totalcost']}$endmsg
        <strong>Date and time of Booking:</strong>{$row['timeoforder']}<br>";
        echo "</div>";

    }
}
}