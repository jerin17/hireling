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

<a href="f_setting.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >GENERAL <div style="float: right;"><?php echo ' &#10003';?></div></div></a>
<a href="f_setting_picture.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >PROFILE PICTURE <div style="float: right;"><?php if($piccomp==1) echo ' &#10003';?></div></div></a>
<a href="f_setting_bio.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >BIO <div style="float: right;"><?php if($biocomp==1) echo ' &#10003';?></div></div></a>
<a href="f_setting_resume.php" style="color:black;background:#A3D044;"><div style="background:#A3D044;text-align: center;padding: 20px;">UPLOAD RESUME <div style="float: right;"><?php if($rescomp==1) echo ' &#10003';?></div></div></a>

<div style="text-align: center;">
  <div style=" width: <?php echo $wid;?>%;height: 40px;background-color: #3498db;"></div>
<a style="color: white;font-size: 65%;"><<< <?php echo $wid;?>% profile complete >>></a>
</div>
</div>

  <div class="hoc center"> 
    <!-- ################################################################################################ -->
 <br>
 <div style="margin-left: 100px;border-radius: 10px;border :solid #A3D044 3px;background: rgba(0,0,0,0.5); color:black;max-width: 500px;position: relative;top: 30px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044;">PROFILE PICTURE</h1>
      <form action="f_setting_resume.php" method="post" enctype="multipart/form-data" style="margin-left: 30px" >

<?php  
include 'config.php';
$f_id=$_SESSION['f_id'];
$temp=0;
$sql="SELECT * FROM freelancers WHERE f_id='$f_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$file=$row['f_resume'];
if($file=="")
  {$temp=1;$file="no resume uploaded";}
?>
        <i class="fa fa-file-text-o"  style="font-size:150px;color: white;border-bottom: solid #A3D044 6px;margin-bottom: 4px;"></i>
        <a href="f_remove_resume.php?f_id=<?php echo $row['f_id'];?>" style="position: relative;top: -120px;left: -15px;"><img src="x.png" style="width: 30px;"></a>
        
        <input type="hidden" name="f_bio" value="<?php echo $row['f_bio'];?>">
        <label style="color: white;margin-left: -20px;"><b><?php echo $file;?></b></label>
        <?php if($temp==0){ ?><a style="margin-left: -20px;" href=images/demo/fresume/<?php echo $row['f_resume'];?>>download resume</a> <i style="color: #A3D044" class="fa fa-download" ></i> <?php } ?>

        <label style="color: #A3D044;position: relative;left: -175px;top:10px;margin-top: 35px;">Update resume : <br><br></label>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input style="float: right;position: relative;cursor: pointer;top: -40px;left: 20px;margin-right: 50px;color: #A3D044;" type="file" name="file" required /><br>
        
        <input style="background:#A3D044 ;border-radius:5px; color:black;padding:5px;padding-right:30px ;padding-left: 30px;cursor: pointer;" type="submit" name="submit" value="UPDATE"><br><br>

      </form>

  </div>
<br><br><br>

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

if (isset($_POST['submit']))
{
$f_id=$_SESSION['f_id'];

$target = "images/demo/fresume/".basename($_FILES['file']['name']);
$file = $_FILES['file']['name'];
$FileType = pathinfo($target,PATHINFO_EXTENSION);

if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf") 
    $msg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

 else
  {
        $sql = "UPDATE freelancers SET f_resume='$file' WHERE f_id='$f_id'" ;
        mysqli_query($conn , $sql); 
        
        if (@move_uploaded_file($_FILES['file']['tmp_name'] , $target))
           echo "uploaded";

        else
            echo "error ".$conn->error;   
  }
?>
<div id="fade" style="color: red; max-width: 400px;background: white;position: relative;top:-70px;left: 350px;"><?php echo $msg;?></div>
<script>  
setTimeout(function() {
  $("#fade").fadeOut().empty();
}, 1500);
</script>

<?php

}
?>
