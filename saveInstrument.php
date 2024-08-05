<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];

    $uploadDirectory = "uploads/";

    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["image"]["tmp_name"];
        $imagePath = $uploadDirectory . basename($_FILES["image"]["name"]);

        move_uploaded_file($tmp_name, $imagePath);
    } else {
        echo "Error uploading the image.";
        exit();
    }

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=melodymart", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO instrument (name, category, price, quantity, image, status) VALUES (?, ?, ?, ?, ?,1)");
        $stmt->execute([$name, $category, $price, $qty, $imagePath]);

        echo "Instrument added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
}
?>
