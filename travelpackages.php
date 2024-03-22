<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Packages</title>
    <link rel="stylesheet" href="index.css">
    <style> 
div{
    margin: 0px;
    padding: 0px;
 
}
.contentdiv{
    background-color: blueviolet;
    width: 80%;
}

.package{
    display: flex;
    margin: auto;
    width: 70%;
    background-color: #9FB1BC;
    border: 1.5px solid #412234;
    margin-top: 2%;
    box-shadow: 3px 3px 4px black,-3px -3px 4px black;
    
 

}
.travelimg{
width: 45%;
height: 100%;
padding: 0.2%;
object-fit: contain;

}

h1{
    background-color: #E2C044;
    padding: 3px;
    height: 25%;
     display: flex; /*  using flex to align items vertically and horizontally */
    align-items: center;
    justify-content: center;
    
}
.description{
    display: flex;
    
}
p{
    background-color: #D3D0CB;
    height: 75%;
    padding: 3px;
    font-size: 1.2rem;
    /* display: flex;
    justify-content: center; */
   
}


    </style>
</head>
<body>
    <header id="navbar"><figure><img id="logo" src="yatra.jpg" width="80rem" height="80rem"> 
        <h4 style="display: inline;">Yatra</h4></figure>
    <div id="navlinks">
        <a href="travelpackages.html" class="highlight"> Packages</a>
        </div>
     
</header>

    <!-- <div class="package">

    <img class="travelimg" src="cover.jpeg">

<div class="contentdiv">
    <h1>Heading</h1>
    <p>This is a brief description about the package</p>
</div>
    </div>
    <div class="package">

        <img class="travelimg" src="bg1.jpg">
    
    <div class="contentdiv">
        <h1>Heading</h1>
        <p class="description">This is a brief description about the package</p>
    </div> -->
    <!-- </div> -->
    <?php 
    require "connection.php";
    $query="Select * from tpackages";
    $res=$con->query($query);

    foreach($res as $item)
        {
        //     echo "{$item['cover']}";
        //    $imageData = base64_encode($item['cover']);
        //  $src = 'data:image/png;base64,' . $imageData; // Adjust the MIME type accordingly
       
        //      echo "<img src='{$src}'>";
             echo"<div class='package'>

    <img class='travelimg' src='cover.jpeg'>

<div class='contentdiv'>
    <h1>{$item['title']}</h1>
    <p>
    <span>{$item['description']}</span><br>
    <span><strong>Cost per person:</strong><span>{$item['cost']}</span><br>
    <span><strong>Pick up Location:</strong><span>{$item['pickuplocation']}</span><br>
    <span><strong>Drop Location:</strong><span>{$item['droplocation']}</span><br>
    <span><strong>Date:</strong><span>{$item['date']}</span><br>
    <button id='signsubmit' style='width:fit-content;'class='logbtn'>Submit</button>
    </p>
    
</div>
    </div>";
        }
        // function getMimeType($imageData) {
        //     // Implement logic to determine the MIME type of the image data (e.g., using header detection)
        //     return 'image/jpeg'; // Replace with actual MIME type detection logic
        //   }
    ?>
        
</body>
</html>