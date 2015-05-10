<?php
session_start();

if(empty($_SESSION['admin_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
}

$dbhost = 'localhost';
$dbuser = 'xplorema_user';
$dbpass = 'FYPchamp1!';


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');
// mysql_select_db('FYP');

$sql = "SELECT * FROM transport INNER JOIN admin ON transport.admin_id=admin.admin_id INNER JOIN status ON transport.status=status.status_id";


$data = mysql_query( $sql, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

mysql_close($conn);

if (isset($_POST['update_btn'])&&isset($_POST['trans_id'])) 
{ 
   $transport_id=$_POST['trans_id'];
   $_SESSION['transport_id']=$transport_id;
   // var_dump($_SESSION['package_id']);
   header('Location: '. dirname(__folder__) .'/transport_update.php');
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
		<title>Transportation</title>
	</head>
	<body>
	<form method="post">
	<div class="fluid-container">
		<div id="navbar"></div>
		<div class="row">
			<div class="col-sm-12 col-md-2" style="padding-right:0px;"> 
				<div id="sidebar"></div>
			</div>
			<div class="box col-sm-12 col-md-10 pull-right" style="padding-left:0px;">
				<div class="heading">
					<h1>Transportation</h1>
					<a href="transport_add.php" class="btn btn-default">Add</a>
					<input type="submit" name="update_btn"  value="Update" class="btn btn-default"></input>
				</div>
				<div>
      				
						<table class="list" id="list">
      				    <thead>
      				      <tr>
      				      <td width="1" style="text-align: center;"><input type="checkbox"/></td>
							
							<td class="center" width=250 >Transportation ID </td>
							<td class="center" style="width:10%">Image</td>
      				      <td class="center">Type</td>
      				      <td class="center">Phone</td>
							<td class="center">Description</td>
							<td class="center">Admin Name</td>
							<td class="center">Admin id</td>
							<td class="center">Status</td>
      				      </tr>
      				    </thead>	    
						<tbody>
      				 <?php 
							while($row = mysql_fetch_array($data, MYSQL_ASSOC))
							{ ?>
							    <tr>
							    	<td width="1" style="text-align: center;"><input type="checkbox" name="trans_id" value="<?php  echo $row['transport_id']; ?>"></td>
							    	<td class="center" style="width:10%">  <?php  echo $row['transport_id']; ?></td>
							    	<td>
							    	<img src="http://<?php echo $_SERVER['SERVER_NAME'] . "/photo/transport/". $row['transport_image_id'];?>" alt="" height="42" width="42">	
							    	</td>
							    	<td class="center" width=250 >  <?php  echo $row['type']; ?></td>
							    	<td class="center" width=250 >  <?php  echo $row['phone']; ?></td>
							    	<td class="center">  <?php  echo $row['transport_description']; ?></td>
							    	<td class="center">  <?php  echo $row['admin_username']; ?></td>
							    	<td class="center">  <?php  echo $row['admin_id']; ?></td>
							    	<td class="center">  <?php  echo $row['status_name']; ?></td>
							    <tr>
						<?php } ?>
      				  </tbody>
      				  </table>
      					
      				</div>
				</div>
		</div> <!--row-->
		</div> <!--fluid-container-->
		</form>
	</body>
</html>