<?php

/*** begin the session ***/
session_start();

if(empty($_SESSION['admin_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
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
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <!--JS-->
      	<script type="text/javascript" src="js/jquery.js"></script>
      	<script type="text/javascript" src="js/bootstrap.js"></script>
		
		<script type="text/javascript">
				$(document).ready(function(){
					$('#navbar').load('layout/navbar.php');
					$('#sidebar').load('layout/sidebar.php');
				});
		</script>

		<title>Dashboard</title>
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
					<h1>Dashboard</h1>
				</div>
				<div style="padding-top:15px;">
					<div id="dash-notification" style="margin-bottom:20px;">
						<div class="dash-heading">Notification</div>
						<div class="dash-content">
							<?php echo $_SESSION['admin_id'] ?>
						</div>
					</div>
				</div>

                

			</div> <!--box-->
		</div> <!--row-->
		</div> <!--fluid-container-->
	</body>
</html>
