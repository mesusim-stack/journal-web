<?php
    require_once '../config/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $q = <<<SQL
            INSERT INTO users (username, password_hash, email, date_of_birth, created_at) 
            VALUES (:username, :password, :email, :birthdate, NOW()) SQL
        ;

        $stmt = $conn->prepare($q);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->execute();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Minecraft Journal</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        /* Additional styles for signup page - NO ANIMATIONS */
        .signup-page .background-image {
            background-image: url('https://images.unsplash.com/photo-1531315630201-bb15abeb1653?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .signup-section {
            background-color: rgba(20, 20, 20, 0.95);
            border: 8px solid #4EE2EC;
            padding: 40px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 10px 10px 0 rgba(0, 0, 0, 0.5);
            max-width: 800px;
        }
        
        .signup-container {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .signup-steps {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .step {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .step-number {
            width: 30px;
            height: 30px;
            background-color: #3a7d34;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
        }
        
        .step.active .step-number {
            background-color: #4EE2EC;
        }
        
        .step-text {
            color: #b0b0b0;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.7rem;
        }
        
        .step.active .step-text {
            color: #4EE2EC;
        }
        
        .signup-form {
            background-color: rgba(40, 40, 40, 0.9);
            padding: 30px;
            border-radius: 10px;
            border: 4px solid #3a7d34;
        }
        
        .form-row .form-group {
            flex: 1;
            min-width: 250px;
        }
        
        .terms-section {
            background-color: rgba(30, 30, 30, 0.7);
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            border: 2px solid #5b5b5b;
        }
        
        .terms-content {
            max-height: 150px;
            overflow-y: auto;
            padding: 10px;
            background-color: rgba(20, 20, 20, 0.8);
            border-radius: 5px;
            margin: 15px 0;
            color: #d0d0d0;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 15px;
        }
        
        .terms-checkbox input {
            margin-top: 5px;
        }
        
        .password-strength {
            margin-top: 5px;
            height: 5px;
            background-color: #5b5b5b;
            border-radius: 3px;
            overflow: hidden;
        }
        
        .strength-bar {
            height: 100%;
            width: 0%;
        }
        
        .strength-weak { background-color: #ff4d4d; width: 25%; }
        .strength-fair { background-color: #ffa64d; width: 50%; }
        .strength-good { background-color: #ffff4d; width: 75%; }
        .strength-strong { background-color: #5cdb5c; width: 100%; }
        
        .password-hints {
            font-size: 0.7rem;
            color: #888;
            margin-top: 5px;
        }
        
        .hint-list {
            padding-left: 20px;
            margin-top: 5px;
        }
        
        .hint-list li {
            margin-bottom: 3px;
        }
        
        .signup-success {
            display: none;
            text-align: center;
            padding: 40px;
            background-color: rgba(92, 219, 92, 0.1);
            border: 3px solid #5cdb5c;
            border-radius: 10px;
            margin-top: 30px;
        }
        
        .success-icon {
            font-size: 4rem;
            color: #5cdb5c;
            margin-bottom: 20px;
        }
        
        .back-button-container {
            text-align: center;
            margin: 30px 0;
        }
        
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            padding: 15px 30px;
        }
        
        .signup-benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .benefit-item {
            text-align: center;
            padding: 15px;
            background: rgba(40, 40, 40, 0.6);
            border-radius: 8px;
            border: 2px solid #3a7d34;
        }
        
        .benefit-icon {
            font-size: 1.5rem;
            color: #4EE2EC;
            margin-bottom: 10px;
        }
        
        .benefit-item h4 {
            color: #5cdb5c;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .benefit-item p {
            font-size: 0.8rem;
            color: #b0b0b0;
        }
        
        /* REMOVED all hover transforms and transitions */
        .benefit-item:hover {
            border-color: #5cdb5c;
        }
    </style>
</head>
<body class="signup-page">
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
                <h1 class="pixel-text">Join Minecraft Journal</h1>
            </div>
            <nav class="pixel-nav">
                <ul>
                    <li><a href="index.php" class="pixel-button"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="about.php" class="pixel-button"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="index.php#features" class="pixel-button"><i class="fas fa-star"></i> Features</a></li>
                    <li><a href="signup.php" class="pixel-button active"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                    <li><a href="index.php#login" class="pixel-button"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="scrollable-content">
        <div class="container">
            <!-- Welcome Section -->
            <section class="hero-section" style="text-align: center; padding-bottom: 20px;">
                <div class="hero-content">
                    <h2 class="pixel-text hero-title">Start Your Adventure! 🎮</h2>
                    <p class="pixel-text hero-subtitle">Join thousands of Minecrafters documenting their epic journeys</p>
                </div>
            </section>

            <!-- Signup Benefits -->
            <section class="signup-benefits">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h4 class="pixel-text">Unlimited Storage</h4>
                    <p>Store unlimited journal entries, screenshots, and build plans</p>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="pixel-text">Join Community</h4>
                    <p>Connect with other Minecraft players and share your creations</p>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4 class="pixel-text">Access Anywhere</h4>
                    <p>Use your journal on any device - PC, tablet, or phone</p>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="pixel-text">Always Free</h4>
                    <p>No hidden fees. Enjoy all features completely free!</p>
                </div>
            </section>

            <!-- Signup Form Section -->
            <section class="signup-section">
                <div class="signup-container">
                    <h2 class="pixel-text section-title"><i class="fas fa-user-plus"></i> Create Your Account</h2>
                    <p class="section-subtitle">Begin your journaling adventure in just a few steps</p>
                    
                    <!-- Signup Steps -->
                    <div class="signup-steps">
                        <div class="step active">
                            <div class="step-number">1</div>
                            <div class="step-text">Account Info</div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-text">Profile Setup</div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-text">Complete</div>
                        </div>
                    </div>
                    
                    <!-- Main Signup Form -->
                    <form class="signup-form" id="signupForm" autocomplete="off" action="." method="POST"  novalidate>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="signupUsername" class="pixel-text"><i class="fas fa-user"></i> Minecraft Username *</label>
                                <input type="text" 
                                       id="signupUsername" 
                                       name="username" 
                                       class="pixel-input" 
                                       placeholder="Enter your Minecraft username" 
                                       required
                                       autocomplete="off"
                                       autocorrect="off"
                                       autocapitalize="off"
                                       spellcheck="false"
                                       maxlength="20">
                                <div class="input-hint">This will be your display name</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="pixel-text"><i class="fas fa-envelope"></i> Email Address *</label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="pixel-input" 
                                       placeholder="your.email@example.com" 
                                       required
                                       autocomplete="off">
                                <div class="input-hint">We'll never share your email</div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="signupPassword" class="pixel-text"><i class="fas fa-lock"></i> Create Password *</label>
                                <div class="password-container">
                                    <input type="password" 
                                           id="signupPassword" 
                                           name="password" 
                                           class="pixel-input password-input" 
                                           placeholder="Create a strong password" 
                                           required
                                           autocomplete="new-password"
                                           minlength="8"
                                           maxlength="30">
                                    <button type="button" class="show-password-btn" id="showSignupPasswordBtn" aria-label="Show password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength">
                                    <div class="strength-bar" id="passwordStrengthBar"></div>
                                </div>
                                <div class="password-hints">
                                    <p>Password must contain:</p>
                                    <ul class="hint-list">
                                        <li>At least 8 characters</li>
                                        <li>One uppercase letter</li>
                                        <li>One number</li>
                                        <li>One special character</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmPassword" class="pixel-text"><i class="fas fa-lock"></i> Confirm Password *</label>
                                <div class="password-container">
                                    <input type="password" 
                                           id="confirmPassword" 
                                           name="confirmPassword" 
                                           class="pixel-input password-input" 
                                           placeholder="Re-enter your password" 
                                           required
                                           autocomplete="new-password">
                                    <button type="button" class="show-password-btn" id="showConfirmPasswordBtn" aria-label="Show password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="input-hint" id="passwordMatchMessage"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="birthdate" class="pixel-text"><i class="fas fa-birthday-cake"></i> Date of Birth *</label>
                            <input type="date" 
                                   id="birthdate" 
                                   name="birthdate" 
                                   class="pixel-input" 
                                   required
                                   max="2023-12-31">
                            <div class="input-hint">You must be at least 13 years old to register</div>
                        </div>
                        
                        <!-- Terms and Conditions -->
                        <div class="terms-section">
                            <h4 class="pixel-text" style="color: #4EE2EC; margin-bottom: 10px;">
                                <i class="fas fa-file-contract"></i> Terms & Conditions
                            </h4>
                            <div class="terms-content">
                                <p><strong>Welcome to Minecraft Journal!</strong></p>
                                <p>By creating an account, you agree to the following:</p>
                                <p>1. You are at least 13 years old.</p>
                                <p>2. You will not use Minecraft Journal for any illegal activities.</p>
                                <p>3. You will respect other users and not post offensive content.</p>
                                <p>4. Your journal entries and screenshots may be publicly viewable if you choose to share them.</p>
                                <p>5. We will never sell your personal information to third parties.</p>
                                <p>6. You are responsible for keeping your login credentials secure.</p>
                                <p>7. Minecraft Journal is a fan-made project and is not affiliated with Mojang or Microsoft.</p>
                                <p>8. We reserve the right to remove any content that violates our community guidelines.</p>
                                <p>9. This is a demo site - no actual user accounts are created or stored.</p>
                            </div>
                            <div class="terms-checkbox">
                                <input type="checkbox" id="agreeTerms" name="agreeTerms" required>
                                <label for="agreeTerms" class="pixel-text" style="font-size: 0.8rem;">
                                    I have read and agree to the Terms & Conditions and Privacy Policy
                                </label>
                            </div>
                        </div>
                        
                        <!-- Security Notice -->
                        <div class="security-notice" style="margin: 20px 0;">
                            <i class="fas fa-shield-alt"></i>
                            <span class="pixel-text">This is a demo. No actual account will be created or information saved.</span>
                        </div>
                        
                        <button type="submit" class="pixel-button submit-btn" id="signupSubmitBtn" style="background-color: #4EE2EC; border-color: #2a8b94;">
                            <i class="fas fa-user-plus"></i> Create My Journal Account
                        </button>
                        
                        <div class="form-footer">
                            <p class="pixel-text">Already have an account? <a href="index.html#login" class="link">Login here</a></p>
                        </div>
                    </form>
                    
                    <!-- Success Message (Hidden by default) -->
                    <div class="signup-success" id="successMessage">
                        <div class="success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="pixel-text" style="color: #5cdb5c;">Account Created Successfully! 🎉</h3>
                        <p style="margin: 20px 0; color: #d0d0d0;">Welcome to the Minecraft Journal community! Your adventure begins now.</p>
                        <p style="margin: 20px 0; color: #d0d0d0; font-size: 0.9rem;">
                            <i class="fas fa-info-circle"></i> 
                            Remember: This is a demo site. No actual account was created.
                        </p>
                        <div style="margin-top: 30px;">
                            <a href="index.html" class="pixel-button large-button">
                                <i class="fas fa-home"></i> Go to Homepage
                            </a>
                            <a href="index.html#login" class="pixel-button large-button secondary-btn" style="margin-left: 15px;">
                                <i class="fas fa-sign-in-alt"></i> Login Now
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Back Button -->
            <div class="back-button-container">
                <a href="javascript:void(0)" class="pixel-button back-button" id="backButton">
                    <i class="fas fa-arrow-left"></i> Back to Previous Page
                </a>
                <p class="pixel-text" style="margin-top: 15px; font-size: 0.7rem; color: #b0b0b0;">
                    You can also use your browser's back button ←
                </p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="minecraft-footer">
        <div class="container">
            <p class="pixel-text">Minecraft Journal &copy; 2023 - Start Your Adventure Today!</p>
            <div class="footer-links">
                <a href="index.html" class="pixel-text link"><i class="fas fa-home"></i> Home</a>
                <a href="about.html" class="pixel-text link"><i class="fas fa-info-circle"></i> About</a>
                <a href="#" class="pixel-text link"><i class="fas fa-question-circle"></i> Help</a>
            </div>
        </div>
    </footer>

    <script>
        // Track where user came from
        let previousPage = document.referrer || 'index.html';
        
        // Password strength checker - INSTANT
        const passwordInput = document.getElementById('signupPassword');
        const strengthBar = document.getElementById('passwordStrengthBar');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordMatchMessage = document.getElementById('passwordMatchMessage');
        
        function checkPasswordStrength(password) {
            let strength = 0;
            
            // Length check
            if (password.length >= 8) strength += 25;
            if (password.length >= 12) strength += 10;
            
            // Character variety checks
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            
            // Update strength bar instantly
            strengthBar.className = 'strength-bar';
            
            if (strength <= 25) {
                strengthBar.classList.add('strength-weak');
            } else if (strength <= 50) {
                strengthBar.classList.add('strength-fair');
            } else if (strength <= 75) {
                strengthBar.classList.add('strength-good');
            } else {
                strengthBar.classList.add('strength-strong');
            }
        }
        
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirm = confirmPasswordInput.value;
            
            if (confirm.length === 0) {
                passwordMatchMessage.textContent = '';
                passwordMatchMessage.style.color = '#888';
                return;
            }
            
            if (password === confirm) {
                passwordMatchMessage.textContent = '✓ Passwords match';
                passwordMatchMessage.style.color = '#5cdb5c';
            } else {
                passwordMatchMessage.textContent = '✗ Passwords do not match';
                passwordMatchMessage.style.color = '#ff4d4d';
            }
        }
        
        passwordInput.addEventListener('input', function() {
            checkPasswordStrength(this.value);
            checkPasswordMatch();
        });
        
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
        
        // Show/hide password toggles - INSTANT
        document.getElementById('showSignupPasswordBtn').addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        document.getElementById('showConfirmPasswordBtn').addEventListener('click', function() {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
        
        // Form submission - INSTANT
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const username = document.getElementById('signupUsername').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const birthdate = document.getElementById('birthdate').value;
            const agreeTerms = document.getElementById('agreeTerms').checked;
            
            // Validation
            let errors = [];
            
            if (username.length < 3) {
                errors.push('Username must be at least 3 characters');
            }
            
            if (!email.includes('@') || !email.includes('.')) {
                errors.push('Please enter a valid email address');
            }
            
            if (password.length < 8) {
                errors.push('Password must be at least 8 characters');
            }
            
            if (password !== confirmPassword) {
                errors.push('Passwords do not match');
            }
            
            if (!birthdate) {
                errors.push('Please enter your date of birth');
            } else {
                const birthDate = new Date(birthdate);
                const today = new Date();
                const age = today.getFullYear() - birthDate.getFullYear();
                if (age < 13) {
                    errors.push('You must be at least 13 years old to register');
                }
            }
            
            if (!agreeTerms) {
                errors.push('You must agree to the Terms & Conditions');
            }
            
            // Show errors or success
            if (errors.length > 0) {
                alert('Please fix the following errors:\n\n' + errors.join('\n'));
                return;
            }
            
            // INSTANT: No loading state, immediate action
            // Hide form, show success message immediately
            document.getElementById('signupForm').style.display = 'none';
            document.getElementById('successMessage').style.display = 'block';
            
            // Update steps immediately
            document.querySelectorAll('.step').forEach(step => {
                step.classList.remove('active');
            });
            document.querySelectorAll('.step')[2].classList.add('active');
            
            // Clear form data immediately
            document.getElementById('signupForm').reset();
            strengthBar.className = 'strength-bar';
            passwordMatchMessage.textContent = '';
            
            // Auto-redirect after 5 seconds (no animation)
            setTimeout(() => {
                window.location.href = 'index.html';
            }, 5000);
        });
        
        // Back button functionality - INSTANT
        document.getElementById('backButton').addEventListener('click', function() {
            // If we have a valid previous page from our site, go back instantly
            if (previousPage && previousPage.includes(window.location.hostname)) {
                window.history.back();
            } else {
                // Otherwise go to home page instantly
                window.location.href = 'index.html';
            }
        });
        
        // Clear form on page load - INSTANT
        window.addEventListener('load', function() {
            document.getElementById('signupForm').reset();
            strengthBar.className = 'strength-bar';
            passwordMatchMessage.textContent = '';
            
            // Set max date for birthdate (13 years ago)
            const today = new Date();
            const maxDate = new Date(today.getFullYear() - 13, today.getMonth(), today.getDate());
            document.getElementById('birthdate').max = maxDate.toISOString().split('T')[0];
            
            // Set min date (120 years ago)
            const minDate = new Date(today.getFullYear() - 120, today.getMonth(), today.getDate());
            document.getElementById('birthdate').min = minDate.toISOString().split('T')[0];
        });
        
        // Clear form when leaving page - INSTANT
        window.addEventListener('beforeunload', function() {
            document.getElementById('signupForm').reset();
        });
    </script>
</body>
</html>