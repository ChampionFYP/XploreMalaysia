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


$package_id = $_SESSION['user_package_id'];




$sql = "SELECT * FROM package where package_id = '$package_id '";


$data = mysql_query( $sql, $conn );
if(! $data )
{
  die('Could not get data: ' . mysql_error());
}

mysql_close($conn);


if (isset($_POST['booking_btn'])) 
{ 
   // $package_id=$_POST['booking_btn'];
   // $_SESSION['user_package_id']=$package_id;
   // var_dump($_SESSION['user_package_id']);
   header('Location: '. dirname(__folder__) .'/PackageBooking.php');
} 
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
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

    <style>
    body { 
    margin:0; 
    padding:0px; 
    font:13px "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, sans-serif;
   
    }
    /* ---- Some Resets ---- */

        p,table, caption, td, tr, th{
            margin-left:80px;
            padding:0;
            font-weight:normal;
            }

        /* ---- Paragraphs ---- */

        p {
            margin-bottom:15px;
            }
            
        /* ---- Table ---- */

        table {
            border-collapse:collapse;
            margin-bottom:15px;
            width:90%;
            border:1px solid #E3536C;
            }
            
            caption {
                text-align:center;
                font-size:30px;
                padding-bottom:10px;
                font-weight:bold;
                color:#66a9bd;
                }
            
            table td,
            table th {
                padding:5px;
                border:1px solid #E3536C;
                border-width:0 1px 1px 0;
                text-align:center;
                }
                
            thead th {
                background:#91c5d4;
                color:#ffffff;
                font-size:20px;
                }
                    
                thead th[colspan],
                thead th[rowspan] {
                    background:#E3536C;
                    }
        /*-----------font------------*/
        span{
            font-size:15px;
            text-align:left;
        }
    </style>
    </head>
  <body>
  <div id="header"></div>
  <form method="POST">
  <?php 
    while($row = mysql_fetch_array($data, MYSQL_ASSOC))
    { ?>
  <table id="travel" >
    <caption><?php  echo $row['package_name']; ?></caption>
    <thead>    
        <tr>
            <th scope="col" colspan="6">Schedule</th>
        </tr>
         <td><span>
                <p><?php echo $row['description']; ?></p>
                <p><img src="img/" style="float:right; margin-left:10px;" height="300px" width="450px" ></p>
            </span>
        </td>
        <tr>
            <td colspan="2"> <button name="booking_btn"  value="<?php  echo $row['package_id']; ?>" style="color:#ffffff; background-color:#E3536C; border:0px; height:40px;">Book Now </button></td>
         </tr>


    </thead>
  </table>
  </form>
<div id="footer"></div>
<?php } ?>
</body>
</html>