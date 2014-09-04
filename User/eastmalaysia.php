<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

     <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>

    <style>
       .hr2{
        margin-left: 10%;
        margin-right: 10%;
        background-color: #C12B05;
        height: 1px;
       }
       h2{
         color: #C12B05;
         font-size: 30px;
         font-weight: bold;
         margin-right: 65%;
       }

       .carousel{
            margin-top: 0px;
            width: 100%;
        }
        .bs-exampe{
            margin:20px;
        }
        .item{
            background: #ffffff;    
            text-align: center;
            height: 455px !important;
        }
    </style>

        <title>Xplore Malaysia</title>
    </head>

  <body>
  <div id="header"></div>

 <!--Carousel-->
    <div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
      <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <img src="img/banner_Sarawak.jpg">
                <div class="carousel-caption">
                  <h3 style="color:#FFFFFF; text-shadow:2px 2px 2px #64BDF1;">Sarawak Scenery</h3>
                </div>
            </div>
            <div class="item">
                <img src="img/banner_Sabah.jpg">
                <div class="carousel-caption">
                  <h3 style="color:#FFFFFF; text-shadow:2px 2px 2px #64BDF1;">Explore Sabah Seaside</h3>
                </div>
            </div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>


<div>
    <h2>COUNTRY NAME</h2>
    <hr class="hr2">
</br></br></br>

    <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block; "> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block; ">
                          
            <div class="owl-item">
              <div class="item">
                 <a href="ViewPackage.php" class="box1">
                      <div class="title2">PACKAGE NAME<em>PACKAGE NAME</em></div>
                      <figure><img src="img/img.jpg" alt=""></figure>
                      <div class="">
                          <div class="info2">
                              <div class="title3">
                                <span>DATE</span>
                              </div>
                              <div class="title4"><span>RM</span> 
                                <strong>PRICE</strong>
                              </div>
                          </div>
                      </div>
                      <div class="title5">book now!<em>book now!</em></div>
                 </a>
              </div>
           </div>         
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
    <br/><br/><br/>
</div>

<div id="footer"></div>
</body>
</html>