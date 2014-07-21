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
			<div class="col-sm-12 col-md-2"> 
				<div id="sidebar"></div>
			</div>
			<div class="box col-sm-12 col-md-10 pull-right">
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

	<div class="panel panel-default"  style="margin-left:10px;">
        <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> <span data-i18n="Table">Table</span></strong></div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Packages</th>
                    <th>Status</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><span class="color-success"></span> Amery Lee</td>
                    <td>Sabah 4 days 3 nights trips</td>
                    <td><span class="label label-info">Pending</span></td>
                    <td><div class="progressbar-xs no-margin progress ng-isolate-scope" value="55"><div class="progress-bar" ng-class="type &amp;&amp; 'progress-bar-' + type" ng-transclude="" style="width: 55%;"></div></div>
                </td></tr>
                <tr>
                    <td>2</td>
                    <td><span class="color-success"></span> Romayne Carlyn</td>
                    <td>Sabah 4 days 3 nights trips</td>
                    <td><span class="label label-primary">Due</span></td>
                    <td><div class="progressbar-xs no-margin progress ng-isolate-scope" value="34" type="success"><div class="progress-bar progress-bar-success" ng-class="type &amp;&amp; 'progress-bar-' + type" ng-transclude="" style="width: 34%;"></div></div></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><span class="color-warning"></span> Marybeth Joanna</td>
                    <td>Sabah 4 days 3 nights trips</td>
                    <td><span class="label label-success">Due</span></td>
                    <td><div class="progressbar-xs no-margin progress ng-isolate-scope" value="68" type="info"><div class="progress-bar progress-bar-info" ng-class="type &amp;&amp; 'progress-bar-' + type" ng-transclude="" style="width: 68%;"></div></div></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><span class="color-info"></span> Jonah Benny</td>
                    <td>Sabah 4 days 3 nights trips</td>
                    <td><span class="label label-danger">Paid</span></td>
                    <td><div class="progressbar-xs no-margin progress ng-isolate-scope" value="77" type="success"><div class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" ng-transclude="" style="width: 100%;"></div></div></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><span class="color-danger"></span> Daly Royle</td>
                    <td>Sabah 4 days 3 nights trips</td>
                    <td><span class="label label-warning">Suspended</span></td>
                    <td><div class="progressbar-xs no-margin progress ng-isolate-scope" value="77" type="danger"><div class="progress-bar progress-bar-danger" ng-class="type &amp;&amp; 'progress-bar-' + type" ng-transclude="" style="width: 77%;"></div></div></td>
                </tr>

            </tbody>
        </table>
    </div>
			</div> <!--box-->
		</div> <!--row-->
		</div> <!--fluid-container-->
	</body>
</html>
