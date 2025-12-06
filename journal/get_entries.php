<?php
require_once 'check_session.php'; // Ensures user is logged in
require_once '../db/config.php';   // Database connection

header('Content-Type: application/json'); // Set header for JSON response

$user_id = $_SESSION['user_id'];
$entries = [];

try {
    $q = "SELECT id, title, content, coordinates, tags, word_count, character_count, created_at, updated_at FROM journal_entries WHERE user_id = :user_id ORDER BY created_at DESC";
    $stmt = $conn->prepare($q);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'entries' => $entries]);

} catch (PDOException $e) {
    error_log("Get entries error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Failed to retrieve entries.']);
}
?>