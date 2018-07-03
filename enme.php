<?php
require 'config.php';
session_start();
$nnme=$_POST["nnme"];
$eid=$_SESSION["username"];
$sql="UPDATE registered_member SET name='$nnme' WHERE email_id='$eid'";
$result=mysqli_query($connection,$sql);
if($result)
{
    $errid=12;
}
else
{
    $errid=13;
}

mysqli_close($connection);
header("Location:home.php?err=".$errid);
?>