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
		<title>Customer</title>
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
					<div class="btn btn-default">Approve</div>
					<div ><a href="CustomerAdd.html" class="btn btn-default">Add</a></div>
					<div class="btn btn-default">Delete</div>
				</div>
				<div>
      				<form id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left">                <a href="" class="asc">Customer Name</a>
                </td>
              <td class="left">                <a href="">E-Mail</a>
                </td>
              <td class="left">                <a href="">Status</a>
                </td>
              <td class="left">                <a href="">Approved</a>
                </td>
              
				<td></td>

            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td><input type="text" value="" /></td>
              <td><input type="text" value="" /></td>
              
              <td><select>
                  <option></option>
                        <option>Enabled</option>
                        <option>Disabled</option>
                                  </select></td>
              <td><select>
                  <option></option>
                        <option>Yes</option>
                        <option>No</option>
                                  </select></td>
              
				<td align="right"><a class="button">Search</a></td>
		
               <tr>
              <td style="text-align: center;">
			  <input type="checkbox" value="86" />
                </td>
              
			<td class="left"><a href="#">Customer 1</a></td>
            <td class="left">Customer1@gmail.com</td>
            <td class="left">Default</td>
            <td class="left">Enabled</td>
            <td class="left">Yes</td>          
				<td></td>
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