<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="/resources/css/style.css" type="text/css" media="all">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<<body class="<?php $this->getData('page_class'); ?>">
    <div id="wrapper">
        <div class="container nav-container">
            <nav class="nav-menu">
                <ul class="menu-list">
                    <li><a href="index.php" class="menu-link">HOME PAGE</a></li>
                    <li><a href="?category=sneaker" class="menu-link">SNEAKER</a></li>
                    <li><a href="?category=accessories" class="menu-link">ACCESSORIES</a></li>
                    <li><a href="?category=bag" class="menu-link">BAG</a></li>
                    <li><a href="?page=about" class="menu-link">ABOUT US</a></li>
                </ul>
            </nav>
            <i class="fa-solid fa-cart-shopping"></i> (<span id="cart-count"><?php echo $this->getData('cart_total_items'); ?></span>)
        </div>