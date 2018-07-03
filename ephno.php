<?php
require 'config.php';
session_start();
$nphno=$_POST["nphno"];
$eid=$_SESSION["username"];
$sql="UPDATE registered_member SET phone_no='$nphno' WHERE email_id='$eid'";
$result=mysqli_query($connection,$sql);
if($result)
{
    $errid=14;
}
else
{
    $errid=15;
    
}

mysqli_close($connection);
header("Location:home.php?err=".$errid);
?>