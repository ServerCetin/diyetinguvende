
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Giriş Yap</title>
    <link href="./logincss/giris.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
</head>
<style>
    body {
        background-image: url(./girisimg/h1.png);
    }
</style>
<body>
<div class="signin">

    <form action="" method="POST">
        <h2 style="color:#fff;">Giriş Yap</h2>
        <input type="text" name="username" placeholder="Kullanıcı Adı"/><br /><br />
        <input type="password" name="password" placeholder="Şifre" /><br /><br />
        <input type="submit" value="Giriş Yap" name="girisyap"/><br /><br />
        <div id="container">
            <a href="sifresifirla.html" style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Şifremi Sıfırla!</a>
            <a href="sifremiunuttum.html" style=" margin-left:30px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Şifremi Unuttum!</a>
        </div><br /><br />
        Hesabınız Yok Mu ?<a href="kayitol.php" style="font-family:'Play', sans-serif;">&nbsp;Kayıt Ol</a>

    </form>
</div>

</body>
</html>
<?php

if(isset($_POST['username'],$_POST['password'])){
    $username = $_POST['username'];
    $sifre = $_POST['password'];
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');

    if (!$username|| !$sifre) {
        die("Boş alan bırakmayınız!");
    }
    else{
        session_start();
        $sorgu1 = $db->prepare("SELECT * FROM kullanici WHERE KullaniciAdi = '$username' AND Sifre = '$sifre'");// verileri karşılaştırır.
        $sorgu1->execute(array($username,$sifre));// yazılan değişkenleri kontrol eder.
        $islem1=$sorgu1->fetch();//girilen bilinin karşılığı varmı?

        $sorgu = $db->prepare("SELECT * FROM kullanici where KullaniciAdi=?");
        $sorgu ->execute(array($username ));
        $kisi = $sorgu->fetch();

        if($kisi [KullaniciTurId]==1)
            $_SESSION["kullaniciTur"] = "Diyetisyen";
        if($kisi [KullaniciTurId]==2)
            $_SESSION["kullaniciTur"] = "Spor Hocası";
        if($kisi [KullaniciTurId]==3)
            $_SESSION["kullaniciTur"] = "Kullanici";

        $_SESSION["username"] = $_POST['username'];
        $_SESSION["ad"] = $kisi [Ad];
        $_SESSION["soyad"] = $kisi [Soyad];
        $_SESSION["cinsiyet"] = $kisi [CinsiyetId] ==1 ? "Kadın" : "Erkek";
        $_SESSION["Id"] = $kisi [Id];
        $_SESSION["telefon"] = $kisi [TelefonNo];
        $_SESSION["dogumTarih"] = $kisi [DogumTarih];
        $_SESSION["email"] = $kisi [Email];


        if($islem1['KullaniciTurId']==1){// işlem gerçekleşiyor ise ve kulanıcı id bir ise gir içeri
            $_SESSION['userType'] = "Diyetisyen"; // kullanıcı adını sessiona atar.
            echo'<meta http-equiv="refresh" content="0;URL=diyetisyen.php">';
        }
        else if($islem1['KullaniciTurId']==2){
            $_SESSION['userType'] = "SporHocasi";

            echo'<meta http-equiv="refresh" content="0;URL=koc.php">';
        }
        else if($islem1['KullaniciTurId']==3){
            $_SESSION['userType'] = "Kullanici";

            echo'<meta http-equiv="refresh" content="0;URL=kullaniciSayfasi.php">';
        }
        else{
            echo 'Kullanıcı Adı veya Şifre Hatalı!';

        }

    }


}

?>

