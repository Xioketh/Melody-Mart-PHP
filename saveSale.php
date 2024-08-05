<?php

$data = json_decode(file_get_contents('php://input'), true);

$totAmount = $data['totAmount'];
$totQty = $data['totQty'];
$userName = $data['userName'];
$rowData = $data['rowData'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=melodymart", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt1 = $pdo->prepare("SELECT MAX(CAST(SUBSTRING(saleId, 4) AS UNSIGNED)) AS maxNumeric FROM sales");
        $stmt1->execute();

        $maxNumeric = $stmt1->fetchColumn();

        if ($maxNumeric !== false) {
            $saleId = "S000" . ($maxNumeric + 1);
        } else {
            $saleId = "S0001";
        }

        foreach ($rowData as $item) {
            $stmt2 = $pdo->prepare("UPDATE instrument SET quantity = quantity - :qty WHERE name = :instrumentId");
            $stmt2->bindParam(':qty', $item['quantity']);
            $stmt2->bindParam(':instrumentId', $item['title']);
            $stmt2->execute();
        }


        $stmt = $pdo->prepare("INSERT INTO sales (saleId, date, totAmount, totQty, userName) VALUES (:saleId, NOW(), :totAmount, :totQty, :userName)");
        $stmt->bindParam(':saleId', $saleId);
        $stmt->bindParam(':totAmount', $totAmount);
        $stmt->bindParam(':totQty', $totQty);
        $stmt->bindParam(':userName', $userName);


        $stmt->execute();

        echo json_encode(['saleId' => $saleId]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $pdo = null;
}
?>