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

        .about_us{
            margin:10px 200px 10px 200px;
        }
        .about_us_img{
           
            height: 250px;
            width: 350px;
            margin-right: 20px;
            float: left;
        }

        .abt_us_p{
           font-family: Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
           
           font-size: 20px;
           text-align: justify;
           margin-left: 20px;
           margin-right: 20px;

        }
        .abt_us_p span{
            color:#ED6347;
            font-weight: bold;
            font-size: 30px;
            text-align: justify;
            
        }
        .pro_pic{
            
            display:inline;
        }
        figcaption{
            display:inline;
            font-weight: bold;
            font-size: 18px;
            color: #5cb5be;
        }
    </style>
      <title>Xplore Malaysia</title>
    </head>

  <body>
    <div id="header"></div>
<hr class="hr4">
<h1 class="title">About Us</h1>

<div class="about_us">

<img class="about_us_img " src="img/kl.jpg" alt="about us pic">

<p class="abt_us_p"><span>Your Journey to Malaysia Begins Here</span><br>

 Xplore Malaysia provides tailor made travel ideas and holidays for a whole range of travellers to Malaysia & Borneo. From a family holiday to an unforgettable trip to Borneo for the adventure seekers, we are here to give you the best possible travel plan.<br>

We can save you a lot time & stress in creating your very own holiday programme. We will avoid the run of the mill programmes as much as possible to make your travel a memorable experience with us. We exercise integrity & trust in our travel business and it is our priority to ensure every client has received our utmost attention at all times. Our service quality is genuine and well received.

</p>
</div>

<div>
    <hr class="hr4">
    <h1 class="title">Our Team</h1>
    <div class="pro_pic">
      
        <img src="img/team.jpg" alt="profile pic" width="200px" height="200px" >
            <figcaption>Lim Xuan Yi</figcaption>
        
        <img src="img/team.jpg" alt="profile pic"  width="200px" height="200px">
            <figcaption>Kok Foo Chok</figcaption>
       
        <img src="img/team.jpg" alt="profile pic"  width="200px" height="200px">
            <figcaption>Beh Soo Yuan</figcaption>
        
    </div>
</div>
<div id="footer"></div>

</body>
</html>