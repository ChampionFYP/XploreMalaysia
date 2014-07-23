<?php
/* Set e-mail recipient */
$myemail  = 'kfc1346@gmail.com';



if (isset($_POST['name']))    
{    
$name = $_POST['name'];
$type  = $_POST['type'];
$email    = $_POST['email'];
$mobile = $_POST['mobile'];
$comment = $_POST['comment'];   



/* If e-mail is not valid show error message */
if(!empty($email))
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */

/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $name
E-mail: $email
Type: $type
Phone: $mobile

Comments:
$comment

End of message
";

/* Send the message using mail() function */
mail($myemail, $type, $message);
}
/* Redirect visitor to the thank you page */
// header('Location: thanks.htm');
// exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
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
            margin-right: 80px;
            margin-left: 300px;

       }
        .button:hover {
          
            background: #ffffff;
            color: #5cb4be;
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

        textarea{
        border:1px solid grey;
        font-family:verdana;
        font-size:12px;
        color:black;
        height:200px;
        width:300px;
        margin:5px 50px 20px 10px;
        background-color:white;
        
    }

    p.thanksyou{   

        font-family: Papyrus, fantasy;
        font-size:20px;
        width:1000px;
        text-align:center;
        font-weight : bold;
        display:block;
         
    }
        
    </style>


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

<h1 class="title">Contact Us</h1>
<hr class="hr4">

<div  class="formstyle">
<form name = "registerfrm" method="post" action="ContactUs.php">
    <fieldset>
   
     
        <label> Name* : </label> <input class="inputbox" type="text" name="name" id="name" size="30" required="" tabindex="1">
        
         <label>E-mail* :   </label>     <input class="inputbox" type="email" name="email" id="email" size="40" align="right" required="">
        
        <label>Mobile* :   </label>    <input class="inputbox" type="text" name="mobile" id="mobile" align="right"  required="">
          
        <label>Subject : </label>
        <select class="inputbox" name="type" id="type">
        <option value = "blank">
        <option value = "Complain">Complain
        <option value = "Feedback">Feedback
        <option value = "Suggestion">Suggestion
        <option value = "Customer Service">Customer Service
        <option value = "Others">Others
        </select>
        <label>Message : </label>
        <textarea  class="inputbox" name="comment" id="comment" placeholder = "Please limit your character to 200 characters"/></textarea>

        
    </fieldset>

        <button class="button" data-dismiss="modal" type="submit">Sent</button>
 
      
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