<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Minecraft Journal</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        /* Additional styles for the about page */
        .about-page .background-image {
            background-image: url('https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .creator-section {
            background-color: rgba(20, 20, 20, 0.9);
            padding: 40px;
            border-radius: 10px;
            border: 8px solid #3a7d34;
            margin-bottom: 60px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        
        .creators-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }
        
        .creator-card {
            background: rgba(40, 40, 40, 0.8);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            border: 4px solid #5cdb5c;
            transition: transform 0.3s;
        }
        
        .creator-card:hover {
            transform: translateY(-10px);
            border-color: #4EE2EC;
        }
        
        .creator-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            border: 5px solid #3a7d34;
            overflow: hidden;
            background: #2a2a2a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #5cdb5c;
        }
        
        .creator-avatar.me {
            background: linear-gradient(135deg, #4a9e4a, #2d5c29);
        }
        
        .creator-avatar.aicelle {
            background: linear-gradient(135deg, #4EE2EC, #2a8b94);
        }
        
        .creator-info h3 {
            color: #5cdb5c;
            margin-bottom: 10px;
            font-size: 1.4rem;
        }
        
        .creator-role {
            color: #4EE2EC;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            margin-bottom: 15px;
            display: block;
        }
        
        .creator-bio {
            color: #d0d0d0;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .creator-social {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .creator-social a {
            color: white;
            background: #3a7d34;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .creator-social a:hover {
            background: #5cdb5c;
            transform: scale(1.1);
        }
        
        .our-story {
            background-color: rgba(20, 20, 20, 0.9);
            padding: 40px;
            border-radius: 10px;
            border: 8px solid #4EE2EC;
            margin-bottom: 60px;
        }
        
        .story-content {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: center;
            margin-top: 30px;
        }
        
        .story-text {
            flex: 1;
            min-width: 300px;
        }
        
        .story-image {
            flex: 1;
            min-width: 300px;
            display: flex;
            justify-content: center;
        }
        
        .story-block {
            width: 200px;
            height: 200px;
            background: #2a2a2a;
            border: 8px solid #3a7d34;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #5cdb5c;
        }
        
        .mission-section {
            background-color: rgba(20, 20, 20, 0.9);
            padding: 40px;
            border-radius: 10px;
            border: 8px solid #FFD700;
            margin-bottom: 60px;
        }
        
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .mission-item {
            text-align: center;
            padding: 25px;
            background: rgba(40, 40, 40, 0.6);
            border-radius: 8px;
            border: 3px solid #5cdb5c;
        }
        
        .mission-icon {
            font-size: 2.5rem;
            color: #FFD700;
            margin-bottom: 15px;
        }
        
        .back-button-container {
            text-align: center;
            margin: 40px 0;
        }
        
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            padding: 15px 30px;
        }
        
        .back-button:hover {
            background-color: #4a9e42;
        }
        
        .about-page .hero-section {
            text-align: center;
            padding-bottom: 40px;
        }
        
        .friendly-message {
            background: rgba(92, 219, 92, 0.1);
            border-left: 6px solid #5cdb5c;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body class="about-page">
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
                <h1 class="pixel-text">About Minecraft Journal</h1>
            </div>
                        <nav class="pixel-nav">
                            <ul>
                                <li><a href="index.php" class="pixel-button"><i class="fas fa-home"></i> Home</a></li>
                                <li><a href="about.php" class="pixel-button active"><i class="fas fa-info-circle"></i> About</a></li>
                                <li><a href="index.php#features" class="pixel-button"><i class="fas fa-star"></i> Features</a></li>
                                <li><a href="login.php" class="pixel-button"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>
            
                <!-- Main Content -->
                <main class="scrollable-content">
                    <div class="container">
                        <!-- Hero Section -->
                        <section class="hero-section">
                            <div class="hero-content">
                                <h2 class="pixel-text hero-title">Hello, Adventurers! 👋</h2>
                                <p class="pixel-text hero-subtitle">We're so excited to have you here in our Minecraft Journal community!</p>
                                
                                <div class="friendly-message">
                                    <p class="pixel-text" style="font-size: 0.9rem; color: #d0d0d0; text-shadow: none;">
                                        <i class="fas fa-heart" style="color: #FF6B6B; margin-right: 10px;"></i>
                                        Welcome to our cozy corner of the Minecraft universe! We built this journal with love for every block-placer, cave-explorer, and mob-battler out there. Whether you're a seasoned veteran or just starting your first world, we're glad you're here!
                                    </p>
                                </div>
                            </div>
                        </section>
            
                        <!-- Our Story Section -->
                        <section class="our-story">
                            <h2 class="pixel-text section-title"><i class="fas fa-book"></i> Our Story</h2>
                            <div class="story-content">
                                <div class="story-text">
                                    <p class="pixel-text">Minecraft Journal was born from our own love of documenting adventures in the blocky world we all adore. We noticed that while Minecraft gives us incredible stories to tell, there wasn't a perfect place to preserve those memories.</p>
                                    <p class="pixel-text">So we thought: <span class="highlight">"Why not create a digital journal made just for Minecrafters?"</span></p>
                                    <p class="pixel-text">What started as a simple idea between two friends has grown into this platform where thousands of players now share their builds, adventures, and creative projects. Every day, we're inspired by the amazing stories you all share!</p>
                                </div>
                                <div class="story-image">
                                    <div class="story-block">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                </div>
                            </div>
                        </section>
            
                        <!-- Creators Section -->
                        <section class="creator-section">
                            <h2 class="pixel-text section-title"><i class="fas fa-users"></i> Meet the Creative Team</h2>
                            <p class="section-subtitle">The passionate builders behind Minecraft Journal</p>
                            
                            <div class="creators-grid">
                                <!-- Creator 1 -->
                                <div class="creator-card">
                                    <div class="creator-avatar me">
                                        <i class="fas fa-user-astronaut"></i>
                                    </div>
                                    <div class="creator-info">
                                        <h3 class="pixel-text">Alex (That's Me! 👋)</h3>
                                        <span class="creator-role">Lead Developer & Minecraft Enthusiast</span>
                                        <p class="creator-bio">Hey there! I'm Alex, and I've been playing Minecraft since the beta days. I love creating redstone contraptions that barely work and building elaborate castles that I never finish. When I'm not coding this journal platform, you can find me exploring caves or trying to tame every cat I find in villages!</p>
                                        <p class="creator-bio">My favorite Minecraft memory: Finding my first diamond after 3 hours of mining on my very first world. I still have that diamond pickaxe saved in a chest!</p>
                                        <div class="creator-social">
                                            <a href="#" title="GitHub"><i class="fab fa-github"></i></a>
                                            <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            <a href="#" title="Minecraft"><i class="fas fa-cube"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Creator 2 -->
                                <div class="creator-card">
                                    <div class="creator-avatar aicelle">
                                        <i class="fas fa-user-ninja"></i>
                                    </div>
                                    <div class="creator-info">
                                        <h3 class="pixel-text">Aicelle 🎨</h3>
                                        <span class="creator-role">Designer & Community Manager</span>
                                        <p class="creator-bio">Hello fellow crafters! I'm Aicelle, and I believe every Minecraft world tells a unique story. As the designer, I've worked to make this journal as cozy and welcoming as your favorite Minecraft cabin. I'm all about aesthetics—whether it's creating beautiful builds or designing user-friendly interfaces.</p>
                                        <p class="creator-bio">My Minecraft specialty: Creating intricate interior designs for buildings. Give me any empty structure and I'll turn it into a cozy home with just torches, carpets, and flower pots!</p>
                                        <div class="creator-social">
                                            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                            <a href="#" title="Pinterest"><i class="fab fa-pinterest"></i></a>
                                            <a href="#" title="Minecraft"><i class="fas fa-palette"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="friendly-message" style="margin-top: 30px;">
                                <p class="pixel-text" style="font-size: 0.9rem; color: #d0d0d0; text-shadow: none;">
                                    <i class="fas fa-comments" style="color: #4EE2EC; margin-right: 10px;"></i>
                                    <strong>We'd love to hear from you!</strong> Got ideas for the journal? Found a bug? Just want to share your latest build? Reach out anytime—we read every message and love connecting with our community!
                                </p>
                            </div>
                        </section>
            
                        <!-- Our Mission Section -->
                        <section class="mission-section">
                            <h2 class="pixel-text section-title"><i class="fas fa-bullseye"></i> Our Mission</h2>
                            <p class="section-subtitle">What drives us every day</p>
                            
                            <div class="mission-grid">
                                <div class="mission-item">
                                    <div class="mission-icon">
                                        <i class="fas fa-memory"></i>
                                    </div>
                                    <h3 class="pixel-text">Preserve Memories</h3>
                                    <p>Help players save their Minecraft stories so they can look back years later and relive their adventures.</p>
                                </div>
                                
                                <div class="mission-item">
                                    <div class="mission-icon">
                                        <i class="fas fa-hands-helping"></i>
                                    </div>
                                    <h3 class="pixel-text">Build Community</h3>
                                    <p>Create a friendly space where Minecrafters can share ideas, inspire each other, and make new friends.</p>
                                </div>
                                
                                <div class="mission-item">
                                    <div class="mission-icon">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <h3 class="pixel-text">Spark Creativity</h3>
                                    <p>Provide tools and inspiration to help players plan and execute their dream builds and adventures.</p>
                                </div>
                                
                                <div class="mission-item">
                                    <div class="mission-icon">
                                        <i class="fas fa-laugh-beam"></i>
                                    </div>
                                    <h3 class="pixel-text">Spread Joy</h3>
                                    <p>Make Minecraft even more enjoyable by celebrating every achievement, big or small!</p>
                                </div>
                            </div>
                        </section>
            
                        <!-- Fun Facts Section -->
                        <section class="creator-section" style="border-color: #FF6B6B;">
                            <h2 class="pixel-text section-title"><i class="fas fa-star"></i> Fun Facts About Us</h2>
                            <div class="story-content">
                                <div class="story-text">
                                    <ul style="color: #d0d0d0; line-height: 1.8; padding-left: 20px;">
                                        <li>We've been playing Minecraft together since 2015 on the same server!</li>
                                        <li>This journal website was inspired by our own messy collection of screenshots and notes.</li>
                                        <li>Alex once built a working calculator in Minecraft using redstone (it took 3 weeks!).</li>
                                        <li>Aicelle holds the record in our friend group for most cats collected in one house: 27!</li>
                                        <li>We test every new feature by playing Minecraft together every Friday night.</li>
                                        <li>Our first version of this journal was just a shared Google Doc back in 2020.</li>
                                        <li>We've never actually defeated the Ender Dragon in our shared survival world... we're too busy building!</li>
                                    </ul>
                                </div>
                                <div class="story-image">
                                    <div class="story-block" style="border-color: #FF6B6B;">
                                        <i class="fas fa-grin-stars"></i>
                                    </div>
                                </div>
                            </div>
                        </section>
            
                        <!-- Back Button -->
                        <div class="back-button-container">
                            <a href="index.php" class="pixel-button back-button">
                                <i class="fas fa-arrow-left"></i> Back to Home
                            </a>
                            <p class="pixel-text" style="margin-top: 15px; font-size: 0.7rem; color: #b0b0b0;">
                                P.S. You can also use your browser's back button to return to the previous page! ←
                            </p>
                        </div>
                    </div>
                </main>
            
                <!-- Footer -->
                <footer class="minecraft-footer">
                    <div class="container">
                        <p class="pixel-text">Made with ❤️ by Alex & Aicelle | Minecraft Journal &copy; 2023</p>
                        <div class="footer-links">
                            <a href="index.php" class="pixel-text link"><i class="fas fa-home"></i> Home</a>
                            <a href="#" class="pixel-text link"><i class="fas fa-envelope"></i> Contact Us</a>
                            <a href="#" class="pixel-text link"><i class="fas fa-heart"></i> Support Our Work</a>
                        </div>
                    </div>
                </footer>
                <script>
                    // Friendly greeting when page loads
                    document.addEventListener('DOMContentLoaded', function() {
                        console.log("%c✨ Welcome to our About page! ✨", "color: #5cdb5c; font-size: 18px; font-weight: bold;");
                        console.log("%cThanks for checking out our story! We hope you love Minecraft Journal as much as we do!", "color: #4EE2EC; font-size: 14px;");
                        
                        // Add some interactive fun
                        const creatorCards = document.querySelectorAll('.creator-card');
                        creatorCards.forEach(card => {
                            card.addEventListener('click', function() {
                                this.style.transform = 'scale(0.98)';
                                setTimeout(() => {
                                    this.style.transform = '';
                                }, 200);
                            });
                        });
                    });
                    
                    // Make back button work with browser history
                    document.querySelector('.back-button').addEventListener('click', function(e) {
                        // Check if we came from another page in our site
                        if (document.referrer && document.referrer.includes(window.location.hostname)) {
                            e.preventDefault();
                            window.history.back();
                        }
                    });
                </script>
            </body>
            </html>