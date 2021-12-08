<?php
  include "config.php";
  $leave_id = $_GET['id'];
$sql2 = "UPDATE status SET rejection = 'yes' WHERE id = {$leave_id}";

if(mysqli_query($conn,$sql2)){header("Location: {$hostname}/leave_request.php");
}

?>
