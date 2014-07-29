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
                    <a href="#" class="navbar-logo">
                    	<img src = "images/logo.png" width="40px" height="40px" alt="Xplore Malaysia">
                        <small>
                            Xplore Malaysia
                        </small>
                    </a>
                </div> 

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="grey">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-tasks"></i>
                                <span class="badge badge-grey">1</span>
                            </a>
                        </li>

                        <li class="purple">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                                <span class="badge badge-important">1</span>
                            </a>
                        </li>

                        <li class="green">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                                <span class="badge badge-success">1</span>
                            </a>
                        </li>

                    
               
                        <li class="light-blue">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="user-info">
                                    <small>Welcome, User</small>
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
