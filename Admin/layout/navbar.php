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
    $admin_id=$_SESSION['admin_id'];
    $admin =" SELECT * FROM admin WHERE admin_id='$admin_id'";
    $data_admin = mysql_query($admin);



?>



















<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	</head>
	<body>
		<div class="navbar navbar-default">
			<div class="navbar-container" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="Packages.php" class="navbar-logo">
                    	<img src = "images/logo.png" width="40px" height="40px" alt="Xplore Malaysia">
                        <small>
                            Xplore Malaysia
                        </small>
                    </a>
                </div> 

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="user-info">
                                <?php while($row = mysql_fetch_assoc($data_admin))
                                    { ?>
                                    <small>Welcome, <?php  echo $row['admin_username']; ?></small>
                                <?php } ?>
                                </span>
                                 </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3" style="min-width:90px;">
                                <li>
                                    <a href="logout.php" style="padding-left:5px;">
                                        <i class="fa fa-sign-out"></i>
                                        <span data-i18n="Log Out">Log Out</span>
                                    </a>
                                </li>
                                </ul>
                        </li>
                    </ul>
                </div>
            </div> <!--Navbar Container-->
		</div> <!--Navbar-->
	</body>
</html>
