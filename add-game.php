<?php include 'baglan.php'; 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta author="Ece Yilmaz" />
    <meta description="Web site hakkında bilgi" />
    <title>GameDia4y - Oyun Ekle</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/games.png">
</head>
<body>
<a href="index.php"> içeriğe atla </a>
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
<section>
    <h2 id="icerik">Yeni Oyun Ekle</h2>
    <p class="subtitle"> <i> Eklemek istediğiniz oyunu giriniz, listeye eklediğinizde otomatik olarak 'Oyun Arşivim' sekmesine eklenecektir.</i> </p>

   <div class="arananoyunlar">
    <div class="puanlma"> 
        <form action="islem.php" method="POST">
            
            <label>Oyun Adı</label>
            <input type="text" name="game_name" placeholder="Oyun adını giriniz" required>

            <label>Oyun Türü</label>
            <select name="game_type">
                <option value="">Seçiniz</option>
                <option value="Aksiyon">Aksiyon</option>
                <option value="Macera">Macera</option>
                <option value="RPG">RPG</option>
                <option value="Simülasyon">Simülasyon</option>
                <option value="Bulmaca">Bulmaca</option>
                <option value="Spor/Yarış">Spor/Yarış</option>
            </select>
            
            <label>Oynama/İzleme Süresi (Saat)</label>
            <input type="number" name="play_time" min="1">

            <label>Oynandı mı, izlendi mi?</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="played" value="Oynandı"> Oynandı
                </label>
                <label>
                    <input type="radio" name="played" value="İzlendi"> İzlendi
                </label>
            </div>

            <button type="submit" name="oyun_ekle_butonu" class="yes-buton">Oyunu Listeye Ekle</button>
        </form>
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