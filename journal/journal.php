<?php
require_once 'check_session.php'; // Ensures user is logged in
require_once '../db/config.php';   // Database connection

$user_id = $_SESSION['user_id'];
$edit_entry = null;
$edit_mode = false;

// Check if an entry ID is provided for editing
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $entry_id = filter_var($_GET['edit'], FILTER_VALIDATE_INT);

    if ($entry_id === false) {
        $_SESSION['error_message'] = 'Invalid entry ID for editing.';
        header('Location: journal.php');
        exit();
    }

    try {
        $q = "SELECT id, title, content, coordinates, tags FROM journal_entries WHERE id = :entry_id AND user_id = :user_id";
        $stmt = $conn->prepare($q);
        $stmt->bindParam(':entry_id', $entry_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $edit_entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($edit_entry) {
            $edit_mode = true;
        } else {
            $_SESSION['error_message'] = 'Entry not found or you do not have permission to edit it.';
            header('Location: journal.php');
            exit();
        }
    } catch (PDOException $e) {
        error_log("Error fetching entry for editing: " . $e->getMessage());
        $_SESSION['error_message'] = 'An error occurred while loading the entry for editing.';
        header('Location: journal.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Minecraft Journal</title>
    <link rel="stylesheet" href="journal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* Alert Messages */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            text-align: center;
            color: white;
            border-width: 3px;
            border-style: solid;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .success-message {
            background-color: rgba(92, 219, 92, 0.2);
            border-color: #5cdb5c;
        }

        .error-message {
            background-color: rgba(255, 77, 77, 0.2);
            border-color: #ff4d4d;
        }
    </style>
</head>
<body>
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
                <h1 class="pixel-text">My Minecraft Journal</h1>
            </div>
            <nav class="pixel-nav">
                <ul>
                    <li><a href="index.php" class="pixel-button"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.php" class="pixel-button"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="journal.php" class="pixel-button active"><i class="fas fa-book"></i> Journal</a></li>
                    <li><a href="entries.php" class="pixel-button"><i class="fas fa-archive"></i> All Entries</a></li>
                    <li><a href="logout.php" class="pixel-button logout-btn" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="scrollable-content">
        <div class="container">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <div class="welcome-content">
                    <h2 class="pixel-text welcome-title">Welcome to Your Journal! 📖</h2>
                    <p class="pixel-text welcome-subtitle">Document your Minecraft adventures and discoveries</p>
                    <div class="current-date">
                        <i class="fas fa-calendar-day"></i>
                        <span id="currentDate"><?= date('l, F j, Y') ?></span>
                    </div>
                </div>
            </section>

            <!-- Main Journal Writing Area -->
            <section class="journal-section">
                <div class="section-header">
                    <h2 class="pixel-text section-title"><i class="fas fa-edit"></i> <?= $edit_mode ? 'Edit Entry' : 'New Entry' ?></h2>
                    <div class="entry-controls">
                        <button type="submit" form="journalEntryForm" class="pixel-button save-btn" id="saveEntryBtn">
                            <i class="fas fa-save"></i> <?= $edit_mode ? 'Update Entry' : 'Save Entry' ?>
                        </button>
                        <a href="journal.php" class="pixel-button clear-btn" id="clearEntryBtn">
                            <i class="fas fa-plus"></i> New
                        </a>
                    </div>
                </div>
                
                <!-- Big Writing Space -->
                <form action="save_entry.php" method="POST" id="journalEntryForm">
                    <?php if ($edit_mode): ?>
                        <input type="hidden" name="entry_id" value="<?= $edit_entry['id'] ?>">
                    <?php endif; ?>
                    <div class="writing-space-container">
                        <div class="writing-header">
                            <input type="text" class="entry-title" id="entryTitle" name="title" placeholder="Entry Title (e.g., 'Found Diamonds!', 'Built a Castle')" maxlength="60" value="<?= $edit_mode ? htmlspecialchars($edit_entry['title']) : '' ?>">
                            <div class="entry-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="text" class="coordinate-input" id="coordinates" name="coordinates" placeholder="Coordinates (e.g., X: 100, Y: 64, Z: -200)" value="<?= $edit_mode ? htmlspecialchars($edit_entry['coordinates']) : '' ?>">
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-tag"></i>
                                    <input type="text" class="tags-input" id="entryTags" name="tags" placeholder="Tags (e.g., mining, building, adventure)" value="<?= $edit_mode ? htmlspecialchars($edit_entry['tags']) : '' ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="writing-area" id="writingArea">
                            <textarea name="content" class="pixel-textarea" placeholder="Start writing about your Minecraft adventure here..."><?= $edit_mode ? htmlspecialchars($edit_entry['content']) : '' ?></textarea>
                        </div>
                        
                        <!-- Word and character counts are handled server-side in save_entry.php -->
                        <div class="writing-footer">
                            <div class="word-count">
                                <i class="fas fa-font"></i>
                                <span>Word and character counts will be calculated upon saving.</span>
                            </div>
                        </div>
                    </div>
                </form>
                
                <!-- Saved Entries Preview - No longer handled by JS here -->
                <div class="saved-entries">
                    <h3 class="pixel-text"><i class="fas fa-history"></i> Recent Entries</h3>
                    <div class="entries-list" id="entriesList">
                        <div class="empty-state">
                            <i class="fas fa-book-open"></i>
                            <p>No saved entries yet. Write your first entry above!</p>
                        </div>
                    </div>
                    <div class="view-all-container">
                        <a href="entries.php" class="pixel-button view-all-btn">
                            <i class="fas fa-archive"></i> View All Saved Entries
                        </a>
                    </div>
                </div>
            </section>

            <!-- Bible Verses Section -->
            <section class="verses-section">
                <div class="section-header">
                    <h2 class="pixel-text section-title"><i class="fas fa-bible"></i> Daily Inspiration</h2>
                    <button class="pixel-button refresh-btn" id="refreshVersesBtn">
                        <i class="fas fa-sync-alt"></i> New Verses
                    </button>
                </div>
                
                <div class="verses-container">
                    <!-- Verse Card 1 -->
                    <div class="verse-card">
                        <div class="verse-reference">
                            <i class="fas fa-bookmark"></i>
                            <span>Philippians 4:13</span>
                        </div>
                        <div class="verse-text">
                            "I can do all things through Christ who strengthens me."
                        </div>
                        <div class="verse-reflection">
                            <strong>Minecraft Connection:</strong> Remember this when facing tough challenges in your world!
                        </div>
                    </div>
                    
                    <!-- Verse Card 2 -->
                    <div class="verse-card">
                        <div class="verse-reference">
                            <i class="fas fa-bookmark"></i>
                            <span>Joshua 1:9</span>
                        </div>
                        <div class="verse-text">
                            "Have I not commanded you? Be strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you wherever you go."
                        </div>
                        <div class="verse-reflection">
                            <strong>Minecraft Connection:</strong> Perfect for exploring new biomes or fighting tough mobs!
                        </div>
                    </div>
                    
                    <!-- Verse Card 3 -->
                    <div class="verse-card">
                        <div class="verse-reference">
                            <i class="fas fa-bookmark"></i>
                            <span>Proverbs 3:5-6</span>
                        </div>
                        <div class="verse-text">
                            "Trust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to him, and he will make your paths straight."
                        </div>
                        <div class="verse-reflection">
                            <strong>Minecraft Connection:</strong> When you're lost in a cave maze, remember Who guides your path.
                        </div>
                    </div>
                    
                    <!-- Verse Card 4 -->
                    <div class="verse-card">
                        <div class="verse-reference">
                            <i class="fas fa-bookmark"></i>
                            <span>Colossians 3:23</span>
                        </div>
                        <div class="verse-text">
                            "Whatever you do, work at it with all your heart, as working for the Lord, not for human masters."
                        </div>
                        <div class="verse-reflection">
                            <strong>Minecraft Connection:</strong> Build and create with excellence, as unto God!
                        </div>
                    </div>
                    
                    <!-- Verse Card 5 -->
                    <div class="verse-card">
                        <div class="verse-reference">
                            <i class="fas fa-bookmark"></i>
                            <span>Psalm 118:24</span>
                        </div>
                        <div class="verse-text">
                            "This is the day that the Lord has made; let us rejoice and be glad in it."
                        </div>
                        <div class="verse-reflection">
                            <strong>Minecraft Connection:</strong> Each new day in your world is a gift - enjoy your adventure!
                        </div>
                    </div>
                    
                    <!-- Verse Card 6 -->
                    <div class="verse-card">
                        <div class="verse-reference">
                            <i class="fas fa-bookmark"></i>
                            <span>Matthew 6:33</span>
                        </div>
                        <div class="verse-text">
                            "But seek first his kingdom and his righteousness, and all these things will be given to you as well."
                        </div>
                        <div class="verse-reflection">
                            <strong>Minecraft Connection:</strong> Keep your priorities straight while enjoying your virtual adventures.
                        </div>
                    </div>
                </div>
            </section>

            <!-- Quick Tools Section -->
            <section class="tools-section">
                <h2 class="pixel-text section-title"><i class="fas fa-tools"></i> Quick Tools</h2>
                <div class="tools-grid">
                    <div class="tool-card" id="exportBtn">
                        <div class="tool-icon">
                            <i class="fas fa-file-export"></i>
                        </div>
                        <h3>Export to HTML</h3>
                        <p>Save all entries to HTML file</p>
                    </div>
                    
                    <div class="tool-card" id="printBtn">
                        <div class="tool-icon">
                            <i class="fas fa-print"></i>
                        </div>
                        <h3>Print Entry</h3>
                        <p>Print current entry</p>
                    </div>
                    
                    <div class="tool-card" id="screenshotBtn">
                        <div class="tool-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3>Add Screenshot</h3>
                        <p>Upload Minecraft screenshots</p>
                    </div>
                    
                    <div class="tool-card" id="backupBtn">
                        <div class="tool-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <h3>Backup Data</h3>
                        <p>Backup all journal data</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="minecraft-footer">
        <div class="container">
            <p class="pixel-text">Minecraft Journal &copy; 2023 - Your Adventure Story</p>
            <div class="footer-links">
                <a href="index.php" class="pixel-text link"><i class="fas fa-home"></i> Home</a>
                <a href="about.php" class="pixel-text link"><i class="fas fa-info-circle"></i> About</a>
                <a href="#" class="pixel-text link" id="helpBtn"><i class="fas fa-question-circle"></i> Help</a>
            </div>
        </div>
    </footer>
</body>
</html>