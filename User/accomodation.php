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

$package1 = "SELECT * FROM accomodation";
$data_package1 = mysql_query( $package1, $conn );




mysql_close($conn);


if (isset($_POST['view_btn'])) 
{ 
   $accomodation_id=$_POST['view_btn'];
   $_SESSION['user_accomodation_id']=$accomodation_id;
   // var_dump($_SESSION['user_package_id']);
   header('Location: '. dirname(__folder__) .'/view_accomodation.php');
} 
?>








<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
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
    </head>

  <body>
  <div id="header"></div>
<form method="POST">

<div>
    <h2>Accomodation</h2>
    <hr class="hr2">
</br></br></br>
<div class="container">
  <div class="row">
    
  <div class="owlbox">
    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity:1; display:block; "> 
      <div class="owl-wrapper-outer">
        <div class="owl-wrapper" style="width: 100%; margin-left: 0px; display:block; ">
             <?php 
              while($row1 = mysql_fetch_array($data_package1, MYSQL_ASSOC))
              { ?>             
                          <div class="owl-item">
                            <div class="item">
                               <a href="#" class="box1">
                                    <div class="title2"><?php  echo $row1['accomodation_name']; ?> <em><?php  echo $row1['accomodation_name']; ?></em></div>
                                    <figure><img src="http://admin.xploremalaysia.asia/photo/package/<?php echo $row1['accomodation_image_id'];?>" height="167px" width="250px" alt=""></figure>
                                    <button name="view_btn"  value="<?php  echo $row1['accomodation_id']; ?>" class="title5">View now!<em>Click Here To View!</em></button>
                               </a>
                           </div>
                         </div>
            <?php } ?>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
</div>
</form>
<div id="footer"></div>
</body>
</html>