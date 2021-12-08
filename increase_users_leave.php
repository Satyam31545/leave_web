<?php
ob_start();

session_start();
include "config.php";
if($_SESSION["position"] != '2'){
  header("Location: {$frontpage}");
}

if($_SESSION["position"] == '2'){
  include 'admin_header.php';
  }
   if ($_SESSION["position"] == '1'){
    include 'coordinator_header.php';
  }
  if($_SESSION["position"] == '0'){
    include 'staff_header.php';
  }

     include "config.php";
 
  
 ?>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Increase Leave</title>
    <style>
          #formdiv{
        justify-content: center;
          display: flex;
      }
      #form{
 
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 670px;
          border-radius: 15px;
          padding-left:20px;
      }
      
      #submit{
         
          font-size: 19px;
          width:60px;
          border:2px solid red;
          color:red;
          cursor: pointer;
          border-radius: 0px;
          padding-left:0px;

      }
      #submit:hover{
        color:white;
        background-color: red;
      }
      input{
          width:90%;
          border:2px solid rgb(214, 58, 193);
          border-radius: 6px;
          padding-left:10px;
          height: 30px;
          font-size: 20px;

      }

      label{
        color:rgb(49, 0, 43);
          font-size: 30px;
          }
          body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30)) fixed;
 }
 @media screen and (max-width: 500px) {
        #head{ font-size:38px;}
        label{font-size:26px;}
        input{
          height: 25px;
          font-size: 16px;
        }
  

      }
      @media screen and (max-width: 376px) {
    label{
      margin-left:5px ;
      font-size:22px;
      }
      #head{ font-size:30px;}
      input{
          height: 22x;
          font-size:18px;
        }
     
 }

          </style>
</head>
<body>    <div id="head">Edit All Leave Data</div> <br><br>


          <div id="formdiv"><div id="form"><br><br>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
        
           
        <label>CL :  </label><br><input type="text" name="CL" ><br><br>
        <label>EL : </label><br><input type="text" name="EL" ><br><br>
        <label>DL : </label><br><input type="text" name="DL" ><br><br>
       
        <label>ML :  </label><br><input type="text" name="ML" ><br><br>
        <label>LWP :  </label><br><input type="text" name="LWP"><br><br>
        <label>HD :  </label><br><input type="text" name="HD" ><br><br>
        <label>SL :  </label><br><input type="text" name="SL" ><br><br>

        <input type="submit" name="edit" value="edit" id="submit"> 
    </form>
    </div></div>
    <?php


if(isset($_POST['edit'])){
 

    $CL =mysqli_real_escape_string($conn,$_POST['CL']);
    $EL = mysqli_real_escape_string($conn,$_POST['EL']);
    $DL = mysqli_real_escape_string($conn,$_POST['DL']);
    $ML = mysqli_real_escape_string($conn,$_POST['ML']);
    $LWP = mysqli_real_escape_string($conn,$_POST['LWP']);
    $HD = mysqli_real_escape_string($conn,$_POST['HD']);
    $SL = mysqli_real_escape_string($conn,$_POST['SL']);


  $sql = "UPDATE leave_table SET CL = {$CL}, EL = {$EL}, DL = {$DL}, ML = {$ML}, LWP = {$LWP}, HD = {$HD}, SL = {$SL}";
 

    if(mysqli_query($conn,$sql)){
      
      header("Location: {$hostname}/increase_users_leave.php");
    }
}
?>
              
    </body>
</html>