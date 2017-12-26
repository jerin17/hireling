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
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/9.jpg');min-height: 565px;">

<?php  
include 'config.php';
$f_id=$_SESSION['f_id'];
$biocomp=0;
$piccomp=0;
$rescomp=0;
$sql="SELECT * FROM freelancers WHERE f_id='$f_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$per=1;$wid=25;
if ($row['f_bio']!="")
 {$per++;$biocomp=1;}
if ($row['f_image']!="" && $row['f_image']!="favatar.png")
 {$per++;$piccomp=1;}
if ($row['f_resume']!="")
 {$per++;$rescomp=1;}
 $wid=$per*25;
 ?>


<div class="wrapper row5" style="max-width: 300px;float: right; margin-right: 100px;margin-top:100px;border-radius: 3px;font-family: Allerta;font-size: 22px;color:#A3D044;background: rgba(0,0,0,0.5);border-radius: 10px;">
<a href="f_setting.php" style="color:black;background:#DADFE1;"><div style="background:#A3D044;text-align: center;padding: 20px;">GENERAL <div style="float: right;"><?php echo ' &#10003';?></div></div></a>
<a href="f_setting_picture.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >PROFILE PICTURE <div style="float: right;"><?php if($piccomp==1) echo ' &#10003';?></div></div></a>
<a href="f_setting_bio.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >BIO <div style="float: right;"><?php if($biocomp==1) echo ' &#10003';?></div></div></a>
<a href="f_setting_resume.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >UPLOAD RESUME <div style="float: right;"><?php if($rescomp==1) echo ' &#10003';?></div></div></a>

<div style="text-align: center;">
  <div style=" width: <?php echo $wid;?>%;height: 40px;background-color: #3498db;"></div>
<a style="color: white;font-size: 65%;"><<< <?php echo $wid;?>% profile complete >>></a>
</div>
</div>


  <div class="hoc center"> 
    <!-- ################################################################################################ -->
 <br>
 <div style="margin-left: 100px;border-radius: 10px;border :solid #A3D044 3px;background: rgba(0,0,0,0.5); color:black;max-width: 500px;position: relative;top: 30px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044;">GENERAL</h1>
      <form action="f_setting.php" method="post" style="margin-left: 30px">

<?php  
include 'config.php';
$f_id=$_SESSION['f_id'];
$sql="SELECT * FROM freelancers WHERE f_id='$f_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>


        <label style="color: #A3D044;float: left;margin-left: 10px;font-size: 15px;">Name :</label>
        <div class="one_half first">
        <input type="text" name="fname" size="25" value="<?php echo $row['f_fname'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;" required >
        </div>
        <div class="one_half">
        <input type="text" name="lname" size="25" value="<?php echo $row['f_lname'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >
        </div>

  
        <label style="color: #A3D044;float: left;margin-left: 10px;font-size: 15px;">Email & phone :</label>
        <div class="one_half first">
        <input type="email" name="email" size="25" value="<?php echo $row['f_email'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required>
        </div>
        <div class="one_half">
        <input type="longnumber" name="number" size="25"  value="<?php echo $row['f_number'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required>
        </div>


        <label style="color: #A3D044;float: left;margin-left: 10px;font-size: 15px;">Name :</label>

        <div class="one_half first">
          <select name ="gender" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;width: 202px; text-align-last:center;" required>
            <option value="">--- select gender ---</option>
            <option value="male" <?php if($row['f_gender']=='male'){echo "selected";}?>>Male</option>
            <option value="female" <?php if($row['f_gender']=='female'){echo "selected";}?>>Female</option>
          </select>
        </div>
        <div class="one_half">
        <input type="longnumber" name="age" min="1" max="100" size="25" value="<?php echo $row['f_age'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required>
        </div>


        <div align="center">
          <input style="background:#A3D044 ;padding:5px;padding-right:30px ;padding-left: 30px;border-radius:3px; color:black;cursor: pointer;
        " type="submit" name="submit" value="Update"><br><br>
        </div>
      </form>

  </div>
<br><br><br><br>

  </div>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>

<?php
include 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$number=$_POST['number'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$f_id=$_SESSION['f_id'];
$msg="";


$sql = "UPDATE freelancers SET f_fname='$fname',f_lname='$lname', f_email='$email' ,f_number='$number',f_gender='$gender', f_age='$age' WHERE f_id='$f_id'" ;

if ($conn->query($sql) === TRUE)
{
  $msg="Record updated successfully";
  $_SESSION['f_fname']=$fname;

?>
<center><div id="fade" style="color: black;z-index: 2;background: #A3D044;max-width: 500px;position: relative;left:-140px;top: -110px;height:30px; text-align:center;padding-top:5px;"><?php echo $msg; ?> </div></center>
<script>  
setTimeout(function() {
  $("#fade").fadeOut().empty();
}, 1500);
</script>
<?php
}
else 
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
