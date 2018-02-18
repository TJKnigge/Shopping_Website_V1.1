<?php
session_start();
require 'General.php';
$conn = connectionDB();

if (isset($_POST) && !empty($_POST)) {

    $username = $_POST['name'];
    $password = $_POST['password'];

    $sql3 = "SELECT * FROM `users` WHERE name='$username' and password='$password'";

    $result = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['name'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['loggedin'] = true;
//        $active = "UPDATE users SET active = 1  WHERE name='$username'";
//        
//        $Myresult = mysqli_query($conn, $active);

        echo '<script type="text/javascript">alert(" Hi  ' . $username . '  Welcom back  ");</script>';
        echo "<script>window.location.assign('index.php');</script>";
    } else {
        echo '<script type="text/javascript">alert("Invalid Login please register for new account ");</script>';
        echo "<script>window.location.assign('signUp.php');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel =" stylesheet" href="logincss.css"/>
        <link rel =" stylesheet" href="cart.css"/>
        <link rel =" stylesheet" href="footer.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="menu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="mainpage.php" class="navbar-brand" title="PHP Computer store Home " style="padding-top: 12px ;font-family: Georgia ">PHP Developers Store</a>

                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 150px">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form method="POST">
                            <div class="form-group">
                                <h2>Sign in</h2>
                            </div>
                            <div class="form-group">
                                <strong>User Name</strong>
                                <input id="signinEmail" type="name" name="name" maxlength="50" class="form-control">
                            </div>
                            <div class="form-group">
                                <strong>Password</strong>
                                <span class="right"><a href="mailto: info@itph-academy.nl">Forgot your password?</a></span>
                                <input id="signinPassword" type="password" name="password" maxlength="25" class="form-control">
                            </div>  
                            <div class="form-group" style="padding-top: 12px;">
                                <button id="signinSubmit" type="submit" class="btn btn-success btn-block">Sign in</button>
                            </div>
                            <div class="form-group divider">
                                <hr class="left"><small>New to site?</small><hr class="right">
                            </div>
                            <p class="form-group"> <a href="signUp.php">Please sign Up</a></p>

                            <p class="form-group">By signing in you are agreeing to our <a href="termsofservice.html">Terms of Use</a> and our <a href="PHP Developer Store.htm">Privacy Policy</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
        </div>
        <footer id="myFooter">
            <div class="container" style=" padding-top:1px;">
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