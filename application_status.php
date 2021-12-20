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
    <title>Application Status</title>
    <style>
body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30)) fixed;
 }
         #infodiv{
        justify-content: center;
          display: flex;
      }
      #info{
           
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 100%;
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

      #info>span{
        margin-left:20px;
        color:rgb(116, 62, 216);
        font-size:35px;      }
      label{
          color:rgb(49, 0, 43);
        
          }
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
    </style>
</head><body>

    <div id="infodiv"><div id="info">
    <div id="heads">Application Status</div><br>

    <?php  
include "config.php";
$username = $_SESSION["username"];
$sql = "SELECT * FROM status WHERE username = '{$username}'  ORDER BY status.id DESC";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

?>

<span><label> Coordinator Approval - </label><?php  echo $row['coordinator_status']; ?></span><br>
<span><label> Admin Approval - </label><?php   echo $row['admin_status']; ?></span><br>
<span><label> Leave From -</label><?php  echo $row['from_date']; ?></span><br>
<span><label> Leave Upto -</label><?php   echo $row['to_date']; ?></span><br>
<span><label> Leave Upto -</label><?php   echo $row['leave_type']; ?></span><br>
<span><label> Total Days - </label><?php   echo $row['total_leave']; ?></span><br>
<?php if($row['coordinator_status'] == "yes" && $row['admin_status'] == "yes"){
    echo "<span style='color:green;'>Approved</span><br>";
}elseif($row['rejection'] == "yes"){
    echo "<span style='color:red;'>Rejected</span><br>";
}else{
    echo "<span style='color:yellow;'>Pending...</span><br>";
}
?>
<hr><br>

<?php   } }else{
    echo "<p>no data found</p>";
}?>
   </div></div>
   
</body>
</html>