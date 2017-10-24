<?php  
session_start();
$f_id=$_SESSION['f_id'];
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
        <li><a href="f_job.php" style="color: #fbb217;">FREELANCE</a></li>
        <li><a class="drop" href="" style="padding: 13px;">
         <?php $photo=$_SESSION['f_image'];?>
         <img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
<div style="float: right;margin-right: 50px;position: relative;top: -10px;left: -10px;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:17px;"> &nbsp<?php echo $notif; ?> </div>        
         
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$_SESSION['f_fname'];?></a></li>  
            <li><a href="f_setting.php">Settings<div style="float: right;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:17px;"> &nbsp<?php echo $notif; ?></div></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>


        </li>

<?php
}
if($notif==0){
?>
        <li><a href="f_job.php" style="color: #fbb217;">FREELANCE</a></li>
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

      <h1 style="font-size: 40px;background: #A3D044;text-align: center;font-family: monospace;"><?php echo $_SESSION['f_fname'];?></h1>


      <?php 
      include 'config.php';
      $count=1;
      $sql="SELECT * FROM freelancers WHERE f_id='$f_id'";  
      $result=mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
      ?>
         <div class="row2" style="margin: 20px;padding: 20px;border-radius: 20px;">
         
            <img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 120px;height: 120px;float: right;border-bottom:solid #A3D044 5px;"> 
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

<table style="width:97%;color: black;text-align: center;" align="center" >

<tr>
  <th>S No.</th>
  <th>Company Name</th>
  <th>Job Type</th>
  <th>Application Status</th>
  </tr>

<?php
$sql2="SELECT * FROM apply WHERE f_id='$f_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

$j_id=$row2['j_id'];
// if ($row2['app']==='1') {
      $sql3="SELECT * FROM jobs WHERE j_id='$j_id'";    
      $result3=mysqli_query($conn,$sql3);
      $row3=mysqli_fetch_assoc($result3);


$r_id=$row3['r_id'];
      $sql4="SELECT * FROM recruiters WHERE r_id='$r_id'";    
      $result4=mysqli_query($conn,$sql4);
      $row4=mysqli_fetch_assoc($result4);

?>
<tr>
  <td><?php echo $count++; ?></td>
  <td><a href="view_org.php?r_id=<?php echo $row4['r_id'];?>" style="text-transform: uppercase;color: black;text-decoration: underline;"><?php echo $row4['r_org'];?></a></td>
  <td><a href="view_job.php?j_id=<?php echo $row3['j_id'];?>" style="color: black;text-decoration: underline;"><?php echo $row3['j_type'];?></a></td>
  <td style="color: blue">applied</td>
</tr>

<?php

// }
}}
$sql2="SELECT * FROM reject WHERE f_id='$f_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

$j_id=$row2['j_id'];
// if ($row2['app']==='1') {
      $sql3="SELECT * FROM jobs WHERE j_id='$j_id'";    
      $result3=mysqli_query($conn,$sql3);
      $row3=mysqli_fetch_assoc($result3);


$r_id=$row3['r_id'];
      $sql4="SELECT * FROM recruiters WHERE r_id='$r_id'";    
      $result4=mysqli_query($conn,$sql4);
      $row4=mysqli_fetch_assoc($result4);

?>
<tr>
  <td><?php echo $count++; ?></td>
  <td><a href="view_org.php?r_id=<?php echo $row4['r_id'];?>" style="text-transform: uppercase;color: black;text-decoration: underline;"><?php echo $row4['r_org'];?></a></td>
  <td><a href="view_job.php?j_id=<?php echo $row3['j_id'];?>" style="text-transform: uppercase;color: black;text-decoration: underline;"><?php echo $row3['j_type'];?></a></td>
  <td style="color: #c0392b">not selected</td>
</tr>

<?php

}}?>

</table>

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