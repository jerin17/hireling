  <?php  
session_start();
$j_id=$_GET['id'];
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

      <a href="r_dashboard.php"><div style="float: right;color: black; background: red;font-size: 25px;padding: 8px;border-radius: 5px;"><b>X</b></div></a>

      <h1 style="font-size: 40px;background: #A3D044;text-align: center;font-family: monospace;"><?php echo $_SESSION['r_org'];?></h1>


      <?php 
      include 'config.php';
      $r_id=$_SESSION['r_id'];
      $count=1;
      $sql="SELECT * FROM jobs WHERE j_id='$j_id'";  
      $result=mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
      ?>
         <div class="row2" style="margin: 20px;padding: 20px;border-radius: 20px;">
         
            Job ID  <?php for($i=0; $i<=8; $i++){echo "&nbsp";}?>  :  <b>#<?php echo $row['j_id']; ?></b><br>
            Type <?php for($i=0; $i<=11; $i++){echo "&nbsp";}?>  :  <b style="text-transform: uppercase;"><?php echo $row['j_type']; ?></b><br>
            Location <?php for($i=0; $i<=5; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['j_location']; ?></b><br>
            Incentives <?php for($i=0; $i<=2; $i++){echo "&nbsp";}?>  :  <b>Rs. <?php echo $row['j_sal']; ?></b><br>
            Description <?php for($i=0; $i<=0; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['j_description']; ?></b><br>
            Time <?php for($i=0; $i<=10; $i++){echo "&nbsp";}?>  :  <b><?php echo $row['j_time']; ?> months</b><br>

         </div>    

<table style="width:97%;color: black;text-align: center;" align="center" >

<tr>
  <th>S No.</th>
  <th>Name</th>
  <th>Email ID</th>
  <th>Ph Number</th>
  <th>Gender</th>
  <th>Age</th>
  <th>View</th>
  <th>Reject</th>
</tr>

<?php
$sql2="SELECT * FROM apply WHERE j_id='$j_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

$f_id=$row2['f_id'];
if ($row2['app']==='1') {
      $sql3="SELECT * FROM freelancers WHERE f_id='$f_id'";    
      $result3=mysqli_query($conn,$sql3);
      $row3=mysqli_fetch_assoc($result3);
?>
<tr>
  <td><?php echo $count++; ?></td>
  <td><?php echo $row3['f_fname'];?></td>
  <td><?php echo $row3['f_email'];?></td>
  <td><?php echo $row3['f_number'];?></td>
  <td><?php echo $row3['f_gender'];?></td>
  <td><?php echo $row3['f_age'];?></td>
  <td><a href="" style="color: black"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
  <td><a href="r_reject.php?f_id=<?php echo $row3['f_id'];?>&j_id=<?php echo $j_id;?>" onclick="return confirm('Do you want to delete this record ?')" style="color: black"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
     

</tr>

<?php

}}}?>

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