<?php
session_start();

if(empty($_SESSION['admin_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
}
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
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/photo/package/" . $random)) 
            {
              echo $random . " already exists. ";
            } 
            else 
            {
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/photo/package/" . $random);
            }
          }
        } 
        
  
        $query = "INSERT INTO `package` (package_name, package_price, package_description, status, country_id, transport_id, accomodation_id,admin_id,package_image_id,number_person) VALUES ('$name', '$price', '$desc', '$status', '$country', '$transport', '$accomodation','$admin','$picture','$no_people')";
        mysql_query($query);


        header('Location: '. dirname(__folder__) .'/Packages.php');

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
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet2.css">
        <!--JS-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
          $('#navbar').load('layout/navbar.php');
          $('#sidebar').load('layout/sidebar.php');
        });
    </script>
    <title>Add Packages</title>
  </head>
	<body>
	<div class="fluid-container">
    <div id="navbar"></div>
    <div class="row">
      <div class="col-sm-12 col-md-2" style="padding-right:0px;"> 
        <div id="sidebar"></div>
      </div>
      <div class="box col-sm-12 col-md-10 pull-right" style="padding-left:0px;">
        <div class="heading">
          <h1>Package</h1>
          <form method="post" action="PackagesAdd.php" enctype="multipart/form-data">
          <div><a href="Packages.php" class="btn btn-default">Cancel</a></div>
          <div>                                
            <button class="btn btn-default" type="submit">Save & Close</button>
          </div>
      </div>
      <table width="400" border="0" cellspacing="1" cellpadding="2">
            <tr>
                <td><span class="required">*</span> Package Name:</td>
                <td><input type="text" id="name" name="name" size="100"/>
                  </td>
            </tr>

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
                <td>
                  <textarea name="desc" id="desc" cols="40" rows="20"></textarea>
                </td>
              </tr>
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