<html>
    <head>
        <?php if(isset($_GET['err'])) $error=$_GET['err']; ?>
        <link rel="stylesheet" type="text/css" href="Newuser_css.css">
        <script src="Newuser_js.js"></script>
    </head>

    <body background="pokemon-trainer-red-modern-moonlight-train-miscellaneous-trains-224752.jpg">
        <div style="top:0px; height: 48px; left: 0px; width: 100%; position: fixed;">
            <ul>
                <li class="logo"><a><h2><b>&nbsp&nbsp&nbsp&nbsp&nbspRailBook</b></h2></a></li>
                <li><a style="top: 50%; right: 5%; position: absolute;" href="landing.php">Sign in</a></li>
            </ul>
        </div>
        <div style="top: 120px; height: 100%; width: 50%; left: 25%; text-align: center; color: white; position: absolute; display: inline-block;">
            <h1>Create your RailBook account</h1>
            <hr width=60% align="center">
            <div style="position: relative; width: 60%; float: left; top:40px;">
                <br><br><br><br><p>Create your account,</p><br>
                <p>Book your ticket's,</p>
                <p>Enjoy the ride,</p>
                <p>Travel the world...</p><br>
            </div>
            <div style="position: relative; width: 40%; float: right; top: 80px; background-color: #d9d9d9; color: black">
                <form class="form" id="nu" method="POST" onsubmit="return validate()" action="Newuser_mailer.php">
                    <b>
                        Name:<br><input class="ip" type="text" id="name" name="name"><br><br>
                        E-mail Id:<br><input class="ip" type="text" id="emailid" name="emailid"><br><br>
                        Password:<br><input class="ip" type="password" id="pswd" name="pswd"><br><br>
                        Re-type password:<br><input class="ip" type="password" id="pswdc" name="pswdc"><br><br>
                        Date of Birth:<br><input class="ip" type="date" id="dob" name="dob"><br><br>
                        Phone Number:<br><input class="ip" type="text" id="phno" name="phno"><br><br><br><br>
                        &nbsp&nbsp&nbsp&nbsp<input type="submit" value="Create">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Clear">
                    </b>
                    <?php
                    if(isset($error))
                    {
                        if($error==0)
                            echo "<script>alert('Cannot send Confirmation link to your e-mail address!!!');</script>";
                        else if($error==1)
                            echo "<script>alert('Your Confirmation link Has Been Sent To Your Email Address.');</script>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>            