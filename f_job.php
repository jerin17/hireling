<?php  
session_start();
include 'sessionf.php';
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
<?php 
 include 'config.php';
      $f_id=$_SESSION['f_id'];
      $sql="SELECT * FROM freelancers WHERE f_id='$f_id'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $per=1;$wid=25;
      if ($row['f_bio']!="")
        $per++;
      if ($row['f_image']!="" && $row['f_image']!="favatar.png")
        $per++;
      if ($row['f_resume']!="")
        $per++;
$notif=4-$per;
?>

       
<?php  
if($notif==1 ||$notif==2 ||$notif==3){
?> 
        <li><a href="f_dashboard.php" style="color: #fbb217;">DASHBOARD</a></li>
        <li><a class="drop" href="" style="padding: 13px;">
         <?php $photo=$_SESSION['f_image'];?>
         <img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
<div style="float: right;margin-right: 50px;position: relative;top: -8px;left: -15px;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:12px;padding-top: 3px;text-align: center;"><?php echo $notif; ?> </div>        
         
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$_SESSION['f_fname'];?></a></li>  
            <li><a href="f_setting.php">Settings<div style="float: right;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:12px;padding-top: 3px;text-align: center;"><?php echo $notif; ?></div></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>


        </li>

<?php
}
if($notif==0){
?>
        <li><a href="f_dashboard.php" style="color: #fbb217;">DASHBOARD</a></li>
        <li><a class="drop" href="" style="padding: 13px;">
         <?php $photo=$_SESSION['f_image'];?>
         <img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
         
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$_SESSION['f_fname'];?></a></li>  
            <li><a href="f_setting.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
<?php  
}     
?>      
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<div class="wrapper row2" style="background-image:url('images/demo/backgrounds/06.jpg');">
  <div class="hoc container clear"> 
    <!-- ################################################################################################ -->


<!-- 
<div style="background: white;border:solid #A3D044 2px;text-align: center; border-radius: 5px;padding: 20px;margin: 
20px;width: 300px;float: right;">
      <h3 style="background: #A3D044;padding: 10px;padding-left: 30px;margin: -20px;border-radius: 3px;margin-bottom: 10px;">Side Bar</h3>
</div>

 -->   

      <?php 
      include 'config.php';
      $sql="SELECT * FROM jobs";
     
      $result=mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>

        <?php 
        $x=$row['r_id'];
        $sql2="SELECT * FROM recruiters WHERE r_id=$x";
        $result2=mysqli_query($conn,$sql2);
        $row2 = $result2->fetch_assoc();
        $r_org=$row2['r_org'];
        $r_image=$row2['r_image'];        
        ?>

      <div style="background: white;border-radius: 10px;padding: 20px;margin:20px;max-width: 600px;">
          <br><h1 style="background: #A3D044;padding: 10px;padding-left: 30px;margin: -20px;border-radius: 3px;margin-bottom: 10px;"><b><?php echo $row['j_id']; ?>. <?php echo $row['j_type']; ?></b></h1>

            <img src="logo/<?php echo $r_image;?>" style="margin-right: 15px;width: 60px;height: 60px;float: right;"> 
            Organisation :<?php for($i=0; $i<=2; $i++){echo "&nbsp";}?> <b style="text-transform: uppercase;"><?php echo $r_org; ?></b><br>
            Location :<?php for($i=0; $i<=10; $i++){echo "&nbsp";}?><b><?php echo $row['j_location']; ?></b><br>
            Incentives :<?php for($i=0; $i<=7; $i++){echo "&nbsp";}?><b>Rs. <?php echo $row['j_sal']; ?></b><br>
            Description :<?php for($i=0; $i<=5; $i++){echo "&nbsp";}?><b><?php echo $row['j_description']; ?></b><br>
            Time :<?php for($i=0; $i<=15;$i++){echo "&nbsp";}?><b><?php echo $row['j_time']; ?> months</b><br>
                <br>




          <?php 
          $f_id=$_SESSION['f_id'];
          $j_id=$row['j_id'];
          $sql3="SELECT * FROM apply WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result3=mysqli_query($conn,$sql3);
          $row3=mysqli_fetch_assoc($result3);
          $check=$row3['app'];

          $sql4="SELECT * FROM reject WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result4=mysqli_query($conn,$sql4);
          $row4=mysqli_fetch_assoc($result4);
          $reject=$row4['rej'];

          
          if ($check==='1') 
          {?>
                <a><div style="font-family: fantasy;font-size: 15px;background:orange; color: white;width: 130px;text-align: center;border-radius: 5px;float: right;padding: 5px;">Already Applied</div></a><br>
          <?php
          }
          
          else if ($reject==='2') {?>
                <a><div style="font-family: fantasy;font-size: 15px;background:#c0392b; color: white;width: 130px;text-align: center;border-radius: 5px;float: right;padding: 5px;cursor: not-allowed;">not selected</div></a><br>

          <?php
          }
          else
          {?>
                <a href="f_apply.php?id=<?php echo $row['j_id'];?>" ><div style="font-family: fantasy;font-size: 15px;background:#A3D044; color: white;width: 85px;text-align: center;border-radius: 5px;float: right;padding: 5px;">Apply Now</div></a><br>
    
          <?php
          }
          ?>

      </div>
<?php }} ?>

 </div>
</div>


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="">Hireling.in</a></p>
    
    <!-- ################################################################################################ -->
  </div>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html> 