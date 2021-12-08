<?php
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
    <title>Documnt</title>
    <style>
       table, th, td{
           border: 1px solid black;
       }
       table{
           width: 100%;
           border-collapse: collapse;
           empty-cells:initial;
         margin-top: 0px;
         padding-top: 0px;
       }
       body {
      user-select: none;
      background: #e6b8b8;
 }
    </style>
</head>
<body>
    <?php  
     include "config.php";
    $sql = "SELECT * FROM user_table";
               
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
    
    ?>
    <table>
        <tr>
            <th colspan="7"><?php echo $row['fullname']; ?></th>
        </tr>
        <tr>
            <th colspan="7">Type Of Leave</th>
        </tr>
        <tr>
       
            <th>CL</th>
            <th>EL</th>
            <th>ML</th>
            <th>DL</th>
            <th>LWP</th>
            <th>HD</th>
            <th>SL</th>
        </tr>

   
        <?php  
    // cl **************************
    $sql_cl = "SELECT * FROM status WHERE username = '{$row['username']}' AND coordinator_status = 'yes' AND admin_status = 'yes' ";
    $result_cl = mysqli_query($conn, $sql_cl) or die("Query Failed.");
  ?>
<?php  
$cl_leave = 0;
$el_leave = 0;
$ml_leave = 0;
$dl_leave = 0;
$hd_leave = 0;
$sl_leave = 0;
$lwp_leave = 0;
$s_no = 1;

       
           while($row_cl = mysqli_fetch_assoc($result_cl)){
          ?>

        <tr>
         
            <?php
             if($row_cl['leave_type'] == 'CL'){$cl_leave += $row_cl['total_leave'];} 
           

             if($row_cl['leave_type'] == 'EL'){ $el_leave += $row_cl['total_leave'];} 
          

             if($row_cl['leave_type'] == 'ML'){ $ml_leave += $row_cl['total_leave'];} 
        

             if($row_cl['leave_type'] == 'DL'){ $dl_leave += $row_cl['total_leave'];} 
            
            
             if($row_cl['leave_type'] == 'LWP'){ $lwp_leave += $row_cl['total_leave'];} 
          

             if($row_cl['leave_type'] == 'HD'){ $hd_leave += $row_cl['total_leave'];} 
    

             if($row_cl['leave_type'] == 'SL'){ $sl_leave += $row_cl['total_leave'];}    } ?>
       
        <tr>
           
            <th>Total Leave : <?php echo $cl_leave; ?></th>
            <th>Total Leave : <?php echo $el_leave; ?></th>
            <th>Total Leave : <?php echo $ml_leave; ?></th>
            <th>Total Leave : <?php echo $dl_leave; ?></th>
            <th>Total Leave : <?php echo $lwp_leave; ?></th>
            <th>Total Leave : <?php echo $hd_leave; ?></th>
            <th>Total Leave : <?php echo $sl_leave; ?></th>
        </tr>
        <tr>
        <?PHP 
             $sql2 = "SELECT * FROM leave_table WHERE username = '{$row['username']}'";
             $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
             $row2 = mysqli_fetch_assoc($result2);
             ?>
            <th>Extra Leave : <?php if($row2['CL'] < 0 ){echo -$row2['CL'];}else{ echo "0"; } ?></th>
            <th>Extra Leave : <?php if($row2['EL'] < 0 ){echo -$row2['EL'];}else{ echo "0"; } ?></th>
            <th>Extra Leave : <?php if($row2['ML'] < 0 ){echo -$row2['ML'];}else{ echo "0"; } ?></th>
            <th>Extra Leave : <?php if($row2['DL'] < 0 ){echo -$row2['DL'];}else{ echo "0"; } ?> </th>
            <th>Extra Leave : <?php if($row2['LWP'] < 0 ){echo -$row2['LWP'];}else{ echo "0"; } ?></th>
            <th>Extra Leave : <?php if($row2['HD'] < 0 ){echo -$row2['HD'];}else{ echo "0"; } ?></th>
            <th>Extra Leave : <?php if($row2['SL'] < 0 ){echo -$row2['SL'];}else{ echo "0"; } ?></th>
        </tr>
        <tr>
         
            <th colspan="7">Balance leave : <?PHP echo $row2['CL'] +$row2['EL'] + $row2['ML'] + $row2['DL'] + $row2['SL'] + $row2['LWP'] + $row2['HD'] ;   ?></th>
            
        </tr>
     </table>
     <br><br>
     <?php } } ?>
     <br>
     
</body>
</html>