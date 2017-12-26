	<?php 
		include 'config.php';
		$email=$_POST['email'];
		$user=$_POST['user'];
		$_SESSION['eid']=$email;

	if(isset($_POST['submit']))
		{

		if($user=="r")
		  $sql = "SELECT * FROM `recruiters` WHERE r_email='$email'"; 

		else
		  $sql = "SELECT * FROM `freelancers` WHERE f_email='$email'"; 

		$result=mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		  
		if($count == 1)
		{
			$row=mysqli_fetch_array($result);

				if($user=="r")
				{		
				            $password=$row['r_password'];
							$to = $email;
							$subject = "Hireling | Password Recovery";
							$txt = 'Recruiter Login Credentials<br><br>Email ID : '.$email.'<br>Password : '.$password.'<br>';
							$headers = "From: ADMIN-HIRELING@hireling.com"."\r\n";
							$headers .= 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";							
							mail($to,$subject,$txt,$headers);
							$msg=' | Password has ben sent to the resistered ID : <span style="color : white;">'.$email.'</span> |';
				}

				else
				{
							$password=$row['f_password'];
							$to = $email;
							$subject = "Hireling | Password Recovery";
							$txt = 'Freelancer Login Credentials<br><br>Email ID : '.$email.'<br>Password : '.$password.'<br>';
							$headers = "From: ADMIN-HIRELING@hireling.com"."\r\n";
							$headers .= 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";							
							mail($to,$subject,$txt,$headers);
							$msg=' | Password has ben sent to the resistered ID : <span style="color : white;">'.$email.'</span> |';
				}
		}

		else
		{
			$msg=' | This email ID is not registered yet | ';
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

	<?php 
	  if($user=="r")
	  {
	      $redirect1="registerr.php";
	      $redirect2="loginr.php";
	  } 
	  else
	  {
	      $redirect1="registerf.php";  
	      $redirect2="loginf.php";
	  }
	 ?> 
	            <li><a style="color:#A3D044 ;" href=<?php echo $redirect1 ?> >Register </a></li>
	            <li><a style="background: #A3D044;color: white;padding: 13px;" href=<?php echo $redirect2 ?> >Login</a></li>
	   
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
		<div align="center" style="padding: 30px;position: relative;top: 130px;max-width: 1000px;border-radius:20px;min-height: 450px;background: rgba(0,0,0,0.5);"> 
	 	<form method="POST" action="forgot_password2.php">
	 		<h1 style="color: #A3D044;margin-bottom: 100px;font-size: 50px;font-family: monospace;">Forgot Password ?</h1>
			

	<?php 
	  if($user=="r")
	  {
	        echo '<label style="color: white;margin-left: -160px;">Enter the registered <span style="color: #A3D044;">Recruiter</span> Email ID</label>';
	  } 
	  else
	  {
	        echo '<label style="color: white;margin-left: -160px;">Enter the registered <span style="color: #A3D044;">Freelancer</span> Email ID</label>';
	  }
	 ?> 

	        <input type="email" name="email" size="60" value="<?php echo $_SESSION['eid']?>" style="border-radius: 5px;text-align: center;border:none;border-bottom: solid #A3D044 2px;padding: 5px;padding: 10px;margin: 10px;color: black" disabled><br><br>
			<input type="hidden" name="user" value="<?php echo $user?>">
			<i class="fa fa-envelope" style="position: relative;top: -85px;left:230px;border-left: 1px solid black;padding: 6px;padding-left:12px;color: black;"></i>
			<input style="background:#A3D044 ;border-radius:3px; color:black;padding:5px;padding-right:30px ;padding-left: 30px;margin-bottom: 10px;cursor: not-allowed;" type="submit" name="LOGIN" disabled="disabled" >	</form>
		</div>
	</center>

	<center>
	<div  style="background: rgba(163,208,68,0.7);max-width:1000px;position: relative;z-index: 10;top: 88px;color: black;">
		<b><?php echo $msg?></b>
	<?php 
	  if($user=="r")
	      $link="loginr.php";
	  else
	      $link="loginf.php";
	 ?> 
		<a style="color: #0000FF;text-decoration: underline;" href=<?php echo $link?>>Go back </a>
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

