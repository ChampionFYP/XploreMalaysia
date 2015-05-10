<?php
// $connection = mysql_connect('localhost', 'xplorema', 'FYPchamp1!');
$connection = mysql_connect('localhost', 'root', '');

if (!$connection){

    die("Database Connection Failed" . mysql_error());

}
// $select_db = mysql_select_db('xplorema_FYP');
$select_db = mysql_select_db('FYP');

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
  
        // $query = "INSERT INTO `customer` (customer_username, customer_password, gender, csutomer_name, customer_ic, customer_email, customer_phone, customer_address) VALUES ('$username', '$password', '$gender', '$username', '$ic', '$phone', '$email', '$address, $city, $state, $code')";
        
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

            $query = "INSERT INTO `customer` (customer_username, customer_password, gender, csutomer_name, customer_ic, customer_email, customer_phone, customer_address) VALUES ('$username', '$password', '$gender', '$username', '$ic', '$email', '$phone', '$address, $city, $state, $code')";
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