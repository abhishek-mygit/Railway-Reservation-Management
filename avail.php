<?php
require 'config.php';

$from=$_POST['jsp'];
$to=$_POST['jep'];
$doj=$_POST['jdd'];

$sql="SELECT cap_rem FROM train_cap WHERE ( train_id = ( SELECT id FROM train WHERE ( start='$from' AND end='$to' )) AND date='$doj' )";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_row($result);
session_start();
if($row[0]>0)
{
    if(isset($_SESSION["username"]))
        header("Location:home.php?err=2");
    else
        header("Location:landing.php?err=2");
}
else
{
    if(isset($_SESSION["username"]))
        header("Location:home.php?err=3");
    else
        header("Location:landing.php?err=3");
}

mysqli_close($connection);
?>