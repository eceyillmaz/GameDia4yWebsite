GameDia4y, oyunseverlerin kişisel hesaplar oluşturarak kütüphanelerini yönettikleri, veritabanı tabanlı dinamik bir web uygulamasıdır. Bu proje, ara ödevdeki statik yapının PHP ve MySQL teknolojileri ile genişletilmesiyle geliştirilmiştir.

Teknik Gereksinimler & Teknolojiler
Sunucu: XAMPP (Apache + MySQL).
Backend: PHP 8.x 
Veritabanı: MySQL 
Frontend: HTML5, CSS,, JavaScript.
 Özellikler
Kullanıcı Kayıt ve Giriş Sistemi: session yönetimi ile kişisel hesap oluşturma ve güvenli oturum açma.
Dinamik Veri Yönetimi: Formlar aracılığıyla veritabanına yeni oyun kayıtları ekleme.
Kalıcı Arşivleme: Veriler artık localStorage yerine MySQL veritabanında güvenle saklanır.
Gelişmiş Filtreleme: Arşiv sayfasında oyun ismine göre anlık arama (SELECT ... LIKE).
İnteraktif Tema: Kullanıcı tercihine göre anlık Koyu/Açık mod geçişi.
Dosya Yapısı 

index.php: Kullanıcıyı karşılayan ana ekran ve navigasyon merkezi.
login.php / register.php: Kullanıcı giriş ve kayıt arayüzleri.
islem.php: Formlardan gelen verileri işleyen ve veritabanı sorgularını yöneten motor dosya.
baglan.php: Veritabanı bağlantı ayarları ve oturum başlatma (db.php).
archive.php: Veritabanındaki oyunların tablo/kart şeklinde listelendiği sayfa.
add-game.php: Detaylı oyun ekleme formu (Text, Number, Date inputları içerir).
🚀 Nasıl Çalıştırılır?

XAMPP panelinden Apache ve MySQL servislerini başlatın.
db_oyunlar.sql dosyasını phpMyAdmin üzerinden içe aktarın.
Proje klasörünü C:/xampp/htdocs/ içine kopyalayın.
Tarayıcınızdan localhost/Klasor_Adiniz/login.php adresine giderek giriş yapın.

Geliştirici Ece YILMAZ - Bursa Uludağ Üniversitesi Web Tabanlı Programlama Final Projesi
