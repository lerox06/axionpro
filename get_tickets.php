<?php
header('Content-Type: application/json');
require_once 'config.php';

try {
    // On récupère les derniers tickets
    $stmt = $pdo->query("SELECT * FROM tickets ORDER BY created_at DESC");
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($tickets);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>