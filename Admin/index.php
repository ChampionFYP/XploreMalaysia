<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['admin_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['username'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 3)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 3)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['username']) != true)
{
//     ** if there is no match **
    $message = "Username must be alpha numeric";
}
// ** check the password has only alpha numeric characters **
elseif (ctype_alnum($_POST['password']) != true)
{
//         ** if there is no match **
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $phpro_username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $phpro_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $phpro_password = $phpro_password;
    
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = '';

    /*** database name ***/
    $mysql_dbname = 'FYP';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT admin_id, admin_username, admin_password FROM admin 
                    WHERE admin_username = :admin_username AND admin_password = :admin_password");

        /*** bind the parameters ***/
        $stmt->bindParam(':admin_username', $phpro_username, PDO::PARAM_STR);
        $stmt->bindParam(':admin_password', $phpro_password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $admin_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($admin_id == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['admin_id'] = $admin_id;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';

                header('Location: '. dirname(__folder__) .'/dashboard.php');

        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>



<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fa/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">

        <title>Login</title>
	</head>

	<body style="background-color:#1D2024;">
        <div id="cl-wrapper" class="login-container">
            <div class="middle-login">
                <div class="block-flat">
                    <div class="header">                            
                        <h3 class="text-center"><img class="logo-img" src="images/logo.png" height="42" width="42" alt="logo"/>Xplore Malaysia</h3>
                    </div>
                    <div>
                        <form style="margin-bottom: 0px !important;" class="form-horizontal" method="post" action="index.php">
                            <div class="content">
                                <h4 class="title">Login Access</h4>

                                    <?php if(!empty($message)) {?>
                                    <p style="color:red;"><?php echo $message; ?></p>
                                    <?php } ?>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" placeholder="Username" id="username" name="username" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="foot">
                                <button class="btn btn-warning" data-dismiss="modal" type="button">Forget Password</button>
                                <button class="btn btn-primary" data-dismiss="modal" type="submit">Log me in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>
