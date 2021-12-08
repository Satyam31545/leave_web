<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        #header{
          opacity: 0.5;
      background-color: white;
      color: rgb(26, 26, 51);
    width: 100%;
   position: sticky;
         position: -webkit-sticky;
         top: 0px;
         left: 0px;
         height: 65px;
    font-size: 55px;
      }
      #span{
        font-size:45px;
        cursor:pointer;
      }

      body {
  font-family: "Lato", sans-serif;
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
     }
@media screen and (max-width: 500px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  #header{ height: 50px;
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
}
 

    </style>
</head>
<body>
<div id="header"><span id="span" onclick="openNav()">&#9776;</span> Apply for Leave</div><br>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home_page.php">Home</a>
  <a href="apply_leave.php">Leave Application</a>
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