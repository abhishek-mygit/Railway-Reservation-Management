<?php
$host="localhost";
$mysqlusername="root";
$mysqlpassword="";
$mysqldb="RailBook";
$connection=mysqli_connect("$host","$mysqlusername","$mysqlpassword") or die(mysqli_error($connection));
mysqli_select_db($connection,"$mysqldb") or die(mysqli_error($connection));
?>