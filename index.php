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
session_start();
if(!isset($_SESSION['user'])){
?>

       <li><a class="drop" href=""  style="background: #A3D044;color: white;padding: 13px;">Register</a>
          <ul>
            <li><a href="registerf.php">Register as a free lancer</a></li>
            <li><a href="registerr.php">Register as a Recruiter</a></li>
          </ul>
        </li>

        <li><a class="drop" href=""  style="background: #A3D044;color: white;padding: 13px;">LOGIN</a>
          <ul>
            <li><a href="loginf.php">Free lancer Login</a></li>
            <li><a href="loginr.php">Recruiter Login</a></li>
          </ul>
        </li>

<?php
}
else {
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
?>

<?php 
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
?>

       
<?php  
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
            <li><a href="logout.php">LOGOUT</a></li>      
          </ul>
<?php  
}
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
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/10.jpg');">
  <div id="pageintro"> 
    <!-- ################################################################################################ -->
    <article>
      <div>
        <p class="heading">We help you to hire</p>
        <h2 class="heading">expert freelancers</h2>
        <h3>TO DO YOUR WORK</h3>
      </div>
      <footer>
        <ul class="nospace inline pushright">

<?php 
if(!isset($_SESSION['user'])){
?>

          <li><a class="btn inverse" href="registerf.php">Become a freelancer</a></li>
          <li><a class="btn" href="registerr.php">Post a Job</a></li>
      
<?php 
}
else {
  $user=$_SESSION['user'];
  if($user=="f")
  {
      $username = $_SESSION['f_fname'];
      $redirect1="f_dashboard.php";  
      $redirect2="registerr.php";
  }
  else
  {
      $username = $_SESSION['r_fname'];
      $redirect1="registerf.php";
      $redirect2="r_post.php";
  }
?>
          <li><a class="btn inverse" href=<?php echo $redirect1; ?> >Become a freelancer</a></li>
          <li><a class="btn" href=<?php echo $redirect2; ?> >Post a Job</a></li>
<?php } ?>

        </ul>
      </footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<section id="jobs"></section>
<div class="wrapper row2">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
      <h1 class="font-x3 nospace"><b>Start freelancing</b></h1><br>
    <ul class="nospace group services">
      <li class="one_third first btmspace-30">
        <article>
          <a href="#"><img src="images/demo/profile/avatar.png" style="background: white; width: 60px; height: 60px;margin-bottom: 20px;"></a>
          <h6>Google</h6>
          <p><i>Web developer / $3000</i></p>
        </article>
      </li>
      <li class="one_third btmspace-30">
        <article><a href="#"><img src="images/demo/profile/avatar.png" style="background: white; width: 60px; height: 60px;margin-bottom: 20px;"></a>
          <h6>Google</h6>
          <p><i>Web developer / $3000</i></p>
        </article>
      </li>
      <li class="one_third btmspace-30">
        <article><a href="#"><img src="images/demo/profile/avatar.png" style="background: white; width: 60px; height: 60px;margin-bottom: 20px;"></a>
          <h6>Google</h6>
          <p><i>Web developer / $3000</i></p>
        </article>
      </li>
      <li class="one_third first">
        <article><a href="#"><img src="images/demo/profile/avatar.png" style="background: white; width: 60px; height: 60px;margin-bottom: 20px;"></a>
          <h6>Google</h6>
          <p><i>Web developer / $3000</i></p>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><img src="images/demo/profile/avatar.png" style="background: white; width: 60px; height: 60px;margin-bottom: 20px;"></a>
          <h6>Google</h6>
          <p><i>Web developer / $3000</i></p>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><img src="images/demo/profile/avatar.png" style="background: white; width: 60px; height: 60px;margin-bottom: 20px;"></a>
          <h6>Google</h6>
          <p><i>Web developer / $3000</i></p>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <div class="hoc container clear" style="min-height: 430px;"> 
    <!-- ################################################################################################ -->
    <ul class="nospace group cta">
      <center><h6 style="font-family: times;color: white"><b>Whatever It Is, We Can Help</b></h6></center><br>

      <li class="one_third first">
        <article><strong  style="color: white" class="numb">01</strong>
          <h6 class="heading font-x1"><a href="" style="text-decoration: none;font-size: 20px">How it Works ?</a></h6><br>
          <p>1. Post your project<br>2. Choose the perfect freelancer<br>3. Pay when you are satisfied!</p>
        </article>
      </li>
 
      <li class="one_third">
        <article><strong style="color: white" class="numb">02</strong>
          <h6 class="heading font-x1"><a href="" style="text-decoration: none;font-size: 20px">What kind of work can I get done?</a></h6><br>
          <p>Small jobs, large jobs, anything in-between</p>
        </article>
      </li>
      <li class="one_third">
        <article><strong style="color: white" class="numb">03</strong>
          <h6 class="heading font-x1"><a href="" style="text-decoration: none;font-size: 20px">Get free quotes. It's quick and easy</a></h6>
          <p>It only takes minutes to create new projects, get competitive quotes and choose your freelancer.</p>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
    <section id="about">
