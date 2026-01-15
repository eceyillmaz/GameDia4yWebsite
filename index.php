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
    <title>GameDia4y - Kişisel Oyun Arşivi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/games.png">
</head>
<body>
<a href="index.php" > içeriğe atla
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
    <h2>En Çok Aranan Oyunlar</h2>
    <p class="subtitle"> <i> Puan vermek istediğiniz oyun için Listeme Ekle'ye tıklayınız. Eklenen oyun otomatik olarak
        'Yorum ve Puanlama' kısmına gönderilecektir.</i>
    </p>

    <div class="oyunlarigruplama">
        
        <div class="oyunlarinresimleri">
            <img src="images/gta.jpg" alt="GTA V">
            <h3>Grand Theft Auto V</h3>
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Grand Theft Auto V">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/witcher.jpg" alt="The Witcher 3">
            <h3>The Witcher 3</h3>
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="The Witcher 3">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>
        
        <div class="oyunlarinresimleri">
            <img src="images/rdr2.jpg" alt="Red Dead Redemption 2">
            <h3>Red Dead Redemption 2</h3>
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Red Dead Redemption 2">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/tlou.jpeg" alt="The Last of Us">
            <h3>The Last of Us</h3>
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="The Last of Us">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>
        
        <div class="oyunlarinresimleri">
            <img src="images/gow.jpeg" alt="God of War">
            <h3>God of War</h3>
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="God of War">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/cyb.jpeg" alt="Cyberpunk 2077">
            <h3>Cyberpunk 2077</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Cyberpunk 2077">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>
          
        <div class="oyunlarinresimleri">
            <img src="images/skyrim.jpg" alt="Skyrim">
            <h3>Skyrim</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Skyrim">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/beyond.jpg" alt="Beyond 2: Souls">
            <h3>Beyond 2: Souls</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Beyond 2: Souls">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/hades.jpeg" alt="Hades">
            <h3>Hades</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Hades">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/valo.jpeg" alt="Valorant">
            <h3>Valorant</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Valorant">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/heavyrain.jpeg" alt="Heavy Rain">
            <h3>Heavy Rain</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Heavy Rain">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/hgw.jpeg" alt="Hogwarts Legacy">
            <h3>Hogwarts Legacy</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Hogwarts Legacy">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
        </div>

        <div class="oyunlarinresimleri">
            <img src="images/tr.jpeg" alt="Tomb Raider">
            <h3>Tomb Raider</h3> 
            <p>Bu oyunu oynadın mı?</p>
            <form action="islem.php" method="POST">
                <input type="hidden" name="game_name" value="Tomb Raider">
                <select name="played" class="secim-kutusu">
                    <option value="İstek Listesi">İstek Listesi</option>
                    <option value="Oynandı">Oynandı</option>
                    <option value="İzlendi">İzlendi</option>
                </select>
                <button type="submit" name="hizli_ekle_buton" class="buton yes-buton">Listeme Ekle</button>
            </form>
            <a href="#" class="buton no-buton">Hayır</a>
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