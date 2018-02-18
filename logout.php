<?php

session_start();

require('General.php');
//$conn = connectionDB();
//$username= $_SESSION['name'];
//$active = "UPDATE users SET active = 0  WHERE name='$username'";
//
//$Myresult = mysqli_query($conn, $active);

session_destroy();

echo "<script>window.location.assign('mainpage.php');</script>";
