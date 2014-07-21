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
		<title>Booking Report</title>
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
					<h1>Booking Report</h1>
					
				</div>
				<div>
      				<table class="form">
					        <tr>
					          <td>Date Start:            <input type="text" alue="2014-01-01" id="date-start" size="12" /></td>
					          <td>Date End:            <input type="text" value="2014-01-20" id="date-end" size="12" /></td>
					          <td>Group By:            
									<select>
											<option value="year">Years</option>
											<option value="month">Months</option>
											<option value="week" selected="selected">Weeks</option>
											<option value="day">Days</option>
									</select></td>
									<td>Order Status:				
									<select>
									<option value="0">All Statuses</option>
					                                          <option value="7">Canceled</option>
					                                                        <option value="9">Canceled Reversal</option>
					                                                        <option value="13">Chargeback</option>
					                                                        <option value="5">Complete</option>
					                                                        <option value="8">Denied</option>
					                                                        <option value="14">Expired</option>
					                                                        <option value="10">Failed</option>
					                                                        <option value="1">Pending</option>
					                                                        <option value="15">Processed</option>
					                                                        <option value="2">Processing</option>
					                                                        <option value="11">Refunded</option>
					                                                        <option value="12">Reversed</option>
					                                                        <option value="3">Shipped</option>
					                                                        <option value="16">Voided</option>
					                                        </select></td>
					          <td style="text-align: right;"><a class="button">Search</a></td>
					        </tr>
					      </table>
					      <table class="list">
					        <thead>
					          <tr>
					            <td class="left">Date Start</td>
					            <td class="left">Date End</td>
					            <td class="right">No. Booking</td>
					            <td class="right">No. Package</td>
					            <td class="right">Total</td>
					          </tr>
					        </thead>
					        <tbody>
					                    <tr>
					            <td class="center" colspan="6">No results!</td>
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