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
                    <li><a href="signip.php" class="pixel-button login-btn"><i class="fas fa-sign-in-alt"></i> Login</a></li>
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
                    <a href="#login" class="pixel-button large-button"><i class="fas fa-book"></i> Start Journaling</a>
                    <a href="about.html" class="pixel-button large-button secondary-btn"><i class="fas fa-users"></i> Meet the Creators</a>
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

            <!-- Login Form Section -->
            <section class="login-section" id="login">
                <div class="login-container">
                    <h2 class="pixel-text section-title"><i class="fas fa-key"></i> Access Your Journal</h2>
                    <p class="section-subtitle">Log in to continue your adventure</p>
                    
                    <!-- Security Notice -->
                    <div class="security-notice">
                        <i class="fas fa-shield-alt"></i>
                        <span class="pixel-text">For your security, login information is never saved</span>
                    </div>
                    
                    <form class="login-form" id="loginForm" autocomplete="off" novalidate>
                        <div class="form-group">
                            <label for="username" class="pixel-text"><i class="fas fa-user"></i> Minecraft Username</label>
                            <input type="text" 
                                   id="username" 
                                   name="username" 
                                   class="pixel-input" 
                                   placeholder="Enter your username" 
                                   required
                                   autocomplete="off"
                                   autocorrect="off"
                                   autocapitalize="off"
                                   spellcheck="false"
                                   maxlength="20">
                            <div class="input-hint">Username is case-sensitive</div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="pixel-text"><i class="fas fa-lock"></i> Password</label>
                            <div class="password-container">
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="pixel-input password-input" 
                                       placeholder="Enter your password" 
                                       required
                                       autocomplete="new-password"
                                       maxlength="30">
                                <button type="button" class="show-password-btn" id="showPasswordBtn" aria-label="Show password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="input-hint">Must be at least 8 characters</div>
                        </div>
                        
                        <div class="form-options">
                            <div class="session-info">
                                <i class="fas fa-info-circle"></i>
                                <span class="pixel-text">Session ends when you close the browser</span>
                            </div>
                            <a href="#" class="pixel-text link" id="resetFormBtn">Clear Form</a>
                        </div>
                        
                        <button type="submit" class="pixel-button submit-btn" id="loginSubmitBtn">
                            <i class="fas fa-sign-in-alt"></i> Login to Journal
                        </button>
                        
                        <div class="form-footer">
                            <p class="pixel-text">New adventurer? <a href="signup.html" class="link">Create an account</a></p>
                            <p class="pixel-text small-note"><i class="fas fa-exclamation-triangle"></i> This is a demo site. No actual accounts are created.</p>
                        </div>
                    </form>
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
                <a href="about.html" class="pixel-text link"><i class="fas fa-info-circle"></i> About Us</a>
                <a href="#" class="pixel-text link"><i class="fas fa-envelope"></i> Contact</a>
            </div>
        </div>
    </footer>

    <script>
        
        // Form submission handler - INSTANT
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            if(username && password) {
                // INSTANT: No loading state, immediate action
                alert(`Welcome back, ${username}! Loading your journal entries...\n\nNote: This is a demo. No actual login occurred.`);
                
                // INSTANT: Clear the form immediately
                document.getElementById('username').value = '';
                document.getElementById('password').value = '';
                
                // INSTANT: Update login button immediately
                const loginBtn = document.querySelector('.login-btn');
                loginBtn.innerHTML = '<i class="fas fa-user-check"></i> Logged In';
                loginBtn.classList.add('logged-in');
                
                // Reset header login button after 3 seconds (no animation)
                setTimeout(() => {
                    loginBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Login';
                    loginBtn.classList.remove('logged-in');
                }, 3000);
            } else {
                alert('Please enter both username and password!');
            }
        });
        
        // Show/Hide Password Toggle - INSTANT
        const showPasswordBtn = document.getElementById('showPasswordBtn');
        const passwordInput = document.getElementById('password');
        
        showPasswordBtn.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        // Clear Form Button - INSTANT
        document.getElementById('resetFormBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            passwordInput.setAttribute('type', 'password');
            showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
            document.getElementById('username').focus();
        });
        
        // Clear form when page loads or refreshes - INSTANT
        window.addEventListener('load', function() {
            // Clear any saved form data
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            
            // Ensure password field is hidden
            passwordInput.setAttribute('type', 'password');
            showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
        });
        
        // Clear form when page is about to be unloaded - INSTANT
        window.addEventListener('beforeunload', function() {
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
        });
        
        // Clear form when navigating away via anchor links - INSTANT
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function() {
                document.getElementById('username').value = '';
                document.getElementById('password').value = '';
            });
        });
        
        // Clear form when clicking on navigation links - INSTANT
        document.querySelectorAll('.pixel-nav a').forEach(link => {
            link.addEventListener('click', function() {
                if(!this.href.includes('#login')) {
                    document.getElementById('username').value = '';
                    document.getElementById('password').value = '';
                }
            });
        });
        
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
        
        // Additional security: Clear form on page visibility change - INSTANT
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                document.getElementById('password').value = '';
            }
        });
        
        // Clear form when user presses Escape key - INSTANT
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('username').value = '';
                document.getElementById('password').value = '';
            }
        });
        <!-- In index.html, update the login form submission handler -->
    // Form submission handler - INSTANT
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        if(username && password) {
            // INSTANT: Redirect to journal page
            window.location.href = 'journal.html';
        } else {
            alert('Please enter both username and password!');
        }
    });        
    </script>
</body>
</html>