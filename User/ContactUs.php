<?php
/* Set e-mail recipient */
$myemail  = 'admin@xploremalaysia.asia';



if (isset($_POST['name']))    
{    
$name = $_POST['name'];
$type  = $_POST['type'];
$email    = $_POST['email'];
$mobile = $_POST['mobile'];
$comment = $_POST['comment'];   



/* If e-mail is not valid show error message */
if(!empty($email))
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */

/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $name
E-mail: $email
Type: $type
Phone: $mobile

Comments:
$comment

End of message
";

/* Send the message using mail() function */
mail($myemail, $type, $message);
}
/* Redirect visitor to the thank you page */
// header('Location: thanks.htm');
// exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
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
            margin-right: 80px;
            margin-left: 300px;

       }
        .button:hover {
          
            background: #ffffff;
            color: #5cb4be;
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
        margin-top:10px;
        margin-left: 10px;
        }

        textarea{
        border:1px solid grey;
        font-family:verdana;
        font-size:12px;
        color:black;
        height:200px;
        width:300px;
        margin:5px 50px 20px 10px;
        background-color:white;
        
    }

    p.thanksyou{   

        font-family: Papyrus, fantasy;
        font-size:20px;
        width:1000px;
        text-align:center;
        font-weight : bold;
        display:block;
         
    }
        
    </style>


    </style>
  <title>Xplore Malaysia</title>
    </head>

  <body>
  <div id="header"></div>

<h1 class="title">Contact Us</h1>
<hr class="hr4">

<div  class="formstyle">
<form name = "registerfrm" method="post" action="ContactUs.php">
    <fieldset>
        <label> Name* :</label>
            <input class="inputbox" type="text" name="name" id="name" size="30" required="" tabindex="1">
        
        <label>E-mail* :</label>
            <input class="inputbox" type="email" name="email" id="email" size="40" align="right" required="">
        
        <label>Mobile* :</label>
            <input class="inputbox" type="text" name="mobile" id="mobile" align="right"  required="">
          
        <label>Subject :</label>
            <select class="inputbox" name="type" id="type">
                <option value = "blank">
                <option value = "Complain">Complain
                <option value = "Feedback">Feedback
                <option value = "Suggestion">Suggestion
                <option value = "Customer Service">Customer Service
                <option value = "Others">Others
            </select>
        <label>Message : </label>
        <textarea  class="inputbox" name="comment" id="comment" placeholder = "Please limit your character to 200 characters"/></textarea>

        
    </fieldset>

        <button class="button" data-dismiss="modal" type="submit">Sent</button>
    
</form>
</div>

<div id="footer"></div>
</body>
</html>