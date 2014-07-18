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
		<title>Payment</title>
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
					<h1>Payment</h1>
					
					<div class="btn btn-default">Delete</div>
				</div>
				<div>
      				<form id="form">
				        <table class="list">
				          <thead>
				            <tr>
				              <td width="1" style="text-align: center;"><input type="checkbox"></td>
				              <td class="right">                <a href="" class="desc">Payment ID</a>
				                </td>
				              <td class="left">                <a href="">Customer</a>
				                </td>
								<td class="left">                <a href="">Price</a>
				                </td>
				              <td class="left">                <a href="">Status</a>
				                </td>
				              <td class="left">                <a href="">Total</a>
				                </td>
				              <td class="left">                <a href="">Date Added</a>
				                </td>
				              <td class="left">                <a href="">Date Modified</a>
				                </td>
				              <td class="right">Action</td>
				            </tr>
				          </thead>
				          <tbody>
				            <tr class="filter">
				              <td></td>
				              <td align="right"><input type="text" value="" size="4" style="text-align: right;"></td>
				              <td><input type="text" value="" class="ui-autocomplete-input"></td>
							  <td><input type="text" size=5 value=""</td>
				              
								<td><select>
							
				                  <option value="*"></option>
				                                                                        <option value="7">Deposit Paid</option>
				                                                                        <option value="5">Complete Paid</option>
				                                                                        <option value="1">Pending</option>
				                                                    </select></td>
				              <td align="left"><input type="text" value="" size="12" style="text-align: left;"></td>
				              <td><input type="text" value="" size="12" class="date hasDatepicker" id="dp1390107916615"></td>
				              <td><input type="text" value="" size="12" class="date hasDatepicker" id="dp1390107916616"></td>
				              <td align="right"><a class="button">Search</a></td>
				            </tr>
				                        <tr>
				              <td class="center" colspan="8">No results!</td>
				            </tr>
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