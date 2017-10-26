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

<?php 
session_start();
if(!isset($_SESSION['user'])){
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

  $user=$_SESSION['user'];

  if($user=="f")
  {
      $username = $_SESSION['f_fname'];
      $redirect1="f_dashboard.php";  
      $redirect2="f_setting.php";
  }
  else
  {
      $username = $_SESSION['r_fname'];
      $redirect1="r_post.php";
      $redirect2="r_setting.php";
  }
?>
        <li><a href=<?php echo $redirect1; ?> style="color: #fbb217;"  >DASHBOARD</a></li>
        <li><a class="drop" href="" style="background: red;border-radius: 5px;color: white;padding: 13px;">
          <?php echo $username; ?>
        </a>
          <ul>
            <li><a href=<?php echo $redirect2; ?>>Settings</a></li>
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
  <div style="padding: 127px"> 
  
  <div style="font-family: monospace;border :solid #A3D044 3px; background: white; color:black;max-width: 500px;position: relative;" align="center"><br>
    
      <h1 style="font-size: 40px;background: #A3D044; font-family:monospace">Write to Us</h1>
      <form action="contact2.php" method="post">


        <label style="color: #A3D044;position: relative;left: -140px;margin-top: 20px;">Name :</label>
        <input type="text" name="name" size="40" placeholder="name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required>

        <label style="color: #A3D044;position: relative;left: -105px;margin-top: 20px;">Email Address:</label>
        <input type="email" name="email" size="40" placeholder="email" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required>
        

        <label style="color: #A3D044;position: relative;left: -125px;margin-top: 20px;">Message :</label>
        <textarea name="message" placeholder="enter your message" style="width:335px;height: 70px;border: none;border:solid #A3D044 2px;"></textarea>  



        <br><input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px" type="submit" name="submit"><br>
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




