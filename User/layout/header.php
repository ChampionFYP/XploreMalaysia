<?php

/*** begin our session ***/
session_start();
$connection = mysql_connect('localhost', 'xplorema_user', 'FYPchamp1!');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
$select_db = mysql_select_db('xplorema_FYP');

if (!$select_db){

    die("Database Selection Failed" . mysql_error());

}
    $customer_id=$_SESSION['customer_id'];
    $customer =" SELECT * FROM customer WHERE customer_id='$customer_id'";
    $data_customer = mysql_query($customer);



/*** check if the users is already logged in ***/

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />
    <title>Xplore Malaysia</title>
	  <link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/loginstyle.css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	</head>

  <body> 
  <div class="header">
  <div class="container">

    <div class="container">
    <div id="header_nav" class="header_Nav" align="right">
    <?php 
      if(empty($_SESSION['customer_id'] )){
    ?>
            <a id="modal_trigger" href="#modal" class="btn">Log In</a>
            <a id="modal_trigger" href="registration.php" class="btn">Sign Up</a>
       <?php 
      }
       else 
      {
      while($row = mysql_fetch_assoc($data_customer))
          { ?> 	
			<a href="UserPanel.php" class="btn"><?php  echo $row['customer_name']; ?></a>
			<a href="logout.php" class="btn">Log Out</a>
      <?php } 
        }?> 	
        </div>

          <!--Popup Login Box-->
          <div id="modal" class="popupContainer" style="display:none;">
            <header class="popupHeader">
              <span class="header_title">Login</span>
              <span class="modal_close"><i class="fa fa-times"></i></span>
            </header>
            <section class="popupBody">
            <form style="margin-bottom: 0px !important;" class="form-horizontal" method="post" action="login_function.php">
      			<div class="user_login">
      		  <label>Username</label>
            <input type="text" placeholder="Username" id="username" name="username"/>
            <br />

            <label>Password</label>
            <input type="password" placeholder="Password" id="password" name="password"/>
            <br />

            <div class="action_btns">            
            <div style="float:right;"><button class="btn btn-info" data-dismiss="modal" type="submit">Login</button></div>
            </div>
       

            <a href="forgot_password.php" class="forgot_password">Forgot password?</a>
      			</div>
          </form>
		    </section>
		  </div>
		  <!--End of popup Login Box-->
		</div>

		<script type="text/javascript">
		  $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
		
		  $(function(){
		    // Calling Login Form
		    $("#login_form").click(function(){
		      $(".social_login").hide();
		      $(".user_login").show();
		      return false;
		    }); 
		  })
		</script>

	  	<div id="main_nav">         
			<ul class="col-md-12">
			   <li><a href='index.php'><span>Home</span></a></li>
			   <li class='has-sub'><a href=#><span>Vacation</span></a>
			      <ul>
			        <li class='has-sub'><a href='westmalaysia.php'><span>West Malaysia</span></a></li>
			        <li class='has-sub'><a href='eastmalaysia.php'><span>East Malaysia</span></a></li>
			      </ul>
			   </li>
			   <li><a href='AboutUs.php'><span>About Us</span></a></li>
			   <li class='last'><a href='ContactUs.php'><span>Contact Us</span></a></li>
			   
			</ul>
	  	</div>
	</div>
<hr class="hr1">
      <a href="index.php"><img src="img/name.png" alt="logo"/></a>
</body>
</html>
