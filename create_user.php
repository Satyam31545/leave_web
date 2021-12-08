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
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create user</title>
    <style>
          #formdiv{
        justify-content: center;
          display: flex;
      }
      #form{
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 680px;
          border-radius: 15px;
          padding-left:20px;
      }
      label{
          color:rgb(49, 0, 43);
          font-size: 30px;
          }
      #submit{
         
          font-size: 19px;
          width:60px;
          border:2px solid red;
          color:red;
          margin-left:10px ;
          cursor: pointer;
          border-radius: 0px;
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

    select{
        border:2px solid rgb(214, 58, 193);
        border-radius: 6px;     
             width:90%;
             height: 30px;
             font-size: 20px;

      }
      @media screen and (max-width: 500px) {
        #head{ font-size:38px;}
        label{font-size:26px;}
        input{
          height: 25px;
          font-size: 16px;
        }
        select{
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
        select{
          height: 25px;
          font-size: 16px;
        }
      }
      body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30)) fixed;
 }
    </style>
</head>
<body>
<div id="head">Create User</div> <br><br>
    <div id="formdiv"><div id="form">

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST"><br><br>
           
        <label>Full Name :  </label><br><input type="text" name="fullname"><br><br>
        <label>User Name : </label><br><input type="text" name="username"><br><br>
        <label>Position : </label><br><select class="form-control" name="position" >
                              <option value="0">Normal staff</option>
                              <option value="1">coordinator</option>
                                    </select><br><br>
        <label>Sex :  </label><br><select class="form-control" name="sex" >
                              <option value="0">Male</option>
                              <option value="1">Female</option>
                                    </select><br><br>
        <label>Mobile no. :  </label><br><input type="text" name="mobile"><br><br>
        <label>Address :  </label><br><input type="text" name="address"><br><br>
        <label>coordinator :  </label><br><select class="form-control" name="coordinator">
          <?php 
          
          $sql = "SELECT * FROM user_table WHERE position = 1 || position = 2";
          $result1 = mysqli_query($conn, $sql) or die("Query Failed.");
          
          while($row = mysqli_fetch_assoc($result1)){
            echo "<option value='{$row['username']}'>{$row['fullname']}</option>";}
          
          ?></select><br><br><br>
     
        <input type="submit" name="save" value="save" id="submit"> 
    </form>
    </div></div>
    <?php
    if(isset($_POST['save'])){


  $fullname =mysqli_real_escape_string($conn,$_POST['fullname']);
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $position = mysqli_real_escape_string($conn,$_POST['position']);
  $sex = mysqli_real_escape_string($conn,$_POST['sex']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);
  $coordinator = mysqli_real_escape_string($conn,$_POST['coordinator']);
  $password =  mysqli_real_escape_string($conn,$_POST['username']);
  $secret_word =  "book";
  $sql = "SELECT * FROM user_table WHERE username = '{$username}'";
          $result = mysqli_query($conn, $sql) or die("");
  if(mysqli_num_rows($result) > 0){
    
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
  }else{
    $sql1 = "INSERT INTO leave_table (username)
              VALUES ('{$username}')";
              $sql2 = "INSERT INTO user_table (fullname,username, position, password, sex,mobile_no, address, coordinator,secret_word)
              VALUES ('{$fullname}','{$username}','{$position}','{$password}','{$sex}','{$mobile}','{$address}','{$coordinator}','{$secret_word}')";
              mysqli_query($conn,$sql2);
    if(mysqli_query($conn,$sql1)){
     
      header("Location: {$hostname}/create_user.php");
     
    }else{
      echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
    }
  }
}


?>
</body>
</html>