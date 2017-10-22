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
<link href='https://fonts.googleapis.com/css?family=Allerta' rel='stylesheet'>

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
      <h1><a href="index.php" style="color: #A3D044;">Hireling</a></h1>
      <!-- yellow - fbb217 -->
      <p><a href="index.php" style="color: white">For free lancers and others</a></p>
    </div>
    <!-- ################################################################################################ -->
        <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="index.php">Home</a></li>         
        <li><a href="f_job.php" style="color: #fbb217;"  >DASHBOARD</a></li>
        <li><a class="drop" href="" style="padding: 13px;">

         <?php $photo=$_SESSION['f_image'];?>
         <img src="images/demo/fprofile/<?php echo $photo;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
         
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$_SESSION['f_fname'];?></a></li>  
            <li><a href="f_setting.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>


<div class="wrapper row2" style="background-image:url('images/demo/backgrounds/06.jpg');">

<div class="wrapper row5" style="max-width: 300px;float: right; margin-right: 100px;margin-top:100px;border-radius: 3px;border-left:solid #A3D044 10px;font-family: Allerta;font-size: 22px;color:#A3D044;background:white;">
<a href="f_setting.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >GENERAL</div></a>
<a href="f_setting_picture.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >POFILE PICTURE</div></a>
<a href="f_setting_bio.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >BIO</div></a>
<a href="f_setting_resume.php" style="color:black;background:#DADFE1;"><div style="background:#DADFE1;text-align: center;padding: 20px;">UPLOAD RESUME</div></a>
</div>


  <div class="hoc center"> 
    <!-- ################################################################################################ -->
 <br>
 <div style="margin-left: 100px;border-radius: 10px;border :solid #A3D044 3px; background: white; color:black;max-width: 500px;position: relative;top: 30px;"><br>
    
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
        <i class="fa fa-file-text-o"  style="font-size:150px;border-bottom: solid #A3D044 6px;margin-bottom: 4px;"></i>
        
        <input type="hidden" name="f_bio" value="<?php echo $row['f_bio'];?>">
        <label><b><?php echo $file;?></b></label>
        <?php if($temp==0){ ?><a href=images/demo/fresume/<?php echo $row['f_resume'];?>>download resume</a>  <?php } ?>

        <label style="color: #A3D044;position: relative;left: -175px;top:10px;margin-top: 35px;">Update resume :<br><br></label>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input style="float: right;position: relative;cursor: pointer;top: -40px;margin-right: 50px;color: #A3D044;" type="file" name="file" required /><br>
        
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
