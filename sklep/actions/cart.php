<?php
    /*require_once '../utils/CartUtils.php';
    print_r(CartUtils::$products);
    echo CartUtils::$productsCounter;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        CartUtils::$products[] = $id;
        header("Location: ../pages/main.php?cartProductsCount=" . ++CartUtils::$productsCounter);
    }*/
    session_start();
    if (isset($_GET['id'])) {
        if (isset($_SESSION['cartProductsCount'])) {
            $_SESSION['cartProductsCount']++;
        } else {
            $_SESSION['cartProductsCount'] = 1;
        }
        $cartProductsCount = $_SESSION['cartProductsCount'];
        echo json_encode(
            [
                'answer' => "ok",
                'cartProductsCount' => $cartProductsCount]
            );
    } else {

    }
?>