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


$transport_id = $_SESSION['user_transport_id'];




$sql = "SELECT * FROM transport where transport_id = '$transport_id'";


$data = mysql_query( $sql, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

mysql_close($conn);
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link href="css/ViewPackage.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>
    </head>
  <body>
  <div id="header"></div>
  <form method="POST">
  <?php 
    while($row = mysql_fetch_array($data, MYSQL_ASSOC))
    { ?>
  <h2 style="color:#66a9bd;text-align:left; margin-left:80px; font-size:40px;"><b><?php  echo $row['transport_name']; ?></b></h2>
  <table id="travel">
    <thead>    
        <tr>
            <th scope="col" colspan="6">Details</th>
        </tr>
        <td style="border-right:0;">
          <div>
                <p style="font-size:14px;text-align:justify;margin:0px 80px;font-family:verdana;"><?php echo $row['description']; ?></p>
          </div>
        </td>
        <td style="border-left:0;">
          <img src="http://admin.xploremalaysia.asia/photo/transport/<?php echo $row['transport_image_id'];?>"  style="float:right; margin-left:10px;" height="300px" width="450px" >
        </td>
        <tr>
          <td colspan="2">
            <a class="btn btn-info pull-left" href="http://xploremalaysia.asia/transport.php">Back</a>
          </td>
    </thead>
  </table>
  </form>
<div id="footer"></div>
<?php } ?>
</body>
</html>