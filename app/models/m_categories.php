<?php

class Categories {
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM categories ORDER BY name ASC";
        $result = $this->db->query($query);
        
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    }
    public function getCategoryByName($categoryName) {
        $query = "SELECT * FROM categories WHERE name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: null;
    }
    

    public function categoryExists($categoryName) 
    {
        $query = "SELECT COUNT(*) as count FROM categories WHERE name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['count'] > 0;
    }
}