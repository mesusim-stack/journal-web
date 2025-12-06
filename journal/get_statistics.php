<?php
require_once 'check_session.php'; // Ensures user is logged in
require_once '../db/config.php';   // Database connection

header('Content-Type: application/json'); // Set header for JSON response

$user_id = $_SESSION['user_id'];
$statistics = [
    'total_entries' => 0,
    'total_words' => 0,
    'first_entry_date' => '--',
    'last_entry_date' => '--'
];

try {
    // Query to get total entries and total words
    $q_stats = "SELECT COUNT(id) AS total_entries, COALESCE(SUM(word_count), 0) AS total_words FROM journal_entries WHERE user_id = :user_id";
    $stmt_stats = $conn->prepare($q_stats);
    $stmt_stats->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt_stats->execute();
    $basic_stats = $stmt_stats->fetch(PDO::FETCH_ASSOC);

    if ($basic_stats) {
        $statistics['total_entries'] = (int)$basic_stats['total_entries'];
        $statistics['total_words'] = (int)$basic_stats['total_words'];
    }

    if ($statistics['total_entries'] > 0) {
        // Query to get first entry date
        $q_first_date = "SELECT created_at FROM journal_entries WHERE user_id = :user_id ORDER BY created_at ASC LIMIT 1";
        $stmt_first_date = $conn->prepare($q_first_date);
        $stmt_first_date->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt_first_date->execute();
        $first_entry = $stmt_first_date->fetch(PDO::FETCH_ASSOC);
        if ($first_entry) {
            $statistics['first_entry_date'] = date('M d, Y', strtotime($first_entry['created_at']));
        }

        // Query to get last entry date
        $q_last_date = "SELECT created_at FROM journal_entries WHERE user_id = :user_id ORDER BY created_at DESC LIMIT 1";
        $stmt_last_date = $conn->prepare($q_last_date);
        $stmt_last_date->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt_last_date->execute();
        $last_entry = $stmt_last_date->fetch(PDO::FETCH_ASSOC);
        if ($last_entry) {
            $statistics['last_entry_date'] = date('M d, Y', strtotime($last_entry['created_at']));
        }
    }

    echo json_encode(['success' => true, 'statistics' => $statistics]);

} catch (PDOException $e) {
    error_log("Get statistics error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Failed to retrieve statistics.']);
}
?>