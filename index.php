<?php
include_once './app/init.php';

$categoryName = isset($_GET['category']) ? $_GET['category'] : null;
$category = $Categories->getCategoryByName($categoryName); 

$categoryId = $category ? $category['id'] : null;
$products = $categoryId ? $Products->getProductsByCategory($categoryId) : $Products->getAllProducts();

$Template->setData('products', $products);
$Template->setData('selected_category', $category);

include './app/views/v_public_home.php';