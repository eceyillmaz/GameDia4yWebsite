<?php
include 'baglan.php'; // Veritabanı bağlantısı

// --- 1. KAYIT OLMA İŞLEMİ ---
if (isset($_POST['kayit_ol_butonu'])) {
    $kullanici_adi = $_POST['username'];
    $sifre = $_POST['password'];

    // Yönerge Gereği: Boş alan kontrolü
    if (empty($kullanici_adi) || empty($sifre)) {
        header("Location: register.php?durum=bosalan");
        exit();
    }

    $sorgu = "INSERT INTO users (username, password) VALUES ('$kullanici_adi', '$sifre')";
    
    if (mysqli_query($baglanti, $sorgu)) {
        header("Location: login.php?kayit=basarili"); 
    } else {
        header("Location: register.php?durum=hata");
    }
}

// --- 2. GİRİŞ YAPMA İŞLEMİ ---
if (isset($_POST['giris_yap_butonu'])) {
    $kullanici_adi = $_POST['username'];
    $sifre = $_POST['password'];

    // Yönerge Gereği: Boş alan kontrolü
    if (empty($kullanici_adi) || empty($sifre)) {
        header("Location: login.php?hata=bosalan");
        exit();
    }

    $sorgu = mysqli_query($baglanti, "SELECT * FROM users WHERE username = '$kullanici_adi' AND password = '$sifre'");
    $kullanici_verisi = mysqli_fetch_assoc($sorgu);

    if ($kullanici_verisi) {
        $_SESSION['user_id'] = $kullanici_verisi['id'];
        $_SESSION['username'] = $kullanici_verisi['username'];
        header("Location: index.php?giris=basarili");
    } else {
        header("Location: login.php?hata=hatalisifre");
    }
}

// --- 3. FORM İLE OYUN EKLEME İŞLEMİ ---
if (isset($_POST['oyun_ekle_butonu'])) {
    $game_name = $_POST['game_name'];
    $game_type = $_POST['game_type'];
    $played    = $_POST['played'];
    $user_id   = $_SESSION['user_id']; 

    // Yönerge Gereği: Form verilerinin kontrolü
    if (empty($game_name) || empty($game_type)) {
        header("Location: add-game.php?hata=bosalan");
        exit();
    }

    // Veritabanına kayıt ekleme (INSERT)
    $sorgu = "INSERT INTO games (user_id, game_name, genre, status) VALUES ('$user_id', '$game_name', '$game_type', '$played')";
    
    if (mysqli_query($baglanti, $sorgu)) {
        header("Location: games.php?durum=eklendi"); 
    } else {
        echo "Hata: " . mysqli_error($baglanti);
    }
}

// --- 4. OYUN SİLME İŞLEMİ ---
if (isset($_GET['sil'])) {
    $silinecek_id = $_GET['sil'];
    $user_id = $_SESSION['user_id'];

    $sil_sorgu = "DELETE FROM games WHERE id = '$silinecek_id' AND user_id = '$user_id'";
    
    if (mysqli_query($baglanti, $sil_sorgu)) {
        header("Location: archive.php?silme=basarili");
    } else {
        echo "Silme hatası: " . mysqli_error($baglanti);
    }
}

// --- 5. PUAN VE YORUM GÜNCELLEME ---
if (isset($_POST['puan_kaydet'])) {
    $game_id = $_POST['game_id'];
    $rating  = $_POST['rating'];
    $review  = $_POST['review'];

    // Yönerge Gereği: Boş alan kontrolü ve uyarı yönlendirmesi
    if (empty($rating) || empty($review)) {
        header("Location: games.php?hata=bosalan");
        exit();
    }

    $guncelle = "UPDATE games SET rating = '$rating', review = '$review' WHERE id = '$game_id'";

    if (mysqli_query($baglanti, $guncelle)) {
        header("Location: archive.php?guncelleme=basarili");
    } else {
        echo "Hata: " . mysqli_error($baglanti);
    }
}

// --- 6. ANA SAYFADAN SEÇİMLİ HIZLI OYUN EKLEME ---
if (isset($_POST['hizli_ekle_buton'])) {
    $game_name = $_POST['game_name'];
    $status    = $_POST['played']; 
    $user_id   = $_SESSION['user_id']; 

    // Veritabanına veri aktarımı
    $sorgu = "INSERT INTO games (user_id, game_name, status) VALUES ('$user_id', '$game_name', '$status')";
    
    if (mysqli_query($baglanti, $sorgu)) {
        header("Location: games.php?durum=eklendi");
    } else {
        echo "Hata: " . mysqli_error($baglanti);
    }
}
?>