<?php

include("includes/public_header.php");

$products = $Products->getAllProducts();
?>

<div class="main-product-container">
    <h1>Danh sách sản phẩm</h1>
    <div class="product-container">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <img src="<?= IMAGE_PATH . $product['image']; ?>" alt="<?= $product['name']; ?>">
                <h2><?= htmlspecialchars($product['name']); ?></h2>
                <p class="price"><?= number_format($product['price'], 0, ',', '.'); ?> VNĐ</p>
                <a href="v_public_product.php?id=<?= $product['id']; ?>" class="details-button">Xem chi tiết</a>
                <form method="post" action="cart.php">
                    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                    <button type="submit" class="buy-button">Thêm vào giỏ</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include("includes/public_footer.php"); ?>
