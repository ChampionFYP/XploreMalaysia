<?php
$dbhost = 'localhost';
$dbuser = 'xplorema';
$dbpass = 'FYPchamp1!';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');

$sql = 'SELECT * FROM package';


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
		<title>Package</title>
	</head>
	<body>
	<div class="fluid-container">
		<div id="navbar"></div>
		<div class="row">
			<div class="col-sm-12 col-md-2"> 
				<div id="sidebar"></div>
			</div>
			<div class="box col-sm-12 col-md-10 pull-right">
				<div class="heading">
					<h1>Package</h1>
					<div class="btn btn-default"><a href="PackagesAdd.php">Add</a></div>
					<div class="btn btn-default">Update</div>
					<div class="btn btn-default">Delete</div>
				</div>
				<div>
      				<form>
						<table class="list" id="list">
      				    <thead>
      				      <tr>
      				      <td width="1" style="text-align: center;"><input type="checkbox"/></td>
							<td class="left" width=250 >Package ID </td>
      				      <td class="left">Package Name</td>
							<td class="center">Country</td>
							<td class="center">Transport</td>
							<td class="center">Accomodation</td>
							<td class="center">Admin</td>
							<td class="center">Price</td>
							<td class="center">Description</td>
							<td class="center">Status</td>
      				      </tr>
      				    </thead>	    
						<tbody>
      				 	<?php 
							while($row = mysql_fetch_array($data, MYSQL_ASSOC))
							{ ?>
							    <tr>
							    	<td width="1" style="text-align: center;"><input type="checkbox" name="acco_id" id="acco_id" value="<?php  echo $row['package_id']; ?>"></td>
							    	<td class="center" style="width:10%">  <?php  echo $row['package_id']; ?></td>
							    	<td class="left" width=250 >  <?php  echo $row['package_name']; ?></td>
							    	<td>
							    	<img src="logo" alt="" height="42" width="42">	
							    	</td>
							    	<td class="left">  <?php  echo $row['country_id']; ?></td>
							    	<td class="left">  <?php  echo $row['transport_id']; ?></td>
							    	<td class="left">  <?php  echo $row['accomodation_id']; ?></td>
							    	<td class="left">  <?php  echo $row['admin_id']; ?></td>
							    	<td class="center">  <?php  echo $row['package_price']; ?></td>
							    	<td class="center">  <?php  echo $row['description']; ?></td>
							    	<td class="center">  <?php  echo $row['status']; ?></td>
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