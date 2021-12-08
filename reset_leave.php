<?php


include "config.php";

$sql = "UPDATE leave_table SET CL = 24,DL = 0,EL = 0,ML = 0,LWP = 0,HD = 0,SL = 0";
if(mysqli_query($conn,$sql)){
    header("Location: {$hostname}/home_page.php");
}
?>