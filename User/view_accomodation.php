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


$accomodation_id = $_SESSION['user_accomodation_id'];




$sql = "SELECT * FROM accomodation where accomodation_id = '$accomodation_id'";


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
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
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
  <table id="travel" >
    <caption><?php  echo $row['accomodation_name']; ?></caption>
    <thead>    
        <tr>
            <th scope="col" colspan="6">Schedule</th>
        </tr>
         <td><span>
                <p><?php echo $row['description']; ?></p>
                <p><img src="http://admin.xploremalaysia.asia/photo/accomodation/<?php echo $row1['accomodation_image_id'];?>" height="167px" width="250px" alt=""></p>
            </span>
        </td>
    </thead>
  </table>
  </form>
<div id="footer"></div>
<?php } ?>
</body>
</html>