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


$package_id = $_SESSION['user_package_id'];




$sql = "SELECT * FROM package where package_id = '$package_id '";


$data = mysql_query( $sql, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

$review = "SELECT * FROM review INNER JOIN customer ON review.customer_id=customer.customer_id INNER JOIN package ON review.package_id=package.package_id WHERE review.package_id='$package_id'";
$review_data = mysql_query( $review, $conn );

mysql_close($conn);

if (isset($_POST['booking_btn'])) 
{ 
   $package_id=$_POST['booking_btn'];
   $_SESSION['user_package_id']=$package_id;
   // var_dump($_SESSION['user_package_id']);
   header('Location: '. dirname(__folder__) .'/PackageBooking.php');
} 

if (isset($_POST['review_btn'])) 
{ 
   $package_id=$_POST['review_btn'];
   $_SESSION['user_package_id']=$package_id;
   // var_dump($_SESSION['user_package_id']);
   header('Location: '. dirname(__folder__) .'/addReview.php');
}
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link href="css/ViewPackage.css" rel="stylesheet">
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
    </head>
  <body>
  <div id="header"></div>
  <form method="POST">
  <?php 
    while($row = mysql_fetch_array($data, MYSQL_ASSOC))
    { ?>
  <h2 style="color:#66a9bd;text-align:left; margin-left:80px; font-size:40px;"><b><?php  echo $row['package_name']; ?></b></h2>
  <table id="travel" >
    <thead>    
        <tr>
            <th scope="col" colspan="6">Details</th>
        </tr>
         <td style="border-right:0;">
          <div>
                <p style="font-size:14px;text-align:justify;margin:0px 80px;font-family:verdana;"><?php echo $row['description']; ?></p>
                <br><br>
                <h3>Price: RM <?php echo $row['package_price']; ?></h3>
          </div>
        </td>
        <td style="border-left:0;">
          <img src="http://admin.xploremalaysia.asia/photo/package/<?php echo $row['package_image_id'];?>" style="float:right; margin-left:10px;" height="300px" width="450px" >
        </td>
        <tr>
            <td colspan="2"> 
              <button name="review_btn"  value="<?php  echo $row['package_id']; ?>" style="color:#ffffff; background-color:#E3536C; border:0px; height:40px;">Write a Review </button>  
              <button name="booking_btn"  value="<?php  echo $row['package_id']; ?>" style="color:#ffffff; background-color:#E3536C; border:0px; height:40px;">Book Now </button>
            </td>
         </tr>
    </thead>
  </table>
  </form>
  <?php } ?>

    <?php 
    while($row_review = mysql_fetch_array($review_data, MYSQL_ASSOC))
    { ?>
  <h2 style="color:#66a9bd;text-align:left; margin-left:80px; font-size:40px;"><i>Reviews</i></h2>
  <div class="review">
            <div class="first">
                    <div class="col">
                        <div class="innerBubble">
                            <div class="wrap">
                            <div class="quote">
                            “<span class="noQuotes">Customer name: <?php echo $row_review['customer_name']; ?></span>”</a>
                            </div>
                            <div class="entry">
                            <p class="partial_entry">
                            <?php echo $row_review['review']; ?>
                            </p>
                            </div>
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>
<div id="footer"></div>
<?php } ?>
</body>
</html>