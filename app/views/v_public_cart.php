<?php
include("includes/public_header.php");

$cartItems = $Cart->getCartItems();
$totalCost = 0;
?>

<div class="cart-container">
    <h1>Giỏ hàng của bạn</h1>
    <?php if (empty($cartItems)): ?>
        <p class="empty-cart">Giỏ hàng trống.</p>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $productId => $quantity): 
                    $product = $Products->getProductById($productId);
                    if (!$product) continue;
                    $total = $product['price'] * $quantity;
                    $totalCost += $total;
                ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']); ?></td>
                    <td><?= number_format($product['price'], 0, ',', '.'); ?> VNĐ</td>
                    <td><?= $quantity; ?></td>
                    <td><?= number_format($total, 0, ',', '.'); ?> VNĐ</td>
                    <td>
                        <a href="cart.php?remove=<?= $productId; ?>" class="remove-button">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="total-cost">Tổng tiền: <?= number_format($totalCost, 0, ',', '.'); ?> VNĐ</p>
        <a href="checkout.php" class="checkout-button">Thanh toán</a>
    <?php endif; ?>
</div>

<?php include("includes/public_footer.php"); ?>