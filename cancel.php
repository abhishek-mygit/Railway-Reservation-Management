<?php
require 'config.php';
require 'F:/Aravindhan/Apps/XAMPP/htdocs/phpmailer/PHPMailer-master/PHPMailerAutoload.php';

$tid=$_POST['tid'];
$pnme=$_POST['pnme'];
$jd=$_POST['cdd'];

session_start();
$uname=$_SESSION['username'];
$sql="SELECT * FROM passenger WHERE train_id='$tid' AND email_id='$uname' AND name='$pnme' AND date='$jd'";
$result=mysqli_query($connection,$sql);
$count=mysqli_num_rows($result);

if($count==0)
    $errid=7;
    
else
{
    $sql="UPDATE train_cap SET cap_rem=cap_rem+1 WHERE (train_id = '$tid' AND date='$jd')";
    $result=mysqli_query($connection,$sql);

    $sql="DELETE FROM passenger WHERE (train_id='$tid' AND email_id='$uname' AND name='$pnme' AND date='$jd')";
    $result=mysqli_query($connection,$sql);
    if($result)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'railbookregn@gmail.com';
        $mail->Password = 'railbookproject';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('railbookregn@gmail.com', 'RailBook');
        $mail->addReplyTo('railbookregn@gmail.com', 'RailBook');
        $mail->addAddress($uname);

        $mail->isHTML(true);

        $bodyContent="<div style='width: 50%; margin: auto; border: 5px solid black; padding: 1% 3%; display: block;'>";
        $bodyContent.="<img src='http://txt-dynamic.static.1001fonts.net/txt/dHRmLjg4LjBmZWIxMy5VbUZwYkVKdmIycywuMA,,/fujita-ray.regular.png' style='float: left;'>";
        $bodyContent.="<br><br><br><br><hr><br><div style='height: 20%; width: 75%; background-color: #333; color: white; font-size: 50;'>Ticket Cancelled</div>";
        $bodyContent.="<div style='height: 1%; width: 75%; background-color: lightgray; float: left;'></div><br><br>";
        $bodyContent.="The ticket of passenger $pnme on train '$tid' on '$jd' has been cancelled.</div>";
            
        $mail->Subject="Ticket Cancelled.";
        $mail->Body= $bodyContent;
    }
    if(!$mail->send())
        $errid=8;
    else
        $errid=9;
}

mysqli_close($connection);
header("Location:home.php?err=$errid");
?>