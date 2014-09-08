<?php
$connection = mysql_connect('localhost', 'xplorema', 'FYPchamp1!');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
// $select_db = mysql_select_db('xplorema_FYP');
$select_db = mysql_select_db('xplorema_FYP');

if (!$select_db){

    die("Database Selection Failed" . mysql_error());

}

// If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $ic=$_POST['ic'];
        $password = $_POST['password'];
        $phone= $_POST['phone'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];
  
        // $query = "INSERT INTO `customer` (customer_username, customer_password, gender, csutomer_name, customer_ic, customer_email, customer_phone, customer_address) VALUES ('$username', '$password', '$gender', '$username', '$ic', '$phone', '$email', '$address, $city, $state, $code')";
        
        $data_username= "SELECT * FROM customer WHERE customer_username='$username'";
        $data_u = mysql_query($data_username);
        $values = mysql_fetch_array($data_u);
        $data_email= "SELECT * FROM customer WHERE customer_email='$email'";
        $data_e = mysql_query($data_email);
        $values2 = mysql_fetch_array($data_e);
        $data_ic= "SELECT * FROM customer WHERE customer_ic='$ic'";
        $data_i = mysql_query($data_ic);
        $values3 = mysql_fetch_array($data_i);

        // var_dump($values);
        // var_dump($values2);
        // var_dump($values3);

        if(empty($values) && empty($values2) && empty($values3)){

            $query = "INSERT INTO `customer` (customer_username, customer_password, gender, customer_name, customer_ic, customer_email, customer_phone, status) VALUES ('$username', '$password', '$gender', '$name', '$ic', '$email', '$phone','$status')";
            mysql_query($query);
        }
        if(!empty($values))
        {
            $msg1=" Username Used";
        }
        if(!empty($values2))
        {
            $msg2=" Email Used";
        }
        if(!empty($values3))
        {
            $msg3=" IC Used";
        }

    }

    $status1=" SELECT * FROM status";
    $data_status = mysql_query($status1);


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
				<form method="post" action="CustomerAdd.php">	
					<div><a href="Customer.php" class="btn btn-default">Cancel</a></div>
					<div>                                
    <button class="btn btn-default" type="submit">submit</button>
    </div>
				</div>
				<div>

      				
        <div id="tab-general">
          <div id="vtabs" class="vtabs"><a href="#tab-customer">General</a>
</div>
          <div id="tab-customer" class="vtabs-content">
            
            <?php if(!empty($msg1)) {?>
             <div><label style="color:red;">Error: <?php echo $msg1; ?></label></div>
             <?php } ?>
             <?php if(!empty($msg2)) {?>
             <div><label style="color:red;">Error: <?php echo $msg2; ?></label></div>
             <?php } ?>
             <?php if(!empty($msg3)) {?>
             <div><label style="color:red;">Error: <?php echo $msg3; ?></label></div>
             <?php } ?>



            <table class="form">
              <tr>
                <td><span class="required">*</span>Name:</td>
                <td><input class="inputbox" id="name" type="text" name="name" placeholder="First">
                  </td>
              </tr>
          <tr>
            <td><span class="required">*</span> IC:</td>
            <td><input class="inputbox" id="ic" type="text" name="ic">
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> Gender:</td>
            <td><p class="inputbox"><input type="radio" name="gender" value="Male">Male
                          <input type="radio" name="gender" value="Female">Female </p></td>
          </tr>
              <tr>
                <td><span class="required">*</span> E-Mail:</td>
                <td><input class="inputbox" type="email" name="email" id="email" size="40" align="right" required="">
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Telephone:</td>
                <td><input class="inputbox" type="text" name="phone" id="phone" align="right"  required="">
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span>Username:</td>
                <td><input class="inputbox" id="username" type="text" name="username" placeholder="First"></td>
              </tr>
              <tr>
                <td><span class="required">*</span>Password:</td>
                <td> <input class="inputbox" type="password" name="password" id="password" size="30" required="">
                  </td>
              </tr>
              <tr>
                <td>Status:</td>
                <td>
                    <select id="status" name="status">
                    <?php while($row = mysql_fetch_array($data_status, MYSQL_ASSOC))
                    { ?> 
                    <option value="<?php  echo $row['status_id']; ?>"><?php echo $row['status_name']; ?></option>
                    <?php } ?>
                    </select>
                </td>
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