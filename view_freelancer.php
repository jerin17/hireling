<?php  
session_start();
$r_id=$_SESSION['r_id'];
$f_id=$_GET['f_id'];
$j_id=$_GET['j_id'];
include 'sessionr.php';
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
<div class="wrapper row0">
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php" style="color: #A3D044">Hireling</a></h1>
      <p><a href="index.php" style="color: white">For free lancers and others</a></p>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="index.php">Home</a></li>         
        <li><a href="r_post.php">post job</a></li>         
        <li><a href="r_dashboard.php" style="color: #fbb217;">DASHBOARD</a></li>
        <li><a class="drop" href="" style="padding: 13px;">

         <?php $photo=$_SESSION['r_image'];?>
         <img src="logo/<?php echo $photo;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
         
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$_SESSION['r_fname'];?></a></li>  
            <li><a href="r_setting.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>

<div class="wrapper bgded overlay" >
  <div style="background-image:url('images/demo/backgrounds/06.png');min-height: 565px;" align="center"> 
  <br>
  <div style="border-left:solid #A3D044 7px;border-bottom:solid #A3D044 3px;border-right:solid #A3D044 7px; background: white; color:black;max-width: 900px;text-align: left;">



      <?php 
      include 'config.php';
      $sql="SELECT * FROM freelancers WHERE f_id='$f_id'";  
      $result=mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
      ?>

      <a href="r_postview.php?id=<?php echo $j_id;?>"><div style="float: right;color: black; background: red;font-size: 25px;padding: 8px;border-radius: 5px;"><b>X</b></div></a>      
      <h1 style="font-size: 40px;background: #A3D044;text-align: center;font-family: monospace;"><?php echo $row['f_fname']." ".$row['f_lname'];?></h1>
         <div class="row2" style="margin: 20px;padding: 20px;border-radius: 20px;">
         
            <img src="images/demo/fprofile/<?php echo $row['f_image'];?>" style="width: 120px;height: 120px;float: right;border-bottom:solid #A3D044 5px;"> 
            <div style="float: right;text-align: left;width: 350px;height: 132px;margin-left: 20px;margin-right: 30px;border-left: solid #A3D044 4px;padding: 10px;"> Bio : 
            <a href="f_setting_bio.php" style="color: blue;">[edit]</a> 

            <div style="margin-left: 15px;max-height: 90px;overflow: hidden;"><i style="margin-left: 30px;"><?php echo $row['f_bio']; ?></i></div>
            </div>

            Freelancer ID<?php for($i=0; $i<=0; $i++){echo "&nbsp";}?>  :  <b>#<?php echo $row['f_id']; ?></b><br>
            Name <?php for($i=0; $i<=11; $i++){echo "&nbsp";}?>  :  <b style="text-transform: uppercase;"><?php echo $row['f_fname'].' '.$row['f_lname']; ?></b><br>
            Email ID <?php for($i=0; $i<=7; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['f_email']; ?></b><br>
            Phone <?php for($i=0; $i<=10; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['f_number']; ?></b><br>
            Sex <?php for($i=0; $i<=14; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['f_gender']; ?></b><br>
            Age <?php for($i=0; $i<=14; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['f_age']; ?></b><br>
            <a href="f_setting.php" style="color: blue">[edit]</a> 
            <a href="f_setting_picture.php" style="color: blue;float: right;margin-right: 45px;">[edit]</a> 
         </div>    

  </div>
<br>

  </div>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>