<?php

require_once 'connection.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$userData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($userData);

?>