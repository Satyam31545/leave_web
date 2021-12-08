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
    <title>edit user</title>
    <style>
          #formdiv{
        justify-content: center;
          display: flex;
      }
      #form{
      
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 600px;
          border-radius: 15px;
          padding-left:20px;
      }
      
      #submit{
         
          font-size: 19px;
          width:60px;
          border:2px solid red;
          color:red;
          cursor: pointer;
          border-radius:0px;
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
      #iddiv{
        justify-content: center;
          display: flex;

      }
      #id{
       
          background-color: rgb(183, 183, 228);
          width: 450px;
          height: 140px;
          border-radius: 25px;
          padding-left:20px;
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

<div id="head">Change User Data</div> <br><br>
    <div id="iddiv"><div id="id"><form action="<?php $_SERVER['PHP_SELF']; ?>" method ="GET"><br>
    <label>Username :  </label>
<input type="text" name="username" id = "ogo"><br>
<div id="auto"></div><br>
<input type="submit" name="show" value=" Show" id="submit">
</form></div></div><br><br>
<?php
   if(isset($_GET['show'])){
           
                $username = $_GET['username'];
    
                $sql = "SELECT * FROM user_table WHERE username = '{$username}'";
               
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                ?>
    <div id="formdiv"><div id="form">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST"><br><br>
            
        <label>Full Name :  </label><input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname'];  ?>"><br><br>
   
        <label>Position : </label><select class="form-control" name="position" value="<?php echo $row['position'];  ?>" >
        <?php
                              if($row['position'] == 1){
                                echo "<option value='0'>Normal staff</option>
                                      <option value='1' selected>coordinator</option>";
                              }else{
                                echo "<option value='0' selected>Normal staff</option>
                                      <option value='1'>coordinator</option>";
                              }
                            ?>
                                    </select><br><br>
        <label>Sex :  </label><select class="form-control" name="sex"  value="<?php echo $row['sex'];  ?>">
        <?php
                              if($row['sex'] == 1){
                                echo "<option value='0'>Male</option>
                                      <option value='1' selected>Female</option>";
                              }else{
                                echo "<option value='0' selected>Male</option>
                                      <option value='1'>Female</option>";
                              }?>
                                    </select><br><br>
<label>Mobile no. :  </label><input type="text" name="mobile" value="<?php echo $row['mobile_no'];?>"><br><br>
<label>Address :  </label><input type="text" name="address" value="<?php echo $row['address'];?>"><br><br>
<label>coordinator :  </label><select class="form-control" name="coordinator" value="<?php echo $row['coordinator'];?>">
          <?php 
          
          $sql2 = "SELECT * FROM user_table WHERE position = 1 || position = 2";
          $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
          
          while($row2 = mysqli_fetch_assoc($result2)){  ?>
            <option value='<?php echo $row2['username'] ?>' <?php 
            if($row['coordinator'] == $row2['username']){
echo "selected";
            }
            ?> ><?php echo $row2['fullname'] ?></option> <?php }
          
          ?></select><br><br>

      
       <input type="submit" name="edit" value=" Edit" id="submit">
    </form>
    </div></div>
    <?php
                }
              }else{
                echo "<p style='color:red;font-size: 19px;text-align:center;margin: 10px 0;'>Enter Right Id.</p>";
              }
              }  ?>
<?php


if(isset($_POST['edit'])){
$fullname =mysqli_real_escape_string($conn,$_POST['fullname']);

$position = mysqli_real_escape_string($conn,$_POST['position']);
$sex = mysqli_real_escape_string($conn,$_POST['sex']);
$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$coordinator = mysqli_real_escape_string($conn,$_POST['coordinator']);
$sql = "UPDATE user_table SET fullname = '{$fullname}', position = '{$position}', sex = '{$sex}', mobile_no = '{$mobile}', address = '{$address}', coordinator = '{$coordinator}' WHERE username = '{$username}'";

if(mysqli_query($conn,$sql)){
header("Location: {$hostname}/home_page.php");}
}
?>


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