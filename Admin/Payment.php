<?php
session_start();

if(empty($_SESSION['admin_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
}
$dbhost = 'localhost';
$dbuser = 'xplorema_user';
$dbpass = 'FYPchamp1!';
$data='';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');

$sql = 'SELECT * FROM payment INNER JOIN admin ON payment.admin_id=admin.admin_id INNER JOIN customer ON payment.customer_id=customer.customer_id INNER JOIN status ON payment.status=status.status_id';
$status = 'SELECT * FROM status';
$admin_id=$_SESSION['admin_id'];
$total='';


$data = mysql_query( $sql, $conn );
$status_data = mysql_query( $status, $conn );
$customer_payment_data = mysql_query( $sql, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}



if (isset($_POST['approve_btn'])&&isset($_POST['pay_id'])) 
{ 
   $payment_id=$_POST['pay_id'];
   $update_payment = "UPDATE payment SET status='5',admin_id='$admin_id' WHERE payment_id='$payment_id'" ;
   $payment_sql = mysql_query( $update_payment, $conn );
	$customer_email='';

	while($row_email = mysql_fetch_array($customer_payment_data, MYSQL_ASSOC))
    {
        $customer_email=$row_email['customer_email'];
    }

/* Set e-mail recipient */
	$myemail  = $customer_email;
	/* If e-mail is not valid show error message */
	if(!empty($email))
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
	{
	    show_error("E-mail address not valid");
	}

	/* If URL is not valid set $website to empty */

	/* Let's prepare the message for the e-mail */
	$message = "Hello!

	Here is your payment number:".$payment_id."

	We have received your payment . Thank you

	Please Email to kfc1346@gmail.com with screenshot/photo when you using online banking/ATM


	We will sent you a receipt once we confirm your payment.


	Thank you
	";

	/* Send the message using mail() function */
	mail($myemail, "Payment Status", $message);

	/* Redirect visitor to the thank you page */
	// header('Location: thanks.htm');
	// exit();

	/* Functions we used */

   header('Location: '. dirname(__folder__) .'/Payment.php');
} 

if (isset($_POST['delete_btn'])&&isset($_POST['pay_id'])) 
{ 
   $payment_id=$_POST['pay_id'];
   $update_payment = "UPDATE payment SET status='4',admin_id='$admin_id' WHERE payment_id='$payment_id'" ;
   $payment_sql = mysql_query( $update_payment, $conn );
   header('Location: '. dirname(__folder__) .'/Payment.php');
} 

if (isset($_POST['search_btn'])) 
{ 
   $search_id=$_POST['search_id'];
   $search_status_id=$_POST['status_search'];
   $search_data = "SELECT * FROM payment INNER JOIN admin ON payment.admin_id=admin.admin_id INNER JOIN customer ON payment.customer_id=customer.customer_id INNER JOIN status ON payment.status=status.status_id WHERE payment_id='$search_id' OR payment.status='$search_status_id'";
   if(empty($search_id) && empty($search_status_id))
   {
   	$search_data = "SELECT * FROM payment INNER JOIN admin ON payment.admin_id=admin.admin_id INNER JOIN customer ON payment.customer_id=customer.customer_id INNER JOIN status ON payment.status=status.status_id";
   }
   $data = mysql_query($search_data, $conn );
   // header('Location: '. dirname(__folder__) .'/Payment.php');
} 

if (isset($_POST['report_btn'])) 
{
$contents="Payment_report\n Payment id , Type, Price, customer_id, date \n";
$user_query = mysql_query("select * from payment INNER JOIN status ON payment.status=status.status_id WHERE payment.status='5'");
while($row_payment = mysql_fetch_array($user_query))
{
$contents.=$row_payment['payment_id'].",";
$contents.=$row_payment['payment_type'].",";
$contents.=$row_payment['price'].",";
$contents.=$row_payment['customer_id'].",";
$contents.=$row_payment['created']."\n";
$total += $row_payment['price']; // escape internalt commas
// $contents.=$answer."\n";
}
$contents = strip_tags($contents); // remove html and php tags etc.
Header("Content-Disposition: attachment; filename=payment_report.xls");
print $contents;
print "Total : ,". $total;
exit;
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
		<title>Payment</title>
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
					<h1>Payment</h1>
					<input type="submit" name="approve_btn"  value="Approve" class="btn btn-default"></input>
					<input type="submit" name="delete_btn"  value="Cancel" class="btn btn-default"></input>
					<input type="submit" name="report_btn"  value="Report" class="btn btn-default"></input>
				</div>
				<div>
      				
				        <table class="list">
				          <thead>
      				      <tr>
      				      <td width="1" style="text-align: center;"><input type="checkbox"/></td>
							<td class="left" width=250 >Payment ID </td>
      				      <td class="left">Pay</td>
      				      <td class="center">Type</td>
      				      	<td class="center">Admin Name</td>
      				      	<td class="center">Admin ID</td>
      				      	<td class="center">Booking ID</td>
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
				              <td align="right"><input type="submit" name="search_btn"  value="Search" class="btn btn-default"></input></td>
				            </tr>
				            <?php 
							while($row = mysql_fetch_array($data, MYSQL_ASSOC))
							{ ?>
							    <tr>
							    	<td width="1" style="text-align: center;"><input type="checkbox" name="pay_id" value="<?php  echo $row['payment_id']; ?>"></td>
							    	<td class="center" style="width:10%">  <?php  echo $row['payment_id']; ?></td>
							    	<td class="left" width=250 >  <?php  echo $row['price']; ?></td>
							    	<td class="left">  <?php  echo $row['payment_type']; ?></td>
							    	<td class="left">  <?php  echo $row['admin_username']; ?></td>
							    	<td class="left">  <?php  echo $row['admin_id']; ?></td>
							    	<td class="left">  <?php  echo $row['booking_id']; ?></td>
							    	<td class="left">  <?php  echo $row['customer_name']; ?></td>
							    	<td class="left">  <?php  echo $row['customer_id']; ?></td>
							    	<td class="center">  <?php  echo $row['status_name']; ?></td>
							    <tr>
						<?php } ?>
				                      </tbody>
				        </table>
				      </form>
      					
      				</div>
				</div>
		</div> <!--row-->
		</div> <!--fluid-container-->
	</body>
</html>