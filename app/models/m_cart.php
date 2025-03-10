<?php

class Cart {
    private $db;

    public function __construct($database) {
        $this->db = $database;
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }


    public function addToCart($productId, $quantity = 1) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
    }


    public function removeFromCart($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    public function getCartItems() {
        return $_SESSION['cart'];
    }

    public function getTotalItems() {
        return array_sum($_SESSION['cart']);
    }


    public function clearCart() {
        $_SESSION['cart'] = [];
    }
}