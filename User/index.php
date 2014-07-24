<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset($_SESSION['customer_id'] ))
{
    // header('Location: '. dirname(__folder__) .'/dashboard.php');
    session_destroy();

}

if(!isset( $_POST['email'], $_POST['password']))
{
    $message = '';
}
/*** check the username is the correct length ***/
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 3)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
// ** check the password has only alpha numeric characters **
elseif (ctype_alnum($_POST['password']) != true)
{
//         ** if there is no match **
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $phpro_username = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $phpro_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $phpro_password = $phpro_password;
    
    /*** connect to database ***/
    /*** mysql hostname ***/
   
    // $mysql_hostname = 'localhost';
    // $mysql_username = 'xplorema';
    // $mysql_password = 'FYPchamp1!';
    // $mysql_dbname = 'xplorema_FYP';

    $mysql_hostname = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_dbname = 'FYP';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT customer_id, customer_email, customer_password FROM customer 
                    WHERE customer_email = :customer_email AND customer_password = :customer_password");

        /*** bind the parameters ***/
        $stmt->bindParam(':customer_email', $phpro_username, PDO::PARAM_STR);
        $stmt->bindParam(':customer_password', $phpro_password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $customer_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($customer_id == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['customer_id'] = $customer_id;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';

                header('Location: '. dirname(__folder__) .'/UserPanel.php');

        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. </br><b>Please try again later!</b>';
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
		<title>Xplore Malaysia</title>
	</head>

  <body> 
  <div class="header">
  <div class="container">

          <div class="container">
    
            <div id="header_nav" class="header_Nav" align="right">
            <a id="modal_trigger" href="#modal" class="btn">Log In</a>
             <a id="modal_trigger" href="registeration.php" class="btn">Sign Up</a>
          </div>

          <div id="modal" class="popupContainer" style="display:none;">
            <header class="popupHeader">
              <span class="header_title">Login</span>
              <span class="modal_close"><i class="fa fa-times"></i></span>
            </header>
            
            <section class="popupBody">
              <!-- Social Login -->
              <form style="margin-bottom: 0px !important;" class="form-horizontal" method="post" action="index.php">
              <div class="social_login">
              
                <div class="action_btns">
                  <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                  
                </div>
              </div>

      <!-- Username & Password Login form -->
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
   <li class='active'><a href='index.php'><span>Home</span></a></li>
   <li class='has-sub'><a href=#><span>Vacation</span></a>
      <ul>
        <li class='has-sub'><a href='#'><span>West Malaysia</span></a></li>
        <li class='has-sub'><a href='#'><span>East Malaysia</span></a></li>
         
      </ul>
   </li>
   <li><a href='AboutUs.php'><span>About Us</span></a></li>
   <li class='last'><a href='ContactUs.php'><span>Contact Us</span></a></li>
   
</ul>
</div>
</div>
<hr class="hr1">
      <img src="logo.png" alt="logo"/>
      <img style="position:absolute; left:0; right:0; margin-top:3px;"src="bghead2.png" >

  </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  
  <div class="cointainer">
     
    <div class="row">
    
    <ul class="list1">
      <li>
      <a href="#" class="btn btn-primary btn2">
        <strong>
          <img src="img/hotel.png">
        </strong>
          <span>hotels</span>
      </a>
    </li>

     <li>
      <a href="#" class="btn btn-primary btn2">
        <strong>
          <img src="img/cars.png">
        </strong>
          <span>cars</span>
      </a>
    </li>

     <li>
      <a href="#" class="btn btn-primary btn2">
        <strong>
          <img src="img/package.png">
        </strong>
          <span>packages</span>
      </a>
    </li>
   </ul>
    </div>
  </div>

</br></br></br></br>
  <hr class="hr2">

<div class="title1">
  <strong> This Year's Hot Tours</strong>
  <span>Great Ideas For Family Rest</span>
</div>

</br></br></br></br>
 </div><!--header-->



  <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block;"> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block;">
                          
                          <div class="owl-item">
                            <div style=""class="item">
                               <a href="#" class="box1">
                                    <div class="title2">Selangor<em>Selangor</em></div>
                                    <figure><img src="img/a.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3"><strong>#</strong>
                                              <span>#</span>
                                            </div>
                                            <div class="title4"><span>#</span> 
                                              <strong>#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">book now!<em>book now!</em></div>
                               </a>
                           </div>
                         </div>

                           <div class="owl-item">
                           <div class="item">
                               <a href="#" class="box1">
                                    <div class="title2">
                                      Penang<em>Penang</em>
                                    </div>
                                    <figure><img src="img/b.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3"><strong>#</strong>
                                              <span>#</span>
                                            </div>
                                            <div class="title4"><span>#</span> <strong>$#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">
                                      book now!<em>book now!</em>
                                    </div>
                               </a>
                           </div>
                         </div>

                         <div class="owl-item">
                           <div class="item">
                               <a href="#" class="box1">
                                    <div class="title2">
                                      Sabah<em>Sabah</em>
                                    </div>
                                    <figure><img src="img/c.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3"><strong>#</strong>
                                              <span>#</span></div>
                                            <div class="title4"><span>#</span>
                                             <strong>#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">
                                      book now!<em>book now!</em>
                                    </div>
                               </a>
                           </div>
                         </div>

                         <div class="owl-item">
                          <div class="item">
                               <a href="#" class="box1">
                                    <div class="title2">
                                      Kedah<em>kedah</em>
                                    </div>
                                    <figure><img src="img/b.jpg" alt=""></figure>
                                    <div class="">
                                        <div class="info2">
                                            <div class="title3">
                                              <strong>#</strong>
                                              <span>#</span>
                                            </div>
                                            <div class="title4">
                                              <span>#</span> 
                                              <strong>#</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title5">
                                      book now!<em>book now!</em>
                                    </div>
                               </a>
                           </div>
                         </div>


                         
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="customNavigation">
      <a class="prev">
        <img src="img/arrowprev.png" alt="">
      </a>
      <a class="next">
        <img src="img/arrownext.png" alt="">
      </a>
</div>
  </div>

<hr class="hr3">
<div >
  <strong class="social_font"> Follow Us On</strong>
</div>

<div class="social">
  <img href="#" src="img/instagram.png" alt="instagram" >
  <img href="#" src="img/facebook.png" alt="facebook" >
  <img href="#" src="img/twitter.png" alt="twitter" >
</div>

<div class ="footer">
<div id="footerwrapper">
  <div id="footerstripe"><div id="footercap"></div></div>
  <div id="footercontent">
    <div align="center"><p>No 5-1, Block D,Jalan GC7,Glomac Cyberjaya,Jalan Teknokrat 3,63200,Cyberjaya</p><p>Tel:03-4568921 / Fax:03-7569821</p></div>
    <div id="footernav" align="center" class="footer_Nav"><a href="index.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Vacation</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="AboutUs.php">About Us</a>&nbsp;&nbsp;|<a href="ContactUs.php"> Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<br>Xplore Malaysia &nbsp;&nbsp;</div>
  </div>
</div>
</div>
</body>
</html>
