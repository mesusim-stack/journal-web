<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Entries - Minecraft Journal</title>
    <link rel="stylesheet" href="journal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* Additional styles for entries page */
        .entries-page .background-image {
            background-image: url('https://wallpapercave.com/wp/wp12502109.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .entries-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .entries-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .stat-item {
            background-color: rgba(40, 40, 40, 0.8);
            padding: 20px;
            border-radius: 10px;
            border: 3px solid #3a7d34;
            text-align: center;
            min-width: 150px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            color: #5cdb5c;
            font-family: 'Press Start 2P', cursive;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #b0b0b0;
            font-size: 0.9rem;
        }
        
        .entries-container {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .entry-item {
            background-color: rgba(30, 30, 30, 0.9);
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            border: 4px solid #5cdb5c;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }
        
        .entry-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #5b5b5b;
        }
        
        .entry-title {
            color: #5cdb5c;
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 500;
        }
        
        .entry-meta {
            display: flex;
            gap: 20px;
            color: #888;
            font-size: 0.9rem;
            flex-wrap: wrap;
        }
        
        .entry-content {
            color: #e0e0e0;
            line-height: 1.8;
            font-size: 1.1rem;
            margin-bottom: 25px;
            padding: 20px;
            background-color: rgba(40, 40, 40, 0.5);
            border-radius: 8px;
            border: 2px solid #5b5b5b;
        }
        
        .entry-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 2px solid #5b5b5b;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .entry-coordinates, .entry-tags {
            color: #4EE2EC;
            font-size: 0.9rem;
        }
        
        .entry-coordinates i, .entry-tags i {
            margin-right: 8px;
        }
        
        .entry-actions {
            display: flex;
            gap: 10px;
        }
        
        .action-btn {
            background-color: rgba(92, 219, 92, 0.1);
            border: 2px solid #5cdb5c;
            color: #5cdb5c;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.7rem;
        }
        
        .action-btn:hover {
            background-color: #5cdb5c;
            color: white;
        }
        
        .action-btn.delete {
            background-color: rgba(230, 74, 74, 0.1);
            border-color: #e64a4a;
            color: #e64a4a;
        }
        
        .action-btn.delete:hover {
            background-color: #e64a4a;
            color: white;
        }
        
        .no-entries {
            text-align: center;
            padding: 60px 20px;
            background-color: rgba(30, 30, 30, 0.8);
            border-radius: 10px;
            border: 4px solid #5b5b5b;
        }
        
        .no-entries i {
            font-size: 4rem;
            color: #5b5b5b;
            margin-bottom: 20px;
        }
        
        .no-entries h3 {
            color: #5cdb5c;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }
        
        .no-entries p {
            color: #888;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        
        .back-to-journal {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #5b5b5b;
        }
        
        @keyframes highlight {
            0% { background-color: rgba(92, 219, 92, 0.3); }
            100% { background-color: transparent; }
        }
    </style>
</head>
<body class="entries-page">
    <?php
        require_once 'check_session.php'; // Ensures user is logged in
        require_once '../db/config.php';   // Database connection

        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $entries = [];
        $total_entries = 0;
        $total_words = 0;
        $first_entry_date = '--';
        $last_entry_date = '--';

        try {
            // Fetch all entries for the logged-in user
            $q_entries = "SELECT id, title, content, coordinates, tags, word_count, character_count, created_at, updated_at FROM journal_entries WHERE user_id = :user_id ORDER BY created_at DESC";
            $stmt_entries = $conn->prepare($q_entries);
            $stmt_entries->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt_entries->execute();
            $entries = $stmt_entries->fetchAll(PDO::FETCH_ASSOC);

            // Calculate statistics
            $total_entries = count($entries);
            foreach ($entries as $entry) {
                $total_words += $entry['word_count'];
            }

            if ($total_entries > 0) {
                // Sort to find first and last entry dates
                // Need to re-fetch or clone $entries because usort modifies the array in-place
                $entries_for_dates = $entries; 
                usort($entries_for_dates, function($a, $b) {
                    return strtotime($a['created_at']) - strtotime($b['created_at']);
                });
                $first_entry_date = date('M d, Y', strtotime($entries_for_dates[0]['created_at']));

                // Reset sort for last entry if needed, or get from already sorted
                usort($entries_for_dates, function($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']); // Sort descending for last entry
                });
                $last_entry_date = date('M d, Y', strtotime($entries_for_dates[0]['created_at']));
            }


        } catch (PDOException $e) {
            error_log("Error fetching journal entries: " . $e->getMessage());
            $_SESSION['error_message'] = 'Failed to load journal entries.';
        }
    ?>
    <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert success-message">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }
        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert error-message">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
    ?>
    <!-- Background -->
    <div class="background-image"></div>
    <div class="overlay"></div>
    
    <!-- Header with Navigation -->
    <header class="minecraft-header">
        <div class="container">
            <div class="logo">
                <div class="logo-img">
                    <div class="logo-block grass"></div>
                    <div class="logo-block diamond"></div>
                    <div class="logo-block book"></div>
                </div>
                <h1 class="pixel-text">All Journal Entries</h1>
            </div>
            <nav class="pixel-nav">
                <ul>
                    <li><a href="index.php" class="pixel-button"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.php" class="pixel-button"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="journal.php" class="pixel-button"><i class="fas fa-book"></i> Journal</a></li>
                    <li><a href="entries.php" class="pixel-button active"><i class="fas fa-archive"></i> All Entries</a></li>
                    <li><a href="logout.php" class="pixel-button logout-btn" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="scrollable-content">
        <div class="container">
            <!-- Header Section -->
            <section class="entries-header">
                <h2 class="pixel-text welcome-title">All Your Minecraft Adventures 📚</h2>
                <p class="pixel-text welcome-subtitle">Every story you've saved in your journal</p>
            </section>

            <!-- Statistics -->
            <section class="entries-stats">
                <div class="stat-item">
                    <div class="stat-number"><?= $total_entries ?></div>
                    <div class="stat-label">Total Entries</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?= $total_words ?></div>
                    <div class="stat-label">Total Words</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?= $first_entry_date ?></div>
                    <div class="stat-label">First Entry</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?= $last_entry_date ?></div>
                    <div class="stat-label">Last Entry</div>
                </div>
            </section>

            <!-- Entries Container -->
            <section class="entries-container" id="entriesContainer">
                <?php if (empty($entries)): ?>
                    <div class="no-entries">
                        <i class="fas fa-book-open"></i>
                        <h3>No Entries Yet</h3>
                        <p>You haven't saved any journal entries yet. Start writing your first adventure!</p>
                        <a href="journal.php" class="pixel-button large-button">
                            <i class="fas fa-plus-circle"></i> Write Your First Entry
                        </a>
                    </div>
                <?php else: ?>
                    <?php foreach ($entries as $entry): ?>
                        <article class="entry-item" id="entry-<?= $entry['id'] ?>">
                            <div class="entry-header">
                                <h2 class="entry-title"><?= htmlspecialchars($entry['title']) ?></h2>
                                <div class="entry-meta">
                                    <span><i class="fas fa-calendar"></i> <?= date('F j, Y, g:i a', strtotime($entry['created_at'])) ?></span>
                                    <span><i class="fas fa-font"></i> <?= $entry['word_count'] ?> words</span>
                                    <span><i class="fas fa-keyboard"></i> <?= $entry['character_count'] ?> characters</span>
                                </div>
                            </div>
                            <div class="entry-content">
                                <?= nl2br(htmlspecialchars($entry['content'])) ?>
                            </div>
                            <div class="entry-footer">
                                <div>
                                    <?php if (!empty($entry['coordinates'])): ?>
                                        <div class="entry-coordinates"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($entry['coordinates']) ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($entry['tags'])): ?>
                                        <div class="entry-tags"><i class="fas fa-tag"></i> <?= htmlspecialchars($entry['tags']) ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="entry-actions">
                                    <a href="journal.php?edit=<?= $entry['id'] ?>" class="action-btn">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="action-btn delete" onclick="confirmDelete(<?= $entry['id'] ?>)">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>

            <!-- Back to Journal -->
            <section class="back-to-journal">
                <a href="journal.php" class="pixel-button large-button">
                    <i class="fas fa-plus-circle"></i> Write New Entry
                </a>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="minecraft-footer">
        <div class="container">
            <p class="pixel-text">Minecraft Journal &copy; <?= date('Y') ?> - Your Story Archive</p>
            <div class="footer-links">
                <a href="index.php" class="pixel-text link"><i class="fas fa-home"></i> Home</a>
                <a href="journal.php" class="pixel-text link"><i class="fas fa-plus-circle"></i> New Entry</a>
                <a href="#" class="pixel-text link" id="exportAllBtn"><i class="fas fa-download"></i> Export All</a>
            </div>
        </div>
    </footer>
    <script>
        function confirmDelete(entryId) {
            if (confirm('Are you sure you want to delete this entry? This cannot be undone.')) {
                window.location.href = 'delete_entry.php?id=' + entryId;
            }
        }
    </script>
</body>
</html>