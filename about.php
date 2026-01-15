<?php include 'baglan.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta author="Ece Yilmaz" />
    <meta description="Web site hakkında bilgi" />
    <title>GameDia4y - Bu Sayfa Hakkında</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/games.png">
</head>
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
    <div class="arananoyunlar">
        <div class="about"> <!--bu kısımda hakkında kısmı. site hakkında bilgileri yazdım-->
            <h2>GameDia4y Sitesi</h2>
            <p>
                Bu web uygulaması, kişisel bir oyun arşividir. Kullanıcıların oynadığı/izlediği oyunları kaydetmesine,
                 puanlamasına ve yorumlamasına olanak tanır.
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