<?php
session_start();
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

if(isset($_POST['name'])||isset($_POST['file']))
{

$name = $_POST['name'];
$price = $_POST['price'];
$desc=$_POST['desc'];
$country= $_POST['country'];
$transport = $_POST['transport'];
$accomodation = $_POST['accomodation'];
$admin=$_SESSION['admin_id'];
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
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/img/" . $random)) 
            {
              echo $random . " already exists. ";
            } 
            else 
            {
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/img/" . $random);
            }
          }
        } 
        else 
        {
          echo "Invalid file";
        }


$sql = "UPDATE package SET package_name='$name', package_price='$price', description='$desc', status='$status', country_id='$country', transport_id='$transport', accomodation_id='$accomodation', admin_id='$admin', image_id='$picture' WHERE package_id='$package_id'" ;
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";
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
$old_country="SELECT package.country_id, country.country_name FROM package INNER JOIN country ON package.country_id=country.country_id WHERE package_id= '$package_id'";
$testing=mysql_query($old_country);
// $testing1=mysql_fetch_array($testing, MYSQL_ASSOC);







mysql_close($conn);
?>







<!DOCTYPE HTML>

<html>
<head>
<title>Update a Record in MySQL Database</title>
</head>
<body>
<form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
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
                <td>Description:</td>
                <td><textarea name="desc" id="desc"><?php  echo $row['description']; ?></textarea></td>
            </tr>
            <tr>
              <td>Image:</td>
              <td>
              <input type="file" name="file" id="file"><br>
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

              <?php while($row2 = mysql_fetch_array($data_transport, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row2['transport_id']; ?>"><?php echo $row2['transport_name']; ?></option>
              <?php } ?>                  
              </select></td>
            </tr>

            <tr>
              <td>Accomodation:</td>
              <td><select style="width: 90px;" id="accomodation" name="accomodation" value="<?php  echo $row['accomodation_id']; ?>">

              <?php while($row3 = mysql_fetch_array($data_accomodation, MYSQL_ASSOC))
              { ?> 
              <option value="<?php  echo $row3['accomodation_id']; ?>"><?php echo $row3['accomodation_name']; ?></option>
              <?php } ?>                  
              </select></td>
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

              

            
<td>
<input name="update" type="submit" id="update" value="Update">
</td>
</tr>
<?php } ?>
</table>
</form>

</body>
</html>