<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="js/jsDatePick.jquery.min.1.3.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>
    
		<title>Xplore Malaysia</title>
	</head>

  <body> 
  <div id="header"></div>
  <div style="background: #5cb5be url(img/index_background.jpg) top center repeat-x; display: block;" class="col-md-12">
    <img src="img/bghead2.png" >
  </div>
   </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  <div class="container" style="position:absolute; margin-left:7%;">
    <div class="row">
      <ul class="list1">      
        <li>
          <a href="#HotelsBooking" role="button" data-toggle="modal" class="btn btn-primary btn2">
              <strong>
                <img src="img/hotel.png">
              </strong>
                <span>hotels</span>
          </a>
        </li>
    
        <li>
          <a href="#CarsBooking" role="button" data-toggle="modal" class="btn btn-primary btn2">
            <strong>
              <img src="img/cars.png">
            </strong>
              <span>cars</span>
          </a>
        </li>
    
        <li>
          <a href="#PackagesBooking" role="button" data-toggle="modal" class="btn btn-primary btn2">
            <strong>
              <img src="img/package.png">
            </strong>
              <span>packages</span>
          </a>
        </li>
      </ul>
      <div class="title1" style="text-shadow: 2px 2px 2px #081246;">
        <strong>This Year's Hot Tours</strong>
        <span>Great Ideas For Family Rest</span>
      </div>
    </div>
  </div>

</br></br></br></br>
  <hr class="hr2">
</br></br></br></br></br></br></br></br></br>
 </div>

  <div class="container">
  <div class="row">   
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block;"> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block;">
                          
            <div class="owl-item">
              <div style=""class="item">
                  <a href="#" class="box1">
                       <div class="title2">State<em>State</em></div>
                       <figure><img src="img/a.jpg" alt=""></figure>
                       <div class="title5">View now!<em>View now!</em></div>
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
  <a href="#"><img src="img/instagram.png" alt="instagram"></a>
  <a href="http://www.fb.com/xploremalaysia" target="_blank"><img src="img/facebook.png" alt="facebook"></a>
  <a href="#"><img src="img/twitter.png" alt="twitter"></a>
</div>

<div id ="footer"></div>
</div>
</body>
</html>
