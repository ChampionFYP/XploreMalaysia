<?php
session_start();
$connection = mysql_connect('localhost', 'xplorema_user', 'FYPchamp1!');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
// $select_db = mysql_select_db('xplorema_FYP');
$select_db = mysql_select_db('xplorema_FYP');

if (!$select_db){

    die("Database Selection Failed" . mysql_error());

}
$customer_id=$_SESSION['customer_id'];
$customer_email='';
$customer=" SELECT * FROM customer WHERE customer_id = '$customer_id'";
$data_customer = mysql_query($customer);
 while($row = mysql_fetch_array($data_customer, MYSQL_ASSOC))
    {
        $customer_email=$row['customer_email'];
    }

/* Set e-mail recipient */
$myemail  = $customer_email;
/*var_dump($myemail);
/* If e-mail is not valid show error message */
if(!empty($email))
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */

/* Let's prepare the message for the e-mail */
$message = "Hello!

Here is your order number:".$_SESSION['user_booking_id']."

Please Email to xplorema@xploremalaysia.asia with screenshot/photo when you using online banking/ATM


We will sent you a receipt once we confirm your payment.


Thank you
";

/* Send the message using mail() function */
mail($myemail, "Order Number", $message);

/* Redirect visitor to the thank you page */
// header('Location: thanks.htm');
// exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>
        <div class="alert alert-danger" role="alert">
            <b>Please correct the following error:</b><br />
            <?php echo $myError; ?>
        </div>
    </body>
    </html>
<?php
exit();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="4;url=http://xploremalaysia.asia/package.php">
        <link href="css/style.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </head>

    <body>
        <div class="container-fluid">
            <div class="alert alert-success alert-dismissible" role="alert" style="text-align:center;">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Thank You!</strong> Your booking has been successfully placed!
                <br>You will be redirected back in shortly
            </div>
        </div>
    </body>
</html>