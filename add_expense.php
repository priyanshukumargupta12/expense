<?php
require_once 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    try {
        $stmt = $pdo->prepare("INSERT INTO expenses (description, amount, category, expense_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $data['description'], 
            $data['amount'], 
            $data['category'], 
            $data['date']
        ]);

        echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;
}
?>
