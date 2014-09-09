<?php
session_start();

if(empty($_SESSION['admin_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
}
$dbhost = 'localhost';
$dbuser = 'xplorema';
$dbpass = 'FYPchamp1!';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');
// mysql_select_db('FYP');

$sql = 'SELECT * FROM country';


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
		<title>Country</title>
	</head>
	<body>
	<div class="fluid-container">
		<div id="navbar"></div>
		<div class="row">
			<div class="col-sm-12 col-md-2" style="padding-right:0px;"> 
				<div id="sidebar"></div>
			</div>
			<div class="box col-sm-12 col-md-10 pull-right" style="padding-left:0px;">
				<div class="heading">
					<h1>Country</h1>
					<div class="btn btn-default">Add</div>
					<div class="btn btn-default">Update</div>
					<div class="btn btn-default">Delete</div>
				</div>
				<div>
      				<form>
						<table class="list" id="list">
      				    <thead>
      				      <tr>
      				      <td width="1" style="text-align: center;"><input type="checkbox"/></td>
      				      <td></td>
							<td class="left" width=250 >State ID </td>
      				      <td class="left">State</td>						
      				      </tr>
      				    </thead>	    
						<tbody>
      				 <?php 
							while($row = mysql_fetch_array($data, MYSQL_ASSOC))
							{ ?>
							    <tr>
							    	<td width="1" style="text-align: center;"><input type="checkbox" name="country_id" value ="<?php  echo $row['country_id']; ?>"></td>
							    	<td class="center" style="width:10%"></td>
							    	<td class="left" width=250 >  <?php  echo $row['country_id']; ?></td>
							    	<td class="left">  <?php  echo $row['country_name']; ?></td>
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
