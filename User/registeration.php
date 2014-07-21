<?php
$connection = mysql_connect('localhost', 'root', '');
// $connection = mysql_connect('localhost', 'xplorema', 'FYPchamp1!');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
$select_db = mysql_select_db('FYP');
// $select_db = mysql_select_db('xplorema_FYP');

if (!$select_db){

    die("Database Selection Failed" . mysql_error());

}

// If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $ic=$_POST['ic'];
        $password = $_POST['password'];
        $phone= $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $code = $_POST['code'];
        $gender = "man";
  
        $query = "INSERT INTO `customer` (customer_username, customer_password, gender, csutomer_name, customer_ic, customer_email, customer_phone, customer_address) VALUES ('$username', '$password', '1', '$username', '$ic', '$phone', '$email', '$address, $city, $state, $code')";

        $result = mysql_query($query);

        if($result){

            $msg = "User Created Successfully.";

        }

    }


?>










<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="bs/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css" />


    <style type="text/css">
        
        .title{
           text-transform: uppercase;
            font-family: 'Trebuchet MS', cursive;
            font-size: 30px;
            line-height: 30px;
            font-weight: 800;
            color: #4caeb8;
            margin: 0;
            padding: 16px 0 10px;
           text-align: left;
           margin-left: 12%;
           text-align: left;
           margin-left: 12%;
        }
        .red {  
              font-size:10pt; 
              font-style:italic; 
              color:red ; 
        }

        .hr4 {
              margin-left: 10%;
              margin-right: 10%;
              background-color: #5cb5be;
              height: 1px;
        }
        /*--------------form------------*/
        .formstyle{
            text-align: left;
            margin-left: 20%;
            
            font-size: 16px;
            font-family: "Arial Rounded MT Bold", "Helvetica Rounded", Arial, sans-serif;
            background:#ffffff;
            margin:0 auto; 
            padding-left:250px; 
            padding-top:20px;
            text-align: left;

        }
         legend{
          border: #509FA6;
         }
      
        .button {
            display:inline-block;
            width:150px;
            text-align:center;
            text-decoration:none;
            background-color: #5cb4be;
            color:#ffffff;
            padding:10px;
            font-weight: 700;
            letter-spacing:1px;
            border:0px solid #5cb4be;
            margin-top: 50px;
            margin-right: 50px;
            margin-left: 200px;

       }
        .button:hover {
           
            background: #ffffff;
            color: #5cb4be;
      }

      .buttoncancel {
            display:inline-block;
            width:150px;
            text-align:center;
            text-decoration:none;
            background-color: #ED6347;
            color:#ffffff;
            padding:10px;
            font-weight: 700;
            letter-spacing:1px;
            margin:10px;
            border:0px solid #ED6347;
            cursor: pointer;
       }
        .buttoncancel:hover {
           
            background: #ffffff;
            color: #ED6347;
      }
        label{
            display: inline-block;
            float: left;
            clear: left;
            width: 250px;
            text-align: right;
            margin-bottom: 10px;
        }
      
        .inputbox {
        float: left;
        display: inline-block;
        margin-top:10px;
        margin-left: 10px;
        }

        
    
    </style>




		<title>Xplore Malaysia</title>
	</head>

  <body>
  <div class="header">
  <div class="container">
     <div class="container">
    
            <div id="header_nav" class="header_Nav" align="right">
            <a id="modal_trigger" href="#modal" class="btn">Log In</a>
             <a id="modal_trigger" href="registeration.html" class="btn">Sign Up</a>
          </div>

          <div id="modal" class="popupContainer" style="display:none;">
            <header class="popupHeader">
              <span class="header_title">Login</span>
              <span class="modal_close"><i class="fa fa-times"></i></span>
            </header>
            
            <section class="popupBody">
              <!-- Social Login -->
              <div class="social_login">
              

                <div class="action_btns">
                  <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                  
                </div>
              </div>

      <!-- Username & Password Login form -->
      <div class="user_login">
        <form>
          <label>Email / Username</label>
          <input type="text" />
          <br />

          <label>Password</label>
          <input type="password" />
          <br />

          <div class="checkbox">
            <input id="remember" type="checkbox" />
            <label for="remember">Remember me on this computer</label>
          </div>

          <div class="action_btns">
            
            <div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
          </div>
        </form>

        <a href="#" class="forgot_password">Forgot password?</a>
      </div>

      
    </section>
  </div>
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

    // Calling Register Form
    $("#register_form").click(function(){
      $(".social_login").hide();
      $(".user_register").show();
      $(".header_title").text('Register');
      return false;
    });

    // Going back to Social Forms
    $(".back_btn").click(function(){
      $(".user_login").hide();
      $(".user_register").hide();
      $(".social_login").show();
      $(".header_title").text('Login');
      return false;
    });

    
  })
