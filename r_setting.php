<?php  
session_start();
include 'sessionr.php';
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$org=$_POST['org'];
$r_id=$_SESSION['r_id'];

$sql = "UPDATE recruiters SET r_fname='$fname',r_lname='$lname', r_email='$email' ,r_org='$org' WHERE r_id='$r_id'" ;

if ($conn->query($sql) === TRUE)
{    echo "Record updated successfully";
     $_SESSION['r_fname']=$fname;
     $_SESSION['r_org']=$org;
}
 
else 
    echo "Error: " . $sql . "<br>" . $conn->error;

header('Location:r_setting.php');
}
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

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/9.jpg');min-height: 565px;">

<div class="wrapper row5" style="max-width: 300px;float: right; margin-right: 100px;margin-top:100px;border-radius: 3px;font-family: Allerta;font-size: 22px;color:#A3D044;background: rgba(0,0,0,0.5);border-radius: 5px;border-left:solid #A3D044 7px;">
<a href="r_setting.php" style="color:black;background:#A3D044;"><div style="background:#A3D044;text-align: center;padding: 20px;">GENERAL</div></a>
<a href="r_setting_picture.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >COMPANY LOGO</div></a>
<a href="r_setting_bio.php" style="color:#A3D044;background:black;"><div style="padding: 20px;" >COMPANY BIO</div></a>
</div>


  <div class="hoc center"> 
    <!-- ################################################################################################ -->
 <br>
 <div style="margin-left: 100px;border-radius: 10px;border :solid #A3D044 3px;background: rgba(0,0,0,0.5); color:black;max-width: 500px;position: relative;top: 30px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044;">GENERAL</h1>
      <form action="r_setting.php" method="post" enctype="multipart/form-data" style="margin-left: 30px"><br>

<?php  
include 'config.php';
$r_id=$_SESSION['r_id'];
$sql="SELECT * FROM recruiters WHERE r_id='$r_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

        <label style="color: #A3D044;float: left;margin-left: 10px;font-size: 15px;">Name :</label>
        <div class="one_half first">
        <input type="text" name="fname" size="25" value="<?php echo $row['r_fname'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;" required >
        </div>
        <div class="one_half">
        <input type="text" name="lname" size="25" value="<?php echo $row['r_lname'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >
        </div><br>


        <label style="color: #A3D044;float: left;margin-left: 10px;font-size: 15px;">Email ID :</label>
        <input type="email" name="email" size="59" value="<?php echo $row['r_email'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >
        
        <label style="color: #A3D044;float: left;margin-left: 10px;font-size: 15px;">Organisation Name  :</label>
        <input type="text" name="org" size="59" value="<?php echo $row['r_org'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >
        
    
        <br><input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px" type="submit" name="submit" value="UPDATE"><br>

      </form>

  </div>

  </div>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
