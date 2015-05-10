<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'xplorema_user';
$dbpass = 'FYPchamp1!';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$customer_id=$_SESSION['customer_id'];
mysql_select_db('xplorema_FYP');

$payment = "SELECT * FROM payment INNER JOIN booking ON payment.booking_id=booking.booking_id INNER JOIN package ON payment.package_id=package.package_id INNER JOIN status ON payment.status=status.status_id WHERE payment.customer_id='$customer_id' AND payment.status='5'";
$payment_data = mysql_query( $payment, $conn );


if (isset($_POST['details_btn']))
{ 
   $package_id=$_POST['details_btn'];
   $_SESSION['user_package_id']=$package_id;
   // var_dump($package_id);
   header('Location: '. dirname(__folder__) .'/ViewPackage.php');
}




if (isset($_POST['cancel_btn']))
{ 
   $booking_id=$_POST['cancel_btn'];
   // var_dump($booking_id);
   $update_payment = "UPDATE payment SET status='4' WHERE booking_id='$booking_id'" ;
   $update_booking = "UPDATE booking SET status='4' WHERE booking_id='$booking_id'" ;
   $payment_sql = mysql_query( $update_payment, $conn );
   $booking_sql = mysql_query( $update_booking, $conn );
   header('Location: '. dirname(__folder__) .'/SuccessfulBooking.php');
} 







mysql_close($conn);


// if (isset($_POST['view_btn'])) 
// { 
//    $package_id=$_POST['view_btn'];
//    $_SESSION['user_package1_id']=$package_id;
//    // var_dump($_SESSION['user_package_id']);
//    header('Location: '. dirname(__folder__) .'/view_package.php');
// } 
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/booking_panel.css" rel="stylesheet">
    <link href="css/UserPanel.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>
	</head>
<form method="post">
  <body>
    <div class="container">
      <div id="header"></div>
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="xm-side">
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">Personal Info</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                          <li><a href="UserPanel.php">My Account</a></li>
                      </ul>
                  </div>
            </div>  
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">My Booking</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                      <li class="current"><a href="SuccessfulBooking.php">Successful Bookings</a></li>
                      <li><a href="PendingBooking.php">Pending Bookings</a></li>
                      <li><a href="CanceledBooking.php">Canceled Bookings</a></li>
                      </ul>
                  </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <p class="info">
            <span class="left">Successful Booking</span>
          </p>
          <!--Booking Details-->
          <table class="booking_bigtable">
          <?php 
              while($row1 = mysql_fetch_array($payment_data, MYSQL_ASSOC))
              { ?>
            <thead> 
              <tr>
                <th colspan="3">
                  <span class="fl booking-num">Booking number : <?php  echo $row1['booking_id']; ?></span>
                  <span class="fr datetime">Order placed on: <?php  echo $row1['booking_date']; ?></span>
                </th>
              </tr>
            </thead>
            <tbody>
             <tr>
              <td class="btd1 notd">
                <table class="booking_smtable">
                  <tbody>
                    <tr>
                      <td class="std1">                     
                        <div class="divorder">
                            <span class="mimg"><img src="http://admin.xploremalaysia.asia/photo/package/<?php echo $row1['package_image_id'];?>" height="60px" width="60px"></span>
                            <span><?php echo $row1['package_name']; ?></span>
                          <td>
                            <span><?php echo $row1['booking_date']; ?></span>
                          </td>
                          <td>
                            <span>RM<?php echo $row1['price']; ?></span>
                          </td>
                          <td>
                            <span><?php echo $row1['status_name']; ?></span>
                          </td>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="details">
                <button class="btn btn-default btn-sm" name="details_btn" value="<?php  echo $row1['package_id']; ?>">Booking Details</button>
                <button class="btn btn-default btn-sm" name="cancel_btn" value="<?php  echo $row1['booking_id']; ?>">Cancel</button>
              </td>
              </td>
             </tr>
            </tbody>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
  </form>
</html>