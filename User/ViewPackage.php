<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
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

    <style>
    body { 
    margin:0; 
    padding:0px; 
    font:13px "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, sans-serif;
   
    }
    /* ---- Some Resets ---- */

        p,table, caption, td, tr, th{
            margin-left:80px;
            padding:0;
            font-weight:normal;
            }

        /* ---- Paragraphs ---- */

        p {
            margin-bottom:15px;
            }
            
        /* ---- Table ---- */

        table {
            border-collapse:collapse;
            margin-bottom:15px;
            width:90%;
            border:1px solid #E3536C;
            }
            
            caption {
                text-align:center;
                font-size:30px;
                padding-bottom:10px;
                font-weight:bold;
                color:#66a9bd;
                }
            
            table td,
            table th {
                padding:5px;
                border:1px solid #E3536C;
                border-width:0 1px 1px 0;
                text-align:center;
                }
                
            thead th {
                background:#91c5d4;
                color:#ffffff;
                font-size:20px;
                }
                    
                thead th[colspan],
                thead th[rowspan] {
                    background:#E3536C;
                    }
        /*-----------font------------*/
        span{
            font-size:15px;
            text-align:left;
        }
    </style>
    </head>
  <body>
  <div id="header"></div>
  
<h2 style="color:#66a9bd;text-align:left; margin-left:80px; font-size:40px;"><b>PACKAGE TITLE</b></h2>
</br></br>
<p style="font-size:14px;text-align:justify;margin-right:80px;font-family:verdana;">
    <img src="img/" style="float:right; margin-left:10px;" height="300px" width="450px" >
    DESCRIPTION
</p> 
<br/><br/>
  <table id="travel" >
    <caption>PACKAGE TITLE</caption>
    <thead>    
        <tr>
            <th scope="col" colspan="6">Schedule</th>
        </tr>
         <td><span>
                <p>Schedule Details</p>
            </span>
        </td>
    </thead>
  </table>
<table id="travel" >
    <caption>Rate</caption>
    <thead>    
        <tr>
            <th scope="col" colspan="2"><span>DATE</span> <br/>
                <div style="font-weight:bold;">
                    Sub-Title
                </div>
                <span>Rates per person in Malaysia Ringgit</span>
            </th>
        </tr>
         <tr>
            <td>Adult Price</td>
            <td>Child Price</td>
         </tr>
          <tr>
            <td>RM 175</td>
            <td>RM 105</td>
         </tr>
          <tr>
            <td colspan="2"> <button style="color:#ffffff; background-color:#E3536C; border:0px; height:40px;">Book Now </button></td>
         </tr>
    </thead>
</table>

<div id="footer"></div>
</body>
</html>