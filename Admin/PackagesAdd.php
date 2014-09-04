<?php
session_start();
$connection = mysql_connect('localhost', 'xplorema', 'FYPchamp1!');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
$select_db = mysql_select_db('xplorema_FYP');

if (!$select_db){

    die("Database Selection Failed" . mysql_error());

}

    $country1=" SELECT * FROM country";
    $data_country = mysql_query($country1);
    $transport1=" SELECT * FROM transport";
    $data_transport = mysql_query($transport1);
    $accomodation1=" SELECT * FROM accomodation";
    $data_accomodation = mysql_query($accomodation1);
    $status1=" SELECT * FROM status";
    $data_status = mysql_query($status1);
    $random = rand ( 0 , 9999 );

// If the values are posted, insert them into the database.
    if (isset($_POST['name'])||isset($_POST['file'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc=$_POST['desc'];
        $country= $_POST['country'];
        $transport = $_POST['transport'];
        $accomodation = $_POST['accomodation'];
        $admin=$_SESSION['admin_id'];
        $no_people=$_POST['no_people'];
        $status=$_POST['status'];
        $picture=$random;

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
          if ($_FILES["file"]["error"] > 0) 
          {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
          } 
          else 
          {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/photo/" . $random)) 
            {
              echo $random . " already exists. ";
            } 
            else 
            {
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/photo/" . $random);
            }
          }
        } 
        else 
        {
          echo "Invalid file";
        }












  
        $query = "INSERT INTO `package` (package_name, package_price, description, status, country_id, transport_id, accomodation_id,admin_id,image_id,number_people) VALUES ('$name', '$price', '$desc', '$status', '$country', '$transport', '$accomodation','$admin','$picture','$no_people')";
        mysql_query($query);


        // $data_username= "SELECT * FROM customer WHERE customer_username='$username'";
        // $data_u = mysql_query($data_username);
        // $values = mysql_fetch_array($data_u);
        // $data_email= "SELECT * FROM customer WHERE customer_email='$email'";
        // $data_e = mysql_query($data_email);
        // $values2 = mysql_fetch_array($data_e);
        // $data_ic= "SELECT * FROM customer WHERE customer_ic='$ic'";
        // $data_i = mysql_query($data_ic);
        // $values3 = mysql_fetch_array($data_i);

        

        // var_dump($values);
        // var_dump($values2);
        // var_dump($values3);

        // if(empty($values) && empty($values2) && empty($values3)){

        //     $query = "INSERT INTO `customer` (customer_username, customer_password, gender, csutomer_name, customer_ic, customer_email, customer_phone, customer_address) VALUES ('$username', '$password', '$gender', '$username', '$ic', '$email', '$phone', '$address, $city, $state, $code')";
        //     mysql_query($query);
        // }
        // if(!empty($values))
        // {
        //     $msg1=" Username Used";
        // }
        // if(!empty($values2))
        // {
        //     $msg2=" Email Used";
        // }
        // if(!empty($values3))
        // {
        //     $msg3=" IC Used";
        // }

    }
    
    // var_dump($query);


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
        <link rel="stylesheet" type="text/css" href="./css/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="./css/stylesheet2.css">
        <!--JS-->
      	<script type="text/javascript" src="js/jquery.js"></script>
      	<script type="text/javascript" src="js/bootstrap.js"></script>
		
		<script type="text/javascript">
				$(document).ready(function(){
					$('#navbar').load('layout/navbar.php');
					$('#sidebar').load('layout/sidebar.php');
				});
		</script>
		<title>Packages</title>
	</head>
	<body>
	<div class="fluid-container">
		<div id="navbar"></div>
		<div class="row">
			<div class="col-sm-12 col-md-2"> 
				<div id="sidebar"></div>
			</div>
			<div id="content" style="margin-left:16%;">
      <div class="box">
    <div class="heading">
    <form method="post" action="PackagesAdd.php" enctype="multipart/form-data">
      <h1>Packages</h1>
      <div class="buttons">																
	  <button class="button" type="submit">Save & Close</button><a href="Packages.php" class="button">Cancel</a></div>
    </div>
    <div class="content" style="margin-left:20%; margin-top:5%;">

      
        <div id="tab-general">
          <div id="languages" class="htabs">
                        <a href="#language1"><img src="./Files/flags/gb.png" title="English" /> English</a>
                      </div>
                    <div id="language1">
            <table class="form">

					 

						
              <tr>
                <td><span class="required">*</span> Package Name:</td>
                <td><input type="text" id="name" name="name" size="100"/>
                  </td>
              </tr>
              
            </table>
          </div>
                  </div>
        <div id="tab-data">
          <table class="form">
            <tr>
              <td>Country:</td>
              <td><select style="width: 90px;" id="country" name="country">

              <?php while($row = mysql_fetch_array($data_country, MYSQL_ASSOC))
              { ?> 
  						<option value="<?php  echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
              <?php } ?>									
              </select></td>
            </tr>

            <tr>
              <td>Transport:</td>
              <td><select style="width: 90px;" id="transport" name="transport">

              <?php while($row = mysql_fetch_array($data_transport, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row['transport_id']; ?>"><?php echo $row['transport_name']; ?></option>
              <?php } ?>                  
              </select></td>
            </tr>

            <tr>
              <td>Accomodation:</td>
              <td><select style="width: 90px;" id="accomodation" name="accomodation">

              <?php while($row = mysql_fetch_array($data_accomodation, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row['accomodation_id']; ?>"><?php echo $row['accomodation_name']; ?></option>
              <?php } ?>                  
              </select></td>
            </tr>

              

            <tr>
              <td>Price:</td>
              <td><input type="text" name="price" id ="price"/></td>
            </tr>

            <tr>
              <td>Number of People:</td>
              <td><input type="text" name="no_people" id ="no_people"/></td>
            </tr>

			        <tr>
                <td>Description:</td>
                <td><textarea name="desc" id="desc"></textarea></td>
              </tr>
            <tr>
              <td>Image:</td>
              <td>
              <input type="file" name="file" id="file"><br>
              </td>
            </tr>

            <tr>
              <td>status:</td>
              <td><select style="width: 90px;" id="status" name="status">

              <?php while($row = mysql_fetch_array($data_status, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row['status_id']; ?>"><?php echo $row['status_name']; ?></option>
              <?php } ?>                  
              </select></td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>	
		</div> <!--row-->
		</div> <!--fluid-container-->
	</body>
</html>