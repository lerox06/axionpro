<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

// --- AUTHENTIFICATION ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'login') {
    $data = json_decode(file_get_contents('php://input'), true);
    $user = $data['username'] ?? '';
    $pass = $data['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $account = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($account && password_verify($pass, $account['password'])) {
        $_SESSION['admin_logged_in'] = true;
        echo json_encode(['success' => true]);
    } else {
        http_response_code(401);
        echo json_encode(['success' => false]);
    }
    exit;
}

if ($action === 'check_auth') {
    echo json_encode(['logged_in' => isset($_SESSION['admin_logged_in'])]);
    exit;
}

if ($action === 'logout') {
    session_destroy();
    echo json_encode(['success' => true]);
    exit;
}

// --- ACTIONS PROTEGEES ---
if (!isset($_SESSION['admin_logged_in']) && $action !== 'add') {
    http_response_code(403);
    echo json_encode(['error' => 'Accès refusé']);
    exit;
}

// Liste des tickets
if ($action === 'list') {
    $stmt = $pdo->query("SELECT * FROM tickets ORDER BY created_at DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// Ajouter un ticket (Public)
if ($action === 'add') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO tickets (name, service, message) VALUES (?, ?, ?)");
    $stmt->execute([$data['name'], $data['service'], $data['message']]);
    echo json_encode(['success' => true]);
    exit;
}

// Mettre à jour les notes (Admin seulement)
if ($action === 'update_note') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("UPDATE tickets SET notes = ? WHERE id = ?");
    $stmt->execute([$data['notes'], $data['id']]);
    echo json_encode(['success' => true]);
    exit;
}

// Supprimer
if ($action === 'delete') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("DELETE FROM tickets WHERE id = ?");
    $stmt->execute([$data['id']]);
    echo json_encode(['success' => true]);
    exit;
}
?>