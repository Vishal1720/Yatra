<?php
    include "connection.php";
    if($_SESSION['status'] == 'admin' or $_SESSION['status'] == 'superadmin')
    {
    echo "
    <form id='signform' method='post' action='addtravelpack.php' >
        <h2>Add Travel Packages</h2>

        <div>
        <label class='loglbl' for='Title'>Title</label>
        </div>

    <input required type='text'  name='title' class='logfields' placeholder='Enter Title of Package' >
        <label class='loglbl' for='desc'>Description</label>
        <input required type='text' id='desc' name='desc' class='logfields' placeholder='Enter Description' >
<label class='loglbl' for='cover'>Coverphoto </label>
<input class='logfields' name='cover' type='file' accept='image/*' required > 
    <label class='loglbl' for='dt'> Date </label>
    <input type='date' name='dt' class='logfields' id='dt'>
    <div>
    <label class='loglbl' for='pickup'> Pickup </label>
    <label class='loglbl' for='drop'> Drop </label>
</div>
        <div>
            <input type='text'  id='pickup' style='width:47%' name='pickup' class='logfields' placeholder='Enter pickup location' >
            <input type='text'  id='drop' style='width:47%' name='drop' class='logfields' placeholder='Enter drop location' >
        </div>
        <label class='loglbl' for='drop'> Cost </label>
        <input type='number' name='cost' id ='cost' class='logfields' placeholder='Enter cost of package'>
    </div>

        
        
    <div style='display: flex;'>
        <button type='reset' id='signreset' class='logbtn'>Reset</button>
        <button type='submit' id='signsubmit' class='logbtn'>Submit</button>
    </div>

    </form>";}
    else{
        echo "<script>alert('You do not have permission');
        window.location.href='index.html'</script>";
        
    }