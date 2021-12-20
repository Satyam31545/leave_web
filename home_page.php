<?php 
 session_start();

if($_SESSION["position"] == '2'){
  include 'admin_header.php';
  }
   if ($_SESSION["position"] == '1'){
    include 'coordinator_header.php';
  }
  if($_SESSION["position"] == '0'){
    include 'staff_header.php';
  }

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <style>
         #infodiv{
        justify-content: center;
          display: flex;
      }
      #info{
           
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 550px;
          font-size:30px;
          border-radius: 25px;
      }
      #heads{
        justify-content: center;
          display: flex;
        font-size:50px;
        color:white;
        background: green;
        border-radius: 25px 25px 0px 0px;
        font-family: 'Playfair Display', serif;
      }
      .span{
        margin-left:20px ;
        color:rgb(162, 9, 223);
      }
      label{
          color:rgb(151, 0, 131);}
          body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30));
    }
    @media screen and (max-width: 500px) {
    .span{
        margin-left:15px ;
        font-size:30px;
      }
      #heads{ font-size:40px;}
  
}
   @media screen and (max-width: 376px) {
    .span{
    
    font-size:25px;
  }
      #heads{ font-size:30px;}
  
}
    </style>
</head>

<?php  
include "config.php";
$username = $_SESSION["username"];
$sql = "SELECT * FROM leave_table WHERE username = '{$username}'";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

?>
    <div id="infodiv"><div id="info">
    <div id="heads">Leave Remaining</div><br>
<span class="span"><label> CL - </label><?php  echo $row['CL']; ?></span><br>
<span class="span"><label> EL - </label><?php   echo $row['EL']; ?></span><br>
<span class="span"><label> DL - </label><?php   echo $row['DL']; ?></span><br>
<span class="span"><label> ML - </label><?php   echo $row['ML']; ?></span><br>
<span class="span"><label> LWP - </label><?php  echo $row['LWP'];  ?></span><br>
<span class="span"><label> HD - </label><?php  echo $row['HD'];  ?></span><br>
<span class="span"><label> SL - </label><?php   echo $row['SL']; ?> </span>
   </div></div>
   <?php   } }?>


</body>
</html>