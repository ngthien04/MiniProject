<?php


include("includes/public_header.php");

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = $Products->getProductById($product_id);

if (!$product) {
    echo "<p class='error'>Sản phẩm không tồn tại!</p>";
    include("includes/public_footer.php");
    exit();
}
?>

<div class="product-detail-container">
    <h1><?= htmlspecialchars($product['name']); ?></h1>
    <img src="<?= IMAGE_PATH . $product['image']; ?>" alt="<?= $product['name']; ?>">
    <p class="price">Giá: <?= number_format($product['price'], 0, ',', '.'); ?> VNĐ</p>
    <p class="description">Mô tả: <?= nl2br(htmlspecialchars($product['description'])); ?></p>
    <form method="post" action="cart.php">
        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
        <button type="submit" class="buy-button">Thêm vào giỏ</button>
    </form>
</div>

<?php include("includes/public_footer.php"); ?>