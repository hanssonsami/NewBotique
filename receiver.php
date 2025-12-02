<?php

if (isset($_POST['item'])) {
    $id = intval($_POST['item']);
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true) ?? [];
    }
    $cart[] = $id;
    setcookie('cart', json_encode($cart), time() + 60*60*24*10, "/");
}
header("Location: index.php");
exit;