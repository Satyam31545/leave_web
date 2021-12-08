<?php 
ob_start();
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
    <title>Change Password</title>
    <style>
 #passdiv{
        justify-content: center;
          display: flex;
      }
      #pass{
 
          background-color: rgb(183, 183, 228);
          border-radius: 15px;
          width: 450px;
          height: 400px;
          padding:20px;
         
      }
      #submit{
         
         font-size: 19px;
         margin-left: 20px;
         width:100px;
          border:2px solid red;
          color:red;
          border-radius: 0px;
          padding-left:0px;
          cursor: pointer;

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
     body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30));
    }
    body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30)) fixed;
 }
    </style>
</head>
<body>
<div id="head">
Change Password
            </div><br><br>
    <div id="passdiv">
        <div id="pass">
            
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST"><br>
          
<label>Old Password :</label><input type="password" name="old_pass" ><br><br>
<label>New Password :</label><input type="password" name="new_pass" ><br><br>
<input type="submit" name="change" value="change" id = "submit">
        </form>
        </div>
    </div>
<?php  

include "config.php";
   if(isset($_POST['change'])){
$password = $_SESSION["password"];
$username = $_SESSION["username"];
$new_password =$_POST['new_pass'];
if($password == $_POST['old_pass']){

 $sql = "UPDATE user_table SET password = '{$new_password}' WHERE username = '{$username}'";

    if(mysqli_query($conn,$sql)){
        header("Location: {$hostname}/home_page.php");
    }


   }else{
    echo "<p style='color:red;font-size: 19px;text-align:center;margin: 10px 0;'>Wrong Password Entered.</p>";
  }
        }


  ?>

</body>
</html>