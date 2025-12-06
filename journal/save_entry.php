<?php
require_once 'check_session.php'; // Ensures user is logged in
require_once '../db/config.php'; // Database connection

// Only proceed if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $coordinates = trim($_POST['coordinates'] ?? '');
    $tags = trim($_POST['tags'] ?? '');
    $entry_id = $_POST['entry_id'] ?? null; // For identifying if it's an update

    // Basic validation
    if (empty($title) || empty($content)) {
        $_SESSION['error_message'] = 'Title and content cannot be empty.';
        header('Location: journal.php'); // Redirect to journal page or appropriate error page
        exit();
    }

    // Calculate word count and character count
    $word_count = str_word_count($content);
    $character_count = strlen($content);

    try {
        if ($entry_id) {
            // Update existing entry
            $q = "UPDATE journal_entries SET title = :title, content = :content, coordinates = :coordinates, tags = :tags, word_count = :word_count, character_count = :character_count WHERE id = :entry_id AND user_id = :user_id";
            $stmt = $conn->prepare($q);
            $stmt->bindParam(':entry_id', $entry_id, PDO::PARAM_INT);
            $_SESSION['success_message'] = 'Journal entry updated successfully!';
        } else {
            // Insert new entry
            $q = "INSERT INTO journal_entries (user_id, title, content, coordinates, tags, word_count, character_count) VALUES (:user_id, :title, :content, :coordinates, :tags, :word_count, :character_count)";
            $stmt = $conn->prepare($q);
            $_SESSION['success_message'] = 'Journal entry saved successfully!';
        }

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':coordinates', $coordinates);
        $stmt->bindParam(':tags', $tags);
        $stmt->bindParam(':word_count', $word_count, PDO::PARAM_INT);
        $stmt->bindParam(':character_count', $character_count, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: journal.php'); // Redirect to the main journal page
        exit();

    } catch (PDOException $e) {
        error_log("Save/Update Entry error: " . $e->getMessage());
        $_SESSION['error_message'] = 'An error occurred while saving your journal entry. Please try again.';
        header('Location: journal.php'); // Redirect with error
        exit();
    }
} else {
    // If not a POST request, redirect to the journal page or show an error
    $_SESSION['error_message'] = 'Invalid request method.';
    header('Location: journal.php');
    exit();
}
?>