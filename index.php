<!-- This web site is develop and designed by Satyam Singh-->
<!-- BCA 1st sem. RSMT -->
<!-- Github Account :- https://github.com/Satyam31545 -->
<!-- Date :- 17/11/2021 -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front_page</title>
    <style>
      #header{
        margin-top: 0px;
      padding-top: 0px;
      background-color: white;
      color: rgb(26, 26, 51);
      width: 100%;
      height: 60px;
      font-size: 40px;
      padding-left: 4px;
      opacity: 0.5;
    }

    #formdiv {
      justify-content: center;
      display: flex;
    }

    #form {
      justify-content: center;
      display: flex;
      background-color: rgb(255, 255, 255);
      width: 340px;
      height: 450px;
      border-radius: 25px;
    }

    #head {
      color: rgb(0, 0, 0);
      font-size: 35px;
      display: flex;

      justify-content: center;
    }

    #submit {
      color: red;
      font-size: 19px;
      width: 80px;
      margin-left: 10px;
      border-radius: 25px;
      border: 4px solid red;

    }

    input {
      width: 170px;
      border: 4px solid;
      border-radius: 14px;
      height: 40px;
      padding-left: 15px;
      border-color: red green red green;

    }

    input:hover {
      border-color: green;

    }

    #submit:hover {
      width: 80px;
      background-color: red;
      color: rgb(255, 255, 255);
      border: 4px solid green;
    }

    body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30));
    }
    a{
        text-decoration: none;
    }
    a:hover{
     color:red;
   }
   p{
      color:red;text-align:center;margin: 10px 0;font-size: 26px;
     }
    </style>
</head>
<body>
    <div id="header">Apply for Leave</div><br>
    <div id="formdiv"><div id="form">
    
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
            <div id="head">LOGIN</div> <br><br>
       
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" name="login" value="login  " id="submit"> <br><br>
        <a href="forgot_password.php">Forgot Password</a>
    </form></div>
        </div>

         <!-- form ends here -->
    <?php
  
    if(isset($_POST['login'])){
        include "config.php";
        
        $username =mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
    
        $sql = "SELECT secret_word,username, password, userid,position FROM user_table WHERE username = '{$username}' AND password= '{$password}'"; 

        $result = mysqli_query($conn, $sql) or die( "");
         
            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){
                  session_start();
                  $_SESSION["username"] = $row['username'];
                  $_SESSION["password"] = $row['password'];
                  $_SESSION["userid"] = $row['userid'];
                  $_SESSION["book"] = $row["secret_word"];
                  $_SESSION["position"] = $row['position'];



                  header("Location: {$hostname}/home_page.php");
                }
          }else{
            echo "<p>Wrong Username Or Password.</p>";
          }

        
}
    ?>
</body>
</html>