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
if(empty($_SESSION['customer_id']))
{
  header('Location: '. dirname(__folder__) .'/login.php');
}

$package_id = $_SESSION['user_package_id'];

// If the values are posted, insert them into the database.
    if (isset($_POST['desc'])){
        $desc=$_POST['desc'];
        $customer_id=$_SESSION['customer_id'];     
        $query = "INSERT INTO review SET review = '$desc',customer_id = '$customer_id',package_id = '$package_id'";
        mysql_query($query);
        header('Location: '. dirname(__folder__) .'/ViewPackage.php');
    }
?>








<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/style.css" rel="stylesheet">
    <link href="css/Homelayout.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css" />
    <link type="text/css" rel="stylesheet" href="css/review.css" />
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
    <form method="POST">
           <div class="reviewHeader Left">
            <div class="pkg_info">
                <div class="thumbnail">
                    <div class="sizedThumb" style="height: 60px; width: 60px">
                        <img src="http://admin.xploremalaysia.asia/photo/package/<?php echo $row['package_image_id'];?>"  class="photo_image" style="height: 60px; width: 60px;" width="60" height="60">
                    </div>
                </div>
                <h2 style="color:#66a9bd;text-align:left; margin-left:80px; font-size:40px;">
                  Package Name
                </h2>
            </div>
           </div>
           <div class="questionBlock">
            <h3 class="alert alert-info">Your first-hand experiences really help other travellers. <strong>Thanks!</strong></h3>
           <div class="question labelAndInput">
              <label for="ReviewText">
                <span>Your review</span>
                <br>
                <span id="CHAR_MIN">(100 character minimum)</span> 
              </label>
                <textarea name="desc" id="ReviewText" class="text  defaultText" placeholder="By sharing your experiences, you're helping travellers make better choices and plan their dream trips. Thank you!"></textarea>
           </div>
           </div>

           <div class="questionBlock">
            <h3 style="float:left;"><u><i>Submit your review</i></u></h3>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="1" required=""> I certify that this review is based on my own experience and is my genuine opinion of this hotel, and that I have no personal or business relationship with this establishment, and have not been offered any incentive or payment originating from the establishment to write this review. I understand that XploreMalaysia has a zero-tolerance policy on fake reviews.
                </label>
              </div>
           </div>
           <hr style=" height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0,0,0,0.5);">
            <input type="submit" class="btn btn-primary btn-lg" value="Submit your review"></input>
           </form>
         </div>
        <div id="footer"></div>
    </body>
</html>