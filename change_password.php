<?php
  session_start();
  $user=$_SESSION['user'];
  if ($user=='r')
    include 'sessionr.php';
  else
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
<!-- <link href="layout/styles/bootstrap.css" rel="stylesheet" /> -->

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1"  style="position:fixed;z-index: 3;">
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
        <li><a href="#top">Home</a></li>         
        <li><a href="#jobs">Jobs</a></li>         
        <li><a href="#about">About Us</a></li>
        <li><a href="#write">Write to us</a></li>
        <li><a href="#contact">Contact</a></li>
<!-- 
        <li><a href="loginf.php" style="background: #A3D044;color: white;padding: 13px;">Free lancer Login</a></li>
        <li><a href="loginr.php" style="background: #A3D044;color: white;padding: 13px;">Recruiter Login</a></li>
 -->               
        

<?php 
  $user=$_SESSION['user'];
  if($user=="f")
   {
      $username = $_SESSION['f_fname'];
      $redirect1="f_dashboard.php";  
      $redirect2="f_setting.php";
      $image='images/demo/fprofile/'.$_SESSION['f_image'];
   }
  
  else
  {
      $username = $_SESSION['r_fname'];
      $redirect1="r_dashboard.php";
      $redirect2="r_setting.php";
      $image='logo/'.$_SESSION['r_image'];
  }

if(isset($_SESSION['f_id']))
{ include 'config.php';
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

if($notif==1 ||$notif==2 ||$notif==3){
?> 
<li><a href=<?php echo $redirect1; ?> style="color: #fbb217;">DASHBOARD</a></li>      
        <li><a class="drop" href="" style="padding: 13px;">
         <img src="<?php echo $image;?>" style="width: 40px;height: 40px;border-radius: 100px"> 
<div style="float: right;margin-right: 50px;position: relative;top: -8px;left: -15px;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:17px;"> &nbsp<?php echo $notif; ?> </div>        
         </a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$username;?></a></li>  
          <li><a href=<?php echo $redirect2; ?>>SETTINGS<div style="float: right;color:white;background:red;height:20px;width:20px;border-radius:100px;font-size:17px;"> &nbsp<?php echo $notif; ?></div></a></li>  
            <li><a href="change_password.php">CHANGE PASSWORD</a></li>
            <li><a href="logout.php">LOGOUT</a></li>      
          </ul>
<?php } ?>
        </li>

<?php
}
if($user=="r" || $notif==0){
?>
 <li><a href=<?php echo $redirect1; ?> style="color: #fbb217;">DASHBOARD</a></li>      
        <li><a class="drop" href="" style="padding: 13px;">
         <img src="<?php echo $image;?>" style="width: 40px;height: 40px;border-radius: 100px"></a>
          <ul>        
            <li><a style="text-align: center;text-transform: uppercase;cursor: default;"><?php echo 'Welcome, '.$username;?></a></li>  
            <li><a href=<?php echo $redirect2; ?>>SETTINGS</a></li>
            <li><a href="change_password.php">CHANGE PASSWORD</a></li>
            <li><a href="logout.php">LOGOUT</a></li>      
          </ul>
<?php  
}

?>      
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/9.jpg');font-family: monospace;min-height: 650px;">
<center>
	<div align="center" style="padding: 30px;position: relative;top: 100px;max-width: 1000px;min-height: 450px;border-radius: 20px;box-shadow: 5px 5px 5px #0f0f0f;background: rgba(0,0,0,0.5);padding-bottom: 15px;"> 
 	<form method="POST" action="change_password.php">
 		<h1 style="color: #A3D044;margin-bottom: 55px;font-size: 50px;font-family: monospace;">Change Password</h1>
		

    <label style="color: white;margin-left: -400px;">Old Password</label> 
    <input type="password" name="oldpassword" size="60" placeholder="* * * * * * * * *" style="border-radius: 5px;border:none;border-bottom: solid #A3D044 2px;padding: 5px;padding: 10px;margin: 6px;color: black;padding-left: 30px;" required><br><br>

    <label style="color: #A3D044;margin-left: -400px;">New Password </label> 
    <input type="password" name="newpassword" size="60" placeholder="* * * * * * * * *" style="border-radius: 5px;border:none;border-bottom: solid #A3D044 2px;padding: 5px;padding: 10px;margin: 6px;color: black;padding-left: 30px;" required><br><br>

    <label style="color: #A3D044;margin-left: -330px;">Confirm  New Password </label> 
    <input type="password" name="cpassword" size="60" placeholder="* * * * * * * * *" style="border-radius: 5px;border:none;border-bottom: solid #A3D044 2px;padding: 5px;padding: 10px;margin: 6px;color: black;padding-left: 30px;" required><br>  

    <input type="hidden" name="user" value="<?php echo $user?>">
		
    <input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px;margin-bottom: 10px;cursor: pointer;" type="submit" name="submit">
  </form>
	</div>
</center>




<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
<?php  

if (isset($_POST['submit']))
{
include 'config.php';
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$cpassword=$_POST['cpassword'];
$flag=0;$err=0;$msg="";

$user=$_SESSION['user'];
  if ($user=='r')
  {
    $id=$_SESSION['r_id'];
      $sql="SELECT * FROM recruiters WHERE r_id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if ($oldpassword===$row['r_password']) 
      $flag=1;      
    else
      $flag=0;
  } 
  
  else
    {
    $id=$_SESSION['f_id'];
    $sql2="SELECT * FROM freelancers WHERE f_id='$id'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
    if ($oldpassword===$row2['f_password']) 
       $flag=1;     
    else
       $flag=0;
  }

if($flag==1)
{
    if ($newpassword==$cpassword)
    {
      if($user=='r')
        $sql = "UPDATE recruiters SET r_password='$newpassword' WHERE r_id='$id'" ;
      else
        $sql = "UPDATE freelancers SET f_password='$newpassword' WHERE f_id='$id'" ;
      mysqli_query($conn , $sql);
        $msg="Password changed successfully";
        $err=1;
    } 
    
    else
      {
        $msg="Confirm password doesn't match !";
    }
}

else
{
      $msg="Old password doesn't match !";
}

?>

<?php if($err==1) {?>
<div>
  <center style="color: #A3D044;position: relative;z-index: 10;top: -330px;"><?php echo $msg; ?></center> 
</div>

<?php  
}
else{
?>
<div>
  <center id="fade" style="color: red;position: relative;z-index: 10;top: -330px;"><?php echo $msg; ?></center> 
</div>
<?php }}?>
<script>  
setTimeout(function() {
  $("#fade").fadeOut().empty();
}, 1500);
</script>
