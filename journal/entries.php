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
                    <li><a href="index.html" class="pixel-button"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.html" class="pixel-button"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="journal.html" class="pixel-button"><i class="fas fa-book"></i> Journal</a></li>
                    <li><a href="entries.html" class="pixel-button active"><i class="fas fa-archive"></i> All Entries</a></li>
                    <li><a href="#" class="pixel-button logout-btn" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
                    <div class="stat-number" id="totalEntries">0</div>
                    <div class="stat-label">Total Entries</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="totalWords">0</div>
                    <div class="stat-label">Total Words</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="firstEntry">--</div>
                    <div class="stat-label">First Entry</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="lastEntry">--</div>
                    <div class="stat-label">Last Entry</div>
                </div>
            </section>

            <!-- Entries Container -->
            <section class="entries-container" id="entriesContainer">
                <!-- Entries will be loaded here by JavaScript -->
            </section>

            <!-- Back to Journal -->
            <section class="back-to-journal">
                <a href="journal.html" class="pixel-button large-button">
                    <i class="fas fa-plus-circle"></i> Write New Entry
                </a>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="minecraft-footer">
        <div class="container">
            <p class="pixel-text">Minecraft Journal &copy; 2023 - Your Story Archive</p>
            <div class="footer-links">
                <a href="index.html" class="pixel-text link"><i class="fas fa-home"></i> Home</a>
                <a href="journal.html" class="pixel-text link"><i class="fas fa-plus-circle"></i> New Entry</a>
                <a href="#" class="pixel-text link" id="exportAllBtn"><i class="fas fa-download"></i> Export All</a>
            </div>
        </div>
    </footer>

    <!-- Toast Notification -->
    <div class="toast" id="toast"></div>

    <script>
        // Load and display all entries
        document.addEventListener('DOMContentLoaded', function() {
            loadAllEntries();
            setupEventListeners();
            
            // Check for hash to scroll to specific entry
            const hash = window.location.hash;
            if (hash) {
                setTimeout(() => {
                    const element = document.querySelector(hash);
                    if (element) {
                        element.scrollIntoView();
                        // Highlight the entry
                        element.style.animation = 'highlight 2s';
                    }
                }, 500);
            }
        });
        
        // Load all entries from localStorage
        function loadAllEntries() {
            const entries = JSON.parse(localStorage.getItem('minecraftJournalEntries') || '[]');
            const entriesContainer = document.getElementById('entriesContainer');
            
            // Update statistics
            updateStatistics(entries);
            
            if (entries.length === 0) {
                entriesContainer.innerHTML = `
                    <div class="no-entries">
                        <i class="fas fa-book-open"></i>
                        <h3>No Entries Yet</h3>
                        <p>You haven't saved any journal entries yet. Start writing your first adventure!</p>
                        <a href="journal.html" class="pixel-button large-button">
                            <i class="fas fa-plus-circle"></i> Write Your First Entry
                        </a>
                    </div>
                `;
                return;
            }
            
            let entriesHTML = '';
            
            entries.forEach(entry => {
                // Format date nicely
                const entryDate = new Date(entry.dateISO);
                const formattedDate = entryDate.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                entriesHTML += `
                    <article class="entry-item" id="entry-${entry.id}">
                        <div class="entry-header">
                            <h2 class="entry-title">${entry.title}</h2>
                            <div class="entry-meta">
                                <span><i class="fas fa-calendar"></i> ${formattedDate}</span>
                                <span><i class="fas fa-font"></i> ${entry.wordCount} words</span>
                                <span><i class="fas fa-keyboard"></i> ${entry.characterCount} characters</span>
                            </div>
                        </div>
                        <div class="entry-content">
                            ${entry.content}
                        </div>
                        <div class="entry-footer">
                            <div>
                                ${entry.coordinates ? `<div class="entry-coordinates"><i class="fas fa-map-marker-alt"></i> ${entry.coordinates}</div>` : ''}
                                ${entry.tags ? `<div class="entry-tags"><i class="fas fa-tag"></i> ${entry.tags}</div>` : ''}
                            </div>
                            <div class="entry-actions">
                                <button class="action-btn" onclick="editEntry(${entry.id})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="action-btn delete" onclick="deleteEntry(${entry.id})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </article>
                `;
            });
            
            entriesContainer.innerHTML = entriesHTML;
        }
        
        // Update statistics
        function updateStatistics(entries) {
            document.getElementById('totalEntries').textContent = entries.length;
            
            // Total words
            const totalWords = entries.reduce((sum, entry) => sum + parseInt(entry.wordCount || 0), 0);
            document.getElementById('totalWords').textContent = totalWords.toLocaleString();
            
            // First and last entry dates
            if (entries.length > 0) {
                const sortedEntries = [...entries].sort((a, b) => new Date(a.dateISO) - new Date(b.dateISO));
                const firstEntry = new Date(sortedEntries[0].dateISO);
                const lastEntry = new Date(sortedEntries[sortedEntries.length - 1].dateISO);
                
                document.getElementById('firstEntry').textContent = firstEntry.toLocaleDateString();
                document.getElementById('lastEntry').textContent = lastEntry.toLocaleDateString();
            }
        }
        
        // Edit entry (redirect to journal page with entry loaded)
        window.editEntry = function(id) {
            // Save the entry ID to localStorage
            localStorage.setItem('editEntryId', id);
            window.location.href = 'journal.html';
        };
        
        // Delete entry
        window.deleteEntry = function(id) {
            if (confirm('Are you sure you want to delete this entry? This cannot be undone.')) {
                // Remove from localStorage
                let entries = JSON.parse(localStorage.getItem('minecraftJournalEntries') || '[]');
                entries = entries.filter(entry => entry.id !== id);
                localStorage.setItem('minecraftJournalEntries', JSON.stringify(entries));
                
                // Reload entries
                loadAllEntries();
                
                showToast('Entry deleted successfully!', 'info');
            }
        };
        
        // Setup event listeners
        function setupEventListeners() {
            // Logout button
            document.getElementById('logoutBtn').addEventListener('click', function() {
                if (confirm('Are you sure you want to logout?')) {
                    window.location.href = 'index.html';
                }
            });
            
            // Export all button
            document.getElementById('exportAllBtn').addEventListener('click', function() {
                const entries = JSON.parse(localStorage.getItem('minecraftJournalEntries') || '[]');
                if (entries.length === 0) {
                    showToast('No entries to export', 'error');
                    return;
                }
                
                // Create HTML file content
                let htmlContent = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft Journal - All Entries</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1a1a1a;
            color: #f0f0f0;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #3a7d34;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #5cdb5c;
            font-family: 'Courier New', monospace;
        }
        .export-info {
            background-color: #2a2a2a;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-size: 0.9rem;
            color: #888;
        }
        .entry {
            background-color: #2a2a2a;
            border-left: 4px solid #5cdb5c;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        .entry-header {
            margin-bottom: 15px;
        }
        .entry-title {
            color: #5cdb5c;
            margin: 0 0 10px 0;
            font-size: 1.4rem;
        }
        .entry-meta {
            color: #888;
            font-size: 0.9rem;
            display: flex;
            gap: 20px;
        }
        .entry-content {
            line-height: 1.8;
            margin-bottom: 15px;
        }
        .entry-footer {
            display: flex;
            gap: 20px;
            font-size: 0.9rem;
            color: #666;
            padding-top: 15px;
            border-top: 1px solid #444;
        }
        .no-entries {
            text-align: center;
            padding: 50px 20px;
            color: #888;
        }
        @media print {
            body {
                background-color: white;
                color: black;
            }
            .entry {
                background-color: white;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Minecraft Journal - All Entries</h1>
        <p>Exported on ${new Date().toLocaleString()}</p>
    </div>
    
    <div class="export-info">
        <p><strong>Export Information:</strong> This file contains ${entries.length} journal entries. Total words: ${entries.reduce((sum, entry) => sum + parseInt(entry.wordCount || 0), 0).toLocaleString()}</p>
    </div>
`;
                
                // Add each entry
                entries.forEach(entry => {
                    htmlContent += `
    <div class="entry" id="entry-${entry.id}">
        <div class="entry-header">
            <h2 class="entry-title">${entry.title}</h2>
            <div class="entry-meta">
                <span><i class="fas fa-calendar"></i> ${entry.date}</span>
                <span><i class="fas fa-font"></i> ${entry.wordCount} words</span>
            </div>
        </div>
        <div class="entry-content">
            ${entry.content}
        </div>
        <div class="entry-footer">
            ${entry.coordinates ? `<span><i class="fas fa-map-marker-alt"></i> ${entry.coordinates}</span>` : ''}
            ${entry.tags ? `<span><i class="fas fa-tag"></i> ${entry.tags}</span>` : ''}
        </div>
    </div>
`;
                });
                
                htmlContent += `
    <div class="export-info">
        <p>End of entries. Total: ${entries.length} entries exported.</p>
    </div>
</body>
</html>`;
                
                // Create download link
                const blob = new Blob([htmlContent], { type: 'text/html' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `minecraft-journal-all-entries-${new Date().toISOString().split('T')[0]}.html`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
                
                showToast('All entries exported to HTML file!', 'success');
            });
        }
        
        // Toast notification function
        function showToast(message, type = 'info') {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = 'toast show ' + type;
            
            setTimeout(() => {
                toast.className = 'toast';
            }, 3000);
        }
    </script>
</body>
</html>