<?php
$message = "Login Failed";
/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset($_SESSION['customer_id'] ))
{
    // header('Location: '. dirname(__folder__) .'/dashboard.php');
    session_destroy();

}

if(!isset( $_POST['email'], $_POST['password']))
{
    $message = '';
}
/*** check the username is the correct length ***/
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 3)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
// ** check the password has only alpha numeric characters **
elseif (ctype_alnum($_POST['password']) != true)
{
//         ** if there is no match **
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $phpro_username = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $phpro_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $phpro_password = $phpro_password;
    
    /*** connect to database ***/
    /*** mysql hostname ***/
   
    // $mysql_hostname = 'localhost';
    // $mysql_username = 'xplorema';
    // $mysql_password = 'FYPchamp1!';
    // $mysql_dbname = 'xplorema_FYP';

    $mysql_hostname = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_dbname = 'FYP';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT customer_id, customer_email, customer_password FROM customer 
                    WHERE customer_email = :customer_email AND customer_password = :customer_password");

        /*** bind the parameters ***/
        $stmt->bindParam(':customer_email', $phpro_username, PDO::PARAM_STR);
        $stmt->bindParam(':customer_password', $phpro_password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $customer_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($customer_id == false)
        {
                $message = 'Login Failed';
                // header('Location: '. dirname(__folder__) .'/error_login.php');
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['customer_id'] = $customer_id;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';

                header('Location: '. dirname(__folder__) .'/UserPanel.php');

        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. </br><b>Please try again later!</b>';
    }
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css" />
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
		<body>
        <div id="modal" class="popupContainer">
            <header class="popupHeader">
              <span class="header_title">Login</span>
              <span class="modal_close"><i class="fa fa-times"></i></span>
            </header>
            <section class="popupBody">
            <form style="margin-bottom: 0px !important;" class="form-horizontal" method="post" action="error_login.php">
            <div class="user_login">
            <label>Email</label>
            <input type="text" placeholder="Email" id="email" name="email"/>
            <br />

            <label>Password</label>
            <input type="password" placeholder="Password" id="password" name="password"/>
            <br />

            <div class="checkbox">
            <input id="remember" type="checkbox" />
            <label for="remember">Remember me on this computer</label>
            </div>

            <?php if(!empty($message)) {?>
             <label style="color:red;">Error: <?php echo $message; ?></label>
             <?php }
             else { ?>
             <label style="color:red;">Error: Login Failed</label>
             <?php } ?>

            <div class="action_btns">            
            <div class="one_half last"><button class="btn btn_red" data-dismiss="modal" type="submit">Login</button></div>
            </div>
    </body>
<div id ="footer"></div>
</div>
</body>
</html>