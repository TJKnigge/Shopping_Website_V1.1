<?php
require 'General.php';
$conn = connectionDB();
session_start();


if (isset($_POST) && !empty($_POST)) {

    $name = $_POST['name'];
    $password = $_POST['password'];
    $surname = $_POST['surname'];
    $streetname = $_POST['streetname'];
    $housenumber = $_POST['housenumber'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $emailadress = $_POST['email'];


    $sql = "INSERT INTO `users` (`name`, `password`, `surname`, `streetname`, `housenumber`, `zipcode`, `city`, `emailadress`) VALUES ('$name', '$password', '$surname', '$streetname', '$housenumber', "
            . "'$zipcode', '$city', '$emailadress')";


    $result = mysqli_query($conn, $sql)
            or die("Failed to connect to DB" . mysqli_error());

    if ($result) {  
        
         echo '<script type="text/javascript">alert("Thanks for your registration you are logged in now.");</script>';
          
        $sql3 = "SELECT * FROM `users` WHERE name='$name' and password='$password'";
        $result = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['emailadress'] = $emailadress;
            
            echo "<script>window.location.assign('index.php');</script>";
        }
    } else {
        echo '<script type="text/javascript">alert("registration is not complete !! ");</script>';
    }
}
?>
<html>
    <head>
        <title> Simple_Shopping_cart</title>
        <link rel =" stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel =" stylesheet" href="cart.css"/>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel =" stylesheet" href="Footer.css"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>
    <body>
        <div class="menu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="mainpage.php" class="navbar-brand" title="PHP Computer store Home " style="padding-top: 12px ;font-family: Georgia ">PHP Developers Store</a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"style="padding-top: 10px"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 150px">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form method="POST">
                            <div class="form-group">
                                <h2>Sign Up</h2>
                            </div>
                            <div class="form-group">
                                <strong>Name</strong>
                                <input id="mynme" name="name" type="myname" maxlength="50" class="form-control" placeholder="First Name" autocomplete="off"required>
                            </div>
                            <div class="form-group">
                                <strong>Surname</strong>
                                <input id="surnme" name="surname" type="sname" maxlength="50" class="form-control" placeholder="Last Name" autocomplete="off"required>
                            </div>
                            <div class="form-group">
                                <strong>Street Name</strong>
                                <input id="strtnm" name="streetname" type="strname" maxlength="50" class="form-control" placeholder="ex: Stationstraat" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <strong>House Number</strong>
                                <input id="hnmbr" name="housenumber" type="hnumber" maxlength="50" class="form-control" placeholder="ex: 10" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <strong>Zipcode</strong>
                                <input id="zipc" name="zipcode" type="zip" maxlength="50" class="form-control" placeholder="ex: 1234 DC" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <strong>City</strong>
                                <input id="cty" name="city" type="cti" maxlength="50" class="form-control" placeholder="ex: Zwolle" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <strong>Email Address</strong>
                                <input id="emailadress" name="email" type="email" maxlength="50" class="form-control"placeholder="example@example.com" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <input id="passwrd" name="password" type="password" maxlength="50" class="form-control" placeholder="complex password" autocomplete="off" required>
                            </div>
                            <div class="form-group" style="padding-top: 12px;">
                                <button id="submit" type="submit" class="btn btn-success btn-block">Sign up</button>
                            </div>

                            <p class="form-group">By signing in you are agreeing to our <a href="termsofservice.html">Terms of Use</a> and our <a href="PHP Developer Store.htm">Privacy Policy</a>.</p>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="content">
        </div>
        <footer id="myFooter">
            <div class="container">
                <ul>
                    <li><a href="mainpage.php">PHP Developer Store</a></li>
                    <li><a target="_blank" href="https://www.itph-academy.nl/">Contact us</a></li>
                    <li><a href="index.php">Our Products</a></li>
                    <li><a href="termsofservice.html">Terms of service</a></li>
                </ul>
                <p class="footer-copyright">© 2018 Copyright is Reserved For PHP Developer Team </p>
            </div>
            <div class="footer-social">
                <a target="_blank" href="https://nl-nl.facebook.com/" class="social-icons"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="https://www.google.nl/?gfe_rd=cr&dcr=0&ei=hzxfWrL-BtLc8AeUioCoDg&gws_rd=ssl" class="social-icons"><i class="fa fa-google-plus"></i></a>
                <a target="_blank" href="https://twitter.com/" class="social-icons"><i class="fa fa-twitter"></i></a>
            </div>
        </footer>
       </body>
</html>