</script>
    <div id="main_nav">         
 <ul>
   <li class='active'><a href='index.html'><span>Home</span></a></li>
   <li class='has-sub'><a href=#><span>Vacation</span></a>
      <ul>
        <li class='has-sub'><a href='#'><span>West Malaysia</span></a></li>
        <li class='has-sub'><a href='#'><span>East Malaysia</span></a></li>
         
      </ul>
   </li>
   <li><a href='AboutUs.html'><span>About Us</span></a></li>
   <li class='last'><a href='ContactUs.html'><span>Contact Us</span></a></li>
   
</ul>
</div>
</div>
<hr class="hr1">
      <img src="logo.png" alt="logo"/>
      <br><br>
</div>

<h1 class="title">Registration Form </h1>
<hr class="hr4">

<div  class="formstyle">
<form style="margin-bottom: 0px !important;" class="form-horizontal" method="post" action="registeration.php">
   
    <fieldset>
     
        <label>Username* : </label> <input class="inputbox" id="username" type="text" name="username" size="30"  placeholder="First" required="" tabindex="1">

        <label>Username* : </label> <input class="inputbox" id="ic" type="text" name="ic" size="30">
         
        <label>Gender :  </label> <p class="inputbox"><input type="radio" name="gender" value="Male">Male
                         <input type="radio" name="gender" value="Female">Female </p>

        <label>Password : </label> <input class="inputbox" type="password" name="password" id="password" size="30" required="">
            
         <label>E-mail* :   </label>     <input class="inputbox" type="email" name="email" id="email" size="40" align="right" required="">
        
        <label>Mobile* :   </label>    <input class="inputbox" type="text" name="phone" id="phone" align="right"  required="">
          
        

        <label>Address: </label> <input  class="inputbox" type="text" size="62" name="address" id="address" required="">
        <label>City:   </label> <input class="inputbox" type="text" size="30" name="city" id="city" required="">
        <label>State: </label><input  class="inputbox" type="text" size="30" name="state" id="state" required="">
        <label>Zipcode:</label> <input class="inputbox" ype="text" size="30" name="code" id="code" required="">
    </fieldset>
      
        <button class="button" data-dismiss="modal" type="submit">Signup</button>
 <input class="buttoncancel" type="button" value="Cancel" name="cancelbtn">
      
</form>
</div>
<div class ="footer">
<div id="footerwrapper">
  <div id="footerstripe"><div id="footercap"></div></div>
  <div id="footercontent">
    <div align="center"><p>No 5-1, Block D,Jalan GC7,Glomac Cyberjaya,Jalan Teknokrat 3,63200,Cyberjaya</p><p>Tel:03-4568921 / Fax:03-7569821</p></div>
    <div id="footernav" align="center" class="footer_Nav"><a href="index.html">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Vacation</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="AboutUs.html">About Us</a>&nbsp;&nbsp;|<a href="ContactUs.html"> Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<br>Xplore Malaysia &nbsp;&nbsp;</div>
  </div>
</div>
</div>
</body>
</html>