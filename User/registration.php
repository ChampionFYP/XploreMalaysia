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
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $ic=$_POST['ic'];
        $password = $_POST['password'];
        $phone= $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $code = $_POST['code'];
        $gender = $_POST['gender'];
  
        // $query = "INSERT INTO `customer` (customer_username, customer_password, gender, customer_name, customer_ic, customer_email, customer_phone, customer_address) VALUES ('$username', '$password', '$gender', '$username', '$ic', '$phone', '$email', '$address, $city, $state, $code')";
        
        $data_username= "SELECT * FROM customer WHERE customer_username='$username'";
        $data_u = mysql_query($data_username);
        $values = mysql_fetch_array($data_u);
        $data_email= "SELECT * FROM customer WHERE customer_email='$email'";
        $data_e = mysql_query($data_email);
        $values2 = mysql_fetch_array($data_e);
        $data_ic= "SELECT * FROM customer WHERE customer_ic='$ic'";
        $data_i = mysql_query($data_ic);
        $values3 = mysql_fetch_array($data_i);

        // var_dump($values);
        // var_dump($values2);
        // var_dump($values3);

        if(empty($values) && empty($values2) && empty($values3)){

            $query = "INSERT INTO `customer` (customer_username, customer_password, gender, customer_name, customer_ic, customer_email, customer_phone, customer_address, status) VALUES ('$username', '$password', '$gender', '$username', '$ic', '$email', '$phone', '$address, $city, $state, $code','1')";
            mysql_query($query);
        }
        if(!empty($values))
        {
            $msg1=" Username Used";
        }
        if(!empty($values2))
        {
            $msg2=" Email Used";
        }
        if(!empty($values3))
        {
            $msg3=" IC Used";
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
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

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
        .red {  
              font-size:10pt; 
              font-style:italic; 
              color:red ; 
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
        label{
            display: inline-block;
            float: left;
            clear: left;
            width: 250px;
            text-align: right;
            margin-bottom: 10px;
        }
      
        .inputbox {
        float: left;
        display: inline-block;
        margin-bottom:10px;
        margin-left: 10px;
        }

        
    
    </style>




    <title>Xplore Malaysia</title>
  </head>

  <body>
  <div id="header"></div>

<h1 class="title">Registration Form </h1>
<hr class="hr4">

<div  class="formstyle">
<form style="margin-bottom: 0px !important;" class="form-horizontal" method="post" action="registration.php">
   
    <fieldset>
        
        <?php if(!empty($msg1)) {?>
         <label style="color:red;">Error: <?php echo $msg1; ?></label>
         <?php } ?>
         <?php if(!empty($msg2)) {?>
         <label style="color:red;">Error: <?php echo $msg2; ?></label>
         <?php } ?>
         <?php if(!empty($msg3)) {?>
         <label style="color:red;">Error: <?php echo $msg3; ?></label>
         <?php } ?>

        <label>Username :</label> 
            <input class="inputbox" id="username" type="text" name="username" size="30" required="">

        <label>IC : </label> 
            <input class="inputbox" id="ic" type="text" name="ic" size="30">
         
        <label>Gender :</label> 
            <p class="inputbox">
              <input type="radio" name="gender" value="Male">Male
              <input type="radio" name="gender" value="Female">Female
            </p>

        <label>Password :</label> 
            <input class="inputbox" type="password" name="password" id="password" size="30" required="">
            
         <label>E-mail :</label>     
            <input class="inputbox" type="email" name="email" id="email" size="40" align="right" required="">
        
        <label>Mobile :</label>    
            <input class="inputbox" type="text" name="phone" id="phone" align="right"  required="">

        <label>Address:</label> 
            <input  class="inputbox" type="text" size="62" name="address" id="address" required="">
        
        <label>City:</label> 
            <input class="inputbox" type="text" size="30" name="city" id="city" required="">
        
        <label>State:</label>
            <input  class="inputbox" type="text" size="30" name="state" id="state" required="">
        
        <label>Zipcode:</label> 
            <input class="inputbox" ype="text" size="30" name="code" id="code" required="">
    </fieldset>
      
        <button class="button" data-dismiss="modal" type="submit">Signup</button>
 <input class="buttoncancel" type="button" value="Cancel" name="cancelbtn">
      
</form>
</div>
<div id="footer"></div>
</body>
</html>