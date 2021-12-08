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
            <th colspan="15"><?php echo $row['fullname']; ?></th>
        </tr>
        <tr>
            <th colspan="15">Type Of Leave</th>
        </tr>
        <tr>
        <th rowspan="2" width = "50">S.No.</th>
            <th colspan="2">CL</th>
            <th colspan="2">EL</th>
            <th colspan="2">ML</th>
            <th colspan="2">DL</th>
            <th colspan="2">LWP</th>
            <th colspan="2">HD</th>
            <th colspan="2">SL</th>
        </tr>

        <tr>
            <th width = "100">From</th>
            <th width = "100">to</th>
            <th width = "100">From</th>
            <th width = "100">to</th>
            <th width = "100">From</th>
            <th width = "100">to</th>
            <th width = "100">From</th>

            <th width = "100">to</th>
            <th width = "100">From</th>
            <th width = "100">to</th>
            <th width = "100">From</th>
            <th width = "100">to</th>
            <th width = "100">From</th>
            <th width = "100">to</th>
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
          <td><?php echo $s_no; $s_no += 1; ?></td>
            <td><?php if($row_cl['leave_type'] == 'CL'){ echo date_format(new DateTime( $row_cl['from_date']), "d-m-Y"); $cl_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'CL'){  echo date_format(new DateTime( $row_cl['to_date']), "d-m-Y"); } ?></td>

            <td><?php if($row_cl['leave_type'] == 'EL'){ echo date_format(new DateTime( $row_cl['from_date']), "d-m-Y"); $el_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'EL'){ echo date_format(new DateTime( $row_cl['to_date']), "d-m-Y");} ?></td>

            <td><?php if($row_cl['leave_type'] == 'ML'){ echo date_format(new DateTime( $row_cl['from_date']), "d-m-Y"); $ml_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'ML'){  echo date_format(new DateTime( $row_cl['to_date']), "d-m-Y");} ?></td>

            <td><?php if($row_cl['leave_type'] == 'DL'){ echo date_format(new DateTime( $row_cl['from_date']), "d-m-Y"); $dl_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'DL'){ echo date_format(new DateTime( $row_cl['to_date']), "d-m-Y");} ?></td>
            
            <td><?php if($row_cl['leave_type'] == 'LWP'){ echo date_format(new DateTime( $row_cl['from_date']), "d-m-Y"); $lwp_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'LWP'){ echo date_format(new DateTime( $row_cl['to_date']), "d-m-Y");} ?></td>

            <td><?php if($row_cl['leave_type'] == 'HD'){ echo date_format(new DateTime( $row_cl['from_date']), "d-m-Y"); $hd_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'HD'){ echo date_format(new DateTime( $row_cl['to_date']), "d-m-Y");} ?></td>

            <td><?php if($row_cl['leave_type'] == 'SL'){ echo date_format(new DateTime( $row_cl['from_date']), "d-m-Y"); $sl_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'SL'){echo date_format(new DateTime( $row_cl['to_date']), "d-m-Y");} ?></td>
        </tr><?php   } ?>
       
        <tr>
           <th rowspan="2"></th>
            <th colspan="2">Total Leave : <?php echo $cl_leave; ?></th>
            <th colspan="2">Total Leave : <?php echo $el_leave; ?></th>
            <th colspan="2">Total Leave : <?php echo $ml_leave; ?></th>
            <th colspan="2">Total Leave : <?php echo $dl_leave; ?></th>
            <th colspan="2">Total Leave : <?php echo $lwp_leave; ?></th>
            <th colspan="2">Total Leave : <?php echo $hd_leave; ?></th>
            <th colspan="2">Total Leave : <?php echo $sl_leave; ?></th>
        </tr>
        <tr>
        <?PHP 
             $sql2 = "SELECT * FROM leave_table WHERE username = '{$row['username']}'";
             $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
             $row2 = mysqli_fetch_assoc($result2);
             ?>
            <th colspan="2">Extra Leave : <?php if($row2['CL'] < 0 ){echo -$row2['CL'];}else{ echo "0"; } ?></th>
            <th colspan="2">Extra Leave : <?php if($row2['EL'] < 0 ){echo -$row2['EL'];}else{ echo "0"; } ?></th>
            <th colspan="2">Extra Leave : <?php if($row2['ML'] < 0 ){echo -$row2['ML'];}else{ echo "0"; } ?></th>
            <th colspan="2">Extra Leave : <?php if($row2['DL'] < 0 ){echo -$row2['DL'];}else{ echo "0"; } ?> </th>
            <th colspan="2">Extra Leave : <?php if($row2['LWP'] < 0 ){echo -$row2['LWP'];}else{ echo "0"; } ?></th>
            <th colspan="2">Extra Leave : <?php if($row2['HD'] < 0 ){echo -$row2['HD'];}else{ echo "0"; } ?></th>
            <th colspan="2">Extra Leave : <?php if($row2['SL'] < 0 ){echo -$row2['SL'];}else{ echo "0"; } ?></th>
        </tr>
        <tr>
         
            <th colspan="14">Balance leave : <?PHP echo $row2['CL'] +$row2['EL'] + $row2['ML'] + $row2['DL'] + $row2['SL'] + $row2['LWP'] + $row2['HD'] ;   ?></th>
            
        </tr>
     </table>
     <br><br>
     <?php } } ?>
     <br>
     
</body>
</html>