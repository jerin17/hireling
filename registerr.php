<?php  
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$org=$_POST['org'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$msg="";

if($password==$cpassword)
{

$target = "logo/".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];

if ($image==="") {$image="avatar.png";}

$sql = "INSERT INTO recruiters (r_fname,r_lname,r_email,r_org, r_password,r_image)
VALUES ('$fname','$lname', '$email','$org','$password','$image')";
mysqli_query($conn , $sql);
@move_uploaded_file($_FILES['image']['tmp_name'] , $target);
header('Location:loginr.php');

}

else
  {
    $msg="The passwords don't match !";
    ?>
    <center><div id="fade" style="color: red;z-index: 7;max-height: 0px;max-width: 495px;position: relative;top: 220px;height:30px; text-align:center;padding-top:5px;"><?php echo $msg; ?> </div></center>
<?php
  }
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
<!-- <link href="layout/styles/bootstrap.css" rel="stylesheet" /> -->


</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1"  style="position:fixed;z-index: 5;">
<div class="wrapper row0">
</div>
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
        <li><a href="#">Contact</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="registerf.php" style="background: #fbb217;color: white;padding: 13px;">Register as freelancer</a></li>
        <li><a href="loginr.php" style="background: #A3D044;color: white;padding: 13px;">Login</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<div class="wrapper bgded overlay" >
  <div style="background-image:url('images/demo/backgrounds/06.png');" align="center"> 
  <br>

  <div style="border :solid #A3D044 3px; background: white; color:black;max-width: 500px;position: relative;top: 80px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044;">REGISTER AS A RECRUITER</h1>
      <form action="registerr.php" method="post" enctype="multipart/form-data">

        <label style="color: #A3D044;position: relative;left: -190px;">Name :</label>
        <div class="one_half first">
        <input type="text" name="fname" size="20" placeholder="first name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required>
        </div>
        <div class="one_half">
        <input type="text" name="lname" size="20" placeholder="last name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        </div>

        <label style="color: #A3D044;position: relative;left: -165px;margin-top: 20px;">Email Address:</label>
        <input type="email" name="email" size="52" placeholder="email" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        
        <label style="color: #A3D044;position: relative;left: -150px">Organisation Name  :</label>
        <input type="text" name="org" size="52" placeholder="Organisation name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>

        <label style="color: #A3D044;position: relative;left: -175px">Password :</label>
        <div class="one_half first">
        <input type="password" name="password" size="20" placeholder="password" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required>
        </div>
        <div class="one_half">
        <input type="password" name="cpassword" size="20" placeholder="confirm password" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        </div>

        <label style="color: #A3D044;position: relative;left: -125px;margin-top: 30px;">Upload logo of organisation:<br>(optional)</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input style="float: right;position: relative;top: -40px;color: #A3D044;" type="file" name="image" />


        <br><input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px" type="submit" name="submit" value="REGISTER"><br>

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