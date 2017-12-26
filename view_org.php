<?php  
session_start();
$f_id=$_SESSION['f_id'];
$r_id=$_GET['r_id'];
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
        <li><a href="f_job.php">FREELANCE</a></li>
        <li><a href="f_dashboard.php" style="color: #fbb217;">DASHBOARD</a></li>
        <li><a class="drop" href="" style="padding: 13px;">
         <?php $photo=$_SESSION['f_image'];?>
         <img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
<div style="float: right;margin-right: 50px;position: relative;top: -8px;left: -15px;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:12px;padding-top: 3px;text-align: center;"><?php echo $notif; ?> </div>        
         
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$_SESSION['f_fname'];?></a></li>  
            <li><a href="f_setting.php">Settings<div style="float: right;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:12px;padding-top: 3px;text-align: center;"><?php echo $notif; ?></div></a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>


        </li>

<?php
}
if($notif==0){
?>
        <li><a href="f_job.php">FREELANCE</a></li>
        <li><a href="f_dashboard.php" style="color: #fbb217;">DASHBOARD</a></li>
        <li><a class="drop" href="" style="padding: 13px;">
         <?php $photo=$_SESSION['f_image'];?>
         <img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
         
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$_SESSION['f_fname'];?></a></li>  
            <li><a href="f_setting.php">Settings</a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
<?php  
}     
?>      
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
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
      $count=1;
      $sql="SELECT * FROM recruiters WHERE r_id='$r_id'";  
      $result=mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
      ?>
      <h1 style="font-size: 40px;background: #A3D044;text-align: center;font-family: monospace;"><?php echo $row['r_org'];?></h1>

         <div class="row2" style="margin: 20px;padding: 20px;border-radius: 10px;">
         
            <img src="logo/<?php echo $row['r_image'];?>" style="width: 80px;height: 80px;float: right;border-bottom:solid #A3D044 5px;"> 
            <div style="float: left;text-align: left;width: 350px;margin-left: 20px;margin-right: 30px;border-left: solid #A3D044 4px;padding: 10px;">

            <div style="margin-left: 15px;max-height: 90px;overflow: hidden;">
            Recruiter id <?php for($i=0; $i<=2; $i++){echo "&nbsp";}?>  :  <b>#<?php echo $row['r_id']; ?></b><br>
            HR Name <?php for($i=0; $i<=5; $i++){echo "&nbsp";}?>  :  <b style="text-transform: uppercase;"><?php echo $row['r_fname'].' '.$row['r_lname']; ?></b><br>
            Email ID <?php for($i=0; $i<=7; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['r_email']; ?></b><br>
            </div>
          
         </div>  <br> <hr>
        <div style="padding: 20px;"><i><?php echo $row['r_bio']; ?></i></div>




<table style="width:97%;color: black;text-align: center;" align="center">
<caption><b>All Jobs by <?php echo $row['r_org']; ?></b></caption>
<tr>
  <th>S No.</th>
  <th>Job Type</th>
  <th>Job Description</th>
  <th>Salary (Rs)</th>
  <th>Time (months)</th>
  <th>Location</th>
  <th>Application Status</th>  
  </tr>

<?php
$r_id=$row['r_id'];
$sql2="SELECT * FROM jobs WHERE r_id='$r_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

?>
<tr>
  <td><?php echo $count++; ?></td>
  <td><?php echo $row2['j_type']; ?></td>
  <td><?php echo $row2['j_description']; ?></td>
  <td><?php echo $row2['j_sal']; ?></td>
  <td><?php echo $row2['j_time']; ?></td>
  <td><?php echo $row2['j_location']; ?></td>

          <?php 
          $j_id=$row2['j_id'];
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
                <td><a><div style="font-family: fantasy;font-size: 15px;background:orange; color: white;width: 100%;text-align: center;border-radius: 5px;padding: 5px;">Already Applied</div></a></td>
          <?php
          }
          
          else if ($reject==='2') {?>
                <td><a><div style="font-family: fantasy;font-size: 15px;background:#c0392b; color: white;width: 100%;text-align: center;border-radius: 5px;padding: 5px;cursor: not-allowed;">not selected</div></a></td>

          <?php
          }
          else
          {?>
                <td><a href="f_apply.php?id=<?php echo $row['j_id'];?>" ><div style="font-family: fantasy;font-size: 15px;background:#A3D044; color: white;width:100%;text-align: center;border-radius: 5px;padding: 5px;">Apply Now</div></a></td>
    
          <?php
          }
          ?>

</tr>

<?php

}}
?></table>

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