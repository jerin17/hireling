<?php
session_start();
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `freelancers` WHERE f_email='$email' AND f_password='$password'";
    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
  
    if($count == 1){

        $_SESSION['f_email'] = $email;
          
        $row=mysqli_fetch_assoc($result);
        $_SESSION['f_id'] = $row['f_id'];
        $_SESSION['f_fname'] = $row['f_fname'];
        $_SESSION['f_image'] = $row['f_image'];
        $_SESSION['user'] = "f";

        header('Location:f_dashboard.php');
        
    }
  else{
        $msg = "Invalid Username/Password";

?>

<center><div id="fade" style="color: white;z-index: 2;background: #d35400;max-width: 490px;position: relative;top: -450px;height:30px; text-align:center;padding-top:5px;"> <?php echo $msg; ?> </div></center>
<script>  
setTimeout(function() {
  $("#fade").fadeOut().empty();
}, 2000);
</script>



<?php       
}
}
?><!DOCTYPE html>
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
        <li><a href="registerf.php">Register</a></li>
        <li><a href="loginr.php" style="background: #A3D044;color: white;padding: 13px;">Recruiter Login</a></li>
             
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/9.jpeg');">
  <div align="center" style="padding: 120px"> 
  
  <div style="font-family: monospace;border :solid #A3D044 3px; background: white; color:black;max-width: 500px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044; font-family:monospace">FREE LANCER LOGIN</h1><br><br><br><br>
      <form action="loginf.php" method="post">
        <input type="email" name="email" size="30" placeholder="Enter email id" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br><br><br>
        <input type="password" name="password" size="30" placeholder="Enter password" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br><br><br> 

        <input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px" type="submit" name="LOGIN"><br>
      </form>

  </div>


  </div>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>