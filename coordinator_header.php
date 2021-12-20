<?php  
//coordinator header
?>

<html lang="en">
<head>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Oxygen&family=Playfair+Display:wght@500&family=Readex+Pro:wght@500&family=Roboto:ital,wght@1,300&display=swap');
        #header{
          opacity: 0.5;
      background-color: white;
      color: rgb(26, 26, 51);
    width: 100%;
   position: sticky;
         position: -webkit-sticky;
         top: 0px;
         left: 0px;
         height: 70px;
    font-size: 55px;
    font-family: 'Oxygen', sans-serif;
      }
      #span{
        font-size:45px;
        cursor:pointer;
      }

      body {
        font-family: 'Roboto', sans-serif;
  margin-top: 0px;
         padding-top: 0px;
         user-select: none;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  font-family: 'Readex Pro', sans-serif; 
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
#head{
       color:white;
        padding-left:10%;
        min-width: 100%;
        font-size:52px;
        font-family: 'Playfair Display', serif;
     }
     p{
      color:red;text-align:center;margin: 10px 0;font-size: 26px;
     }
@media screen and (max-width: 500px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  #header{ height: 54px;
    font-size: 42px;}
    #span{
        font-size:35px;}
    
}
@media screen and (max-width: 376px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  #header{ height: 45px;
    font-size: 32px;}
    #span{
        font-size:30px;}
        p{
          font-size:20px;
        }
}
 

    </style>
</head>
<body>
<div id="header"><span id="span" onclick="openNav()">&#9776;</span> Apply for Leave</div><br>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home_page.php">Home</a>
  <a href="apply_leave.php">Leave Application</a>
  <a href="leave_request.php">Leave Application Request</a>
  <a href="application_status.php">Leave status</a>
  <a href="password.php">Change Password</a>
  <a href="edit_forgot_password.php">Change Favorite Book</a>

  <a href="logout.php" onclick="return confirm('are you sure want to logout ?')" >Logout</a>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

</script>
</body>
</html>