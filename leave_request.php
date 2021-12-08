<?php 
 session_start();

 include "config.php";
 if($_SESSION["position"] != '2' && $_SESSION["position"] != '1'){
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
    <title>Leave Request</title>
    <style>
         #infodiv{
        justify-content: center;
          display: flex;
      }
      #info{
           
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 100%;
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
      }
      #info>span{
        margin-left:20px;
        color:rgb(116, 62, 216);
        font-size:30px;      }
      label{
          color:rgb(49, 0, 43);}
   .btn{
    font-size: 19px;
          margin-left: 10px;
          border: 2px solid red;
          color: red;
          background-color: white;
          text-decoration: none;
        
   }
   .btn:hover{     color:white;
        background-color: red;}
   @media screen and (max-width: 500px) {
    #info>span{
        margin-left:15px ;
        font-size:30px;
      }
      #heads{ font-size:40px;}
  
}
   @media screen and (max-width: 376px) {
    #info>span{
    
    font-size:25px;
  }
      #heads{ font-size:30px;}
  
}
body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30)) fixed;
 }
    </style>
</head>
<body>
    <div id="infodiv">
        <div id="info">
            <div id="heads">
                Leave Application
            </div><br>

            <?php
           
           
            $username = $_SESSION["username"];


            $sql = "SELECT * FROM user_table JOIN status
            ON user_table.username = status.username ";

        if($_SESSION["position"] == '2'){
            $sql .= " WHERE status.username != '{$username}' ORDER BY status.id DESC";
        }
        if($_SESSION["position"] == '1'){
            $sql .= " WHERE user_table.coordinator = '{$username}' ORDER BY status.id DESC";
        }
        

    $result = mysqli_query($conn, $sql) or die("Query Failed.");
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

      if($_SESSION["position"] == '1' || ($_SESSION["position"] == '2' && $row['coordinator_status'] == "yes") || ($_SESSION["position"] == '2' && $row['coordinator'] == $username)){

        $leave_id = $row['id'];
        $coordinator = $row['coordinator'];

            ?>

<span><label> Fullname - </label><?php  echo $row['fullname']; ?></span><br>
<span><label> Username - </label><?php   echo $row['username']; ?></span><br>
<span><label> Apply Date - </label><?php   echo $row['apply_date']; ?></span><br>
<span><label> Leave From - </label><?php   echo $row['from_date']; ?></span><br>
<span><label> Leave Upto - </label><?php  echo $row['to_date'];  ?></span><br>
<span><label> Total days - </label><?php  echo $row['total_leave'];  ?></span><br>
<span><label> Reason - </label><?php  echo $row['reason'];  ?></span><br>
<span><label> Leave Address - </label><?php   echo $row['leave_address']; ?> </span><br>
<span><label> Leave Type - </label><?php   echo $row['leave_type']; ?> </span><br>
<span><label> Mobile No. - </label><?php   echo $row['mobile_no']; ?> </span><br>

<?php if($row['coordinator_status'] == "yes" && $row['admin_status'] == "yes"){
    echo "<span style='color:green;'>Approved</span><br>";
}elseif($row['rejection'] == "yes"){
    echo "<span style='color:red;'>Rejected</span><br>";
}else{
    echo "<span style='color:yellow;'>Pending...</span><br>";
}
?><br><br>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">

<?php
if(($_SESSION["position"] == '2' && $row['admin_status'] == "no" &&  $row['rejection'] == "no") || ($_SESSION["position"] == '1' && $row['coordinator_status'] == "no" && $row['rejection'] == "no" )){ ?>

<a href='approve.php?id=<?php echo $leave_id; ?>' class="btn"> Approve </a>
<a href='reject.php?id=<?php echo $leave_id; ?>' class="btn">  Reject  </a>

<?php } ?>
</form>
<hr>

<?php  }
                      }
              }else{
    echo "no data found";
}



?>

</div>
    </div>
    
</body>
</html>