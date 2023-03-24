<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Shop</title>
	<link rel="stylesheet" href="../static/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="../static/js/script.js"></script>
</head>
<body>
	<header>
		<h1>Product Shop</h1>
        <?php
            session_start();
            if (!isset($_SESSION['logged'])) {
                header("Location: ../index.php");
            }

            $cartProductsCount = 0;
            if (isset($_SESSION['cartProductsCount'])) {
                $cartProductsCount = $_SESSION['cartProductsCount'];
            }
            
        ?>
        Uzytkownik: <?=$_SESSION['user_name']?> <?=$_SESSION['user_lastname']?>
        <button onclick="location.href='../actions/logout.php'">Wyloguj</button>
	</header>
	<nav>
		<a href="#">Home</a>
		<a href="#">Products</a>
		<a href="#">About</a>
		<a href="#">Contact</a>
        <a href="#">Contact</a>
        <a href="#" >
            <h1 id="prodCounterLabel">
                Cart (<?=$cartProductsCount?>)
            </h1>
        </a>
	</nav>
    <div class="container">
        <?php
            require_once '../utils/Db.php';
            $products = DB::getAllProducts();
            //print_r($products);die;
            foreach($products as $product) {
                echo "
                    <div class=\"product\">
                        <img src=\"{$product['smallImage']}\" alt=\"{$product['name']}\">
                        <h2>{$product['name']}</h2>
                        <p>{$product['description']}</p>
                        <button class='addProduct' data-id='{$product['id']}'>Add to Cart</button>
                        <!--<button onclick='addProduct(1)'>Add to Cart</button>-->
                    </div>
                ";
            }
        ?>
    </div>
    
</body>
		