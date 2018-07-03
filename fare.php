<?php
require 'config.php';

$from=$_POST['sp'];
$to=$_POST['ep'];
$nc=$_POST['nc'];
$na=$_POST['na'];
$ne=$_POST['ne'];

$sql="SELECT fare FROM train WHERE ( start='$from' AND end='$to' )";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_row($result);
$count=mysqli_num_rows($result);
session_start();
if($count==0)
{
    if(isset($_SESSION["username"]))
        header("Location:home.php?err=0");
    else
        header("Location:landing.php?err=0");
}
else
{
    $p=($row[0]*$na + $row[0]*$nc*0.5 + $row[0]*$ne*0.5);
    if(isset($_SESSION["username"]))
        header("Location:home.php?err=1&f=$p");
    else
        header("Location:landing.php?err=1&f=$p");
}

mysqli_close($connection);
?>