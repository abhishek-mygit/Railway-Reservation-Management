<?php
require 'config.php';
require 'F:/Aravindhan/Apps/XAMPP/htdocs/phpmailer/PHPMailer-master/PHPMailerAutoload.php';

$name=$_POST['nme'];
$name = ucfirst($name);
$age=$_POST['age'];
$s=$_POST['bsp'];
$s = ucfirst(strtolower($s));
$e=$_POST['bep'];
$e = ucfirst(strtolower($e));
$doj=$_POST['bdd'];

$sql="SELECT fare FROM train WHERE (start='$s' AND end='$e')";
$result=mysqli_query($connection,$sql);
$f=mysqli_fetch_row($result);
$f=$f[0];
if(($age<18)||($age>60))
    $f=$f*0.5;

session_start();
$uname=$_SESSION['username'];

$sql="SELECT id FROM train WHERE (start='$s' AND end='$e')";
$result=mysqli_query($connection,$sql);
$id=mysqli_fetch_row($result);
$id=$id[0];

$sql="SELECT cap_rem FROM train_cap WHERE (train_id = '$id' AND date='$doj')";
$result=mysqli_query($connection,$sql);
$cap=mysqli_fetch_row($result);

$sql="SELECT time from train WHERE id='$id'";
$result=mysqli_query($connection,$sql);
$time=mysqli_fetch_row($result);

if($cap[0]>0)
{
    $sql="UPDATE train_cap SET cap_rem=cap_rem-1 WHERE (train_id = '$id' AND date='$doj')";
    $result=mysqli_query($connection,$sql);

    $sql="SELECT MAX(seat_no) FROM passenger WHERE (train_id = '$id')";
    $result=mysqli_query($connection,$sql);
    $seat=mysqli_fetch_row($result);
    $seat=$seat[0]+1;

    $sql="INSERT INTO passenger(train_id, email_id, seat_no, name, age, date) VALUES('$id', '$uname', '$seat', '$name', $age, '$doj')";
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
        $mail->addAddress($uname);

        $mail->isHTML(true);

        $bodyContent="<div style='width: 50%; margin: auto; border: 5px solid black; padding: 1% 3%; display: block;'>";
        $bodyContent.="<img src='http://txt-dynamic.static.1001fonts.net/txt/dHRmLjg4LjBmZWIxMy5VbUZwYkVKdmIycywuMA,,/fujita-ray.regular.png' style='float: left;'>";
        $bodyContent.="<p style='float: right; font-size: 25;'><b>E-Ticket</b></p><br><br><br><br><hr><br><br><br>";
        $bodyContent.="<p style='float: left;'>";
        $bodyContent.="Full Name: ".$name."<br><br>";
        $bodyContent.="Age: ".$age."<br><br>";
        $bodyContent.="Train - ID: ".$id."<br><br>";
        $bodyContent.="Starting Station: ".$s."<br><br>";
        $bodyContent.="Destination: ".$e."<br><br>";
        $bodyContent.="Fare: ".$f."<br><br></p>";
        $bodyContent.="<p style='float: right;'>";
        $bodyContent.="Seat Number: ".$seat."<br><br>";
        $bodyContent.="Time: ".$time[0]."<br><br>";
        $bodyContent.="Date: ".$doj."<br><br><br><br></p><hr><br><br>";
        $bodyContent.="<p><b>Terms & Conditions:</b><br><br>";
        $bodyContent.="<ol type='1'>";
        $bodyContent.="     <li>Passengers are expected to carry a identity proof and age proof for verification.</li><br>";
        $bodyContent.="     <li>Passengers who don't have age proof can be fined upto Rs.500/-</li><br>";
        $bodyContent.="     <li>Passengers without proper age proof may be denied to travel.</li><br>";
        $bodyContent.="</ol></p>";
        $bodyContent.="</div>";
            
        $mail->Subject="E-Ticket";
        $mail->Body= $bodyContent;
    }
    if(!$mail->send())
    {
        $errid=5;
        $sql="DELETE FROM passenger WHERE (train_id='$id' AND email_id='$uname' AND name='$name' AND age=$age AND date='$doj')";
        $result=mysqli_query($connection,$sql);
        if(!$result)
            echo "<script>alert('$mail->ErrorInfo;');</script>";
    }
    else
        $errid=6;
}
else
    $errid=4;

mysqli_close($connection);
header("Location:home.php?err=".$errid);
?>