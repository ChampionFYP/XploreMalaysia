<?php
session_start();

if(empty($_SESSION['customer_id']))
{

    header('Location: '. dirname(__folder__) .'/login.php');
}

$connection = mysql_connect('localhost', 'xplorema_user', 'FYPchamp1!');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
$select_db = mysql_select_db('xplorema_FYP');

if (!$select_db){

    die("Database Selection Failed" . mysql_error());

}
    $package_id=$_SESSION['user_package_id'];

    $package=" SELECT * FROM package where package_id='$package_id'";
    $data_package = mysql_query($package);
    $package2="SELECT * FROM package INNER JOIN country ON package.country_id=country.country_id INNER JOIN accomodation ON package.accomodation_id=accomodation.accomodation_id INNER JOIN transport ON package.transport_id=transport.transport_id WHERE package_id= '$package_id'";

    $data_package2 = mysql_query($package2);

    // var_dump(mysql_fetch_array($data_package2, MYSQL_ASSOC));
        $price='';
        $name ='';
        $customer_id=$_SESSION['customer_id'];
        $no_people='';
        $status=1;
        $status_pending=3;
        $admin_id=1;
   

// If the values are posted, insert them into the database.
    if (isset($_POST['payment_btn'])){
    
        $date=$_POST['date'];
        $payment_type=$_POST['payment_type'];

        while($row1 = mysql_fetch_array($data_package, MYSQL_ASSOC))
    {
        $price=$row1['package_price'];
        $name=$row1['package_name'];
        $no_people= $row1['number_person'];

    }

        

         
        $booking = "INSERT INTO `booking` (booking_date, no_person, package_id,customer_id, status,admin_id) VALUES ('$date', '$no_people', '$package_id', '$customer_id', '$status','$admin_id')";
        $booking_data=mysql_query($booking);
        $booking_id=mysql_insert_id();
            if($booking_data = true)
            {

            $payment = "INSERT INTO `payment` (price, payment_type, booking_id, status, customer_id,admin_id,package_id) VALUES ('$price', '$payment_type', '$booking_id', '$status_pending', '$customer_id','$admin_id','$package_id')";
            mysql_query($payment);
            $_SESSION['user_booking_id']=$booking_id;
            header('Location: '. dirname(__folder__) .'/SuccessBookingPage.php');
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
        <link href="css/pkg_booking.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
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
        <div class="container">
            <row><div class="col-md-12">
            <?php 
                while($row2 = mysql_fetch_array($data_package2, MYSQL_ASSOC))
                { ?>
            <table>
                <tbody><tr>
                    <td colspan="3">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <!--Left Panel-->
                    <td align="center" valign="top">
                        <div class="details_leftPenn">
                            <div class="details_leftPenn_bdr">
                                <div class="leftPennl_txt">
                                    Your Booking Summary</div>
                            </div>
                            <div class="details_leftPenn_list">
                                <div class="summary_left">
                                    <span class="hotel_bold">Itinerary Details </span>
                                    <br>
                                    <div class="box2_line" style="width: 99%">
                                    </div>
                                    <span class="hotel_bold2">
                                       Package Name : <?php  echo $row2['package_name']; ?></span><br>                                   
                                    <span class="bold">Destination Cities:&nbsp;</span>
                                    <br>                                   
                                    <span class="bold">Transport By: <?php  echo $row2['transport_name']; ?>&nbsp;</span>
                                    <br>
                                    <div>
                                       <span><b>Grand Total:</b> MYR <?php  echo $row2['package_price']; ?></span>    
                                    </div>                            
                                </div>
                                <div style="10px; margin-bottom: 5px;">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        &nbsp;
                    </td>
        
                    <!--Right Panel-->
                    <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                    <td width="710" valign="top">
                        <div class="tab_bdr">
                            <div class="inner_txt2">
                                <table width="99%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="60%">
                                                <span class="frame_heading">Online Package Booking !<br></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="box2_line" style="width: 99%"></div>
                                <br>
                                <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="small-grey"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td colspan="6">
                                                        <table class="blacktxt12" border="0" cellpadding="2" cellspacing="2" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Package name :<span class="red"></span>
                                                                    </td>
                                                                    <td>
                                                                        <?php  echo $row2['package_name']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Maximum person :<span class="red"></span>
                                                                    </td>
                                                                    <td>
                                                                        <?php  echo $row2['number_person']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>

                                                                    <td>
                                                                        Departure date :<span class="red">*</span>
                                                                    </td>
                                                                    <td>  
                                                                        <input type="date" class="txt_ctl" style="width:178px;height:20px;" name = "date" required="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        &nbsp;
                                                                    </td>
                                                                    <td align="left">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Payment type :<span class="red">*</span>
                                                                    </td>
                                                                    <td align="left">
                                                                        <div>
                                                                                <select class="txt_ctl" name="payment_type">
                                                                                    <option value="cash">Cash</option>
                                                                                    <option value="online">Online Bank in/ATM</option>
                                                                                    <option value="credit card">Credit Card</option>
                                                                                </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Total Price :<span class="red">*</span>
                                                                    </td>
                                                                    <td>
                                                                        RM: <?php  echo $row2['package_price']; ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="26%">
                                                    </td>
                                                    <td colspan="5">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">
            
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table width="100%" cellpadding="2" cellspacing="2" border="0">
                                    <tbody><tr>
                                        <td colspan="3" align="center">
                                            <table cellspacing="5" cellpadding="0" border="0" width="98%" class="blacktxt11">
                                                <tbody><tr>
                                                    <td valign="top" colspan="2">
                                                        <table width="100%" cellpadding="2" cellspacing="2" border="0">
                                                            
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" colspan="2">
                                <input type="button" class="inner_submit" href="ViewPackage.php" value="Back">
                                <input type="submit" name="payment_btn" value="Payment." class="inner_submit" style="width:150px;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" cellpadding="0" cellspacing="0" id="tblterms">
                                    <tbody><tr>
                                        <td>
                                            <span class="hotel_bold2">Package Cancellation Policy</span><br>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                    <br>
                    <div class="box2_line" style="width: 99%">
                    </div>
                    <span class="hotel_bold2">Important Information:</span><br>
                        <table width="100%" border="0" cellspacing="1" cellpadding="2">
                            <tbody><tr>
                                <td valign="top">
                                    <img alt="" src="img/arrow-right.png">
                                    Rates are subject to change without prior notice.
                                </td>
                            </tr>
                        </tbody></table>
                        <table width="100%" border="0" cellspacing="1" cellpadding="2">
                            <tbody><tr>
                                <td valign="top">
                                    <img alt="" src="img/arrow-right.png">
                                    Prices are ground cost only
                                </td>
                            </tr>
                        </tbody></table>
                        <table width="100%" border="0" cellspacing="1" cellpadding="2">
                            <tbody><tr>
                                <td valign="top">
                                    <img alt="" src="img/arrow-right.png">
                                    Child Age (5-11) yrs will be count as one person.
                                </td>
                            </tr>
                        </tbody></table>
                        <table width="100%" border="0" cellspacing="1" cellpadding="2">
                            <tbody><tr>
                                <td valign="top">
                                    <img alt="" src="img/arrow-right.png">
                                    Child Age (2-4) yrs will not count as one person.
                                </td>
                            </tr>
                        </tbody></table>
                        </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        &nbsp;
                    </td>
                </tr>
            </tbody></table>
             <?php } ?>
            </form>
            </div></row>
        </div>
        <div id="footer"></div>
    </body>
</html>