<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
    <a href="index.php">Home</a>
    <img src="logobanana.png" alt="logo">
    <a href="cart.php">Cart</a>
</header>
<?php
require 'dbConnect.php';

if (isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true); // Lärde mig json_decode och encode härifrån https://www.w3schools.com/php/func_json_decode.asp

    if (!empty($cart)) {

        // Räkna dubletter
        $quantityMap = array_count_values($cart);

        // Hämta unika ID:n
        $uniqueIds = array_keys($quantityMap);
        $idList = implode(',', $uniqueIds);

        // Frågar efter produkter med dessa ID:n 1 gång
        $data = $connection->query("SELECT * FROM products WHERE id IN ($idList)");

        if ($data && $data->num_rows > 0) {

            while ($row = $data->fetch_assoc()) {

                $id = $row['id'];
                $qty = $quantityMap[$id]; // Hur många av denna produkt

                echo '<div class="product-container">
                        <img src="'.$row['image'].'" alt="Product Image">

                        <div class="product-text">
                            <h1>'.$row['brand'].'</h1>
                            <h2>'.$row['description'].'</h2>
                            <h1>'.$row['price'].' kr</h1>
                            <p class="qty">Antal: '.$qty.'</p>
                        </div>
                      </div>';
            }

        } else {
            echo "<p>Cart is empty.</p>";
        }

    } else {
        echo "<p>Cart is empty.</p>";
    }

} else {
    echo "<p>Cart is empty.</p>";
}
?>
<footer class="footer-bar">
    <p>Banana Botique - Founded by Sami</p>
    <img src="logobanana.png" alt="logo" class="footer-logo">
</footer>
</body>
</html>