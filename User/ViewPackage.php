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
  <table id="travel" >
    <caption><?php  echo $row['package_name']; ?></caption>
    <thead>    
        <tr>
            <th scope="col" colspan="6">Schedule</th>
        </tr>
         <td><span>
                <p><?php echo $row['description']; ?></p>
                <p><img src="img/" style="float:right; margin-left:10px;" height="300px" width="450px" ></p>
            </span>
        </td>
        <tr>
           
            <td colspan="2"> <button name="review_btn"  value="<?php  echo $row['package_id']; ?>" style="color:#ffffff; background-color:#E3536C; border:0px; height:40px;">Review </button>  <button name="booking_btn"  value="<?php  echo $row['package_id']; ?>" style="color:#ffffff; background-color:#E3536C; border:0px; height:40px;">Book Now </button></td>
         </tr>
    </thead>
  </table>
  </form>
  <?php } ?>

    <?php 
    while($row_review = mysql_fetch_array($review_data, MYSQL_ASSOC))
    { ?>
  <div class="reviewSelector ">
            <div class="first">
                    <div class="col2of2">
                        <div class="innerBubble">
                            <div class="wrap">
                            <div class="quote">
                            “<span class="noQuotes">Customer name: <?php echo $row_review['customer_name']; ?></span>”</a>
                            </div>
                            <div class="entry">
                            <p class="partial_entry">
                            <?php echo $row_review['description']; ?>
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