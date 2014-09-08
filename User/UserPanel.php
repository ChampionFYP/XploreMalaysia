<?php

/*** begin the session ***/
session_start();

if(empty($_SESSION['customer_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
}

$dbhost = 'localhost';
$dbuser = 'xplorema';
$dbpass = 'FYPchamp1!';
$message="";
$customer_id=$_SESSION['customer_id'];

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');
// mysql_select_db('FYP');

$sql = "SELECT * FROM customer WHERE customer_id= '$customer_id' ";


$data = mysql_query( $sql, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}
mysql_close($conn);






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
    <div id="header"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="xm-side">
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">Personal Info</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                          <li class="current"><a href="UserPanel.php">My Account</a></li>
                      </ul>
                  </div>
            </div>  
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">My Booking</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                      <li><a href="SuccessfulBooking.php">Successful Bookings</a></li>
                      <li><a href="CanceledBooking.php">Canceled Bookings</a></li>
                      </ul>
                  </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <p class="info">
            <span class="left">My Account </span>
          </p>
          <div class="detail">
          <div class="user_info clearfix">
            <table class="mess">
              <tbody>
              <?php 
              while($row = mysql_fetch_array($data, MYSQL_ASSOC))
              { ?>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">User ID:</span>&nbsp; </td>
                  <td><?php echo $row['customer_id']; ?></td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td class="rel_t"><span class="en-userinfo-field">Name:</span>&nbsp;</td>
                  <td><?php  echo $row['customer_name']; ?></td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td class="rel_t"><span class="en-userinfo-field">Username:</span>&nbsp;</td>
                  <td><?php  echo $row['customer_username']; ?></td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">E-Mail:</span>&nbsp;</td>
                  <td><?php  echo $row['customer_email']; ?></td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">Phone:</span>&nbsp;</td>
                  <td><?php  echo $row['customer_phone']; ?></td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td><a class="btn btn-warning" href="UserEdit.php">Edit</a></td>
                  <td><a class="btn btn-danger" href="">Deactivate</a></td>
                </tr>
                 <?php } ?>
               </tbody>
            </table>
              
              </br>
              
          </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>
