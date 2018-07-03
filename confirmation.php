<?php
require 'config.php';

if(isset($_GET['passkey']))
{
    $randkey=$_GET['passkey'];
    $sql="SELECT * FROM temp_member WHERE randkey ='$randkey'";
    $result1=mysqli_query($connection,$sql);

    if($result1)
    {    
        $count=mysqli_num_rows($result1);
        if($count==1)
        {
            $rows=mysqli_fetch_array($result1);
            $name=$rows['name'];
            $eid=$rows['email_id'];
            $pswd=$rows['pswd'];
            $dob=$rows['dob'];
            $phno=$rows['phone_no'];

            $sql="INSERT INTO registered_member(email_id, name, pswd, dob, phone_no) VALUES('$eid', '$name', '$pswd', '$dob', '$phno')";
            $result2=mysqli_query($connection,$sql);
        }

        else
            echo "<script type='text/javascript'>alert('Your account activation failed!!!. Try registering again.');document.location='landing.php'</script>";

        if($result2)
        {
            $sql="DELETE FROM temp_member WHERE randkey = '$randkey'";
            $result3=mysqli_query($connection,$sql);
            echo "<script type='text/javascript'>alert('Your account has been activated.');document.location='landing.php'</script>";
        }
    }
}

else if(isset($_GET['ekey']) && isset($_GET['oeid']))
{
    session_start();
    $randkey=$_GET['ekey'];
    $oldeid=$_GET['oeid'];
    $sql="SELECT randkey,email_id FROM temp_member WHERE randkey ='$randkey'";
    $result=mysqli_query($connection,$sql);
    $rows=mysqli_fetch_assoc($result);
    $sql="UPDATE registered_memeber SET email_id='$rows['email_id']' WHERE email_id='$oldeid'";
    $result=mysqli_query($connection,$sql);
    if($result)
    {
        $sql="DELETE FROM temp_member WHERE randkey = '$randkey'";
        $result=mysqli_query($connection,$sql);
        echo "<script type='text/javascript'>alert('Your new E-Mail ID has been updated.');document.location='landing.php'</script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('Your E-Mail ID couldn't be updated. Try again.');document.location='landing.php'</script>";
    }
}

mysqli_close($connection);
?>