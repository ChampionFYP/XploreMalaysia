<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'xplorema';
$dbpass = 'FYPchamp1!';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');

$package1 = "SELECT * FROM package where country_id = '1'";
$data_package1 = mysql_query( $package1, $conn );
$package2 = "SELECT * FROM package where country_id = '6'";
$data_package2 = mysql_query( $package2, $conn );
$package3 = "SELECT * FROM package where country_id = '3'";
$data_package3 = mysql_query( $package3, $conn );
$package4 = "SELECT * FROM package where country_id = '4'";
$data_package4 = mysql_query( $package4, $conn );
$package5 = "SELECT * FROM package where country_id = '5'";
$data_package5 = mysql_query( $package5, $conn );



mysql_close($conn);


if (isset($_POST['view_btn'])) 
{ 
   $package_id=$_POST['view_btn'];
   $_SESSION['user_package_id']=$package_id;
   // var_dump($_SESSION['user_package_id']);
   header('Location: '. dirname(__folder__) .'/ViewPackage.php');
} 
?>










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
                <img src="img/penang.jpg">
                <div class="carousel-caption">
                  <h3>PENANG</h3>
                  
                </div>
            </div>
            <div class="item">
                <img src="img/b.jpg">
                <div class="carousel-caption">
                  <h3>Beach</h3>
                 
                </div>
            </div>
            <div class="item">
               <img src="img/c.jpg">
                <div class="carousel-caption">
                  <h3>Night at Mount Kinabalu</h3>
                 
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




<form method="POST">
<div>
    <h2>Penang</h2>
    <hr class="hr2">
</br></br></br>

    <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block; "> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block; ">
             <?php 
              while($row1 = mysql_fetch_array($data_package3, MYSQL_ASSOC))
              { ?>             
                          <div class="owl-item">
                            <div style=""class="item">
                               <div class="box1">
                                    <div class="title2"><?php  echo $row1['package_name']; ?> <em><?php  echo $row1['package_name']; ?></em></div>
                                    <figure><img src="http://<?php echo $_SERVER['SERVER_NAME'] . "admin/photo/". $row1['image_id'];?>" alt=""></figure>
                                    <button name="view_btn"  value="<?php  echo $row1['package_id']; ?>" class="title5">View now!</button>
                               </div>
                           </div>
                         </div>
            <?php } ?>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>


<br/><br/><br/>


<div>
    <h2>Pahang</h2>
    <hr class="hr2">
</br></br></br>

    <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block; "> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block; ">
                       <?php 
                        while($row2 = mysql_fetch_array($data_package1, MYSQL_ASSOC))
                        { ?>   
                          <div class="owl-item">
                            <div style=""class="item">
                               <div class="box1">
                                    <div class="title2"><?php  echo $row2['package_name']; ?><em><?php  echo $row2['package_name']; ?></em></div>
                                    <figure><img src="http://<?php echo $_SERVER['SERVER_NAME'] . "admin/photo/". $row2['image_id'];?>" height="167px" width="250px" alt=""></figure>
                                    
                                    <button name="view_btn"  value="<?php  echo $row2['package_id']; ?>" class="title5">View now!</button>
                               </div>
                           </div>
                         </div>

                 <?php } ?>       
          </div>
        </div>
        </div>
      </div>
    </div>
</div>

   
<br/><br/><br/>


<div>
    <h2>Kuala Lumpur</h2>
    <hr class="hr2">
</br></br></br>

    <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block; "> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block; ">
                         <?php 
                          while($row3 = mysql_fetch_array($data_package4, MYSQL_ASSOC))
                          { ?> 
                          <div class="owl-item">
                            <div style=""class="item">
                               <div class="box1">
                                    <div class="title2"><?php  echo $row3['package_name']; ?><em><?php  echo $row3['package_name']; ?></em></div>
                                    <figure><img src="http://<?php echo $_SERVER['SERVER_NAME'] . "admin/photo/". $row3['image_id'];?>" height="167px" width="250px" alt=""></figure>
                                    
                                    <button name="view_btn"  value="<?php  echo $row3['package_id']; ?>" class="title5">View now!</button>
                               </div>
                           </div>
                         </div>

              <?php } ?>            
          </div>
        </div>
        </div>
      </div>
    </div>
</div>

<br/><br/><br/>








<div>
    <h2>Melaka</h2>
    <hr class="hr2">
</br></br></br>

    <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block; "> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block; ">
                 <?php 
                  while($row4 = mysql_fetch_array($data_package5, MYSQL_ASSOC))
                  { ?>         
                          <div class="owl-item">
                            <div style=""class="item">
                               <div class="box1">
                                    <div class="title2"><?php  echo $row4['package_name']; ?><em><?php  echo $row4['package_name']; ?></em></div>
                                    <figure><img src="http://<?php echo $_SERVER['SERVER_NAME'] . "admin/photo/". $row4['image_id'];?>" height="167px" width="250px" alt=""></figure>
                                    
                                    <button name="view_btn"  value="<?php  echo $row4['package_id']; ?>" class="title5">View now!</button>
                               </div>
                           </div>
                         </div>
            <?php } ?>
                        
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
<br/><br/><br/>


<div>
    <h2>Johor</h2>
    <hr class="hr2">
</br></br></br>

    <div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block; "> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block; ">
                          
                          <?php 
                            while($row5 = mysql_fetch_array($data_package2, MYSQL_ASSOC))
                            { ?>
                          <div class="owl-item">
                            <div style=""class="item">
                               <div class="box1">
                                    <div class="title2"><?php  echo $row5['package_name']; ?><em><?php  echo $row5['package_name']; ?></em></div>
                                    <figure><img src="http://<?php echo $_SERVER['SERVER_NAME'] . "admin/photo/". $row5['image_id'];?>" height="167px" width="250px" alt=""></figure>
                                    
                                    <button name="view_btn"  value="<?php  echo $row5['package_id']; ?>" class="title5">View now!</button>
                               </div>
                           </div>
                         </div>
                         <?php } ?>               
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
</div>form
<div id="footer"></div>
</body>
</html>