<?php
$connection = mysql_connect('localhost', 'xplorema', 'FYPchamp1!');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
// $select_db = mysql_select_db('xplorema_FYP');
$select_db = mysql_select_db('xplorema_FYP');

if (!$select_db){

    die("Database Selection Failed" . mysql_error());

}

// If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['email'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
  
        // $query = "INSERT INTO `customer` (customer_username, customer_password, gender, customer_name, customer_ic, customer_email, customer_phone, customer_address) VALUES ('$username', '$password', '$gender', '$username', '$ic', '$phone', '$email', '$address, $city, $state, $code')";
        
        $data_username= "SELECT * FROM customer WHERE customer_username='$username' AND customer_email='$email'";
        $data_u = mysql_query($data_username);
        $values = mysql_fetch_array($data_u);

        // var_dump($values);
        // var_dump($values2);
        // var_dump($values3);

        if(empty($values)){

            // $msg_fail=" No username/email available";
            $msg1=" No username/email available";
        }
        else
        {
             $data_u2 = mysql_query($data_username);
            while($row = mysql_fetch_array($data_u2, MYSQL_ASSOC))
            {   
                $password=$row['customer_password'];

            }
            $myemail  = $email;
            /*var_dump($myemail);
            /* If e-mail is not valid show error message */

            /* If URL is not valid set $website to empty */

            /* Let's prepare the message for the e-mail */
            $message = "Hello!

            Here is your order number:".$password."

            Please change your password to prevent account loss


            Thank you
            ";

            /* Send the message using mail() function */
            mail($myemail, "Password recover", $message);
            $msg1="Successful.Please check your email";
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
    <link href="css/Validator.min.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="js/Validator.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#header').load('layout/header.php');
          $('#footer').load('layout/footer.php');
        });
    </script>

    <style type="text/css">
        
        .title{
           text-transform: uppercase;
            font-family: 'Trebuchet MS', cursive;
            font-size: 30px;
            line-height: 30px;
            font-weight: 800;
            color: #4caeb8;
            margin: 0;
            padding: 16px 0 10px;
           text-align: left;
           margin-left: 12%;
           text-align: left;
           margin-left: 12%;
        }

        .hr4 {
              margin-left: 10%;
              margin-right: 10%;
              background-color: #5cb5be;
              height: 1px;
        }
        /*--------------form------------*/
        .formstyle{
            text-align: left;
            margin-left: 20%;
            
            font-size: 16px;
            font-family: "Arial Rounded MT Bold", "Helvetica Rounded", Arial, sans-serif;
            background:#ffffff;
            margin:0 auto; 
            padding-left:250px; 
            padding-top:20px;
            text-align: left;
        }
         legend{
          border: #509FA6;
         }
      
        .button {
            display:inline-block;
            width:150px;
            text-align:center;
            text-decoration:none;
            background-color: #5cb4be;
            color:#ffffff;
            padding:10px;
            font-weight: 700;
            letter-spacing:1px;
            border:0px solid #5cb4be;
            margin-top: 50px;
            margin-right: 50px;
            margin-left: 200px;

       }
        .button:hover {
           
            background: #ffffff;
            color: #5cb4be;
      }

      .buttoncancel {
            display:inline-block;
            width:150px;
            text-align:center;
            text-decoration:none;
            background-color: #ED6347;
            color:#ffffff;
            padding:10px;
            font-weight: 700;
            letter-spacing:1px;
            margin:10px;
            border:0px solid #ED6347;
            cursor: pointer;
       }
        .buttoncancel:hover {
           
            background: #ffffff;
            color: #ED6347;
      } 
    </style>
  </head>

  <body>
  <div id="header"></div>

<h1 class="title">Password recover </h1>
<hr class="hr4">

<div  class="formstyle">
<form id="registrationForm" style="margin-bottom: 0px !important;" class="form-horizontal" method="post" action="forgot_password.php">
   
    <fieldset>
        <?php if(!empty($msg1)) {?>
         <label style="color:red;">Error: <?php echo $msg1; ?></label>
         <?php } ?>
    <div class="form-group">

        <div class="col-md-3 control-label">
            <label>Username :</label> 
        </div>
        <div class="col-md-5">
            <input class="form-control" id="username" type="text" name="username" size="30" required="" autofocus>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 control-label">
            <label>E-mail :</label>
        </div>
        <div class="col-md-5">
            <input class="form-control" type="email" name="email" id="email" size="40" align="right" required="">
        </div>
    </div>

    </fieldset>
      
        <button class="button" data-dismiss="modal" type="submit">Submit</button>
        <input class="buttoncancel" type="button" value="Cancel" name="cancelbtn">
      
</form>
</div>
<div id="footer"></div>
</body>
</html>