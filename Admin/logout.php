<?php
session_start();
  if(isset($_SESSION['admin_id'] ))
{
    // header('Location: '. dirname(__folder__) .'/dashboard.php');
    session_destroy();
    header('Location: '. dirname(__folder__) .'/index.php');
}
?>