<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'xplorema';
$dbpass = 'FYPchamp1!';
$data='';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');

$sql = 'SELECT * FROM booking INNER JOIN admin ON booking.admin_id=admin.admin_id INNER JOIN package ON booking.package_id=package.package_id INNER JOIN customer ON booking.customer_id=customer.customer_id INNER JOIN status ON booking.status=status.status_id';
$status = 'SELECT * FROM status';
$admin_id=$_SESSION['admin_id'];


$data = mysql_query( $sql, $conn );
$status_data = mysql_query( $status, $conn );

if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

// var_dump($data);

if (isset($_POST['approve_btn'])&&isset($_POST['book_id'])) 
{ 
   $booking_id=$_POST['book_id'];
   $update_payment = "UPDATE booking SET status='1',admin_id='$admin_id' WHERE booking_id='$booking_id'" ;
   $payment_sql = mysql_query( $update_payment, $conn );
   header('Location: '. dirname(__folder__) .'/Booking.php');
} 

if (isset($_POST['delete_btn'])&&isset($_POST['book_id'])) 
{ 
   $booking_id=$_POST['book_id'];
   $update_payment = "UPDATE booking SET status='2',admin_id='$admin_id' WHERE booking_id='$booking_id'" ;
   $payment_sql = mysql_query( $update_payment, $conn );
   header('Location: '. dirname(__folder__) .'/Booking.php');
} 

if (isset($_POST['search_btn'])) 
{ 
   $search_id=$_POST['search_id'];
   $search_status_id=$_POST['status_search'];
   $search_data = "SELECT * FROM booking INNER JOIN admin ON booking.admin_id=admin.admin_id INNER JOIN package ON booking.package_id=package.package_id INNER JOIN customer ON booking.customer_id=customer.customer_id INNER JOIN status ON booking.status=status.status_id WHERE booking_id='$search_id' OR booking.status='$search_status_id'";
   if(empty($search_id) && empty($search_status_id))
   {
    $search_data = "SELECT * FROM booking INNER JOIN admin ON booking.admin_id=admin.admin_id INNER JOIN package ON booking.package_id=package.package_id INNER JOIN customer ON booking.customer_id=customer.customer_id INNER JOIN status ON booking.status=status.status_id";
   }
   $data = mysql_query($search_data, $conn );
   // header('Location: '. dirname(__folder__) .'/Payment.php');
} 



mysql_close($conn);


?>
















<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
        <!--JS-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
          $('#navbar').load('layout/navbar.php');
          $('#sidebar').load('layout/sidebar.php');
        });
    </script>
    <title>Booking</title>
  </head>
  <body>
  <div class="fluid-container">
    <div id="navbar"></div>
    <div class="row">
      <div class="col-sm-12 col-md-2" style="padding-right:0px;"> 
        <div id="sidebar"></div>
      </div>
      <form method="post">
      <div class="box col-sm-12 col-md-10 pull-right" style="padding-left:0px;">
        <div class="heading">
          <h1>Booking</h1>
          <input type="submit" name="approve_btn"  value="Approve" class="btn btn-default"></input>
          <input type="submit" name="delete_btn"  value="Deactive" class="btn btn-default"></input>
        </div>
        <div>
              
                <table class="list">
                  <thead>
                    <tr>
                    <td width="1" style="text-align: center;"><input type="checkbox"/></td>
              <td class="center" width=250 >Booking ID </td>
                    <td class="center">Package Name</td>
                    <td class="center">Package ID</td>
                    <td class="center">Booking date</td>
                      <td class="center">Number of person</td>
                      <td class="center">Admin Name</td>
                      <td class="center">Admin ID</td>
                      <td class="center">Customer Name</td>
                      <td class="center">Customer ID</td>
                      <td class="center">Status</td>
              
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="filter">
                      <td></td>
                      <td><input type="text" name="search_id"></td>
                      <td><select name="status_search">             
                            <option value=""></option>
                            <?php 
                  while($row_status = mysql_fetch_array($status_data, MYSQL_ASSOC))
                  { ?>
                            <option value="<?php  echo $row_status['status_id']; ?>"><?php  echo $row_status['status_name']; ?></option>
                            <?php } ?>

                        </select></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                        <td></td>
                      <td align="right"><input type="submit" name="search_btn"  value="Search" class="btn btn-default"></input></td>
                    </tr>
                    <?php 
              while($row = mysql_fetch_array($data, MYSQL_ASSOC))
              { ?>
                  <tr>
                    <td width="1" style="text-align: center;"><input type="checkbox" name="book_id" value="<?php  echo $row['booking_id']; ?>"></td>
                    <td class="center" style="width:10%">  <?php  echo $row['booking_id']; ?></td>
                    <td class="center" width=250 >  <?php  echo $row['package_name']; ?></td>
                    <td class="center">  <?php  echo $row['package_id']; ?></td>
                    <td class="center">  <?php  echo $row['booking_date']; ?></td>
                    <td class="center">  <?php  echo $row['no_person']; ?></td>
                    <td class="center">  <?php  echo $row['admin_username']; ?></td>
                    <td class="center">  <?php  echo $row['admin_id']; ?></td>
                    <td class="center">  <?php  echo $row['customer_name']; ?></td>
                    <td class="center">  <?php  echo $row['customer_id']; ?></td>
                    <td class="center">  <?php  echo $row['status_name']; ?></td>
                  <tr>
            <?php } ?>
                              </tbody>
                </table>
              </form>
                <div class="pagination" style="float:right;">
                  <div class="results">Showing 0 to 0 of 0 (0 Pages)</div>
                </div>
              </div>
        </div>
    </div> <!--row-->
    </div> <!--fluid-container-->
  </body>
</html>