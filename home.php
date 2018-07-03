<html>
    <head>
        <link rel="stylesheet" type="text/css" href="home_css.css">
        <script src="home_js.js"></script>
        <?php 
        if(isset($_GET['err'])) $error=$_GET['err'];
        ?>
    </head>

    <body background="pokemon-trainer-red-modern-moonlight-train-miscellaneous-trains-224752.jpg">
        <div style="top: 0px; left: 0px; width: 100%; height: 6.5%;position: fixed;">
            <ul>
                <li class="logo"><a href=""><b><strong>&nbsp&nbsp&nbsp&nbsp&nbspRailBook</strong></b></a></li>
                <li>&nbsp&nbsp&nbsp&nbsp</li>
                <li class="dropdown">
                    <a href="#" class="dropbtn" style="min-width: 60px; text-align: right;"><?php session_start();echo $_SESSION["name"]; ?>&nbsp&nbsp&#9776 </a>
                    <div class="dropdown-content">
                        <a onclick="pushupprof()" href="#">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </li>
                <li><a onclick="pushupcont()" href="#">Contact</a></li>
                <li><a onclick="pushupfare()" href="#">Fare</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Service's</a>
                    <div class="dropdown-content">
                        <a onclick="pushupbook()" href="#">Book</a>
                        <a onclick="pushupcancel()" href="#">Cancel</a>
                        <a onclick="pushupavail()" href="#">Availability</a>
                    </div>
                </li>
                <li><a onclick="pushupNE()" href="#">News & Events</a></li>
                <li><a onclick="pushupAU()" href="#">About Us</a></li>
                <li><a onclick="pushdown()" href="#">Home</a></li>
            </ul>
        </div>

        <div id="AU" class="menu">
            <div class="closebtn" onclick="pushdownAU()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>About Us</h2></p><br><br>
            <p><h4>We offer you a one stop solution to all your railway ticket booking needs.<br>
            By combining cutting edge technology and brilliant minds we ioneer the ticket booking industry.<br>
            We strive hard to protect the privacy of our customers and customer satisfaction through excellent services in global standards.</h4></p>        
        </div>
        <div id="NE" class="menu">
            <div class="closebtn" onclick="pushdownNE()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>News & Events</h2></p><br><br><br>
            <p>News is displayed here.</p><br>
            <p>News is displayed here.</p><br>
            <p>News is displayed here.</p><br>
            <p>News is displayed here.</p><br>
            <p>News is displayed here.</p><br>
        </div>
        <div id="book" class="menu">
            <div class="closebtn" onclick="pushdownbook()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>Book Tickets</h2></p>
            <form class="form" id="bookf" method="POST" onsubmit="return validatebook()" action="book.php">
                Full Name:<br><br><input class="ip" type="text" id="nme" name="nme"><br><br><br>
                Age:<br><br><input class="ip" type="number" id="age" name="age"><br><br><br>
                Starting Point:<br><br><input class="ip" type="text" id="bsp" name="bsp"><br><br><br>
                Destination:<br><br><input class="ip" type="text" id="bep" name="bep"><br><br><br>
                Date of journey:<br><br><input class="ip" type="date" id="bdd" name="bdd"><br><br><br>
                <input type="submit" value="Book">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Reset">
                <?php
                if(isset($error))
                {
                    if($error==4)
                        echo "<script>alert('Seats are not available. Sorry!!!.')</script>";
                    else if($error==5)
                        echo "<script>alert('A error occured while registering your ticket. Please try again.')</script>";
                    else if($error==6)
                        echo "<script>alert('Ticket reserved successfully. E-Ticket has been sent to your registered mail-id.')</script>";
                }
                ?>
            </form>
        </div>
        <div id="cancel" class="menu">
            <div class="closebtn" onclick="pushdowncancel()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>Cancel Tickets</h2></p>
            <form class="form" id="cancelf" method="POST" onsubmit="return validatecancel()" action="cancel.php">
                Train number:<br><br><input class="ip" type="text" id="tid" name="tid"><br><br><br>
                Passenger Name:<br><br><input class="ip" type="text" id="pnme" name="pnme"><br><br><br>
                Date of journey:<br><br><input class="ip" type="date" id="cdd" name="cdd"><br><br><br>
                <input type="submit" value="Submit">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Reset">
                <?php
                if(isset($error))
                {
                    if($error==7)
                        echo "<script>alert('Wrong details!!!')</script>";
                    else if($error==8)
                        echo "<script>alert('Mail not sent.')</script>";
                    else if($error==9)
                        echo "<script>alert('Ticket cancelled successfully.')</script>";
                }
                ?>
            </form>
        </div>
        <div id="avail" class="menu">
            <div class="closebtn" onclick="pushdownavail()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>Train Availability</h2></p>
            <form class="form" id="availf" method="POST" onsubmit="return validateavail()" action="avail.php">
                Starting Point:<br><br><input class="ip" type="text" id="jsp" name="jsp"><br><br><br>
                Destination:<br><br><input class="ip" type="text" id="jep" name="jep"><br><br><br>
                Date of journey:<br><br><input class="ip" type="date" id="jdd" name="jdd"><br><br><br>
                <input type="submit" value="Check">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Reset">
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
        <div id="fare" class="menu">
            <div class="closebtn" onclick="pushdownfare()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>Fare Enquiry</h2></p>
            <form class="form" id="faref" method="POST" onsubmit="return validatefare()" action="fare.php">
                Starting Point:<br><br><input class="ip" type="text" id="sp" name="sp"><br><br><br>
                Destination:<br><br><input class="ip" type="text" id="ep" name="ep"><br><br><br>
                No. of Passengers<br><br>
                Adults (60 > age > 18):<input class="ips" type="number" id="na" name="na"><br><br>
                Children (age < 18)   :<input class="ips" type="number" id="nc" name="nc"><br><br>
                Elders (age > 60)     :<input class="ips" type="number" id="ne" name="ne"><br><br><br>
                <input type="submit" value="Calculate">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="Reset">
                <?php
                if(isset($error))
                {
                    if($error==0)
                        echo "<script>alert('No such train available!!!')</script>";
                    else if($error==1)
                        echo "<script>alert('Total Fare: ".$_GET['f']."')</script>";
                }
                ?>
            </form>
        </div>
        <div id="cont" class="menu">
            <div class="closebtn" onclick="pushdowncont()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>Contact Us</h2></p><br><br><br>
            <p>HQ Address: 2/3, qwerty street,<br>Chennai - 600001</p><br><br>
            <p>Customer-care numbers (Toll free): 1100 1100, 2200 2200.</p><br><br>
        </div>
        <div id="prof" class="menu">
            <div class="closebtn" onclick="pushdownprof()">&#10006;&nbsp&nbsp&nbsp</div>
            <p><h2>Profile</h2></p>
                <form class="form" id="prof">
                    E-mail Id:&nbsp&nbsp&nbsp&nbsp<?php echo $_SESSION['username']; ?>&nbsp&nbsp&nbsp<button type="button" onclick="pushupeeid()">Edit</button><br><br>
                    Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $_SESSION['name']; ?>&nbsp&nbsp&nbsp<button onclick="pushupenme()">Edit</button><br><br>
                    Phone No.:&nbsp&nbsp&nbsp<?php echo $_SESSION['phno']; ?>&nbsp&nbsp&nbsp<button onclick="pushupephno()">Edit</button><br><br>
                    Password:&nbsp&nbsp&nbsp&nbsp<button style="width: 200px;" onclick="pushupepass()">Edit Password</button>
                </form>
            </div>
        </div>
        <div id="eeid" class="submenu">
            <div class="closebtn" onclick="pushdowneeid()">&#10006;&nbsp&nbsp&nbsp</div>
                <br><br><br><br>
                <form class="form" id="eeid" method="POST" onsubmit="return validateeeid()" action="eeid.php">
                    Enter new Email-Id:<br><input type="text" class="ipe" id="neid" name="neid">&nbsp&nbsp&nbsp<button class="cbut" type="submit">Change</button>
                </form>
                <?php
                if(isset($error))
                {
                    if($error==10)
                        echo "<script>alert('Please verify your new Email Id through the Email sent to your new Email ID.')</script>";
                    else if($error==11)
                        echo "<script>alert('Email ID could not be verified.')</script>";
                }
                ?>
            </div>
        </div>
        <div id="enme" class="submenu">
            <div class="closebtn" onclick="pushdownenme()">&#10006;&nbsp&nbsp&nbsp</div>
                <br><br><br><br>
                <form class="form" id="enme" method="POST" onsubmit="return validateenme()" action="enme.php">
                    Enter new Name:<br><input type="text" class="ipe" id="nnme" name="nnme">&nbsp&nbsp&nbsp<button class="cbut" type="submit">Change</button>
                </form>
                <?php
                if(isset($error))
                {
                    if($error==12)
                        echo "<script>alert('Successfully updated Name.')</script>";
                    else if($error==13)
                        echo "<script>alert('Name could not be updated!!!')</script>";
                }
                ?>
            </div>
        </div>
        <div id="ephno" class="submenu">
            <div class="closebtn" onclick="pushdownephno()">&#10006;&nbsp&nbsp&nbsp</div>
                <br><br><br><br>
                <form class="form" id="ephno" method="POST" onsubmit="return validateephno()" action="ephno.php">
                    Enter new Phone No.:<br><input type="text" class="ipe" id="nphno" name="nphno">&nbsp&nbsp<button class="cbut" type="submit">Change</button>
                </form>
                <?php
                if(isset($error))
                {
                    if($error==14)
                        echo "<script>alert('Successfully updated Phone Number.')</script>";
                    else if($error==15)
                        echo "<script>alert('Phone number could not be updated!!!')</script>";
                }
                ?>
            </div>
        </div>
        <div id="epass" class="submenu">
            <div class="closebtn" onclick="pushdownepass()">&#10006;&nbsp&nbsp&nbsp</div>
                <br><br><br><br>
                <form class="form" id="epass" method="POST" onsubmit="return validateepass()" action="epass.php">
                    Enter old Password:<br><input type="password" class="ipe" id="opass" name="opass"><br><br>
                    Enter new Password:<br><input type="password" class="ipe" id="npass" name="npass"><br><br>
                    Re-Type new Password:<br><input type="password" class="ipe" id="nrpass" name="nrpass"><br><br>
                    <button class="cbut" type="submit">Change</button>
                </form>
                <?php
                if(isset($error))
                {
                    if($error==16)
                        echo "<script>alert('Old password is incorrect!!!')</script>";
                    else if($error==17)
                        echo "<script>alert('Password updated.')</script>";
                    else if($error==18)
                        echo "<script>alert('Password could not be updated!!!')</script>";
                }
                ?>
            </div>
        </div>
    </body>
</html>