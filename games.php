<?php include 'baglan.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>GameDia4y - Yorum ve Puanlama</title>
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
        <h2>Oyunlarını Puanla</h2>
        <div class="oyunlarigruplama">
            <?php 
            $user_id = $_SESSION['user_id'];
// SQL Sorgusu: games tablosundan oyunları ID'ye göre tersten (en yeni en üstte) sırala
$sorgu = mysqli_query($baglanti, "SELECT * FROM games WHERE user_id = '$user_id' ORDER BY id DESC");
            while($satir = mysqli_fetch_assoc($sorgu)) {
                ?>
                <div class="oyunlarinresimleri" style="padding: 20px; text-align: left;">
                    <h3><?php echo $satir['game_name']; ?></h3>
                    
                    <form action="islem.php" method="POST">
                        <input type="hidden" name="game_id" value="<?php echo $satir['id']; ?>">
                        
                        <label>Puanın (1-10):</label>
                        <input type="number" name="rating" min="1" max="10" value="<?php echo $satir['rating']; ?>" style="width: 50px;">
                        
                        <label>Yorumun:</label>
                        <textarea name="review" style="width: 100%; height: 60px;"><?php echo $satir['review']; ?></textarea>
                        
                        <button type="submit" name="puan_kaydet" class="buton yes-buton" style="margin-top:10px;">Kaydet</button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</main>

<script src="js/games.js"></script>
</body>
</html>