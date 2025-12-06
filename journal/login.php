<?php
require_once 'session.php';
require_once '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = 'Please enter both username and password.';
        header('Location: login.php');
        exit();
    }

    $q = "SELECT id, username, password_hash FROM users WHERE username = :username";
    $stmt = $conn->prepare($q);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['success_message'] = 'Login successful! Welcome, ' . $user['username'] . '.';
        header('Location: journal.php'); // Redirect to the main journal page
        exit();
    } else {
        $_SESSION['error_message'] = 'Invalid username or password.';
        header('Location: login.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Minecraft Journal</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        .login-page .background-image {
            background-image: url('https://images.unsplash.com/photo-1531315630201-bb15abeb1653?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .login-section {
            background-color: rgba(20, 20, 20, 0.95);
            border: 8px solid #4EE2EC;
            padding: 40px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 10px 10px 0 rgba(0, 0, 0, 0.5);
            max-width: 800px;
            color: #E0E0E0;
        }
        
        .login-container {
            max-width: 600px;
            margin: 0 auto;
        }

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
<body class="login-page">
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
                <h1 class="pixel-text">Minecraft Journal</h1>
            </div>
            <nav class="pixel-nav">
                <ul>
                    <li><a href="index.php" class="pixel-button"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.php" class="pixel-button"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="index.php#features" class="pixel-button"><i class="fas fa-star"></i> Features</a></li>
                    <li><a href="signup.php" class="pixel-button signup-btn"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                    <li><a href="login.php" class="pixel-button login-btn active"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="scrollable-content">
        <div class="container">
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
                    
                    <form class="login-form" id="loginForm" method="POST" autocomplete="off" novalidate>
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
                                       autocomplete="current-password"
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
                            <p class="pixel-text">New adventurer? <a href="signup.php" class="link">Create an account</a></p>
                            <p class="pixel-text small-note"><i class="fas fa-exclamation-triangle"></i> This is a demo site. No actual accounts are created.</p>
                        </div>
                    </form>
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
        // Show/Hide Password Toggle
        const showPasswordBtn = document.getElementById('showPasswordBtn');
        const passwordInput = document.getElementById('password');
        
        showPasswordBtn.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        // Clear Form Button
        document.getElementById('resetFormBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            passwordInput.setAttribute('type', 'password');
            showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
            document.getElementById('username').focus();
        });
        
        // Clear form when page loads or refreshes
        window.addEventListener('load', function() {
            // Clear any saved form data
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            
            // Ensure password field is hidden
            passwordInput.setAttribute('type', 'password');
            showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
        });
        
        // Clear form when page is about to be unloaded
        window.addEventListener('beforeunload', function() {
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
        });
        
        // Additional security: Clear form on page visibility change
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                document.getElementById('password').value = '';
            }
        });
        
        // Clear form when user presses Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('username').value = '';
                document.getElementById('password').value = '';
            }
        });
    </script>
</body>
</html>