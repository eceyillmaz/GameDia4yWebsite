<?php include 'baglan.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Profilim - GameDia4y</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="navigasyonkismi">
    <div class="logo-alani">
        <h1>GameDia4y</h1>
        <?php if(isset($_SESSION['user_id'])): ?>
            <div class="user-welcome">Hoş geldin, <?php echo $_SESSION['username']; ?></div>
        <?php endif; ?>
    </div>

    <nav>
        <a href="index.php">Ana Sayfa</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="add-game.php">Oyun Ekle</a> 
            <a href="games.php">Yorum ve Puanlama</a>
            <a href="archive.php">Oyun Arşivim</a>
            <a href="profile.php">Profilim</a>
        <?php endif; ?>
        <a href="about.php">Bu Sayfa Hakkında</a>
    </nav>

    <div class="sag-butonlar">
        <button id="Tema-toggle">Koyu Modu Aç/Kapat</button>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="cikis.php" class="cikis-alt-link">Çıkış Yap</a>
        <?php endif; ?>
    </div>
</header>

<main>
    <section class="arananoyunlar">
        <h2 style="text-align: center; margin-bottom: 20px;">Merhaba, <?php echo $_SESSION['username']; ?>! 🎮</h2>
        
        <?php
        $user_id = $_SESSION['user_id'];
        
        // İstatistikleri çekiyoruz
        $toplam_oyun_sorgu = mysqli_query($baglanti, "SELECT count(id) as toplam FROM games WHERE user_id = '$user_id'");
        $toplam_oyun = mysqli_fetch_assoc($toplam_oyun_sorgu)['toplam'];

        $ortalama_puan_sorgu = mysqli_query($baglanti, "SELECT AVG(rating) as ortalama FROM games WHERE user_id = '$user_id' AND rating > 0");
        $ortalama_puan = mysqli_fetch_assoc($ortalama_puan_sorgu)['ortalama'];
        ?>

        <div class="oyunlarigruplama">
            <div class="oyunlarinresimleri" style="padding: 30px; text-align: center;">
                <h3 style="color: var(--vurgu-rengi);">Toplam Oyun</h3>
                <p style="font-size: 2.5rem; font-weight: bold; color: #00d4ff; margin: 10px 0;">
                    <?php echo $toplam_oyun; ?>
                </p>
            </div>

            <div class="oyunlarinresimleri" style="padding: 30px; text-align: center;">
                <h3 style="color: var(--vurgu-rengi);">Ortalama Puanın</h3>
                <p style="font-size: 2.5rem; font-weight: bold; color: #ffcc00; margin: 10px 0;">
                    <?php echo $ortalama_puan > 0 ? number_format($ortalama_puan, 1) : "0"; ?> / 10
                </p>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>GameDia4y | Kişisel Oyun Arşivi | Tüm Hakları Saklıdır.</p>
</footer>

<script src="js/games.js"></script>
</body>
</html>