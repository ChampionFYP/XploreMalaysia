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
    <meta http-equiv="refresh" content="2;url=ContactUs.html" />
	<style>
         .title{
            text-transform: uppercase;
            font-family: 'Trebuchet MS';
            font-size: 30px;
            color: #4caeb8;
            margin: 0;
            padding: 10px 0 10px;
            text-align: left;
            margin-left: 12%;
        }
       
        .hr4 {
            margin-left: 10%;
            margin-right: 10%;
            background-color: #5cb5be;
            height: 1px;
        }
        #contactform
        {
            width:400px;
            border:2px solid grey;
            padding:14px;
            margin:0 auto;              
        }
        
        #contactform label
        {
            font-size:14px;
            float:left;
            
            text-align:left;
            display:block;
        }

        #contactform span
        {
            font-size:11px;
            color:grey;
            width:200px;
            text-align:right;
            display:block;
        }
        #contactform input
        {
            border:1px solid grey;
            font-family:verdana;
            font-size:14px;
            color:black;
            height:20px;
            width:300px;
            margin:5px 50px 20px 10px;
            background-color:white;
        }
         
        #contactform textarea
        {
            border:1px solid grey;
            font-family:verdana;
            font-size:14px;
            color:black;
            height:200px;
            width:300px;
            margin:5px 50px 20px 10px;
            background-color:white;
            
        }
         
        #contactform input[type='button']
        {
            clear:both;
            background:grey;
            color:#FFFFFF;
            border:solid 1px #666666;
            font-size:14px;
            height:25px;
            cursor:pointer;
            width:100px;
        }

        #contactform select
        {
            border:1px solid grey;
            font-family:verdana;
            font-size:14px;
            color:black;
            height:18px;
            width:300px;
            margin:5px 50px 20px 10px;
            background-color:white;
        }

        p.thanksyou
        {   

            font-family: Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
            font-size:20px;
            width:1000px;
            text-align:center;
            margin-left: 15%;
            display:block;
             
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
   <li class='last'><a href='#'><span>Contact Us</span></a></li>
   
</ul>
</div>
</div>
<hr class="hr1">
      <img src="logo.png" alt="logo"/>
      <br><br>
</div>

<br><br><br>

<p class = "thanksyou">
Thank you for your precious feedback to improve our product and services.
<br>
Please come again thank you
<br>This will auto-redirect you back to your Homepage. If is not loading please <a href="index.html">Click Here</a>
</p>



<br><br><br>

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