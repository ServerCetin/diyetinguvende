<?php
session_start();
ob_start();

if(isset($_SESSION["kullaniciTur"]))
    header("Location: /index.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Giriş Yap</title>
    <link href="./logincss/giris.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
</head>
<style>
    body {
        background-image: url(./images/h1.png);
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
            <!-- <a href="sifre-sifirla.php" style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Şifremi Sıfırla!</a> -->
            <a href="sifremi-unuttum.php" style=" margin-left:30px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Şifremi Unuttum!</a>
        </div><br /><br />
        Hesabınız Yok Mu ?<a href="kayit-ol.php" style="font-family:'Play', sans-serif;">&nbsp;Kayıt Ol</a>

    </form>
</div>

</body>
</html>
<?php

if(isset($_POST['username'],$_POST['password'])){
    $username = $_POST['username'];
    $sifre = $_POST['password'];
    include "baglan.php";
    $islem1=null;
    if (!$username|| !$sifre) {
        die("Boş alan bırakmayınız!");
    }
    else{
        $sorgu1 = $db->prepare("SELECT * FROM kullanici WHERE KullaniciAdi = '$username' AND Sifre = '$sifre'");// verileri karşılaştırır.
        $sorgu1->execute(array($username,$sifre));// yazılan değişkenleri kontrol eder.
        $islem1=$sorgu1->fetch();

        if($islem1){
            $sorgu = $db->prepare("SELECT * FROM kullanici where KullaniciAdi=?");
            $sorgu ->execute(array($username ));
            $kisi = $sorgu->fetch();

            if($kisi [KullaniciTurId]==1)
                $_SESSION["kullaniciTur"] = "Diyetisyen";
            if($kisi [KullaniciTurId]==2)
                $_SESSION["kullaniciTur"] = "Spor Hocası";
            if($kisi [KullaniciTurId]==3)
                $_SESSION["kullaniciTur"] = "Kullanici";
            if($kisi [KullaniciTurId]==4)
                $_SESSION["kullaniciTur"] = "Yönetici";

            $_SESSION["username"] = $_POST['username'];
            $_SESSION["ad"] = $kisi [Ad];
            $_SESSION["soyad"] = $kisi [Soyad];
            $_SESSION["cinsiyet"] = $kisi [CinsiyetId] ==1 ? "Kadın" : "Erkek";
            $_SESSION["Id"] = $kisi [Id];
            $_SESSION["telefon"] = $kisi [TelefonNo];
            $_SESSION["dogumTarih"] = $kisi [DogumTarih];
            $_SESSION["email"] = $kisi [Email];
            $_SESSION["kullaniciTurId"]=$kisi [KullaniciTurId];

            if($_SESSION["kullaniciTurId"]==3){
                $id = $kisi [Id];

                $sorgu2 = $db->prepare("SELECT * FROM hastabilgi where KullaniciId=?");
                $sorgu2 ->execute(array($id));
                $kisi2 = $sorgu2->fetch();

                $_SESSION["boy"] = $kisi2 [Boy];
                $_SESSION["kilo"] = $kisi2 [Kilo];
                $_SESSION["yagOrani"] = $kisi2 [YagOrani];
            }
        }

    }

    if($islem1['KullaniciTurId']==1 || $islem1['KullaniciTurId']== 2 || $islem1['KullaniciTurId']== 3 || $islem1['KullaniciTurId']==4){
        header("Location: /index.php");
    }

}

?>

