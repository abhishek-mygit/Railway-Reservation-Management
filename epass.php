<?php
require 'config.php';
require 'F:/Aravindhan/Apps/XAMPP/htdocs/phpmailer/PHPMailer-master/PHPMailerAutoload.php';
session_start();
$opass=md5($_POST['opass']);
$npass=md5($_POST['npass']);
$eid=$_SESSION['username'];
$ops=$_SESSION['password'];

if($opass!=$_SESSION['password'])
{
    $errid=16;
}
else
{
    $sql="UPDATE registered_member SET pswd='$npass' WHERE email_id='$eid'";
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
        $mail->addAddress($eid);

        $mail->isHTML(true);

        $bodyContent="<h3>Your RailBook password has been updated.</h3>";
                    
        $mail->Subject="Password Updated.";
        $mail->Body= $bodyContent;

        if(!$mail->send())
        {
            $errid=18;
            echo "<script type='text/javascript'>alert('Mail could not be sent.');</script>";
            $sql="UPDATE registered_member SET pswd='$ops' WHERE email_id='$eid'";
            $result=mysqli_query($connection,$sql);
        }
        else
        {
            $errid=17;
        }
    }
}

mysqli_close($connection);
header("Location:home.php?err=".$errid);
?>