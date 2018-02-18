<?php
require 'General.php';
$conn = connectionDB();
session_start();
$product_ids = array();

if (filter_input(INPUT_POST, 'add_to_cart')) {
    if (isset($_SESSION['shopping_cart'])) {



        $count = count($_SESSION['shopping_cart']);

        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {

            $_SESSION['shopping_cart'][$count] = array
                (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_GET, 'quantity'),
            );
        } else {

            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    } else {
        $_SESSION['shopping_cart'][0] = array
            (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_GET, 'quantity'),
        );
    }
}

if (filter_input(INPUT_GET, 'action') == 'delete') {

    foreach ($_SESSION['shopping_cart'] as $key => $product) {

        if ($product['id'] == filter_input(INPUT_GET, 'id')) {

            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

function pre_r($array) {
    echo'<pre>';
    print-r($array);
    echo'</pre>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Simple_Shopping_cart</title>
        <link rel =" stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel =" stylesheet" href="cart.css"/>
        <link rel =" stylesheet" href="Footer.css"/>
    </head>
    <body>
        <div class="menu">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="mainpage.php" class="navbar-brand" title="PHP Computer store Home " style="padding-top: 12px ;font-family: Georgia ">PHP Developers Store</a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <li style="padding-top: 8px"> <?php if (isset($_SESSION['name'])) { ?> <a><span class="glyphicon glyphicon-user" style="  color:white ; font-size: 15px; font-weight: bold  ">
                                        <?PHP echo $_SESSION['name']; ?> </span></a> </li>
                            <li><a href="seller.php"><span class="glyphicon glyphicon-barcode" style="padding-top: 10px"></span> Seller page</a></li>
                        <?PHP } ?>    
                        <li><?php if (isset($_SESSION['name'])) { ?><li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="padding-top: 10px"></span> Logout</a></li> 
                            <select class="glyphicon glyphicon-log-in" style="padding-top: 5px; margin-top: 10px"> Serach
                                <option id="General"> General/all </option>
                                <option id="Computers"> Computers </option>
                                <option id="Laptops"> Laptops</option>
                                <option id="Cameras"> Cameras</option>
                                <?php $category = 'option.id'; ?>
                            </select>

                        <?PHP } else {
                            ?> <li><a href="signUp.php" ><span class="glyphicon glyphicon-user"style="padding-top: 10px"></span> Sign Up</a></li>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="padding-top: 10px"></span> Login</a></li>

                            <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style=" padding-top: 100px">
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'cart');

            switch ($category) {
                case "General":
                    $query = 'SELECT * FROM products ORDER by id ASC';
                    $result = mysqli_query($connect, $query);
                    return $result;
                    break;
                case "Computers":
                    $query = "SELECT * FROM `products` WHERE `category` = 'computer' ORDER by id ASC";
                    $result = mysqli_query($connect, $query);
                    break;
                case "Laptops":
                    $query = "SELECT * FROM `products` WHERE `category` = 'laptop' ORDER by id ASC";
                    $result = mysqli_query($connect, $query);
                    break;
                case "Cameras":
                    $query = "SELECT * FROM `products` WHERE `category` = 'camera' ORDER by id ASC";
                    $result = mysqli_query($connect, $query);
                    break;
            }

            $query = 'SELECT * FROM products ORDER by id ASC';
            $result = mysqli_query($connect, $query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-sm-4 col-md-3">
                            <form method="post" action="index.php?action=add&id=<?php echo $product['id']; ?>">
                                <div class="products">
                                    <img src="<?php echo $product['image']; ?>" class="img-responsive" />
                                    <h4 class="text-info"><?php echo $product['name']; ?></h4>
                                    <h4>€ <?php echo $product['price']; ?></h4>

                                    <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                                    <?php
                                    if (isset($_SESSION['name'])) {
                                        ?>

                                        <input type = "text" name = "quantity" id="quantity" class = "form-control" value = "1" />
                                        <input type = "submit" name = "add_to_cart" style = "margin-top:5px;" class = "btn btn-info" value = "Add to Cart" />

                                        <?php
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
            }
            if (isset($_SESSION['shopping_cart'])) {
                if (count($_SESSION['shopping_cart']) > 0) {
                    ?>
                   
                    <div style="clear:both"></div>  
                    <br />  
                    <div class="table-responsive">  
                        <table class="table">  
                            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
                            <tr>  
                                <th width="40%">Product Name</th>  
                                <th width="10%">Quantity</th>  
                                <th width="20%">Price</th>  
                                <th width="15%">Total</th>  
                                <th width= "5%">Action</th>  
                            </tr>  
                            <?php
                        }
                    }
                    if (!empty($_SESSION['shopping_cart'])) {

                        $total = 0;

                        foreach ($_SESSION['shopping_cart'] as $key => $product) {
                            ?>  

                            <tr>  
                                <td><?php echo $product['name']; ?></td>  
                                <td><?php echo $product['quantity']; ?></td>  
                                <td><?php echo $product['price']; ?></td>  
                                <td><?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
                                <td>
                                    <a href="index.php?action=delete&id=<?php echo $product['id']; ?>">
                                        <div class="btn-danger">Remove</div>
                                    </a>
                                </td>  
                            </tr>  
                            <?php
                            $total = $total + ($product['quantity'] * $product['price']);
                        }
                        ?>  
                        <tr>  
                            <td colspan="3" align="right">Total</td>  
                            <td align="right">€ <?php echo number_format($total, 2); ?></td>  
                            <td></td>  
                        </tr>  
                        <tr>
                            <td colspan="5">
                                <a href="payment.html" class="button">Checkout</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>  
                </table>  
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>