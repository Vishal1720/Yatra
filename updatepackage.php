<?php
include 'connection.php';
if(isset($_POST['updbtnpack'])){
   
    if(isset($_POST['packtoUpdate']))
      {
        $id =$_POST['packtoUpdate'];
        $query="SELECT * FROM `tpackages` where id='$id' ";
        
        $res=$con->query($query);
        if($res->num_rows>=1)
        {
            
            foreach($res as $pack)
               {
                $tpid=$pack['ID'];
                $tpTitle=$pack['title'];
                $tpDesc=$pack['description'];
                $tpDate=$pack['date'];
                $tpPickup=$pack['pickuplocation'];
                $tpDrop=$pack['droplocation'];
                $tpCost=$pack['cost'];
               }
        }
      }
}
?>
<style>
.packcontainer{
    display: grid;
    grid-template-columns: repeat(4,0.1fr);
}
#updatepackform{
    background-color: rgba(35,206,107,0.4);
    border: 2px solid black;
    backdrop-filter:blur(20px);
    padding: 20px;
}
</style>
<?php
if(isset($tpid,$tpTitle,$tpDesc,$tpPickup,$tpDrop,$tpDate,$tpCost)){
    
    ?>
<link rel='stylesheet' href='index.css'>
<form id='updatepackform' method='post' action='' style='width:50%;margin:auto;margin-bottom:20px;'>
<h2>Update package</h2>
<div class='packcontainer'>
<label class='loglbl'>Title</label>
<input type='hidden' name='packid' value=" <?php echo $tpid; ?>">
        <input required type='text' name='tptitle'
         value="<?php echo $tpTitle; ?>" class='logfields' placeholder='Enter title'>

         <label class='loglbl'>Description</label>
        <input required type='text' name='tpdesc'
         value=" <?php echo $tpDesc ?>"; class='logfields' placeholder='Enter description'>

         <label class='loglbl'>Pickup</label>
         <input required type='text' name='tppickup'
          value=" <?php echo $tpPickup ?>"; class='logfields' placeholder='Enter pickup location'>

          <label class='loglbl'>Drop</label>
         <input required type='text' name='tpdrop'
          value=" <?php echo $tpDrop ?>"; class='logfields' placeholder='Enter drop location'>

          <label class='loglbl'>Date</label>
          <input required type='date' name='tpdate'
           value="<?php echo $tpDate; ?>"; class='logfields' placeholder='Enter date'>
          
          
           <label class='loglbl'>Cost</label>
           <input required type="text" pattern="[0-9]+" title="Enter valid cost" name="tpcost"
            value="<?php echo $tpCost; ?>"; class='logfields' placeholder='Enter cost'>
           </div>
           <button type='submit' style='width:70%;margin-left:10%' id='logsubmit' name='updatepackquerybtn' class='logbtn'>Update</button>
</form>
<?php } ?>

<?php

if(isset($_POST['updatepackquerybtn']))
{
    $newtitle=addslashes($_POST['tptitle']);
    $newdesc=addslashes($_POST['tpdesc']);
    $newpickup=addslashes($_POST['tppickup']);
    $newdrop=addslashes($_POST['tpdrop']);
    $newdate=$_POST['tpdate'];
    $idforwhere=$_POST['packid'];
    $newcost=$_POST['tpcost'];
    if(isset($idforwhere,$newtitle,$newdesc,$newdate,$newpickup,$newdrop,$newcost))
    {
        $query2="UPDATE `tpackages` SET `title`='$newtitle',
        `ID`='$idforwhere',`description`='$newdesc',`date`='$newdate',
        `pickuplocation`='$newpickup',
        `droplocation`='$newdrop',`cost`='$newcost' WHERE id='$idforwhere' ";
        $res=$con->query($query2);
    }
}
?>