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
        $type=$_POST['type'];
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
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/photo/transport/" . $random)) 
            {
              echo $random . " already exists. ";
            } 
            else 
            {
              move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/photo/transport/" . $random);
            }
          }
        } 
       
        $query = "INSERT INTO transport SET transport_name='$name', transport_description='$desc', status='$status', admin_id='$admin', transport_image_id='$picture', type='$type', phone='$phone'";
        mysql_query($query);
        header('Location: '. dirname(__folder__) .'/transport.php');

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
		<title>Transport</title>
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
    <form method="post" action="transport_add.php" enctype="multipart/form-data">
      <h1>Transport</h1>
      <div class="buttons">																
	  <button class="button" type="submit">Save & Close</button><a href="transport.php" class="button">Cancel</a></div>
    </div>
    <div class="content" style="margin-left:20%; margin-top:5%;">

      
        <div id="tab-general">
          <div id="languages" class="htabs">
                        <a href="#language1"><img src="./Files/flags/gb.png" title="English" /> English</a>
                      </div>
                    <div id="language1">
            <table class="form">

					 

						
              <tr>
                <td><span class="required">*</span> transport Name:</td>
                <td><input type="text" id="name" name="name" size="100"/>
                  </td>
              </tr>
              
            </table>
          </div>
          </div>
        <div id="tab-data">
          <table class="form">
            <tr>
              <td>type</td>
              <td><input type="text" name="type" id ="address"/></td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><input type="text" name="phone" id ="phone"/></td>
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