<div class="wrapper row3" style="font-family: courier">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
     <br>
    <div class="center btmspace-20">
      <h3 class="font-x3 nospace" style="font-family: times;"><b>Who we are</b></h3><br>
      <p class="nospace">Hireling.com is a freelancing and crowdsourcing marketplace by number of users and projects. We connect employers and freelancers globally from over the world. Through our marketplace, employers can hire freelancers to do work in areas such as software development, writing, data entry and design right through to engineering, the sciences, sales and marketing, accounting and legal services.</p><br>
      <hr style="color: red;border: solid #A3D044 1px">
    </div>
    
      <center><h3 class="font-x2 nospace" style="font-family: times;"><b>TEAM</b></h3></center><br>
    <div class="group">
    <article class="one_third first" style="text-align: center;">
    <img class="btmspace-30" src="images/demo/about/contact1.jpg" alt="" style="width: 150px;border-bottom: solid #A3D044 5px;">
      <h3 class="heading">Josu Jacob</h3>
        <p>Jamia Hamdard University <br> B.tech(CSE),final year </p>
    </article>
    <article class="one_third" style="text-align: center;">
    <img class="btmspace-30" src="images/demo/about/contact3.jpg" alt="" style="width: 150px;border-bottom: solid #A3D044 5px;">
      <h3 class="heading">Safin Chowdhury</h3>
        <p>Jamia Hamdard University <br> B.tech(CSE),final year </p>
    </article>
    <article class="one_third" style="text-align: center;">
    <img class="btmspace-30" src="images/demo/about/contact2.jpg" alt="" style="width: 150px;border-bottom: solid #A3D044 5px;">
      <h3 class="heading">Jerin Thomas</h3>
        <p>Jamia Hamdard University <br> B.tech(CSE),final year </p>
    </article>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<br>    <section id="write">

<div class="wrapper bgded overlay" style="background-image:url('images/demo/gallery/contactus1.jpg');min-height: 480px;">
  <article class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3">Got a Suggestion for Us?</h2>
    <p class="btmspace-50">We'd love to hear from you : ))</p>
    <p class="nospace"><a class="btn medium" href="contact.php">Write to US &raquo;</a></p>
    <!-- ################################################################################################ -->
  </article>
</div><br>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <section id="contact">
    <div class="one_third first">
      <h6 class="title">What's Hireling?</h6>
      <p>Hireling.com is a freelancing and crowdsourcing marketplace by number of users and projects. We connect employers and freelancers globally from over the world.</p>
      <p class="btmspace-15">Post a project today and get bids from talented freelancers.</p>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href=""><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-linkedin" href=""><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-twitter" href=""><i class="fa fa-instagram"></i></a></li>
        <li><a class="faicon-google-plus" href=""><i class="fa fa-google-plus"></i></a></li>
        </ul>
    </div>
    <div class="one_third" style="margin-right: 50px;">
      <h6 class="title">How to reach  </h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Jamia Hamdard, Hamdard Nagar,<br>New Delhi
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +91-9990480663</li>
        <li><i class="fa fa-envelope-o"></i> info@hireling.com</li>
      </ul>
    </div>
    <div style="display: flex;"><iframe height="300" src="https://www.mapsdirections.info/en/custom-google-maps/map.php?width=100%&height=300&hl=ru&q=Jamia%20Hamdard%2C%20Hamdard%20Nagar+(Hireling)&ie=UTF8&t=&z=15&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create Google Map</a> by <a href="https://www.mapsdirections.info/en/">Measure area on map</a></iframe></div><br />
    
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="http://hireling.ga/">hireling.ga</a></p>
    
    <!-- ################################################################################################ -->
  </div>
</div>
</section>
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