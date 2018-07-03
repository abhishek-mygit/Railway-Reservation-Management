<?php
require 'F:/Aravindhan/Apps/XAMPP/htdocs/phpmailer/PHPMailer-master/PHPMailerAutoload.php';
require 'config.php';

$randkey=md5(uniqid(rand()));
$neid=$_POST['neid'];
$sql="INSERT INTO temp_member(randkey, email_id) VALUES('$randkey', '$neid')";
$result=mysqli_query($connection,$sql);
session_start();
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
    $mail->addAddress($neid);

    $mail->isHTML(true);

    $bodyContent="<h3>Email - Id Conformation</h3><hr>";
    $bodyContent.="<p>Click the link below to confirm your new E-Mail Id.<br></p>";
    $bodyContent.="<a href='localhost/railbook/confirmation.php?ekey=$randkey&oeid=$_SESSION['username']'>Click Here!</a>";
                
    $mail->Subject="Change of E-mail ID.";
    $mail->Body= $bodyContent;

    if(!$mail->send())
    {
        $errid=11;
        $sql="DELETE FROM temp_member WHERE randkey = '$randkey'";
        mysqli_query($connection,$sql);
    }
    else
    {
        $errid=10;
    }
}

mysqli_close($connection);
header("Location:home.php?err=".$errid);
?>