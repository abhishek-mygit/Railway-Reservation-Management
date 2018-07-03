<?php
require 'config.php';
$username=$_POST['unme'];
$password=$_POST['pswd'];
$username=stripslashes($username);
$password=stripslashes($password);
$password=md5($password);
$sql="SELECT * FROM registered_member WHERE email_id='$username' AND pswd='$password'";
$result=mysqli_query($connection,$sql);
$count=mysqli_num_rows($result);
$sql="SELECT * FROM registered_member WHERE email_id='$username' AND pswd='$password'";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);

if($count==1)
{
    session_start();
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;
    $_SESSION["name"]=$row['name'];
    $_SESSION["phno"]=$row['phone_no'];
    header("location:home.php");
}

else
{
    header("Location:landing.php?err=4");
}
mysqli_close($connection);
?>