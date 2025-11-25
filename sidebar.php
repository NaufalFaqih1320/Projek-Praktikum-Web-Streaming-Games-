<?php

include 'connection.php'; 

$games = [];
if (isset($connection) && $connection) {
    // Ambil data game dari database, diurutkan berdasarkan jumlah streamer terbanyak (DESC)
    // dan nama (ASC) sebagai secondary sort
    $sql = "SELECT name, category, streamers, image_url FROM games ORDER BY streamers DESC, name ASC";
    $result = $connection->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $games[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ----------------------------------- */
        /* CSS Kustom untuk Sidebar KIRI */
        /* ----------------------------------- */
        #sidebar {
            width: 280px; /* Lebar sidebar */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0; /* Posisikan di KIRI */
            background-color: #1f1f23; /* Warna latar belakang gelap */
            color: #ffffff;
            padding: 1rem;
            transition: transform 0.3s ease;
            z-index: 1050; /* Di atas konten lain */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5); /* Bayangan ke kanan */
        }

        /* Kelas untuk menyembunyikan sidebar ke KIRI */
        .sidebar-hidden {
            transform: translateX(-100%); /* Geser keluar dari layar ke kiri */
        }

        /* Gaya Tombol Toggle */
        #sidebar-toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px; /* Posisi tombol default di kiri */
            z-index: 1051; /* Di atas sidebar */
            background-color: #9147ff; /* Warna ungu khas */
            border: none;
            color: white;
            padding: 0.5rem 0.8rem;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            font-weight: bold;
            transition: left 0.3s ease; /* Transisi posisi tombol */
        }

        /* Gaya Header */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            border-bottom: 1px solid #333;
            padding-bottom: 0.5rem;
        }

        /* Gaya Item Game */
        .game-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            text-decoration: none;
            color: #ffffff;
            transition: background-color 0.2s ease;
        }
        .game-item:hover {
            background-color: #333333;
            border-radius: 5px;
        }

        .game-image {
            width: 60px;
            height: 80px; 
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
        }

        .game-info {
            flex-grow: 1;
            overflow: hidden;
        }

        .game-name {
            font-weight: bold;
            font-size: 1rem;
            margin: 0;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .game-category {
            font-size: 0.8rem;
            color: #b3b3b3;
            margin: 0;
        }

        .game-streamers {
            font-weight: bold;
            font-size: 1rem;
            color: #ffffff; /* Default putih */
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .red-dot {
            height: 8px;
            width: 8px;
            background-color: #ff0000;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        
        /* Jika streamers > 0, beri warna merah pada teks */
        .game-item .live-count {
            color: #ff0000;
        }

    </style>
</head>
<body>

<button id="sidebar-toggle-btn" title="Buka/Tutup Sidebar">
    <span id="toggle-icon">&gt;</span> 
</button>

<div id="sidebar" class="sidebar-hidden">
    <div class="sidebar-header">
        <h5 class="mb-0">Rekomendasi</h5>
    </div>

    <div class="list-group">
        <?php if (!empty($games)): ?>
            <?php foreach ($games as $game): ?>
                <a href="#" class="game-item">
                    <img src="<?php echo htmlspecialchars($game['image_url']); ?>" 
                         alt="<?php echo htmlspecialchars($game['name']); ?>" 
                         class="game-image">
                    
                    <div class="game-info">
                        <p class="game-name" title="<?php echo htmlspecialchars($game['name']); ?>"><?php echo htmlspecialchars($game['name']); ?></p>
                        <p class="game-category"><?php echo htmlspecialchars($game['category']); ?></p>
                    </div>
                    
                    <div class="game-streamers">
                        <?php 
                        $streamer_count = $game['streamers'];
                        
                        // Tentukan apakah sedang Live
                        $is_live = $streamer_count > 0;
                        
                        // Formatting jumlah
                        $display_count = $streamer_count;
                        if ($streamer_count >= 1000) {
                            $display_count = number_format($streamer_count / 1000, 1) . 'K';
                        }
                        ?>
                        
                        <?php if ($is_live): ?>
                            <span class="red-dot"></span>
                        <?php endif; ?>
                        
                        <span class="live-count <?php echo $is_live ? 'text-danger' : 'text-white'; ?>">
                            <?php echo $display_count; ?>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted mt-3">Tidak ada data game yang ditemukan atau koneksi gagal.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript untuk Toggle Sidebar dari KIRI
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebar-toggle-btn');
        const toggleIcon = document.getElementById('toggle-icon');

        // Fungsi untuk membuka/menutup sidebar
        function toggleSidebar() {
            // Toggle class sidebar-hidden
            const isHidden = sidebar.classList.toggle('sidebar-hidden');
            
            // Ubah ikon tombol dan posisi
            if (isHidden) {
                // Sidebar TERTUTUP (Tombol ada di KIRI layar)
                toggleIcon.textContent = '>'; // Tombol untuk BUKA (arah ke KANAN)
                toggleBtn.style.left = '15px'; 
            } else {
                // Sidebar TERBUKA (Tombol mepet ke KANAN sidebar)
                toggleIcon.textContent = '<'; // Tombol untuk TUTUP (arah ke KIRI)
                // Pindahkan tombol ke kanan (sebelah kanan sidebar) saat terbuka
                toggleBtn.style.left = (sidebar.offsetWidth + 15) + 'px';
            }
        }

        // Tambahkan event listener ke tombol
        toggleBtn.addEventListener('click', toggleSidebar);

        // Inisialisasi posisi tombol saat halaman dimuat 
        // (Default: sidebar-hidden = true, tombol di posisi kiri)
        toggleIcon.textContent = '>'; // Default: Arahkan ke KANAN
        toggleBtn.style.left = '15px';
    });
</script>
</body>
</html>