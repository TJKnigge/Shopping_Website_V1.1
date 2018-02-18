<?php
require 'General.php';
$conn = connectionDB();
session_start();
?>
<html lang="en">
    <head>
        <title>PHP developer Store</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="slideshow.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel =" stylesheet" href="Footer.css"/> 
        <link rel =" stylesheet" href="cart.css"/>
        <link rel =" slideshow" href="slideshow.js"/>
    </head>
    <body>
        <div class="menu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="mainpage.php" class="navbar-brand" title="PHP Computer store Home " style="padding-top: 12px;position: r;font-family: Georgia ">PHP Developers Store</a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="index.php" ><span class="glyphicon glyphicon-th-large"style="padding-top: 10px"></span> View Products</a></li>

                        <li><?php if (isset($_SESSION['name'])) { ?><li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="padding-top: 10px"></span> Logout</a></li> <?PHP } else { ?> 
                            <li><a href="signUp.php" ><span class="glyphicon glyphicon-user"style="padding-top: 10px"></span> Sign Up</a></li>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="padding-top: 10px"></span> Login</a></li>

                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>      
        <div style="margin-top: 55px">
            <img src="ec.png" style="width:100%">   
        </div>
        <div class="content">
            <div class="slideshow-container" style=" margin:auto">
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="img0.jpg" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="img1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="img2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="img3.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="img4.jpg" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="img5.jpg" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <img src="img7.jpg" style="width:100%">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <footer id="myFooter" style="padding-top:300px">
            <div class="container" style="position: relative">
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
        <script src="slideshow.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
