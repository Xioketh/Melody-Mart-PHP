<?php
require_once 'connection.php';

$rawPostData = file_get_contents("php://input");
$requestData = json_decode($rawPostData, true);
$userName = $requestData['userName'];

$stmt = $conn->prepare("SELECT * FROM users WHERE userName = ?");
$stmt->bind_param("s", $userName);
$stmt->execute();

$result = $stmt->get_result();

if ($result) {
    $userData = $result->fetch_assoc();
    echo json_encode($userData);
} else {
    echo json_encode(['error' => 'Query failed']);
}

$stmt->close();
$conn->close();
?>
