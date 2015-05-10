<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>
	<style>
         .title{
            text-transform: uppercase;
            font-family: 'Trebuchet MS';
            font-size: 30px;
            color: #4caeb8;
            margin: 0;
            padding: 10px 0 10px;
            text-align: left;
            margin-left: 12%;
        }
       
        .hr4 {
            margin-left: 10%;
            margin-right: 10%;
            background-color: #5cb5be;
            height: 1px;
        }
        #contactform
        {
            width:400px;
            border:2px solid grey;
            padding:14px;
            margin:0 auto;              
        }
        
        #contactform label
        {
            font-size:14px;
            float:left;
            
            text-align:left;
            display:block;
        }

        #contactform span
        {
            font-size:11px;
            color:grey;
            width:200px;
            text-align:right;
            display:block;
        }
        #contactform input
        {
            border:1px solid grey;
            font-family:verdana;
            font-size:14px;
            color:black;
            height:20px;
            width:300px;
            margin:5px 50px 20px 10px;
            background-color:white;
        }
         
        #contactform textarea
        {
            border:1px solid grey;
            font-family:verdana;
            font-size:14px;
            color:black;
            height:200px;
            width:300px;
            margin:5px 50px 20px 10px;
            background-color:white;
            
        }
         
        #contactform input[type='button']
        {
            clear:both;
            background:grey;
            color:#FFFFFF;
            border:solid 1px #666666;
            font-size:14px;
            height:25px;
            cursor:pointer;
            width:100px;
        }

        #contactform select
        {
            border:1px solid grey;
            font-family:verdana;
            font-size:14px;
            color:black;
            height:18px;
            width:300px;
            margin:5px 50px 20px 10px;
            background-color:white;
        }

        p.thanksyou
        {   

            font-family: Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
            font-size:20px;
            width:1000px;
            text-align:center;
            margin-left: 15%;
            display:block;
             
        }

    </style>
  <title>Xplore Malaysia</title>
    </head>

  <body>
  <div id="header"></div>

<br><br><br>

<p class = "thanksyou">
Thank you for your precious feedback to improve our product and services.
<br>
Please come again thank you
<br>This will auto-redirect you back to your Homepage. If is not loading please <a href="index.html">Click Here</a>
</p>



<br><br><br>

<div id="footer"></div>
</body>
</html>