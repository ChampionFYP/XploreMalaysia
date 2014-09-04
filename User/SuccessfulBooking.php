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
    <div class="container">
      <div id="header"></div>
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="xm-side">
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">Personal Info</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                          <li><a href="#">My Account</a></li>
                      </ul>
                  </div>
            </div>  
            <div class="xm-box">
                  <div class="hd">
                      <h3 class="title">My Booking</h3>
                  </div>
                  <div class="bd">
                      <ul class="uc-list">
                      <li class="current"><a href="#">Successful Bookings</a></li>
                      <li><a href="#">Canceled Bookings</a></li>
                      </ul>
                  </div>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-8">
          <p class="info">
            <span class="left">Successful Booking</span>
          </p>
          <!--Booking Details-->
          <table class="booking_bigtable">
            <thead>
              <tr>
                <th colspan="3">
                  <span class="fl booking-num">Booking number :</span>
                  <span class="fr datetime">Booking placed on：</span>
                </th>
              </tr>
            </thead>
            <tbody>
             <tr>
              <td class="btd1 notd">
                <table class="booking_smtable">
                  <tbody>
                    <tr>
                      <td class="std1">                     
                        <div class="divorder">
                          <a class="mimg" target="_blank" href="#">
                            <img src="#" title="Package Picture">
                          </a>
                        </div>
                      </td>
                      <td class="booking_status">
                          <span>Booked</span>
                      </td>
                      <td class="std3"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="price">
                  <span>RM xxx.00</span>
                  <p></p>
                  </td>
              <td class="details">
                <a href="#" class="agray">Booking details</a>
              </td>
             </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="footer"></div>
  </body>
</html>