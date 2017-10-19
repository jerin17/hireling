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
      <h1><a href="index.php" style="color: #A3D044;">Hireling</a></h1>
      <!-- yellow - fbb217 -->
      <p><a href="index.php" style="color: white">For free lancers and others</a></p>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="index.php">Home</a></li>         
        <li><a class="drop" href="" style="background: red;border-radius: 5px;color: white;padding: 13px;">
          <?php echo $_SESSION['f_fname']; ?>
        </a>
          <ul>
            <li><a href="f_setting.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      
      </ul>
    </nav>

    <!-- ################################################################################################ -->
  </header>
</div>

<div class="wrapper bgded overlay">
  <div id="pageintro" style="background-image:url('images/demo/backgrounds/06.png');" align="center"> 
 
 <div style="border :solid #A3D044 3px; background: white; color:black;max-width: 500px;position: relative;top: -130px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044;">UPDATE</h1>
      <form action="f_setting.php" method="post">

<?php  
include 'config.php';
$f_id=$_SESSION['f_id'];
$sql="SELECT * FROM freelancers WHERE f_id='$f_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>


        <label style="color: #A3D044;position: relative;left: -190px;margin-bottom: 20px;">Name :</label>
        <div class="one_half first">
        <input type="text" name="fname" size="20" value="<?php echo $row['f_fname'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required>
        </div>
        <div class="one_half">
        <input type="text" name="lname" size="20" value="<?php echo $row['f_lname'];?>" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        </div>
  
        <br><label style="color: #A3D044;position: relative;left: -190px">Email :</label>
        <label style="color: #A3D044;position: relative;top: -25px;left:70px;">Phone :</label>

        <div class="one_half first">
        <input type="email" name="email" size="20" value="<?php echo $row['f_email'];?>" style="position: relative;top: -15px ;text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        </div>
        <div class="one_half">
        <input type="longnumber" name="number" size="20"  value="<?php echo $row['f_number'];?>" style="position: relative;top: -15px ;text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        </div>



        <label style="color: #A3D044;position: relative;left: -185px">Gender :</label>
        <label style="color: #A3D044;position: relative;top: -25px;left:70px;">Age :</label>

        <div class="one_half first">
          <select name ="gender" style="position: relative;top: -15px ;text-align:center;border:none;border-bottom: solid #A3D044 2px;color: black;width:170px;" required>
            <option value="">--- select gender ---</option>
            <option value="male" <?php if($row['f_gender']=='male'){echo "selected";}?>>Male</option>
            <option value="female" <?php if($row['f_gender']=='female'){echo "selected";}?>>Female</option>
          </select>
        </div>
        <div class="one_half">
        <input type="number" name="age" min="1" max="100  " size="30" value="<?php echo $row['f_age'];?>" style="position: relative;top: -15px ;text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        </div>




        <br><br><input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px" type="submit" name="submit" value="UPDATE"><br><br>

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
<center><div id="fade" style="color: black;z-index: 2;background: #A3D044;max-width: 495px;position: relative;top: -320px;height:30px; text-align:center;padding-top:5px;"><?php echo $msg; ?> </div></center>
<script>  
setTimeout(function() {
  $("#fade").fadeOut().empty();
}, 1500);
</script>

<?php


header('Location:f_post.php');
}
else 
    echo "Error: " . $sql . "<br>" . $conn->error;

header('Location:f_post.php');
}
?>
