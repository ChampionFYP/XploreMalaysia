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
		<title>Report Customers Order</title>
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
					<h1>Report Customers Order</h1>
					
				</div>
				<div>
      				 <table class="form">
					        <tr>
					          <td>Date Start:            <input type="text" value="" id="date-start" size="12" /></td>
					          <td>Date End:            <input type="text" value="" id="date-end" size="12" /></td>
					          <td>Order Status:            
									<select>
								
					              <option>All Statuses</option>
					                                          <option >Canceled</option>
					                                                        <option value="13">Chargeback</option>
					                                                        <option value="5">Complete</option>
					                                                        <option value="1">Pending</option>
					                                                        <option value="15">Processed</option>
					                                                        <option value="2">Processing</option>
					                                                        <option value="11">Refunded</option>
					                                                        <option value="16">Voided</option>
					                                        </select></td>
					          <td style="text-align: right;"><a class="button">Search</a></td>
					        </tr>
					      </table>
					      <table class="list">
					        <thead>
					          <tr>
					            <td class="left">Customer Name</td>
					            <td class="left">E-Mail</td>
					            <td class="left">Customer Group</td>
					            <td class="left">Status</td>
					            <td class="right">No. Booking</td>
					            <td class="right">No. Packages</td>
					            <td class="right">Total</td>

					          </tr>
					        </thead>
					        <tbody>
					                    <tr>
					            <td class="center" colspan="8">No results!</td>
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