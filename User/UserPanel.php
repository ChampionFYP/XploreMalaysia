<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/UserPanel.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>
	</head>

  <body>
    <div id="header"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="xm-side">
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">Personal Info</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                          <li class="current"><a href="UserPanel.php">My Account</a></li>
                      </ul>
                  </div>
            </div>  
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">My Booking</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                      <li><a href="SuccessfulBooking.html">Successful Bookings</a></li>
                      <li><a href="#">Canceled Bookings</a></li>
                      </ul>
                  </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <p class="info">
            <span class="left">My Account </span>
          </p>
          <div class="detail">
          <div class="user_info clearfix">
            <table class="mess">
              <tbody>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">User ID: </span>&nbsp; </td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td class="rel_t"><span class="en-userinfo-field">Name: </span>&nbsp;</td>
                  <td>(Not set)</td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td class="rel_t"><span class="en-userinfo-field">Username:</span>&nbsp;</td>
                  <td>(Not set)</td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">Password: </span>&nbsp;</td>
                  <td>(Not set)</td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">Mail: </span>&nbsp;</td>
                  <td>(Not set)</td>
                </tr>
                <tr>
                  <td class="td_l"></td>
                  <td><span class="en-userinfo-field">Phone: </span>&nbsp;</td>
                  <td>(Not set)</td>
                </tr>
               </tbody>
            </table>
              <a class="btn btn-warning" href="UserEdit.php">Edit</a>
              </br>
              <a class="btn btn-danger" href="">Deactivate</a>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>
