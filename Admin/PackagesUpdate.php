<?php
session_start();

if(empty($_SESSION['admin_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
}
$dbhost = 'localhost';
$dbuser = 'xplorema';
$dbpass = 'FYPchamp1!';


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');
// mysql_select_db('FYP');
    $country1=" SELECT * FROM country";
    $data_country = mysql_query($country1);
    $transport1=" SELECT * FROM transport";
    $data_transport = mysql_query($transport1);
    $accomodation1=" SELECT * FROM accomodation";
    $data_accomodation = mysql_query($accomodation1);
    $random = rand ( 0 , 9999 );
    $package_id=$_SESSION['package_id'];
    $status1=" SELECT * FROM status";
    $data_status = mysql_query($status1);
    $image_id='';

    $find_image_id = "SELECT * FROM package WHERE package_id= '$package_id' ";
    $find_data = mysql_query( $find_image_id, $conn );
        while($row_data = mysql_fetch_array($find_data, MYSQL_ASSOC))
    {
        if(empty($row_data['package_image_id']))
        {
          $image_id=$random;
        }
        else
        {
          $image_id=$row_data['package_image_id'];
        }
    }


if(isset($_POST['name'])||isset($_POST['file']))
{

$name = $_POST['name'];
$price = $_POST['price'];
$desc=$_POST['desc'];
$country= $_POST['country'];
$transport = $_POST['transport'];
$accomodation = $_POST['accomodation'];
$admin=$_SESSION['admin_id'];
$no_people=$_POST['no_people'];
$status=$_POST['status'];
$picture=$image_id;

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
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/photo/package/" . $picture);
          }
        } 
$sql = "UPDATE package SET package_name='$name', package_price='$price', package_description='$desc', status='$status', country_id='$country', transport_id='$transport', accomodation_id='$accomodation', admin_id='$admin', package_image_id='$picture',number_person='$no_people' WHERE package_id='$package_id'" ;
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
if(isset($_SESSION['package_id']))
{
  unset($_SESSION['package_id']);
  header('Location: '. dirname(__folder__) .'/Packages.php');
}
}

$sql2 = "SELECT * FROM package WHERE package_id= '$package_id' ";
$data = mysql_query( $sql2, $conn );
$sql3 = "SELECT * FROM package WHERE package_id= '$package_id' ";
$data_old = mysql_query( $sql3, $conn );


// $data = mysql_query( $sql2, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

$testing3=mysql_fetch_array($data_old, MYSQL_ASSOC);
$old_data="SELECT * FROM package INNER JOIN country ON package.country_id=country.country_id INNER JOIN accomodation ON package.accomodation_id=accomodation.accomodation_id INNER JOIN transport ON package.transport_id=transport.transport_id INNER JOIN status ON package.status=status.status_id WHERE package_id= '$package_id'";
$testing=mysql_query($old_data);
$testing2=mysql_query($old_data);
$testing3=mysql_query($old_data);
$testing4=mysql_query($old_data);

//var_dump($desc);

mysql_close($conn);
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
  <title>Packages</title>
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
          <h1>Update Package</h1>
        <form method="post" action="PackagesUpdate.php" enctype="multipart/form-data"> 
          <div><a href="Packages.php" class="btn btn-default">Cancel</a></div>
          <div>                                
            <input name="update" type="submit" class="btn btn-default" id="update" value="Update">
          </div>
        </div>

<form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" onsubmit="return postForm()">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<?php 
	while($row = mysql_fetch_array($data, MYSQL_ASSOC))
	{ ?>
              <tr>
                <td><span class="required">*</span> Package Name:</td>
                <td><input type="text" id="name" name="name" size="100" value="<?php  echo $row['package_name']; ?>"/>
                </td>
              </tr>

              <tr>
              <td>Price:</td>
              <td><input type="text" name="price" id ="price" value="<?php  echo $row['package_price']; ?>"/></td>
            </tr>
            <tr>
              <td>Number of People:</td>
              <td><input type="text" name="no_people" id ="no_people" value="<?php  echo $row['number_person']; ?>"/></td>
            </tr>
			       <tr>
                <td>Description:</td>
                <td>
                  <textarea name="desc" id="desc" cols="40" rows="20">
                    <?php echo $row['package_description']; ?>
                  </textarea>
                </td>
-              </tr>
            </tr>
            <tr>
              <td>Image:</td>
              <td>
              <input type="file" name="file" id="file" value="<?php  echo $row['image_id']; ?>"><br>
              </td>
            </tr>
            <tr>
              <td>Country:</td>
              <td><select style="width: 90px;" id="country" name="country" value="<?php  echo $row['country_id']; ?>">

              <?php while($row_old1 = mysql_fetch_array($testing, MYSQL_ASSOC))
              { ?> 
  						<option value="<?php  echo $row_old1['country_id']; ?>"><?php echo $row_old1['country_name']; ?></option>
              <?php } ?>
              <?php while($row1 = mysql_fetch_array($data_country, MYSQL_ASSOC))
              { ?> 
  						<option value="<?php  echo $row1['country_id']; ?>"><?php echo $row1['country_name']; ?></option>
              <?php } ?>									
              </select></td>
            </tr>

            <tr>
              <td>Transport:</td>
              <td><select style="width: 90px;" id="transport" name="transport" value="<?php  echo $row['transport_id']; ?>">

               <?php while($row_old2 = mysql_fetch_array($testing2, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row_old2['transport_id']; ?>"><?php echo $row_old2['transport_name']; ?></option>
              <?php } ?>
              <?php while($row2 = mysql_fetch_array($data_transport, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row2['transport_id']; ?>"><?php echo $row2['transport_name']; ?></option>
              <?php } ?>                  
              </select></td>
            </tr>

            <tr>
              <td>Accomodation:</td>
              <td><select style="width: 90px;" id="accomodation" name="accomodation" value="<?php  echo $row['accomodation_id']; ?>">
              <?php while($row_old3 = mysql_fetch_array($testing3, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row_old3['accomodation_id']; ?>"><?php echo $row_old3['accomodation_name']; ?></option>
              <?php } ?>
              <?php while($row3 = mysql_fetch_array($data_accomodation, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row3['accomodation_id']; ?>"><?php echo $row3['accomodation_name']; ?></option>
              <?php } ?>                  
              </select></td>
            </tr>

            <tr>
              <td>status:</td>
              <td><select style="width: 90px;" id="status" name="status">

              <?php while($row_old4 = mysql_fetch_array($testing4, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row_old4['status_id']; ?>"><?php echo $row_old4['status_name']; ?></option>
              <?php } ?>

              <?php while($row = mysql_fetch_array($data_status, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row['status_id']; ?>"><?php echo $row['status_name']; ?></option>
              <?php } ?>                  
              </select></td>
            </tr>     
<td>
</td>
</tr>
<?php } ?>
</table>
</form>
</body>
</html>