<?php 
include 'baglan.php'; 
$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// --- YÖNERGE GEREĞİ ARAMA VE FİLTRELEME MANTIĞI ---
$arama_terimi = isset($_GET['ara']) ? $_GET['ara'] : '';

if (!empty($arama_terimi)) {
    // İsime göre ara ve en yeni ekleneni en üstte göster (ORDER BY id DESC)
    $sorgu = mysqli_query($baglanti, "SELECT * FROM games WHERE user_id = '$user_id' AND game_name LIKE '%$arama_terimi%' ORDER BY id DESC");
} else {
    // Normal listeleme ve en yeni ekleneni en üstte göster
    $sorgu = mysqli_query($baglanti, "SELECT * FROM games WHERE user_id = '$user_id' ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Oyun Arşivim - GameDia4y</title>
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
        <a href="add-game.php">Oyun Ekle</a> 
        <a href="games.php">Yorum ve Puanlama</a>
        <a href="archive.php">Oyun Arşivim</a>
        <a href="profile.php">Profilim</a>
        <a href="about.php">Bu Sayfa Hakkında</a>
    </nav>
    <div class="sag-butonlar">
        <button id="Tema-toggle">Koyu Modu Aç/Kapat</button>
        <a href="cikis.php" class="cikis-alt-link">Çıkış Yap</a>
    </div>
</header>

<main>
    <section class="arananoyunlar">
        <h2 class="center-heading">Kişisel Oyun Arşivim</h2>

        <div class="arama-alani" style="margin-bottom: 30px; text-align: center;">
            <form action="archive.php" method="GET">
                <input type="text" name="ara" placeholder="Oyun adı ara..." value="<?php echo $arama_terimi; ?>"
                       style="padding: 10px; width: 60%; border-radius: 5px; border: 1px solid var(--vurgu-rengi); background: var(--game-background); color: var(--text-color);">
                <button type="submit" class="buton yes-buton" style="display: inline-block; width: auto; padding: 10px 20px; margin-left: 10px;">Ara</button>
                <a href="archive.php" class="buton no-buton" style="display: inline-block; width: auto; padding: 10px 20px; margin-left: 5px; text-decoration: none;">Temizle</a>
            </form>
        </div>

        <div class="oyunlarigruplama">
            <?php while($satir = mysqli_fetch_assoc($sorgu)) { ?>
                <div class="oyunlarinresimleri">
                    <h3><?php echo $satir['game_name']; ?></h3>
                    <p>Tür: <b><?php echo $satir['genre']; ?></b></p>
                    <p>Durum: <b><?php echo $satir['status']; ?></b></p>

                    <?php if($satir['rating'] > 0): ?>
                        <p>Puanım: <b style="color: #ffcc00;"><?php echo $satir['rating']; ?>/10</b></p>
                    <?php endif; ?>

                    <?php if(!empty($satir['review'])): ?>
                        <p style="margin-top:10px; font-size: 0.9rem; font-style: italic; opacity: 0.8;">
                            "<?php echo $satir['review']; ?>"
                        </p>
                    <?php endif; ?>
                    
                    <a href="islem.php?sil=<?php echo $satir['id']; ?>" class="buton no-buton" onclick="return confirm('Bu oyunu arşivden silmek istediğine emin misin?')">Arşivden Sil</a>
                </div>
            <?php } ?>
        </div>
    </section>
</main>

<footer>
    <p>GameDia4y | <?php echo date("Y"); ?> | Ödev Projesidir</p>
</footer>

<script src="js/games.js"></script>
</body>
</html>