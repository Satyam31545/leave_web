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
   body {
      user-select: none;
      background: #e6b8b8;
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
      #submit:hover{     color:white;
        background-color: red;}
      input{
          width:90%;
          border:2px solid rgb(214, 58, 193);
          border-radius: 6px;
          padding-left:10px;
          height: 30px;
          font-size: 20px;
         
      }
      #iddiv{
        justify-content: center;
          display: flex;

      }
      #id{

          background-color: #11cde6;
          width: 450px;
          height: 140px;
          border-radius: 20px;
          padding-left:18px;
      }
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
       label{
        color:rgb(49, 0, 43);
          font-size: 20px;
          }
          @media print {
      #iddiv{display: none;}
      }
      @media screen and (max-width: 500px) {
  input{
          height: 25px;
          font-size: 16px;
        } }
      @media screen and (max-width: 376px) {
   input{
          height: 22x;
          font-size:18px;
        } }
          /* autocomplite */
    .autocomplete {
  position: relative;
  display: inline-block;
  
}


.autocomplete-items {
  position: relative;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  width: 90%;
  left: 0;
  right: 0;

}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
 
}

 .autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

 .autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
#auto{
 height: 0px;
}
    </style>
</head>
<body>


    <div id="iddiv"><div id="id"><form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST"><br>
<input type="text" name="username" placeholder="User Name" id = "ogo"><br>
<div id="auto"></div><br>
<input type="submit" name="show" value=" show" id="submit">
</form></div></div><br><br>

<?php
   if(isset($_POST['show'])){
           
                $username = $_POST['username'];
    
                $sql = "SELECT * FROM user_table WHERE username = '{$username}'";
               
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                 $row = mysqli_fetch_assoc($result);
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
    $sql_cl = "SELECT * FROM status WHERE username = '{$username}' AND coordinator_status = 'yes' AND admin_status = 'yes' ";
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
            <td><?php if($row_cl['leave_type'] == 'CL'){ echo $row_cl['from_date']; $cl_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'CL'){ echo $row_cl['to_date']; } ?></td>

            <td><?php if($row_cl['leave_type'] == 'EL'){ echo $row_cl['from_date']; $el_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'EL'){ echo $row_cl['to_date'];} ?></td>

            <td><?php if($row_cl['leave_type'] == 'ML'){ echo $row_cl['from_date']; $ml_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'ML'){ echo $row_cl['to_date'];} ?></td>

            <td><?php if($row_cl['leave_type'] == 'DL'){ echo $row_cl['from_date']; $dl_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'DL'){ echo $row_cl['to_date'];} ?></td>
            
            <td><?php if($row_cl['leave_type'] == 'LWP'){ echo $row_cl['from_date']; $lwp_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'LWP'){ echo $row_cl['to_date'];} ?></td>

            <td><?php if($row_cl['leave_type'] == 'HD'){ echo $row_cl['from_date']; $hd_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'HD'){ echo $row_cl['to_date'];} ?></td>

            <td><?php if($row_cl['leave_type'] == 'SL'){ echo $row_cl['from_date']; $sl_leave += $row_cl['total_leave'];} ?></td>
            <td><?php if($row_cl['leave_type'] == 'SL'){ echo $row_cl['to_date'];} ?></td>
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
     <?php }else{
                echo "<p'>Enter Right Username.</p>";
              }} ?>
     
     <br>

     <script>

// autocomplete script
  function autocomplete(inp, arr) {

    var currentFocus;

    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
     
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        
        document.getElementById("auto").appendChild(a);
     
        for (i = 0; i < arr.length; i++) {
         
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
   
            b = document.createElement("DIV");
        
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
       
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
         
            b.addEventListener("click", function(e) {
          
                inp.value = this.getElementsByTagName("input")[0].value;
             
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
     inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          
          currentFocus++;

          addActive(x);
        } else if (e.keyCode == 38) {  
          
          currentFocus--;
          
          addActive(x);
        } else if (e.keyCode == 13) {
          
          e.preventDefault();
          if (currentFocus > -1) {
           
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
     
      if (!x) return false;
     
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
    
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {

      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
    
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }
  
  

  

  autocomplete(document.getElementById("ogo"), username);
  </script>
     
</body>
</html>