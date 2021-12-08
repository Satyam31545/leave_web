<?php
  include "config.php";
  session_start();
$sql1 ="";
$leave_id = $_GET['id'];
  if($_SESSION["position"] == '2'){
    $sql1 .= "UPDATE status SET admin_status = 'yes',coordinator_status = 'yes' WHERE id = {$leave_id};";
    }
     if ($_SESSION["position"] == '1' ){
      $sql1 .= "UPDATE status SET coordinator_status = 'yes' WHERE id = {$leave_id}";
    }
// from status
    $sql = "SELECT * FROM status WHERE id = {$leave_id}";
 
    $result = mysqli_query($conn, $sql) or die("Query Failed.");

    $row = mysqli_fetch_assoc($result);
    $leavetype = $row['leave_type'];
    $total_leave = $row['total_leave'];


   
// from leave_table
$sql3 = "SELECT * FROM leave_table WHERE username = '{$row['username']}' ";

    $result3 = mysqli_query($conn, $sql3) or die("Query Failed.");

    $row3 = mysqli_fetch_assoc($result3);

$total_old_leave =  $row3[$row['leave_type']];

$total_new_leave = $total_old_leave - $total_leave;


    if($_SESSION["position"] == '2'  || ($_SESSION["position"] == '1' && $row['admin_status'] == 'yes')){
    $sql2 = "UPDATE leave_table SET $leavetype = '{$total_new_leave}' WHERE username = '{$row['username']}'";
    mysqli_query($conn,$sql2) or die("cannot update");}

    if(mysqli_multi_query($conn,$sql1)){header("Location: {$hostname}/leave_request.php");}


?>

