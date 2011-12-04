<?php // allows the teacher to message all their pupils that have iDevices ?>
<?php // $username=$_GET['u'];?>
<?php include("db.php")?>
<form id="sendmessage2">
    <div>



      <input type="text" id="messg2" />

      <input type="submit" />
    </div>
  </form>
  <span id="fbk2"></span>
<script src="../js/sendtoall.php?u=<?php echo $username?>"></script>