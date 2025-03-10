<?php

class Products {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }


    public function getAllProducts() {
        $query = "SELECT * FROM products ORDER BY name ASC";
        $result = $this->db->query($query);
        
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }


    public function getProductsByCategory($categoryId) {
        $query = "SELECT * FROM products WHERE category_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        
        $result = $stmt->get_result();
        var_dump($stmt->error); // Kiểm tra lỗi SQL
    
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }
    public function getCategoryByName($categoryName) {
        $query = "SELECT * FROM categories WHERE name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: null;
    }
    
    

    public function getProductById($productId) {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc() ?: null;
    }
}
