<?php  
session_start();
include 'sessionr.php';
?>
<?php
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

$r_id=$_POST['r_id'];
$j_time=$_POST['j_time'];
$j_sal=$_POST['j_sal'];
$j_location=$_POST['j_location'];
$j_type=$_POST['j_type'];
$j_description=$_POST['j_description'];

if ($j_description==="") {
  $j_description="-";
}


$sql = "INSERT INTO jobs (r_id,j_time, j_sal ,j_location,j_type, j_description)
VALUES ('$r_id','$j_time','$j_sal', '$j_location','$j_type','$j_description')";

if ($conn->query($sql) === TRUE)
    echo "New record created successfully";

else
    echo "Error: " . $sql . "<br>" . $conn->error;
header('Location:r_dashboard.php');
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
            <li><a href="change_password.php">Change Password</a></li>
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
  <br><div style="border-left:solid #A3D044 7px;border-right:solid #A3D044 7px; background: white; color:black;max-width: 500px;">
  <br>   
      <h1 style="font-size: 40px;background: #A3D044;">POST A NEW JOB</h1>
<form action="r_post.php" method="POST">
  <input type="hidden" name="r_id" value="<?php echo $_SESSION['r_id'];?>">
  

  <label style="color: #A3D044;text-align: left;margin-left: 20px;">JOB TYPE :</label>
  <input type="text" name="j_type" size="52" placeholder="eg : IT / web design/ andorid app / graphic design" style="text-align: left;border:none;border-bottom: solid #A3D044 2px;" required>
  <label style="color: #A3D044;text-align: left;margin-left: 20px;margin-top: 20px;">DESCRIPTION :</label>
  <input type="text" name="j_description" size="52" placeholder="a brief description about the expected work" style="text-align: left;border:none;border-bottom: solid #A3D044 2px;">
  <label style="color: #A3D044;text-align: left;margin-left: 20px;margin-top: 20px;">SALARY :</label>
  <input type="text" name="j_sal" size="52" placeholder="sptipend /certificate / or any other incentives" style="text-align: left;border:none;border-bottom: solid #A3D044 2px;" required>
  <label style="color: #A3D044;text-align: left;margin-left: 20px;margin-top: 20px;">LOCATION :</label>
  <input type="text" name="j_location" size="52" placeholder="work form home / any other location" style="text-align: left;border:none;border-bottom: solid #A3D044 2px;" required>
  <label style="color: #A3D044;text-align: left;margin-left: 20px;margin-top: 20px;">TIME :</label>
  <input type="text" name="j_time" size="52" placeholder="in months" style="text-align: left;border:none;border-bottom: solid #A3D044 2px;" required>

  <br><br><input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px" type="submit" name="submit" value="POST"><br>

</form>

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
