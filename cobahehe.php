<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamink - Game Streaming Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0a0a0a;
            color: #fff;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #1a1a1a;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            border-bottom: 1px solid #2a2a2a;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 24px;
            font-weight: bold;
            color: #fff;
        }

        .logo-icon {
            background: #ff4d6d;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 16px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: #2a2a2a;
            border-radius: 25px;
            padding: 8px 20px;
            width: 400px;
        }

        .search-bar input {
            background: none;
            border: none;
            color: #fff;
            outline: none;
            width: 100%;
            margin-left: 10px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-start-stream {
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
        }

        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-status {
            font-size: 11px;
            color: #4ade80;
        }

        /* Sidebar Kiri */
        .sidebar-left {
            position: fixed;
            left: 0;
            top: 70px;
            width: 70px;
            height: calc(100vh - 70px);
            background: #1a1a1a;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            gap: 20px;
            z-index: 999;
            border-right: 1px solid #2a2a2a;
        }

        .sidebar-icon {
            width: 45px;
            height: 45px;
            background: #ff4d6d;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sidebar-icon:hover {
            transform: scale(1.1);
        }

        /* Sidebar Kanan */
        .sidebar-right {
            position: fixed;
            right: 0;
            top: 70px;
            width: 70px;
            height: calc(100vh - 70px);
            background: #1a1a1a;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            gap: 20px;
            z-index: 999;
            border-left: 1px solid #2a2a2a;
        }

        .sidebar-right-icon {
            width: 45px;
            height: 45px;
            background: #ff4d6d;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sidebar-right-icon:hover {
            transform: scale(1.1);
        }

        .add-icon {
            background: #2a2a2a;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            margin-top: auto;
        }

        /* Main Content */
        .main-content {
            margin-left: 70px;
            margin-right: 70px;
            margin-top: 70px;
            padding: 30px;
        }

        /* Hero Banner */
        .hero-section {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .hero-banner {
            flex: 2;
            background: linear-gradient(135deg, #ff4d6d, #ff758f);
            border-radius: 20px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            min-height: 350px;
        }

        .trending-tag {
            background: rgba(255, 255, 255, 0.3);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }

        .hero-title {
            font-size: 38px;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .hero-description {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 25px;
        }

        .btn-watch {
            background: #fff;
            color: #ff4d6d;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
        }

        .hero-character {
            position: absolute;
            right: 0;
            bottom: 0;
            height: 100%;
            width: 45%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 300"><rect x="80" y="50" width="40" height="60" fill="%23FFE4B5"/><rect x="75" y="110" width="50" height="80" fill="%2300CED1"/><rect x="60" y="110" width="15" height="60" fill="%23FFA07A"/><rect x="125" y="110" width="15" height="60" fill="%23FFA07A"/><rect x="85" y="190" width="15" height="50" fill="%23D2691E"/><rect x="105" y="190" width="15" height="50" fill="%23D2691E"/></svg>') no-repeat center;
            background-size: contain;
        }

        .carousel-dots {
            position: absolute;
            bottom: 20px;
            left: 40px;
            display: flex;
            gap: 8px;
        }

        .dot {
            width: 30px;
            height: 3px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 2px;
        }

        .dot.active {
            background: #fff;
        }

        /* Top Streamer */
        .top-streamer {
            flex: 1;
            background: #1a1a1a;
            border-radius: 20px;
            padding: 30px;
        }

        .top-streamer h3 {
            font-size: 22px;
            margin-bottom: 25px;
        }

        .streamer-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .rank {
            font-size: 20px;
            font-weight: 700;
            color: #666;
            width: 35px;
        }

        .streamer-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #2a2a2a;
        }

        .streamer-info {
            flex: 1;
        }

        .streamer-name {
            font-weight: 600;
            font-size: 14px;
        }

        .followers {
            font-size: 12px;
            color: #666;
        }

        .badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-valorant {
            background: #ff4d6d;
        }

        .badge-minecraft {
            background: #4ade80;
        }

        /* Section Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
        }

        .view-all {
            color: #ff4d6d;
            font-weight: 600;
            cursor: pointer;
        }

        .tabs {
            display: flex;
            gap: 30px;
            margin-bottom: 25px;
        }

        .tab {
            font-size: 16px;
            font-weight: 600;
            color: #666;
            cursor: pointer;
            padding-bottom: 10px;
            border-bottom: 3px solid transparent;
        }

        .tab.active {
            color: #ff4d6d;
            border-bottom-color: #ff4d6d;
        }

        .filter-btn {
            background: #2a2a2a;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
        }

        /* Video Grid */
        .video-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        .video-card {
            background: #1a1a1a;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .video-card:hover {
            transform: translateY(-5px);
        }

        .video-thumbnail {
            width: 100%;
            height: 200px;
            background: #2a2a2a;
            position: relative;
        }

        .video-info {
            padding: 15px;
        }

        .video-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .video-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #2a2a2a;
        }

        .video-streamer {
            font-size: 13px;
            font-weight: 600;
        }

        .video-badge {
            background: #ff4d6d;
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: 600;
            margin-left: auto;
        }

        .video-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .video-stats {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: #666;
        }

        /* Games Section */
        .games-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }

        .game-card {
            border-radius: 15px;
            overflow: hidden;
            height: 220px;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .game-card:hover {
            transform: scale(1.05);
        }

        .game-valorant {
            background: linear-gradient(135deg, #ff4d6d, #ff758f);
        }

        .game-pubg {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
        }

        .game-dbd {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
        }

        .game-dota {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .game-freefire {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        /* Footer */
        .footer {
            background: #1a1a1a;
            padding: 40px 0 20px;
            text-align: center;
            margin-left: 70px;
            margin-right: 70px;
        }

        .footer-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .footer-nav {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 25px;
        }

        .footer-link {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .social-icon {
            width: 35px;
            height: 35px;
            background: #2a2a2a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .copyright {
            color: #666;
            font-size: 13px;
        }

        @media (max-width: 1200px) {
            .video-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .games-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar-left, .sidebar-right {
                display: none;
            }
            .main-content {
                margin-left: 0;
                margin-right: 0;
            }
            .hero-section {
                flex-direction: column;
            }
            .video-grid {
                grid-template-columns: 1fr;
            }
            .games-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .footer {
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <span class="logo-icon">🏠</span>
            <span>Gamink</span>
        </div>
        <div class="search-bar">
            <span>🔍</span>
            <input type="text" placeholder="Search">
        </div>
        <div class="nav-right">
            <button class="btn-start-stream">
                <span>📹</span>
                Start Stream
            </button>
            <span style="cursor: pointer;">⚙️</span>
            <span style="cursor: pointer;">🔔</span>
            <div class="user-profile">
                <div class="user-avatar"></div>
                <div class="user-info">
                    <div class="user-name">Albertus</div>
                    <div class="user-status">Online</div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar Kiri -->
    <div class="sidebar-left">
        <div class="sidebar-icon">🎮</div>
        <div class="sidebar-icon">🎯</div>
        <div class="sidebar-icon">📊</div>
    </div>

    <!-- Sidebar Kanan -->
    <div class="sidebar-right">
        <div class="sidebar-right-icon"></div>
        <div class="sidebar-right-icon"></div>
        <div class="sidebar-right-icon"></div>
        <div class="sidebar-right-icon"></div>
        <div class="add-icon">+</div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-banner">
                <span class="trending-tag">#TRENDING</span>
                <h1 class="hero-title">Watch streaming<br>games anywhere<br>anytime</h1>
                <p class="hero-description">Watch your hero compete by<br>watching on Gege Gamink</p>
                <button class="btn-watch">Watch Now</button>
                <div class="hero-character"></div>
                <div class="carousel-dots">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
            <div class="top-streamer">
                <h3>Top Streamer</h3>
                <div class="streamer-item">
                    <span class="rank">01</span>
                    <div class="streamer-avatar"></div>
                    <div class="streamer-info">
                        <div class="streamer-name">Jess no Limit</div>
                        <div class="followers">1M Followers</div>
                    </div>
                    <span class="badge badge-valorant">Valorant</span>
                </div>
                <div class="streamer-item">
                    <span class="rank">02</span>
                    <div class="streamer-avatar"></div>
                    <div class="streamer-info">
                        <div class="streamer-name">Oura Gaming</div>
                        <div class="followers">1M Followers</div>
                    </div>
                    <span class="badge badge-minecraft">Minecraft</span>
                </div>
                <div class="streamer-item">
                    <span class="rank">03</span>
                    <div class="streamer-avatar"></div>
                    <div class="streamer-info">
                        <div class="streamer-name">Milyhya</div>
                        <div class="followers">1M Followers</div>
                    </div>
                    <span class="badge badge-valorant">Valorant</span>
                </div>
            </div>
        </section>

        <!-- Tonton Live Sekarang -->
        <section>
            <div class="section-header">
                <div>
                    <h2 class="section-title">Tonton Live Sekarang!</h2>
                    <div class="tabs">
                        <div class="tab active">Top Stream</div>
                        <div class="tab">Online</div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 20px;">
                    <span class="view-all">View All</span>
                    <button class="filter-btn">⚙️ Filter</button>
                </div>
            </div>

            <div class="video-grid">
                <div class="video-card">
                    <div class="video-thumbnail"></div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-avatar"></div>
                            <span class="video-streamer">Milyhya</span>
                            <span class="video-badge">Valorant</span>
                        </div>
                        <div class="video-title">What Aggressive YORU 2.0 plays...</div>
                        <div class="video-stats">
                            <span>192,658 Watching</span>
                            <span>• 4 Mar, 2025</span>
                        </div>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail"></div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-avatar"></div>
                            <span class="video-streamer">Milyhya</span>
                            <span class="video-badge">Valorant</span>
                        </div>
                        <div class="video-title">What Aggressive YORU 2.0 plays...</div>
                        <div class="video-stats">
                            <span>192,658 Watching</span>
                            <span>• 4 Mar, 2025</span>
                        </div>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail"></div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-avatar"></div>
                            <span class="video-streamer">Milyhya</span>
                            <span class="video-badge">Valorant</span>
                        </div>
                        <div class="video-title">What Aggressive YORU 2.0 plays...</div>
                        <div class="video-stats">
                            <span>192,658 Watching</span>
                            <span>• 4 Mar, 2025</span>
                        </div>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail"></div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-avatar"></div>
                            <span class="video-streamer">Milyhya</span>
                            <span class="video-badge">Valorant</span>
                        </div>
                        <div class="video-title">What Aggressive YORU 2.0 plays...</div>
                        <div class="video-stats">
                            <span>192,658 Watching</span>
                            <span>• 4 Mar, 2025</span>
                        </div>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail"></div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-avatar"></div>
                            <span class="video-streamer">Milyhya</span>
                            <span class="video-badge">Valorant</span>
                        </div>
                        <div class="video-title">What Aggressive YORU 2.0 plays...</div>
                        <div class="video-stats">
                            <span>192,658 Watching</span>
                            <span>• 4 Mar, 2025</span>
                        </div>
                    </div>
                </div>

                <div class="video-card">
                    <div class="video-thumbnail"></div>
                    <div class="video-info">
                        <div class="video-header">
                            <div class="video-avatar"></div>
                            <span class="video-streamer">Milyhya</span>
                            <span class="video-badge">Valorant</span>
                        </div>
                        <div class="video-title">What Aggressive YORU 2.0 plays...</div>
                        <div class="video-stats">
                            <span>192,658 Watching</span>
                            <span>• 4 Mar, 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Games Section -->
        <section>
            <h2 class="section-title" style="margin-bottom: 25px;">Games</h2>
            <div class="games-grid">
                <div class="game-card game-valorant"></div>
                <div class="game-card game-pubg"></div>
                <div class="game-card game-dbd"></div>
                <div class="game-card game-dota"></div>
                <div class="game-card game-freefire"></div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-logo">
            🏠 Gamink
        </div>
        <nav class="footer-nav">
            <a href="#" class="footer-link">Home</a>
            <a href="#" class="footer-link">Streamer</a>
            <a href="#" class="footer-link">Games</a>
            <a href="#" class="footer-link">Profile</a>
        </nav>
        <div class="social-links">
            <div class="social-icon">▶️</div>
            <div class="social-icon">📷</div>
            <div class="social-icon">✉️</div>
        </div>
        <p class="copyright">All Right Reserved</p>
    </footer>
</body>
</html>