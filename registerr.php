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

if ($image==="") {$image="ravatar.png";}

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
<div class="wrapper bgded overlay">
  <div class="bgded overlay " style="background-image:url('images/demo/backgrounds/9.jpg');min-height: 805px;padding-bottom: 70px;" align="center"> 
  <br>
  <div style="border :solid #A3D044 3px; background: rgba(0,0,0,0.7); color:black;max-width: 625px;position: relative;top: 80px;border-radius: 10px; margin-top: 35px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044;padding: 5px;">REGISTER AS A RECRUITER</h1><br>
      <form action="registerr.php" method="post">

        <div class="clear">
        <img src="images/demo/profile/ravatar.png" style="width:120px;margin-bottom: 10px;">
        </div>

        <label style="color: #A3D044;float: left;margin-left: 30px;font-size: 15px;">Name :</label>
        <div class="one_half first">
        <input type="text" name="fname" size="33" placeholder="first name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;" required >
        </div>
        <div class="one_half">
        <input type="text" name="lname" size="33" placeholder="last name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >
        </div>

        <label style="color: #A3D044;float: left;margin-left: 30px;font-size: 15px;">Email :</label><br>
        <div class="clear">
        <input type="email" name="email" size="79"  placeholder="email" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required > 
        </div>


        <label style="color: #A3D044;float: left;margin-left: 30px;font-size: 15px;">Organisation Name :</label><br>
        <div class="clear">
        <input type="text" name="org" size="79" placeholder="organisation name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >  
        </div>

        <label style="color: #A3D044;float: left;margin-left: 30px;font-size: 15px;">Password :</label><br>
        <div class="clear">
        <input type="password" name="password" size="79" placeholder="* * * * * * * * * * * * * *" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >  
        </div>

        <label style="color: #A3D044;float: left;margin-left: 30px;font-size: 15px;">Confirm Password :</label><br>
        <div class="clear">
        <input type="password" name="cpassword" size="79" placeholder="* * * * * * * * * * * * * *" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 7px;border-radius: 5px;margin-bottom: 30px;" required >  
        </div>

        <label style="color: #A3D044;float: left;margin-left: 30px;font-size: 15px;">Logo of organisation(optional) :</label><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input style="float: right;position: relative;top: -20px;color: #A3D044;" type="file" name="image" /><br>

        <br><input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px;cursor: pointer;" type="submit" name="submit" value="REGISTER"><br>

<a href="loginr.php" style="color: white;float: right;padding: 5px;margin-top: -15px;"><u>login here</u> ?</a><br>
      </form>


  </div>
<br>  
  </div></div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>

