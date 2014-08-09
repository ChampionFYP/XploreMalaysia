<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
        <link rel="stylesheet" href="./css/css(1)" type="text/css" media="screen" id="google_font_body">    
        <link rel="stylesheet" type="text/css" href="./css/stylesheet.css">
        <link rel="stylesheet" type="text/css" href="./css/stylesheet2.css">

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
		<title>Country</title>
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
					<h1>Customer</h1>
					
					<div><a href="Customer.html" class="btn btn-default">Cancel</a></div>
					<div class="btn btn-default">Save & Close</div>
				</div>
				<div>

      				<form id="form">
        <div id="tab-general">
          <div id="vtabs" class="vtabs"><a href="#tab-customer">General</a>
</div>
          <div id="tab-customer" class="vtabs-content">
            <table class="form">
              <tr>
                <td><span class="required">*</span>Name:</td>
                <td><input type="text" value="" />
                  </td>
              </tr>
                         <tr>
            <td><span class="required">*</span> IC:</td>
            <td><input type="text" value="" />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> Gender:</td>
            <td><select>
                <option>Male</option>
                <option>Female</option>
                              </select></td>
          </tr>
              <tr>
                <td><span class="required">*</span> E-Mail:</td>
                <td><input type="text" value="" />
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Telephone:</td>
                <td><input type="text" value="" />
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span>Username:</td>
                <td><input type="text" value="" /></td>
              </tr>
              <tr>
                <td><span class="required">*</span>Password:</td>
                <td><input type="password"/>
                  </td>
              </tr>
              <tr>
                <td>Status:</td>
                <td><select name="status">
                    <option value="1" selected="selected">Enabled</option>
                    <option value="0">Disabled</option>
                                      </select></td>
              </tr>
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