<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Minecraft Journal</title>
    <link rel="stylesheet" href="journal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
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
                    <li><a href="index.html" class="pixel-button"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.html" class="pixel-button"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="journal.html" class="pixel-button active"><i class="fas fa-book"></i> Journal</a></li>
                    <li><a href="entries.html" class="pixel-button"><i class="fas fa-archive"></i> All Entries</a></li>
                    <li><a href="#" class="pixel-button logout-btn" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
                        <span id="currentDate"></span>
                    </div>
                </div>
            </section>

            <!-- Main Journal Writing Area -->
            <section class="journal-section">
                <div class="section-header">
                    <h2 class="pixel-text section-title"><i class="fas fa-edit"></i> Today's Entry</h2>
                    <div class="entry-controls">
                        <button class="pixel-button save-btn" id="saveEntryBtn">
                            <i class="fas fa-save"></i> Save Entry
                        </button>
                        <button class="pixel-button clear-btn" id="clearEntryBtn">
                            <i class="fas fa-trash"></i> Clear
                        </button>
                    </div>
                </div>
                
                <!-- Big Writing Space -->
                <div class="writing-space-container">
                    <div class="writing-header">
                        <input type="text" class="entry-title" id="entryTitle" placeholder="Entry Title (e.g., 'Found Diamonds!', 'Built a Castle')" maxlength="60">
                        <div class="entry-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" class="coordinate-input" id="coordinates" placeholder="Coordinates (e.g., X: 100, Y: 64, Z: -200)">
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-tag"></i>
                                <input type="text" class="tags-input" id="entryTags" placeholder="Tags (e.g., mining, building, adventure)">
                            </div>
                        </div>
                    </div>
                    
                    <div class="writing-area" id="writingArea" contenteditable="true">
                        <div class="placeholder-text">
                            <p>Start writing about your Minecraft adventure here...</p>
                            <p>You can write about:</p>
                            <ul>
                                <li>What you built today</li>
                                <li>Resources you gathered</li>
                                <li>Mobs you encountered</li>
                                <li>Places you explored</li>
                                <li>Challenges you faced</li>
                                <li>Goals for next time</li>
                            </ul>
                            <p>Just start typing to begin your journal entry!</p>
                        </div>
                    </div>
                    
                    <div class="writing-footer">
                        <div class="word-count">
                            <i class="fas fa-font"></i>
                            <span id="wordCount">0</span> words
                        </div>
                        <div class="character-count">
                            <i class="fas fa-keyboard"></i>
                            <span id="characterCount">0</span> characters
                        </div>
                    </div>
                </div>
                
                <!-- Saved Entries Preview -->
                <div class="saved-entries">
                    <h3 class="pixel-text"><i class="fas fa-history"></i> Recent Entries</h3>
                    <div class="entries-list" id="entriesList">
                        <div class="empty-state">
                            <i class="fas fa-book-open"></i>
                            <p>No saved entries yet. Write your first entry above!</p>
                        </div>
                    </div>
                    <div class="view-all-container">
                        <a href="entries.html" class="pixel-button view-all-btn">
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
                <a href="index.html" class="pixel-text link"><i class="fas fa-home"></i> Home</a>
                <a href="about.html" class="pixel-text link"><i class="fas fa-info-circle"></i> About</a>
                <a href="#" class="pixel-text link" id="helpBtn"><i class="fas fa-question-circle"></i> Help</a>
            </div>
        </div>
    </footer>

    <!-- Toast Notification -->
    <div class="toast" id="toast"></div>

    <script>
        // Set current date
        document.addEventListener('DOMContentLoaded', function() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('currentDate').textContent = now.toLocaleDateString('en-US', options);
            
            // Load recent entries
            loadRecentEntries();
            
            // Update word count as user types
            document.getElementById('writingArea').addEventListener('input', updateCounts);
            
            // Initial count update
            updateCounts();
        });
        
        // Update word and character counts
        function updateCounts() {
            const writingArea = document.getElementById('writingArea');
            const text = writingArea.textContent || writingArea.innerText;
            
            // Remove placeholder text from count
            const cleanText = text.replace(/Start writing about your Minecraft adventure here\.\.\..*/g, '');
            
            // Count words (split by spaces, filter out empty strings)
            const words = cleanText.trim().split(/\s+/).filter(word => word.length > 0);
            document.getElementById('wordCount').textContent = words.length;
            
            // Count characters (excluding placeholder)
            document.getElementById('characterCount').textContent = cleanText.length;
        }
        
        // Save entry to entries.html
        document.getElementById('saveEntryBtn').addEventListener('click', function() {
            const title = document.getElementById('entryTitle').value.trim();
            const content = document.getElementById('writingArea').innerHTML;
            const textContent = document.getElementById('writingArea').textContent || document.getElementById('writingArea').innerText;
            const coordinates = document.getElementById('coordinates').value.trim();
            const tags = document.getElementById('entryTags').value.trim();
            const wordCount = document.getElementById('wordCount').textContent;
            const characterCount = document.getElementById('characterCount').textContent;
            
            if (!title || textContent.trim().length < 10) {
                showToast('Please add a title and write at least 10 characters for your entry!', 'error');
                return;
            }
            
            // Create entry object
            const entry = {
                id: Date.now(),
                title: title,
                content: content,
                textContent: textContent,
                coordinates: coordinates,
                tags: tags,
                date: new Date().toLocaleString(),
                dateISO: new Date().toISOString(),
                wordCount: wordCount,
                characterCount: characterCount
            };
            
            // Save to localStorage
            saveEntryToStorage(entry);
            
            // Save to entries.html (simulated by updating localStorage)
            updateEntriesHTML(entry);
            
            // Add to displayed list
            addEntryToList(entry);
            
            // Clear writing area
            clearWritingArea();
            
            showToast('Entry saved successfully! View it in All Entries page.', 'success');
        });
        
        // Clear entry
        document.getElementById('clearEntryBtn').addEventListener('click', function() {
            if (confirm('Are you sure you want to clear this entry? This cannot be undone.')) {
                clearWritingArea();
                showToast('Entry cleared', 'info');
            }
        });
        
        // Clear writing area
        function clearWritingArea() {
            document.getElementById('entryTitle').value = '';
            document.getElementById('writingArea').innerHTML = '<div class="placeholder-text"><p>Start writing about your Minecraft adventure here...</p></div>';
            document.getElementById('coordinates').value = '';
            document.getElementById('entryTags').value = '';
            updateCounts();
        }
        
        // Save entry to localStorage
        function saveEntryToStorage(entry) {
            let entries = JSON.parse(localStorage.getItem('minecraftJournalEntries') || '[]');
            entries.unshift(entry); // Add to beginning
            localStorage.setItem('minecraftJournalEntries', JSON.stringify(entries));
        }
        
        // Update entries.html data in localStorage
        function updateEntriesHTML(entry) {
            // Get current entries HTML data
            let entriesHTML = localStorage.getItem('minecraftJournalEntriesHTML') || '';
            
            // Create HTML for this entry
            const entryHTML = `
                <article class="entry-item" id="entry-${entry.id}">
                    <div class="entry-header">
                        <h3 class="entry-title">${entry.title}</h3>
                        <div class="entry-meta">
                            <span class="entry-date"><i class="fas fa-calendar"></i> ${entry.date}</span>
                            <span class="entry-stats"><i class="fas fa-font"></i> ${entry.wordCount} words</span>
                        </div>
                    </div>
                    <div class="entry-content">
                        ${entry.content}
                    </div>
                    <div class="entry-footer">
                        ${entry.coordinates ? `<div class="entry-coordinates"><i class="fas fa-map-marker-alt"></i> ${entry.coordinates}</div>` : ''}
                        ${entry.tags ? `<div class="entry-tags"><i class="fas fa-tag"></i> ${entry.tags}</div>` : ''}
                    </div>
                </article>
            `;
            
            // Add to the beginning of entries HTML
            entriesHTML = entryHTML + entriesHTML;
            localStorage.setItem('minecraftJournalEntriesHTML', entriesHTML);
            
            // Also save the entry data separately for the entries.html page
            let allEntriesData = JSON.parse(localStorage.getItem('entriesPageData') || '[]');
            allEntriesData.unshift(entry);
            localStorage.setItem('entriesPageData', JSON.stringify(allEntriesData));
        }
        
        // Load recent entries from localStorage
        function loadRecentEntries() {
            const entries = JSON.parse(localStorage.getItem('minecraftJournalEntries') || '[]');
            const entriesList = document.getElementById('entriesList');
            
            if (entries.length === 0) {
                return; // Keep empty state
            }
            
            // Remove empty state
            entriesList.innerHTML = '';
            
            // Display entries (limit to 3 most recent)
            entries.slice(0, 3).forEach(entry => {
                addEntryToList(entry);
            });
        }
        
        // Add entry to the displayed list
        function addEntryToList(entry) {
            const entriesList = document.getElementById('entriesList');
            
            // Remove empty state if it exists
            const emptyState = entriesList.querySelector('.empty-state');
            if (emptyState) {
                emptyState.remove();
            }
            
            const entryElement = document.createElement('div');
            entryElement.className = 'saved-entry';
            entryElement.innerHTML = `
                <div class="entry-header">
                    <h4>${entry.title}</h4>
                    <span class="entry-date">${entry.date}</span>
                </div>
                <div class="entry-preview">
                    ${entry.textContent.substring(0, 100)}${entry.textContent.length > 100 ? '...' : ''}
                </div>
                <div class="entry-footer">
                    <span class="entry-meta">
                        ${entry.coordinates ? `<i class="fas fa-map-marker-alt"></i> ${entry.coordinates}` : ''}
                        ${entry.tags ? `<i class="fas fa-tag"></i> ${entry.tags}` : ''}
                        <i class="fas fa-font"></i> ${entry.wordCount} words
                    </span>
                    <button class="entry-action" onclick="deleteEntry(${entry.id})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            
            // Add click to view entry
            entryElement.addEventListener('click', function(e) {
                if (!e.target.closest('.entry-action')) {
                    window.location.href = `entries.html#entry-${entry.id}`;
                }
            });
            
            entriesList.appendChild(entryElement);
        }
        
        // Delete entry
        window.deleteEntry = function(id) {
            if (confirm('Are you sure you want to delete this entry?')) {
                // Remove from localStorage
                let entries = JSON.parse(localStorage.getItem('minecraftJournalEntries') || '[]');
                entries = entries.filter(entry => entry.id !== id);
                localStorage.setItem('minecraftJournalEntries', JSON.stringify(entries));
                
                // Remove from entries HTML data
                removeEntryFromHTML(id);
                
                // Reload entries list
                document.getElementById('entriesList').innerHTML = '<div class="empty-state"><i class="fas fa-book-open"></i><p>No saved entries yet. Write your first entry above!</p></div>';
                loadRecentEntries();
                
                showToast('Entry deleted', 'info');
            }
        };
        
        // Remove entry from HTML data
        function removeEntryFromHTML(id) {
            // Get current entries HTML
            let entriesHTML = localStorage.getItem('minecraftJournalEntriesHTML') || '';
            
            // Create a temporary div to parse HTML
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = entriesHTML;
            
            // Find and remove the entry
            const entryElement = tempDiv.querySelector(`#entry-${id}`);
            if (entryElement) {
                entryElement.remove();
            }
            
            // Save updated HTML
            localStorage.setItem('minecraftJournalEntriesHTML', tempDiv.innerHTML);
            
            // Also remove from entries page data
            let entriesPageData = JSON.parse(localStorage.getItem('entriesPageData') || '[]');
            entriesPageData = entriesPageData.filter(entry => entry.id !== id);
            localStorage.setItem('entriesPageData', JSON.stringify(entriesPageData));
        }
        
        // Refresh Bible verses
        document.getElementById('refreshVersesBtn').addEventListener('click', function() {
            const verses = [
                {
                    reference: "Jeremiah 29:11",
                    text: "'For I know the plans I have for you,' declares the Lord, 'plans to prosper you and not to harm you, plans to give you hope and a future.'",
                    reflection: "God has a plan for your life, just like you plan your Minecraft builds!"
                },
                {
                    reference: "Isaiah 40:31",
                    text: "But those who hope in the Lord will renew their strength. They will soar on wings like eagles; they will run and not grow weary, they will walk and not be faint.",
                    reflection: "When you're tired from mining all day, remember this promise!"
                },
                {
                    reference: "Romans 8:28",
                    text: "And we know that in all things God works for the good of those who love him, who have been called according to his purpose.",
                    reflection: "Even when creepers blow up your builds, God can work it for good!"
                },
                {
                    reference: "Psalm 46:1",
                    text: "God is our refuge and strength, an ever-present help in trouble.",
                    reflection: "Your Minecraft shelter protects you, but God is your ultimate refuge!"
                },
                {
                    reference: "1 Corinthians 10:31",
                    text: "So whether you eat or drink or whatever you do, do it all for the glory of God.",
                    reflection: "Play Minecraft in a way that honors God!"
                },
                {
                    reference: "Psalm 119:105",
                    text: "Your word is a lamp for my feet, a light on my path.",
                    reflection: "Like torches light your way in caves, God's Word lights your life path!"
                }
            ];
            
            // Shuffle verses
            verses.sort(() => Math.random() - 0.5);
            
            // Update first 6 verse cards
            const verseCards = document.querySelectorAll('.verse-card');
            verseCards.forEach((card, index) => {
                if (verses[index]) {
                    const verse = verses[index];
                    card.querySelector('.verse-reference span').textContent = verse.reference;
                    card.querySelector('.verse-text').textContent = `"${verse.text}"`;
                    card.querySelector('.verse-reflection').innerHTML = `<strong>Minecraft Connection:</strong> ${verse.reflection}`;
                }
            });
            
            showToast('Bible verses refreshed!', 'success');
        });
        
        // Export to HTML file
        document.getElementById('exportBtn').addEventListener('click', function() {
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
            a.download = `minecraft-journal-entries-${new Date().toISOString().split('T')[0]}.html`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            showToast('Entries exported to HTML file!', 'success');
        });
        
        document.getElementById('printBtn').addEventListener('click', function() {
            const title = document.getElementById('entryTitle').value;
            const content = document.getElementById('writingArea').textContent;
            
            if (!title || content.trim().length < 10) {
                showToast('Write something first before printing!', 'error');
                return;
            }
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Minecraft Journal Entry</title>
                        <style>
                            body { font-family: Arial, sans-serif; padding: 20px; }
                            h1 { color: #3a7d34; }
                            .meta { color: #666; margin: 10px 0; }
                            .content { line-height: 1.6; margin-top: 20px; }
                        </style>
                    </head>
                    <body>
                        <h1>${title}</h1>
                        <div class="meta">
                            <strong>Date:</strong> ${new Date().toLocaleString()}<br>
                            <strong>Words:</strong> ${document.getElementById('wordCount').textContent}
                        </div>
                        <div class="content">
                            ${content.replace(/\n/g, '<br>')}
                        </div>
                    </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        });
        
        document.getElementById('screenshotBtn').addEventListener('click', function() {
            showToast('Screenshot upload feature coming soon!', 'info');
        });
        
        document.getElementById('backupBtn').addEventListener('click', function() {
            const entries = JSON.parse(localStorage.getItem('minecraftJournalEntries') || '[]');
            if (entries.length === 0) {
                showToast('No entries to backup', 'error');
                return;
            }
            
            // Create backup file
            const backupData = {
                version: '1.0',
                exportDate: new Date().toISOString(),
                entryCount: entries.length,
                entries: entries
            };
            
            const blob = new Blob([JSON.stringify(backupData, null, 2)], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `minecraft-journal-backup-${new Date().toISOString().split('T')[0]}.json`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            showToast('Backup created successfully!', 'success');
        });
        
        // Logout button
        document.getElementById('logoutBtn').addEventListener('click', function() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = 'index.html';
            }
        });
        
        // Help button
        document.getElementById('helpBtn').addEventListener('click', function() {
            alert('JOURNAL HELP:\n\n1. Write your entry in the big text area\n2. Add a title, coordinates, and tags\n3. Click "Save Entry" to save to All Entries page\n4. View saved entries below\n5. Click "View All Saved Entries" to see all entries\n6. Use "Export to HTML" to download all entries as HTML file\n7. Get inspiration from Bible verses');
        });
        
        // Toast notification function
        function showToast(message, type = 'info') {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = 'toast show ' + type;
            
            setTimeout(() => {
                toast.className = 'toast';
            }, 3000);
        }
        
        // Auto-save draft every 30 seconds
        setInterval(function() {
            const title = document.getElementById('entryTitle').value;
            const content = document.getElementById('writingArea').innerHTML;
            const textContent = document.getElementById('writingArea').textContent;
            
            if (textContent.trim().length > 0 && textContent !== 'Start writing about your Minecraft adventure here...') {
                localStorage.setItem('journalDraft', JSON.stringify({
                    title: title,
                    content: content,
                    timestamp: new Date().toLocaleTimeString()
                }));
            }
        }, 30000);
        
        // Load draft on page load
        window.addEventListener('load', function() {
            const draft = localStorage.getItem('journalDraft');
            if (draft) {
                const draftData = JSON.parse(draft);
                if (confirm(`Load unsaved draft from ${draftData.timestamp}?`)) {
                    document.getElementById('entryTitle').value = draftData.title || '';
                    document.getElementById('writingArea').innerHTML = draftData.content;
                    updateCounts();
                }
            }
        });
    </script>
</body>
</html>