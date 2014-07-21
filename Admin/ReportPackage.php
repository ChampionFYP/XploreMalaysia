<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
         <link rel="stylesheet" type="text/css" href="./css/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="./css/stylesheet2.css">
		<link rel="stylesheet" href="./css/css(1)" type="text/css" media="screen" id="google_font_body">  
        <!--JS-->
      	<script type="text/javascript" src="js/jquery.js"></script>
      	<script type="text/javascript" src="js/bootstrap.js"></script>
      	 <link type="text/css" href="js/jquery-ui-1.8.16.custom.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/tabs.js"></script>
        <script type="text/javascript" src="js/superfish.js"></script>
        
		
		<script type="text/javascript">
				$(document).ready(function(){
					$('#navbar').load('layout/navbar.php');
					$('#sidebar').load('layout/sidebar.php');
				});
		</script>
		<title>Report Packages viewed</title>
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
					<h1>Report Packages Viewed</h1>
					
				</div>
				<div>
      				 <table class="list">
				        <thead>
				          <tr>
				            <td class="left">Package Name</td>
				            <td class="right">Viewed</td>
				            <td class="right">Percent</td>
				          </tr>
				        </thead>
				        <tbody>
				                    <tr>
				            <td class="center" colspan="4">No results!</td>
				          </tr>
				                  </tbody>
				      </table>
      					<div class="pagination" style="float:right;">
      						<div class="results">Showing 0 to 0 of 0 (0 Pages)</div>
      					</div>
      				</div>
				</div>
		</div> <!--row-->
		</div> <!--fluid-container-->
	</body>
</html>