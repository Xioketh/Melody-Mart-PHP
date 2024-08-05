<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=melodymart", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO category (categoryName) VALUES (?)");
        $stmt->execute([$category]);

        echo " added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
}
?>
