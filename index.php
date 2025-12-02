<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banana Botique</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header class="header">

            <a href="index.php">Home</a>
            <img src="logobanana.png" alt="logo">
            <a href="cart.php">Cart</a>
    </header>
    <div class="product-grid">
        <?php
            require 'dbConnect.php';
            $data = $connection->query('SELECT * FROM products');
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    echo'<div class="product-container" data-product="'.$row["id"].'" onclick="viewProduct(this)">
                            <img src="'.$row["image"].'" alt="Product Image">
                            <div class="product-text">
                                <h1>'.$row["brand"].'</h1>
                                <h2>'.$row["description"].'</h2>
                                <h1>'.$row["price"].' kr</h1>
                                    <form action="receiver.php" method="post">
                                    <input type="hidden" name="item" value="'.$row["id"].'">
                                    <button type="submit">Add To cart</button>
                                </form>
                            </div>
                        </div>';
                }
            }
            ?>
    </div>
    <footer class="footer-bar">
        <p>Banana Botique - Founded by Sami</p>
        <img src="logobanana.png" alt="logo" class="footer-logo">
    </footer>
</body>
</html>