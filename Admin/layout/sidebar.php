<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        	<link rel="stylesheet" type="text/css" href="../css/sidebar.css">
	</head>
	<body>
		<div class="cl-sidebar">
		<div class="cl-navblock">
        <div class="menu-space nano nscroller has-scrollbar" style="height: 800px;">
			<div class="content" style="right:-17px;">
        	    <ul class="cl-vnavigation">
        	      <li><a href="dashboard.php"><i class="fa fa-home"></i><span>Dashboard</span></a>
        	      </li>
        	      <li><a href="#"><i class="fa fa-smile-o"></i><span>Services</span></a>
        	        <ul class="sub-menu">
        	          <li><a href="accommodation.php">Accommodation</a></li>
        	          <li><a href="transport.php">Transportation</a></li>
                      <li><a href="Country.php">Country</a></li>
                      <li><a href="Packages.php">Packages</a></li>
        	        </ul>
        	      </li>
        	      <li><a href="#"><i class="fa fa-list-alt"></i><span>Order</span></a>
        	        <ul class="sub-menu">
        	          <li><a href="Booking.php">Booking</a></li>
                      <li><a href="Customer.php">Customers</a></li>
                      <li><a href="Payment.php">Payment</a></li>
        	        </ul>
        	      </li>
        	      <li><a href="#"><i class="fa fa-table"></i><span>Reports</span></a>
        	        <ul class="sub-menu">
        	          <li><a href="Order.php">Order</a></li>
                      <li><a href="ReportPackage.php">Packages</a></li>
                      <li><a href="ReportCustomer.php">Customer</a></li>
        	        </ul>
        	      </li>              
        	      <li><a href="#"><i class="fa fa-map-marker nav-icon"></i><span>System</span></a>
        	        <ul class="sub-menu">
        	          <li><a href="#">Setting</a></li>
        	        </ul>
        	      </li>
        	    </ul>
        	</div>
        </div>
    </div></div>
    <script type="text/javascript" src="../js/sidebar.js"></script>
    <script type="text/javascript" src="../js/jquery.nanoscroller.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        App.init();
      });
    </script>
	</body>
</html>
