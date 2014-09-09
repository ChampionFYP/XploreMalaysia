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
    $status1=" SELECT * FROM status";
    $data_status = mysql_query($status1);
    $random = rand ( 0 , 9999 );
    $image_id='';
    $transport_id=$_SESSION['transport_id'];
    $find_image_id = "SELECT * FROM transport WHERE transport_id= '$transport_id' ";
    $find_data = mysql_query( $find_image_id);
        while($row_data = mysql_fetch_array($find_data, MYSQL_ASSOC))
    {
        if(empty($row_data['transport_image_id']))
        {
          $image_id=$random;
        }
        else
        {
          $image_id=$row_data['transport_image_id'];
        }
    }

// If the values are posted, insert them into the database.
    if (isset($_POST['name'])||isset($_POST['file'])){
        $name = $_POST['name'];
        $desc=$_POST['desc'];
        $admin=$_SESSION['admin_id'];
        $status=$_POST['status'];
        $type=$_POST['type'];
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
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/photo/transport/" . $picture);
          }
        } 
       
        $query = "UPDATE transport SET transport_name='$name', transport_description='$desc', status='$status', admin_id='$admin', transport_image_id='$picture', type='$type', phone='$phone' WHERE transport_id='$transport_id'";
        mysql_query($query);
        header('Location: '. dirname(__folder__) .'/transport.php');
    }
    $sql2 = "SELECT * FROM transport INNER JOIN admin ON transport.admin_id=admin.admin_id INNER JOIN status ON transport.status=status.status_id WHERE transport_id= '$transport_id'";
    $data = mysql_query($sql2);
    $old_status = mysql_query($sql2);
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
  <title>Update Transportation</title>
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
          <h1>Transportation</h1>
        <form method="post" action="transport_update.php"> 
          <div><a href="transport.php" class="btn btn-default">Cancel</a></div>
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
                <td><span class="required">*</span> Transportation Name:</td>
                <td><input type="text" id="name" name="name" size="100" value="<?php  echo $row['transport_name']; ?>"/>
                </td>
              </tr>

              <tr>
              <td>Type:</td>
              <td><input type="text" name="type" id ="type" value="<?php  echo $row['type']; ?>"/></td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><input type="text" name="phone" id ="phone" value="<?php  echo $row['phone']; ?>"/></td>
            </tr>
			     <tr>
                <td>Description:</td>
              <td>
                <textarea name="desc" id="desc" cols="40" rows="20">
                  <?php  echo $row['transport_description']; ?>
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