<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
        <link href="css/Homelayout.css" rel="stylesheet">
        <link href="css/pkg_booking.css" rel="stylesheet">
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
    </head>

    <body>
        <div id="header"></div>
        <div class="container">
            <row><div class="col-md-12">
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
                                       Package Name</span><br>
                                    <span class="bold">Departure:</span><br>
                                    &nbsp;|&nbsp;
                                    Daily Departure<br>
                                    
                                    <span class="bold">Destination Cities:&nbsp;</span>
                                    <br>
                                    <span class="bold">Duration:&nbsp;</span>
                                    
                                    <br>
                                    <span class="bold">Transport By:&nbsp;</span>
                                    <br>
                                    <br>
                                    <span class="hotel_bold">Fare Details</span><br>
                                    <div class="box2_line" style="width: 99%">
                                    </div>
                                    <span class="hotel_bold2">Package Cost: (Price details)</span><br>
                                    <span class="bold">Basic Cost:</span>&nbsp;MYR&nbsp;<br>
                                     <span style="color:Red">(per person on twin sharing bases)</span> 
                                    <div>
                                       <span><b>Grand Total:</b> MYR </span>    
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
                    <td width="710" valign="top">
                        <div class="tab_bdr">
                            <div class="inner_txt2">
                                <table width="99%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="60%">
                                                <span class="frame_heading">Online Package Booking !<br></span>
                                            </td>
                                            <td width="40%" align="right" class="price_boldcolor">
                                            <div>
                                                    <span>Gross Amount : MYR </span>
                                            </div>
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
                                                <tbody><tr>
                                                    <td colspan="6">
                                                        <table class="blacktxt12" border="0" cellpadding="2" cellspacing="2" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="26%">
                                                                        Departure city :<span class="red">*</span>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                        <select class="txt_ctl" style="width:200px;">
                                                                            <option value="0">Select City</option>
                                                                        </select>
                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Package category :<span class="red">*</span>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <select class="txt_ctl" style="width:200px;">
                                                                                <option value="0">Select Category</option>
                                                                            </select>                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Departure date :<span class="red">*</span>
                                                                    </td>
                                                                    <td>
                                                                        <table cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="date" class="txt_ctl" style="width:178px;">
                                                                                    </td>
                                                                                    <td>
                                                                                        &nbsp;
                                                                                    </td>
                                                                                    <td valign="middle">
                                                                                        <img src="img/calendar.png" style="border-width:0px;">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" height="5px">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="style3">
                                                                        Room(s) :<span class="red">*</span>
                                                                    </td>
                                                                    <td align="left">
                                                                        <select id="drpRooms" class="txt_ctl">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        &nbsp;
                                                                    </td>
                                                                    <td align="left">
                                                                        <table width="100%" cellpadding="2" cellspacing="2" class="roomsBack">
                                                                            <tbody id="tblRooms">
                                                                                <tr id="trRoom0">
                                                                                    <td class="heading" width="84px" valign="top">
                                                                                        Room (s)
                                                                                    </td>
                                                                                    <td width="84px" class="heading">
                                                                                        Adults(12+yrs)
                                                                                    </td>
                                                                                    <td width="84px" class="heading">
                                                                                        Child (5-11 yrs)
                                                                                    </td>
                                                                                    <td width="84px" class="heading">
                                                                                        Child (2-4 yrs)
                                                                                    </td>
                                                                                    <td class="heading" style="width: 127px">
                                                                                        Infants (0-2 yrs)
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="84px" class="RowHeading">
                                                                                        (Room 1)
                                                                                    </td>
                                                                                    <td width="84px">
                                                                                        <div align="center">
                                                                                            <select class="txt_ctl" >
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td width="84px">
                                                                                        <div align="center">
                                                                                            <select  class="txt_ctl" >
                                                                                                <option value="0">0</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td width="84px">
                                                                                        <div align="center">
                                                                                            <select class="txt_ctl">
                                                                                                <option value="0">0</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="style1">
                                                                                        <div align="center">
                                                                                            <select class="txt_ctl">
                                                                                                <option value="0">0</option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr><td>Note</td>
                                                                <td><span style="color:Red">Child Age (5-11) yrs will be count as child with bed.<br>
                                                                    Child Age (2-4) yrs will be count as child without bed.</span>
                                                                </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Total Pax :<span class="red">*</span>
                                                                    </td>
                                                                    <td align="left">
                                                                        <div>
                                                                                <select class="txt_ctl">
                                                                                    <option selected="selected" value="0">#</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                    <option value="10">10</option>
                                                                                    <option value="11">11</option>
                                                                                    <option value="12">12</option>
                                                                                    <option value="13">13</option>
                                                                                    <option value="14">14</option>
                                                                                    <option value="15">15</option>
                                                                                    <option value="16">16</option>
                                                                                    <option value="17">17</option>
                                                                                    <option value="18">18</option>
                                                                                    <option value="19">19</option>
                                                                                    <option value="20">20</option>
                                                                                </select>
                                                                        </div>
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
                                                        <div>
                                                           <span><table width="100%" cellspacing="0" cellpadding="3">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="hotel_bold2" width="26%">
                                                                        All Pax Name
                                                                    </td>
                                                                    <td colspan="5" class="blacktext11" align="right">
                                                                        (Please note first passanger will be treated as lead pax.)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <div class="box2_line" style="width: 99%">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" class="blacktext11">Room 1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:White;">&nbsp;</td>
                                                                    <td style="background-color:White;">
                                                                        <select class="txt_ctl" name="cbo_pax_title1">
                                                                            <option value="Dr.">Dr.</option>
                                                                            <option value="Mr." selected="">Mr.</option>
                                                                            <option value="Mrs.">Mrs.</option>
                                                                            <option value="Ms.">Ms.</option>
                                                                        </select>
                                                                    </td>
                                                                    <td style="background-color:White;">
                                                                        <input class="txt_ctl" type="text" value="" maxlength="20">
                                                                    </td>
                                                                    <td style="background-color:White;">
                                                                        <input class="txt_ctl" type="text" value="" maxlength="20">
                                                                    </td>
                                                                    <td style="background-color:White;">
                                                                        <div style="display:none">
                                                                        <select name="cbo_Pax_Age1">
                                                                            <option value="18">18</option>
                                                                            <option value="19">19</option>
                                                                        </select>
                                                                    </div>
                                                                        <input type="hidden" name="hid_Room1" value="Room1">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <br>
                                                <span class="hotel_bold2">Lead Passenger Details<br>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <div class="box2_line" style="width: 99%">
                                                </div>
                                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                                    <tbody>
                                                        <tr>
                                                            <td width="100%" align="left" valign="top" colspan="2">
                                                            <table border="0" cellspacing="4" cellpadding="1" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="26%">
                                                                            Country :<span class="red">*</span>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="txt_ctl" style="width: 200px;">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            City :<span class="red">*</span>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="txt_ctl" style="width: 200px;">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Postal Code :<span class="red">*</span>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"class="txt_ctl" style="width: 200px;">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Address :<span class="red">*</span>
                                                                        </td>
                                                                        <td>
                                                                            <textarea rows="2" cols="20"lass="txt_ctl" style="width: 360px;"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Email :<span class="red">*</span>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"class="txt_ctl" style="width: 360px;">
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td>
                                                                            Mobile No :<span class="red">*</span>
                                                                        </td>
                                                                        <td>
                                                                            <input name="" type="text"class="txt_ctl" style="width: 200px;">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                            </td>
                                        </tr>
                                        <tr style="display: none">
                                            <td colspan="6">
                                                Special Request:
                                            </td>
                                        </tr>
                                        <tr style="display: none">
                                            <td colspan="6" valign="top">
                                                <textarea name="txtSpecialRequest" id="txtSpecialRequest" rows="1" style="width: 100%"></textarea>
                                                <div>
                                                    <b>Note:</b> There is no guaranteed for special request.
                                                </div>
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
                                <input type="submit" value="Continue for payment.." class="inner_submit" style="width:150px;">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <input type="checkbox" name="chkConditions">
                                Please confirm that you are agree with travee package booking condition/cancelation
                                policy. <u>(Tick to confirm)</u>
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
                                    Minimum 2 Pax to go
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
            </div></row>
        </div>
        <div id="footer"></div>
    </body>
</html>