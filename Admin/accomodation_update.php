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
   	$random = rand ( 0 , 9999 );
    $accomodation_id=$_SESSION['accomodation_id'];;
    $status=" SELECT * FROM status";
    $data_status = mysql_query($status);
    $image_id='';

    $find_image_id = "SELECT * FROM accomodation WHERE accomodation_id= '$accomodation_id' ";
    $find_data = mysql_query( $find_image_id, $conn );
        while($row_data = mysql_fetch_array($find_data, MYSQL_ASSOC))
    {
        if(empty($row_data['accomodation_image_id']))
        {
          $image_id=$random;
        }
        else
        {
          $image_id=$row_data['accomodation_image_id'];
        }
    }


if(isset($_POST['name'])||isset($_POST['file']))
{

$name = $_POST['name'];
$desc=$_POST['desc'];
$admin=$_SESSION['admin_id'];
$status=$_POST['status'];
$category=$_POST['category'];
$address=$_POST['address'];
$phone=$_POST['phone'];
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
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/photo/accomodation/" . $picture);
          }
        } 
        
$sql = "UPDATE accomodation SET accomodation_name='$name', description='$desc', status='$status', admin_id='$admin', accomodation_image_id='$picture', category='$category', accomodation_address='$address', accomodation_phone='$phone' WHERE accomodation_id='$accomodation_id'" ;
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
if(isset($_SESSION['accomodation_id']))
{
  unset($_SESSION['accomodation_id']);
  header('Location: '. dirname(__folder__) .'/accommodation.php');
}
}

$sql2 = "SELECT * FROM accomodation INNER JOIN admin ON accomodation.admin_id=admin.admin_id INNER JOIN status ON accomodation.status=status.status_id WHERE accomodation_id= '$accomodation_id'";
$data = mysql_query( $sql2, $conn );
$old_status= mysql_query( $sql2, $conn );

// $data = mysql_query( $sql2, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

// $testing3=mysql_fetch_array($data_old, MYSQL_ASSOC);
// $old_data="SELECT * FROM accomodation INNER JOIN admin ON accomodation.admin_id=admin.admin_id INNER JOIN status ON accomodation.status=status.status_id WHERE accomodation_id= '$accomodation_id'";
// $testing=mysql_query($old_data);

// $testing1=mysql_fetch_array($testing, MYSQL_ASSOC);
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
        <link rel="stylesheet" type="text/css" href="css/summernote.css">
        <!--JS-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/summernote.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
          $('#navbar').load('layout/navbar.php');
          $('#sidebar').load('layout/sidebar.php');
          $('#summernote').summernote();
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
          <h1>Packages</h1>
        <form method="post" action="PackagesAdd.php"> 
          <div><a href="Packages.php" class="btn btn-default">Cancel</a></div>
          <div>                                
            <input name="update" type="submit" class="btn btn-default" id="update" value="Update">
          </div>
        </div>
        
<form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<?php 
	while($row = mysql_fetch_array($data, MYSQL_ASSOC))
	{ ?>
<tr>
                <td><span class="required">*</span> accomodation Name:</td>
                <td><input type="text" id="name" name="name" size="100" value="<?php  echo $row['accomodation_name']; ?>"/>
                </td>
              </tr>

              <tr>
              <td>Category:</td>
              <td><input type="text" name="category" id ="category" value="<?php  echo $row['category']; ?>"/></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input type="text" name="address" id ="address" value="<?php  echo $row['accomodation_address']; ?>"/></td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><input type="text" name="phone" id ="phone" value="<?php  echo $row['accomodation_phone']; ?>"/></td>
            </tr>
			     <tr>
                <td>Description:</td>
                <td>
                  <textarea name="summernote" id="summernote" cols="30" rows="10">
                    <?php  echo $row['description']; ?>
                  </textarea>
                </td>
            </tr>
            <tr>
              <td>Image:</td>
              <td>
              <input type="file" name="file" id="file" value="<?php  echo $row['image_id']; ?>"><br>
              </td>
            </tr>

            <tr>
              <td>Status:</td>
              <td><select style="width: 90px;" id="status" name="status">

              <?php while($row_old4 = mysql_fetch_array($old_status, MYSQL_ASSOC))
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
<input name="update" type="submit" id="update" value="Update">
</td>
</tr>
<?php } ?>
</table>
</form>

</body>
</html>