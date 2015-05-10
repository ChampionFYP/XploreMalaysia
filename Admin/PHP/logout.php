<?php

session_destroy();

header('Location: '. dirname(__folder__) .'/index.php');

?>