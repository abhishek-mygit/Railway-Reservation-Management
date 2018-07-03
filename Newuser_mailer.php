<?php

require 'F:/Aravindhan/Apps/XAMPP/htdocs/phpmailer/PHPMailer-master/PHPMailerAutoload.php';
require 'config.php';
$tbl="temp_member";
$randkey=md5(uniqid(rand())); 

$name=$_POST['name'];
$eid=$_POST['emailid'];
$pswd=$_POST['pswd'];
$pswdc=$_POST['pswdc'];
$dob=$_POST['dob'];
$phno=$_POST['phno'];

$pswd=md5($pswd);

$sql="INSERT INTO $tbl(randkey, email_id, name, pswd, dob, phone_no) VALUES('$randkey', '$eid', '$name', '$pswd', '$dob', '$phno')";
$result=mysqli_query($connection,$sql);
$mail = new PHPMailer;
if($result)
{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'railbookregn@gmail.com';
    $mail->Password = 'railbookproject';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('railbookregn@gmail.com', 'RailBook');
    $mail->addReplyTo('railbookregn@gmail.com', 'RailBook');
    $mail->addAddress($eid);

    $mail->isHTML(true);

    $bodyContent="<h3>Your conformation link.</h3><hr>";
    $bodyContent.="<p>Click on this link to activate your account.<br></p>";
    $bodyContent.="<a href='localhost/railbook/confirmation.php?passkey=$randkey'>Click Here!</a>";
    
    $mail->Subject="RailBook account activation link";
    $mail->Body= $bodyContent;
}

if(!$mail->send())
{
    $errid=0;
    $sql="DELETE FROM temp_member WHERE randkey = '$randkey'";
    mysqli_query($connection,$sql);
}
else
    $errid=1;

mysqli_close($connection);
header("Location:Newuser.php?err=".$errid);
?>