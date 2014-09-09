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

$sql = "SELECT * FROM customer INNER JOIN status ON customer.status=status.status_id ";


$data = mysql_query( $sql, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

mysql_close($conn);

if (isset($_POST['update_btn'])&&isset($_POST['cus_id'])) 
{ 
   $customer_id=$_POST['cus_id'];
   $_SESSION['customer_id']=$customer_id;
   // var_dump($_SESSION['package_id']);
   header('Location: '. dirname(__folder__) .'/customer_update.php');
} 
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
		<title>Customer</title>
	</head>
	<body>
  <form method="POST">
	<div class="fluid-container">
		<div id="navbar"></div>
		<div class="row">
			<div class="col-sm-12 col-md-2"> 
				<div id="sidebar"></div>
			</div>
			<div class="box col-sm-12 col-md-10 pull-right">
				<div class="heading">
					<h1>Customer</h1>
					<div ><a href="CustomerAdd.html" class="btn btn-default">Add</a></div>
          <input type="submit" name="update_btn"  value="Update" class="btn btn-default"></input>
				</div>
				<div>
        <table class="list" id="list">
                  <thead>
                    <tr>
                    <td width="1" style="text-align: center;"><input type="checkbox"/></td>
              <td class="center" width=250 >Customer ID </td>
              <td class="center">Customer username</td>
              <td class="center">Customer Name</td>
              <td class="center">Password</td>
              <td class="center">Gender</td>
              <td class="center">Phone</td>
              <td class="center">Address</td>
              <td class="center">Status</td>
                    </tr>
                  </thead>      
            <tbody>
                <?php 
              while($row = mysql_fetch_array($data, MYSQL_ASSOC))
              { ?>
                  <tr>
                    <td width="1" style="text-align: center;"><input type="checkbox" name="cus_id" id="cus_id" value="<?php  echo $row['customer_id']; ?>"></td>
                    <td class="center" style="width:10%">  <?php  echo $row['customer_id']; ?></td>
                    <td class="center" width=250 >  <?php  echo $row['customer_username']; ?></td>
                    <td class="center" width=250 >  <?php  echo $row['customer_name']; ?></td>
                    <td class="center">  <?php  echo $row['customer_password']; ?></td>
                    <td class="center">  <?php  echo $row['gender']; ?></td>
                    <td class="center">  <?php  echo $row['customer_phone']; ?></td>
                    <td class="center">  <?php  echo $row['customer_address']; ?></td>
                    <td class="center">  <?php  echo $row['status_name']; ?></td>
                  <tr>
            <?php } ?>
                </tbody>
                </table>
      					<div class="pagination" style="float:right;">
      						<div class="results">Showing 0 to 0 of 0 (0 Pages)</div>
      					</div>
      				</div>
				</div>
		</div> <!--row-->
		</div> <!--fluid-container-->
    </form>
	</body>
</html>