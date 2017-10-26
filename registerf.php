<?php
include 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$number=$_POST['number'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$msg="";

$f_image="favatar.png";
$f_bio="";
$f_resume="";


if($password==$cpassword)
{
include 'config.php';
$sql2="SELECT * FROM freelancers WHERE f_email='$email'";
$result2=mysqli_query($conn, $sql2);
$row2=mysqli_fetch_assoc($result2);

if ($email!=$row2['f_email']) {

    $sql = "INSERT INTO freelancers (f_fname,f_lname,f_email,f_number,f_gender,f_age, f_password,f_image,f_bio,f_resume)
    VALUES ('$fname','$lname', '$email','$number','$gender','$age','$password','$f_image','$f_bio','$f_resume')";

    if ($conn->query($sql) === TRUE)
    { $msg="";
      header('Location:loginf.php');
    }

}
else{
    $msg="This email Id is already registered !";
}
}



else
  {
    $msg="The passwords don't match !";
  }


    ?>
    <center><div id="fade" style="color: red;z-index: 7;max-height: 0px;max-width: 495px;position: relative;top: 220px;height:30px; text-align:center;padding-top:5px;"><?php echo $msg; ?> </div></center>
<?php
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
        <li><a href="registerr.php" style="background: #fbb217;color: white;padding: 13px;">Register as recruiter</a></li>
        <li><a href="loginf.php" style="background: #A3D044;color: white;padding: 13px;">Login</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<div class="wrapper bgded overlay">
  <div style="background-image:url('images/demo/backgrounds/06.png');" align="center"> 
  
  <div style="border :solid #A3D044 3px; background: white; color:black;max-width: 500px;position: relative;top: 80px;"><br>
    
      <h1 style="font-size: 40px;background: #A3D044;">REGISTER AS A FREELANCER</h1><br>
      <form action="registerf.php" method="post">

        <label style="color: #A3D044;position: relative;left: -190px">Name :</label>
        <div class="one_half first">
        <input type="text" name="fname" size="20" placeholder="first name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required >
        </div>
        <div class="one_half">
        <input type="text" name="lname" size="20" placeholder="last name" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required ><br>
        </div>

<!-- 
        <label style="color: #A3D044;position: relative;left: -165px;margin-top: 20px;">Email Address:</label>
        <input type="email" name="email" size="52" placeholder="email" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required ><br>
         -->
        <br><label style="color: #A3D044;position: relative;left: -190px">Email :</label>
        <label style="color: #A3D044;position: relative;top: -25px;left:70px;">Phone :</label>

        <div class="one_half first">
        <input type="email" name="email" size="20"  placeholder="email" style="position: relative;top: -15px ;text-align: center;border:none;border-bottom: solid #A3D044 2px;" required ><br>
        </div>
        <div class="one_half">
        <input type="longnumber" name="number" size="20"  placeholder="ph number" style="position: relative;top: -15px ;text-align: center;border:none;border-bottom: solid #A3D044 2px;" required ><br>
        </div>


        <label style="color: #A3D044;position: relative;left: -185px">Gender :</label>
        <label style="color: #A3D044;position: relative;top: -25px;left:70px;">Age :</label>

        <div class="one_half first">
          <select name ="gender" style="position: relative;top: -15px ;text-align:center;border:none;border-bottom: solid #A3D044 2px;color: black;width:170px;" >
            <option value="">--- select gender ---</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="one_half">
        <input type="number" name="age" min="1" max="100  " size="30"  placeholder="age" style="position: relative;top: -15px ;text-align: center;border:none;border-bottom: solid #A3D044 2px;" required ><br>
        </div>


        <label style="color: #A3D044;position: relative;left: -175px">Password :</label>
        <div class="one_half first">
        <input type="password" name="password" size="20" placeholder="password" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required>
        </div>
        <div class="one_half">
        <input type="password" name="cpassword" size="20" placeholder="confirm password" style="text-align: center;border:none;border-bottom: solid #A3D044 2px;" required><br>
        </div>
        <br><br><input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px" type="submit" name="submit" value="REGISTER"><br>

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

