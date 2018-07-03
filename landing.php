<html>
    
    <head>
        <title>RailBook</title>
        <link rel="stylesheet" type="text/css" href="landing_css.css">
        <script src="landing_js.js"></script>
        <?php if(isset($_GET['err'])) $error=$_GET['err']; ?>
    </head>

    <body background="pokemon-trainer-red-modern-moonlight-train-miscellaneous-trains-224752.jpg">
        
        <div style="top: 30%; left: 17%; position: fixed;"><img src="red_logo_txt.jpg"></div>

        <div id="fare" class="menu" onmouseover="pushup1()" onmouseout="pushdown1()">
            <h3><b><center><a>FARE</a></center></b></h3><hr><br>
            <form class="form" id="fare" method="POST" onsubmit="return validatefare()" action="fare.php">
                Starting Point:<br><br><input class="ip" type="text" id="sp" name="sp"><br><br><br>
                Destination:<br><br><input class="ip" type="text" id="ep" name="ep"><br><br><br>
                No. of Passengers<br><br>
                Adults (60 > age > 18): <input class="ips" type="number" id="na" name="na" value=0><br><br>
                Children (age < 18)   : <input class="ips" type="number" id="nc" name="nc" value=0><br><br>
                Elders (age > 60)     : <input class="ips" type="number" id="ne" name="ne" value=0><br><br><br>
                <input type="submit" value="Calculate">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Reset">
                <?php
                if(isset($error))
                {
                    if($error==0)
                        echo "<script>alert('No train available!!!')</script>";
                    else if($error==1)
                        echo "<script>alert('Total Fare: ".$_GET['f']."')</script>";
                }
                ?>
            </form>
        </div>

        <div id="avail" class="menu" style="left: 40%;" onmouseover="pushup2()" onmouseout="pushdown2()">
            <h3><b><center><a>AVAILABILITY</a></center></b></h3><hr><br>
            <form class="form" id="avail" method="POST" onsubmit="return validateavail()" action="avail.php">
                Starting Point:<br><br><input class="ip" type="text" id="jsp" name="jsp"><br><br><br>
                Destination:<br><br><input class="ip" type="text" id="jep" name="jep"><br><br><br>
                Date of journey:<br><br><input class="ip" type="date" id="jdd" name="jdd"><br><br><br>
                <input type="submit" value="Check" onclick="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Reset">
                <?php
                if(isset($error))
                {
                    if($error==2)
                        echo "<script>alert('Seats are available. Book quickly.')</script>";
                    else if($error==3)
                        echo "<script>alert('Seats are not available. Sorry!!!.')</script>";
                }
                ?>
            </form>
        </div>

        <div id="auth" class="menu" style="left: 70%;" onmouseover="pushup3()" onmouseout="pushdown3()">
            <h3><b><center><a>LOGIN</a></center></b></h3><hr><br>
            <form class="form" id="login" method="POST" onsubmit="return validateauth()" action="auth.php">
                Username:<br><br><input class="ip" type="text" id="unme" name="unme"><br><br><br>
                Password:<br><br><input class="ip" type="password" id="pswd" name="pswd"><br><br><br><br>
                <input type="submit" value="Login" onclick="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Clear">
                <br><br><br><a href="Newuser.php">New User!!!</a>
                <?php
                if(isset($error))
                    if($error==4)
                        echo "<script>alert('Wrong Username or Password!!!')</script>";
                ?>
            </form>

        </div>
    </body>

</html>