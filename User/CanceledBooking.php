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

$customer_id=$_SESSION['customer_id'];
mysql_select_db('xplorema_FYP');

$payment = "SELECT * FROM payment INNER JOIN booking ON payment.booking_id=booking.booking_id INNER JOIN package ON payment.package_id=package.package_id INNER JOIN status ON payment.status=status.status_id WHERE payment.customer_id='$customer_id' AND payment.status='4'";
$payment_data = mysql_query( $payment, $conn );

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
    <link href="css/UserPanel.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>
  </head>

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
            <thead>
            <?php 
              while($row1 = mysql_fetch_array($payment_data, MYSQL_ASSOC))
              { ?> 
              <tr>
                <th colspan="3">
                  <span class="fl booking-num">Booking number : <?php  echo $row1['booking_id']; ?></span>
                <td><span class="fr datetime">Depature Date： <?php  echo $row1['booking_date']; ?></span>
                </td>
                <td><span class="fr datetime">Package_name： <?php  echo $row1['package_name']; ?></span>
                </td>
                <td><span class="fr datetime">Status： <?php  echo $row1['status_name']; ?></span>
                </td>
                </th>
              </tr>
              <?php } ?>
            </thead>
            <tbody>
             <tr>
              <td class="btd1 notd">
                <table class="booking_smtable">
                  <tbody>
                    <tr>
                      <td class="std1">                     
                        <div class="divorder">
                          <a class="mimg" target="_blank" href="#">
                            <img src="#" title="Package Picture">
                          </a>
                        </div>
                      </td>
                      <td class="booking_status">
                          <span>Booked</span>
                      </td>
                      <td class="std3"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="price">
                  <span>RM xxx.00</span>
                  <p></p>
                  </td>
              <td class="details">
              </td>
             </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>