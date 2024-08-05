<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newQty = $_POST["newQty"];


    try {
        $pdo = new PDO("mysql:host=localhost;dbname=melodymart", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE instrument set quantity = ? where id = ?");
        $stmt->execute([$newQty, $id]);

        echo "Update successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
}
?>
