<?php  
session_start();
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
  <div style="background-image:url('images/demo/backgrounds/06.png');" align="center"> 
  <br>
  <div style="border-left:solid #A3D044 7px;border-bottom:solid #A3D044 3px;border-right:solid #A3D044 7px; background: white; color:black;max-width: 900px;text-align: left;">
      
      <h1 style="font-size: 40px;background: #A3D044;text-align: center;font-family: monospace;"><?php echo $_SESSION['r_org'];?></h1>


      <?php 
      include 'config.php';
      $r_id=$_SESSION['r_id'];
      $sql="SELECT * FROM jobs WHERE r_id='$r_id'";    
      $result=mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
         <div class="row2" style="margin: 20px;padding: 20px;">
         
            Type <?php for($i=0; $i<=11; $i++){echo "&nbsp";}?>  :  <b style="text-transform: uppercase;"><?php echo $row['j_type']; ?></b><br>
            Location <?php for($i=0; $i<=5; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['j_location']; ?></b><br>
            Incentives <?php for($i=0; $i<=2; $i++){echo "&nbsp";}?>  :  <b>Rs. <?php echo $row['j_sal']; ?></b><br>
            Description <?php for($i=0; $i<=0; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['j_description']; ?></b><br>
            Time <?php for($i=0; $i<=10; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['j_time']; ?> months</b><br>

               <a href="r_postview.php?id=<?php echo $row['j_id'];?>"><div style="font-family: fantasy;font-size: 13px;background:#A3D044; color: white;width: 100px;text-align: center;border-radius: 5px;float: right;padding: 5px;">VIEW QOUTES</div></a>
               <a href="r_postdelete.php?id=<?php echo $row['j_id'];?>" onclick="return confirm('Do you want to delete this record ?')"><div style="font-family: fantasy;font-size: 13px;background:#A3D044; color: white;width: 85px;text-align: center;border-radius: 5px;float: right;padding: 5px;margin-right: 7px;">DELETE</div></a>
               <a href="r_postedit.php?id=<?php echo $row['j_id'];?>" ><div style="font-family: fantasy;font-size: 13px;background:#A3D044; color: white;width: 85px;text-align: center;border-radius: 5px;float: right;padding: 5px;margin-right: 7px;">EDIT</div></a><br>


         </div>    

<?php }}


else{ ?>
      <div align="center">
          <?php echo "NO RECORD TO SHOW ";
?>
          <hr>
          <a href="r_post.php"><div style="font-family: fantasy;font-size: 13px;background:#A3D044; color: white;max-width: 120px;text-align: center;border-radius: 5px;padding: 5px;margin-right: 7px;">POST A NEW JOB</div></a><br>
 
      </div>

<?php } ?>





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