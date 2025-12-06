<?php
require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft Journal - Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
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
                <h1 class="pixel-text">Minecraft Journal</h1>
            </div>
            <nav class="pixel-nav">
                <ul>
                    <li><a href="index.php" class="pixel-button active"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.php" class="pixel-button"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="#features" class="pixel-button"><i class="fas fa-star"></i> Features</a></li>
                    <li><a href="signup.php" class="pixel-button signup-btn"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                    <li><a href="login.php" class="pixel-button login-btn"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="scrollable-content">
        <div class="container">
            <!-- Hero Section -->
            <section class="hero-section" id="home">
                <div class="hero-content">
                    <h2 class="pixel-text hero-title">Document Your Blocky Adventures</h2>
                    <p class="pixel-text hero-subtitle">A digital journal for all your building, exploring, and crafting stories in the Minecraft universe</p>
                    <a href="<?php echo isset($_SESSION['user_id']) ? 'journal.php' : 'login.php'; ?>" class="pixel-button large-button"><i class="fas fa-book"></i> Start Journaling</a>
                    <a href="about.php" class="pixel-button large-button secondary-btn"><i class="fas fa-users"></i> Meet the Creators</a>
                </div>
                <div class="hero-image">
                    <div class="minecraft-scene">
                        <div class="scene-block grass"></div>
                        <div class="scene-block tree"></div>
                        <div class="scene-block character"></div>
                        <div class="scene-block chest"></div>
                    </div>
                </div>
            </section>



            <!-- Features Section -->
            <section class="features-section" id="features">
                <h2 class="pixel-text section-title"><i class="fas fa-cogs"></i> Journal Features</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3 class="pixel-text">Screenshot Gallery</h3>
                        <p>Upload and organize screenshots of your builds and adventures with date and location tags.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3 class="pixel-text">Adventure Logs</h3>
                        <p>Record your exploration journeys with coordinates, biomes visited, and discoveries made.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-hard-hat"></i>
                        </div>
                        <h3 class="pixel-text">Build Plans</h3>
                        <p>Plan your next mega-build with materials calculator, blueprints, and progress tracking.</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="pixel-text">Multiplayer Stories</h3>
                        <p>Document your server adventures with friends, community events, and shared achievements.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="minecraft-footer">
        <div class="container">
            <p class="pixel-text">Minecraft Journal &copy; 2023 - Document Your Adventures</p>
            <div class="footer-links">
                <a href="#" class="pixel-text link"><i class="fas fa-shield-alt"></i> Privacy</a>
                <a href="#" class="pixel-text link"><i class="fas fa-file-contract"></i> Terms</a>
                <a href="about.php" class="pixel-text link"><i class="fas fa-info-circle"></i> About Us</a>
                <a href="#" class="pixel-text link"><i class="fas fa-envelope"></i> Contact</a>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links - REMOVED SMOOTH SCROLLING
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    // INSTANT scroll, no animation
                    window.scrollTo(0, targetElement.offsetTop - 80);
                    
                    document.querySelectorAll('.pixel-nav a').forEach(link => {
                        link.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });
                
    </script>
</body>
</html>