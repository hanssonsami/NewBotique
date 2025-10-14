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
            <a href="">Cart</a>
    </header>
    <main id="product-details">
                <?php
            require 'dbConnect.php';
            $data = $connection->query('SELECT * FROM products WHERE id = '.$_GET["id"]);
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    echo'        <div class="product-container">
            <img id="'.$row["image"].'" src="'.$row["image"].'" alt="Product Image">
            <div class="product-text">
                <h1 id="'.$row["brand"].'">'.$row["brand"].'</h1>
                <h2 id="'.$row["description"].'">'.$row["description"].'</h2>
                <h1 id="'.$row["price"].'">'.$row["price"].'</h1>
            </div>
        </div>';
                }
            }
            ?>
    </main>
    <footer class="footer-bar">
        <p>Banana Botique - Founded by Sami</p>
        <img src="logobanana.png" alt="logo" class="footer-logo">
    </footer>    
</body>