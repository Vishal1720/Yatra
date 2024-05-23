<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yatra</title>
    <!-- Include Razorpay's CSS -->
    <link rel="stylesheet" href="https://checkout.razorpay.com/v1/checkout.css">
    <link rel="stylesheet" href="./index.css"> 
</head>
<body>
    <header id="navbar">
        <figure>
            <img id="logo" src="yatra.jpg" width="80rem" height="80rem"> 
            <h4 style="display: inline;">Yatra</h4>
        </figure>
        <div id="navlinks"></div>
    </header>
    
    <?php
        require "connection.php";
        $id = isset($_POST['tid']) ? $_POST['tid'] : '';
        $query = "SELECT * FROM tpackages WHERE ID = '$id'";
        $res = $con->query($query);
        foreach($res as $item) {
            echo "
            <form style='background-color: rgba(69,177,141,0.3);' 
            id='logform' method='post' action='bookpackage.php'>
                
            <h1 class='loglbl'>{$item['title']}</h1>
            <input type='hidden' name='packid' value='{$id}'>
               
            <input type='hidden' name='payid' id='payid' value=''>
                <label class='loglbl'>Date</label>
                <input class='logfields' type='text' value={$item['date']} readonly>
                
                <label class='loglbl'>Pickup Location</label>
                <input class='logfields' type='text' value={$item['pickuplocation']} readonly>
                
                <label class='loglbl'>Drop Location</label>
                <input class='logfields' type='text' value={$item['droplocation']} readonly>
                
                <label class='loglbl'>Cost</label>
                <input  type='text' class='logfields' id='cost' name='cost' value='{$item['cost']}' readonly >
                
                <label class='loglbl'>Number of persons</label>
                <input class='logfields' pattern='[0-9]{5}' 
                  type='text' id='noOfPerson' name='noOfPerson' autofocus
                 value='1' onkeyup='changecost()'>
              
                <input class='logbtn' id='logsubmit' style='width:100%;' type='button' value='Pay'>
            </form>
            <script >
            var originalcost={$item['cost']};
         changecost=()=>{

var numberPeople=document.getElementById('noOfPerson').value;

var cost=document.getElementById('cost');
if(numberPeople == 0)
cost.value=Math.abs(originalcost);
else
cost.value=Math.abs(originalcost*numberPeople);

        } 
    </script>
            ";
        }
    ?>

    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>

        document.getElementById('logsubmit').onclick = function() 
        {
            // Get the cost value
            var cost = document.getElementById('cost').value;
            // Create an object with order details
            var options = {
                "key": "rzp_test_SMipGKSDJs7rGi",
                "amount": cost * 100, // Razorpay accepts amount in paisa
                "currency": "INR",
                "name": "Yatra Travel Agency",
                "description": "Package Payment",
                "handler": function(response) {
                    document.getElementById("payid").value=response.razorpay_payment_id;
                   document.getElementById('logform').submit();
                },
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        };
    </script>
</body>
</html>
