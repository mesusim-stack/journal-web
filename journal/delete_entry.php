<?php
require_once 'check_session.php'; // Ensures user is logged in
require_once '../db/config.php';   // Database connection

$user_id = $_SESSION['user_id'];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $entry_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($entry_id === false) {
        $_SESSION['error_message'] = 'Invalid entry ID.';
        header('Location: entries.php');
        exit();
    }

    try {
        // Prepare the DELETE statement, ensuring user ownership
        $q = "DELETE FROM journal_entries WHERE id = :entry_id AND user_id = :user_id";
        $stmt = $conn->prepare($q);
        $stmt->bindParam(':entry_id', $entry_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['success_message'] = 'Journal entry deleted successfully!';
        } else {
            $_SESSION['error_message'] = 'Entry not found or you do not have permission to delete it.';
        }
    } catch (PDOException $e) {
        error_log("Delete entry error: " . $e->getMessage());
        $_SESSION['error_message'] = 'An error occurred while deleting the entry. Please try again.';
    }
} else {
    $_SESSION['error_message'] = 'No entry ID provided for deletion.';
}

header('Location: entries.php');
exit();
?>