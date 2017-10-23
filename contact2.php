<?php  
include 'config.php';

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$sql="INSERT INTO contacts (name,email,message) VALUES ('$name','$email','$message')";
if ($conn->query($sql) === TRUE) {
?>
<!DOCTYPE html>
<html>
<head>
<title>Hireling</title>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="images/hlogo.png"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1"  style="position:fixed;z-index: 2;">
<div class="wrapper row0">
</div>
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php" style="color: #A3D044;">Hireling</a></h1>
      <!-- yellow - fbb217 -->
      <p><a href="index.php" style="color: white">For free lancers and others</a></p>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="index.php">Home</a></li>         
        <li><a href="#about">About Us</a></li>
        <li><a href="#contact">Contact</a></li>

<?php 
session_start();
if(!isset($_SESSION['f_fname'])){
?>

       <li><a class="drop" href=""  style="background: #A3D044;color: white;padding: 13px;">Register</a>
          <ul>
            <li><a href="registerf.php">Register as a free lancer</a></li>
            <li><a href="registerr.php">Register as a Recruiter</a></li>
          </ul>
        </li>

        <li><a class="drop" href=""  style="background: #A3D044;color: white;padding: 13px;">LOGIN</a>
          <ul>
            <li><a href="loginf.php">Free lancer Login</a></li>
            <li><a href="loginr.php">Recruiter Login</a></li>
          </ul>
        </li>

<?php
}  

else {
  $username = $_SESSION['f_fname'];
?>

        <li><a href="f_dashboard.php" style="color: #fbb217;">DASHBOARD</a></li>
        <li><a class="drop" href="" style="background: red;border-radius: 5px;color: white;padding: 13px;">
          <?php echo $_SESSION['f_fname']; ?>
        </a>
          <ul>
            <li><a href="">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>            
          </ul>
        </li>
<?php
 }      
?>

      
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/gallery/contactus1.jpg');">
  <div style="padding: 212px" align="center"> 

<h1 style="font-family: monospace;font-size: 80px">Thank you for your suggestion :))</h1>  
  <b><a href="index.php" style="position: relative;top: 170px;">CLICK HERE FOR HOME</a></b>

  </div>
</div>


<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
<?php

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
