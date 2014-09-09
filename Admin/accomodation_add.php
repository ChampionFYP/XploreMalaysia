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
    $status1=" SELECT * FROM status";
    $data_status = mysql_query($status1);
    $random = rand ( 0 , 9999 );

// If the values are posted, insert them into the database.
    if (isset($_POST['name'])||isset($_POST['file'])){
        $name = $_POST['name'];
        $desc=$_POST['desc'];
        $admin=$_SESSION['admin_id'];
        $status=$_POST['status'];
        $category=$_POST['category'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
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
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/photo/accomodation" . $random)) 
            {
              echo $random . " already exists. ";
            } 
            else 
            {
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/photo/accomodation/" . $random);
            }
          }
        } 
       
        $query = "INSERT INTO accomodation SET accomodation_name='$name', accomodation_description='$desc', status='$status', admin_id='$admin', accomodation_image_id='$picture', category='$category', accomodation_address='$address', accomodation_phone='$phone'";
        mysql_query($query);
        header('Location: '. dirname(__folder__) .'/accommodation.php');

    }
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
    <title>Add Accomodation</title>
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
          <h1>Accomodation</h1>
          <form method="post" action="accomodation_add.php">
          <div><a href="accommodation.php" class="btn btn-default">Cancel</a></div>
          <div>                                
            <button class="btn btn-default" type="submit">Save & Close</button>
          </div>
      </div>
      <table width="400" border="0" cellspacing="1" cellpadding="2">
            <tr>
                <td><span class="required">*</span> Accommodation Name:</td>
                <td><input type="text" id="name" name="name" size="100"/>
                  </td>
            </tr>
           <tr>
              <td>Category:</td>
              <td><input type="text" name="category" id ="category"/></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input type="text" name="address" id ="address"/></td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><input type="text" name="phone" id ="phone"/></td>
            </tr>            
              <tr>
                <td>Description:</td>
                <td><textarea name="desc" id="desc" cols="40" rows="20"></textarea></td>
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