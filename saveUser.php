<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = "customer";
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=melodymart", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO users (userName, email, address, tel, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userName, $email, $address, $tel, $password, $role]);

        echo "User added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
}
?>