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
  
  include "config.php";
  $username = $_SESSION["username"];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Leave</title>
    <style>
         #formdiv{
        justify-content: center;
          display: flex;
      }
      #form{
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 640px;
          border-radius: 15px;
          padding-left:20px;

      }
      
      #submit{
         
          font-size: 19px;
          width:95px;
          border:2px solid red;
          color:red;
          cursor: pointer;
          border-radius: 0px;
          padding-left:0px;

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
      label{
          color:rgb(49, 0, 43);
          font-size: 30px;
          }
          #submit:hover{
        color:white;
        background-color: red;
      }
          textarea{
            border:2px solid rgb(214, 58, 193);
            width:90%;
            font-size: 25px;
            padding-left:10px;
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
        textarea{   font-size: 16px;}

      }
      @media screen and (max-width: 376px) {
    label{
      margin-left:5px ;
      font-size:22px;
      }
      #head{ font-size:30px;}
      input{
          height: 22x;
          font-size:20px;
        }
        select{
          height: 25px;
          font-size: 20px;
        }
        textarea{   font-size: 20px;} }
     body {
      user-select: none;
      background: linear-gradient(rgb(61, 90, 221), rgb(64, 233, 30)) fixed;
    }
    </style>
</head>
<body>
<div id="head">
Apply For Leave
            </div><br><br>
    <div id="formdiv">
        <div id="form">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST"><br><br>
      
            <label>Type of Leave : </label><br><select class="form-control" name="leave_type" id = "leave_type" onclick = "halfday()">
                              <option value="CL">CL</option>
                             <option value='EL'>EL</option>
                             <option value='DL'>DL</option>
                             <option value='ML'>ML</option>
                             <option value='LWP'>LWP</option>
                             <option value='HD'>HD</option>
                             <option value='SL'>SL</option>
                             
                                    </select><br><br> 
            <label>Reason :  </label><br><textarea name="reason" id="" cols="22" rows="5"></textarea><br><br>
        <label id ="from_date_label" >Leave From : </label><br><input type="date" name="from_date" id="from_date"><br><br>
        <label id ="to_date_label">Leave Upto : </label><br><input type="date" name="to_date" id = "to_date"><br><br>

        
        <label>Address During Leave:  </label><br><input type="text" name="leave_address" id="">  <br><br>
        <input type="submit" id="submit" name ="request" value="Request">
      </form></div>
    </div> <?php  
    
    if(isset($_POST['request'])){

  $leave_type = mysqli_real_escape_string($conn,$_POST['leave_type']);
  $reason = mysqli_real_escape_string($conn,$_POST['reason']);
  $from_date =mysqli_real_escape_string($conn,$_POST['from_date']);
  $to_date = mysqli_real_escape_string($conn,$_POST['to_date']);
  $leave_address = mysqli_real_escape_string($conn,$_POST['leave_address']);

  $date1 = new DateTime($from_date);

  $date2 = new DateTime($to_date);
  
  $interval = $date1->diff($date2);
  

  $total_leave = $interval->days ;
  $apply_date = date("Y-m-d");

if($leave_type == "HD"){
  $to_date = $from_date;
  $total_leave = 1;
}

  if($_SESSION["position"] == '2'){
    $no = "yes";
      }else{
   $no = "no"; 
      }

  $sql2 = "INSERT INTO status (leave_type,reason, from_date, to_date, leave_address,apply_date, username,admin_status,total_leave)
              VALUES ('{$leave_type}','{$reason}','{$from_date}','{$to_date}','{$leave_address}','{$apply_date}','{$username}','{$no}','{$total_leave}')";


              
    if(mysqli_query($conn,$sql2)){

      echo "<p style='color:darkgreen;'>Leave Applyed.</p>";
    } 
}

 

    ?>
    <script type="text/javascript">
     function halfday(){  if(document.getElementById("leave_type").value == "HD"){
      
      document.getElementById("from_date_label").innerHTML = "On Date : ";
      document.getElementById("to_date_label").style.display = "none";
      document.getElementById("to_date").style.display = "none";}else{
        document.getElementById("to_date_label").style.display = "";
      document.getElementById("to_date").style.display = "";
       document.getElementById("from_date_label").innerHTML = "Leave From : ";
      }
     
    }
    </script>


</body>
</html>