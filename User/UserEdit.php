<?php
session_start();

$dbhost = 'localhost';
$dbuser = 'xplorema';
$dbpass = 'FYPchamp1!';
$message="";
$customer_id=$_SESSION['customer_id'];

// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = '';


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');
// mysql_select_db('FYP');


if(isset($_POST['user_Name']))
{

$user_Name = $_POST['user_Name'];
$user_Password = $_POST['user_Password'];
$user_Email = $_POST['user_Email'];
$user_Phone = $_POST['user_Phone'];

$sql = "UPDATE customer SET customer_name='$user_Name', customer_password='$user_Password', customer_email='$user_Email', customer_phone='$user_Phone' WHERE customer_id='$customer_id'" ;
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
$message = "Updated data successfully\n";
}

if(isset($_POST['Cancel']))
{
  header('Location: '. dirname(__folder__) .'/UserPanel.php');
}




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
    <title>Edit Profile</title>
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
                      <li><a href="SuccessfulBooking.html">Successful Bookings</a></li>
                      <li><a href="#">Canceled Bookings</a></li>
                      </ul>
                  </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <p class="info">
            <span class="left">Edit Profile </span>
          </p>
          <div class="detail">
          <div class="user_info clearfix">
          <form method="post" action="<?php $_PHP_SELF ?>">
            <table class="mess">
              <div><?php echo $message; ?></div>
              <tbody>
              <?php 
              while($row = mysql_fetch_array($data, MYSQL_ASSOC))
              { ?>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">User ID:<?php echo $row['customer_id']; ?></span>&nbsp; </td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td class="rel_t"><span class="en-userinfo-field">Name: </span>&nbsp;</td>
                  <td><input type="text" class="form-control" name="user_Name" value="<?php  echo $row['customer_name']; ?>"></td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">Password: </span>&nbsp;</td>
                  <td><input type="password" class="form-control" name="user_Password" value="<?php  echo $row['customer_password']; ?>"></td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">E-Mail: </span>&nbsp;</td>
                  <td><input type="text" class="form-control" name="user_Email" value="<?php  echo $row['customer_email']; ?>"></td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">Phone: </span>&nbsp;</td>
                  <td><input type="text" class="form-control" name="user_Phone" value="<?php  echo $row['customer_phone']; ?>"></td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input name="Save" type="submit" class="btn btn-primary" value="Save"></td>
                  <td><input name="Cancel" type="submit" class="btn btn-danger" value="Cancel"></td>
                </tr>
                <?php } ?>
               </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>
