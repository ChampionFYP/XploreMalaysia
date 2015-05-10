<?php
session_start();

if(empty($_SESSION['admin_id']))
{
    header('Location: '. dirname(__folder__) .'/index.php');
}

$dbhost = 'localhost';
$dbuser = 'xplorema_user';
$dbpass = 'FYPchamp1!';


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


mysql_select_db('xplorema_FYP');
// mysql_select_db('FYP');


if(isset($_POST['name']))
{

$name = $_POST['name'];
$ic = $_POST['ic'];

$sql = "UPDATE customer SET customer_username='$name', customer_ic='$ic' WHERE customer_id='37'" ;
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";
}

$sql = "SELECT * FROM customer WHERE customer_id= '37' ";


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
<title>Update a Record in MySQL Database</title>
</head>
<body>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<?php 
	while($row = mysql_fetch_array($data, MYSQL_ASSOC))
	{ ?>
<tr>
<td width="100">name</td>
<td><input name="name" type="text" id="name" value="<?php  echo $row['customer_username']; ?>"></td>
</tr>
<tr>
<td width="100">ic</td>
<td><input name="ic" type="text" id="ic" value="<?php  echo $row['customer_ic']; ?>"></td>
</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="update" type="submit" id="update" value="Update">
</td>
</tr>
<?php } ?>
</table>
</form>

</body>
</html>