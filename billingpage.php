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
            <form style='background-color: rgba(69,177,141,0.3);' id='logform' method='post' action='bookpackage.php'>
                <h1 class='loglbl'>{$item['title']}</h1>
                <input type='hidden' name='packid' value='{$id}'>
                <label class='loglbl'>Date</label>
                <input class='logfields' type='text' value={$item['date']} disabled>
                <label class='loglbl'>Pickup Location</label>
                <input class='logfields' type='text' value={$item['pickuplocation']} disabled>
                <label class='loglbl'>Drop Location</label>
                <input class='logfields' type='text' value={$item['droplocation']} disabled>
                <label class='loglbl'>Cost</label>
                <input class='logfields' type='text' id='cost' value={$item['cost']} disabled>
                <!-- Add an ID to the submit button -->
                <input class='logbtn' id='logsubmit' style='width:100%;' type='button' value='Pay'>
            </form>";
        }
    ?>

    <script src="index.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('logsubmit').onclick = function() {
            // Get the cost value
            var cost = document.getElementById('cost').value;
            // Create an object with order details
            var options = {
                "key": "rzp_test_SMipGKSDJs7rGi",
                "amount": cost * 100, // Razorpay accepts amount in paisa
                "currency": "INR",
                "name": "Your Company Name",
                "description": "Package Payment",
                "handler": function(response) {
                    // Handle the success response here
                    alert(response.razorpay_payment_id);
                    alert(response.razorpay_order_id);
                    alert(response.razorpay_signature);
                },
                "prefill": {
                    "name": "", // You can pre-fill customer details here
                    "email": ""
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        };
    </script>
</body>
</html>
