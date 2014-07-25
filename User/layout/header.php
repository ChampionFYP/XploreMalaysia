<?php

$dir = $_SERVER['DOCUMENT_ROOT'];


include $dir.'/XploreMalaysia/User/login_function.php'; 

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/loginstyle.css" />
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
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
      ?> 	
			<a id="modal_trigger" href="UserPanel.html" class="btn">My Account</a>
			<a id="modal_trigger" href="logout.php" class="btn">Log Out</a>
       <?php }?> 	
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
      		  <label>Email</label>
            <input type="text" placeholder="Email" id="email" name="email"/>
            <br />

            <label>Password</label>
            <input type="password" placeholder="Password" id="password" name="password"/>
            <br />

            <div class="checkbox">
            <input id="remember" type="checkbox" />
            <label for="remember">Remember me on this computer</label>
            </div>

            <p style="color:red;"><?php echo $message; ?></p>
            <div class="action_btns">            
            <div class="one_half last"><button class="btn btn_red" data-dismiss="modal" type="submit">Login</button></div>
            </div>
       

            <a href="#" class="forgot_password">Forgot password?</a>
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
			<ul>
			   <li class='active'><a href='index.php'><span>Home</span></a></li>
			   <li class='has-sub'><a href=#><span>Vacation</span></a>
			      <ul>
			        <li class='has-sub'><a href='westmalaysia.html'><span>West Malaysia</span></a></li>
			        <li class='has-sub'><a href='#'><span>East Malaysia</span></a></li>
			         
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
