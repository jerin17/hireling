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
        <li><a href="f_job.php" style="color: #fbb217;">FREELANCE</a></li>
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

  <?php 
  include 'config.php';
  $count=1;
  $sql="SELECT * FROM freelancers WHERE f_id='$f_id'";  
  $result=mysqli_query($conn,$sql);
  $row = $result->fetch_assoc();
  ?>



        <div style="background:white;min-height: 540px;padding-top: 30px;padding-bottom: 65px;" align="left"> 

            <a href="f_setting_picture.php" class="fa fa-pencil-square-o" style="color: blue;font-size: 20px;position: absolute;top: 190px;left: 280px;"></a>
            <a href="f_setting_picture.php" class="link"><img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 250px;float: left;border-radius: 200px;margin: 40px;margin-top: 70px;margin-left: 60px;border: 3px inset #A3D044;" /></a>

                  <div class="row3" style="padding:30px;margin-right: 20px;font-family: Comic Sans MS;font-size: 18px;">
                    
                    <center><h1 style="font-family: Comic Sans MS;font-size: 40px;margin-bottom: 50px;"><?php echo $row['f_fname'].' '.$row['f_lname'];?></h1></center>
                    <p>About Myself ? Ummm.....</p>
                    <?php if ($row['f_bio']==="") {
                        $row['f_bio']="nothing much !";
                    } ?>
                    <p style="letter-spacing: 3px;margin: 10px;color: green"><?php echo $row['f_bio']; ?></p>
                    <a href="f_setting_bio.php" style="color: blue;float: right;">[edit]</a>
                  </div>

        </div>

        <div style="background:#A3D044;padding-top: 30px;padding-bottom: 70px;"  align="left"> 


                 <i class="fa fa-file-text-o" style="color:black;font-size:150px;margin: 40px;margin-top: 170px;margin-right:150px;float: right;"></i>
                 <?php
                 if($row['f_resume']==="")
                   echo '<i class="fa fa-remove" style="color:black;font-size:15px;float: right;position: relative;top: 330px;left: 175px;"> No resume available</i>'; 
                 else 
                   echo '<i class="fa fa-download" style="color:black;font-size:15px;float: right;position: relative;top: 330px;left: 165px;"> Download resume</i>'; 
                 ?>                               

                  <div style="background:#A3D044;padding:30px;padding-left: 100px;margin: 10px;margin-right: 40px;font-family: Comic Sans MS;font-size: 18px;">
                      <b style="color: black;font-size: 30px;padding: 10px;"><u>PERSONAL DETAILS</u></b>

                      <p style="letter-spacing: 3px;margin: 0px;color: white;margin-top: 40px;">
                      Freelancer ID<b style="position: absolute;left: 350px;color: black">#<?php echo $row['f_id']; ?></b><hr style="width:70%;align:left;margin-left: 0px;margin-bottom: 15px;">
                      Name<b style="text-transform: uppercase;position: absolute;left: 350px;color: black"><?php echo $row['f_fname'].' '.$row['f_lname']; ?></b><hr style="width:70%;align:left;margin-left: 0px;margin-bottom: 15px;">
                      Email ID<b style="position: absolute;left: 350px;color: black"><?php echo $row['f_email']; ?></b><hr style="width:70%;align:left;margin-left: 0px;margin-bottom: 15px;">
                      Phone<b style="position: absolute;left: 350px;color: black"><?php echo $row['f_number']; ?></b><hr style="width:70%;align:left;margin-left: 0px;margin-bottom: 15px;">
                      Gender<b style="position: absolute;left: 350px;color: black"><?php echo $row['f_gender']; ?></b><hr style="width:70%;align:left;margin-left: 0px;margin-bottom: 15px;">
                      Age<b style="position: absolute;left: 350px;color: black"><?php echo $row['f_age']; ?></b><hr style="width:70%;align:left;margin-left: 0px;margin-bottom: 15px;">
                      </p>
                        <a href="f_setting.php" style="color:blue;float: left;margin-top: 20px;">[edit]</a>
                  </div>

        </div>

        <div class="row2" style="font-family: Comic Sans MS;font-size:16px;padding-top: 10px;padding-bottom: 35px;" align="left"> 
                      <b style="color: black;font-size: 30px;padding: 10px;"><center>APPLICATION STATUS</center></b>

<table style="width:85%;color: black;text-align: center;" align="center" >

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
    <td><?php echo $row3['j_type']; ?></td>
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
  <td><?php echo $row3['j_type']; ?></td>
  <td style="color: #c0392b">not selected</td>
</tr>

<?php

}}?>

</table>

        </div>



<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>