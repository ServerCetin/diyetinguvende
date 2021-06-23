<?php
require_once 'settings/controls.php';
require_once 'settings/functions.php';
session_start();
ob_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kayit ol</title>
    <link rel="stylesheet" href="./logincss/kayit-ol.css"  type="text/css" />
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <style>
        #msg {
            visibility: hidden;
            min-width: 250px;
            background-color:yellow;
            color: #000;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            right: 30%;
            top: 30px;
            font-size: 17px;
            margin-right:30px;
        }

        #msg.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {top: 0; opacity: 0;}
            to {top: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {top: 0; opacity: 0;}
            to {top: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {top: 30px; opacity: 1;}
            to {top: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {top: 30px; opacity: 1;}
            to {top: 0; opacity: 0;}
        }
    </style>
</head>

<body>
<style>
    body {
        background-image: url(../images/h1.png);
    }
</style>
<div class="signup">
   <form action="" method="POST">
        <h2 style="color: #fff;">Kayıt Ol</h2>

        <?php if(isset($_SESSION['Uyari']))
                echo $_SESSION['Uyari']; ?>

        <div class="select">
            <select name="slct" id="slct">
                <option selected disabled>Bir seçenek belirleyiniz.</option>
                <option value="1">Diyetisyen</option>
                <option value="2">Spor Hocası</option>
                <option value="3">Kullanıcı</option>
            </select>
        </div>

        <input type="text" name="ad" placeholder="Ad"><br><br>
        <input type="text" name="soyad"  placeholder="Soyad"><br><br>
        <input type="text" name="kullanici_adi"  placeholder="Kullanıcı Adı"><br><br>
        <input type="password" name="pass" id="pass" placeholder="Şifre" onkeyup="eslesme();"><br><br>
        <input type="password" name="pass1" id="pass1"  placeholder="Şifre Tekrar" onkeyup="eslesme();"><br><br>
        <input type="mail" name="mail" id="ad" placeholder="E-Posta Adresi" ><br><br>
        <input type="radio" align="right" name="cinsiyet" value="1"> Kadın<br>
        <input type="radio" align="left" name="cinsiyet" value="2"> Erkek<br><br>
        <input type="text" name="tel" placeholder="Telefon numaranız" maxlength="11"><br><br>
        Doğum Tarihi: 
        <input type="date" name="dogum" placeholder="Doğum Tarihi"><br><br>
        <input type="submit" value="Kayıt Ol"  name="kayitol"><br><br>


        <a href="giris-yap.php" style="text-decoration: none; font-family: 'Play', sans-serif; color: yellow;">&nbsp;Giriş Yap</a>
        <p id="yazdir" width="85"></p>
        <script>
    
            function eslesme(){
    
                var sifre=document.getElementById("pass").value;
                var sifreTekrar=document.getElementById("pass1").value;

    
                    if(sifre==sifreTekrar){
                    document.getElementById("yazdir").innerHTML = "";
                    document.getElementById("yazdir").style.color=("white");
        
                }
                else
                {           
                    document.getElementById("yazdir").innerHTML = "Şifreler eşleşmedi! Tekrar girin.";
                    document.getElementById("yazdir").style.color=("red");
                }
    
    }


</script>
    </form>

</div>
</body>
</html>


<?php
if(isset($_POST['ad'],$_POST['soyad'],$_POST['kullanici_adi'],$_POST['pass'],$_POST['pass'],
    $_POST['mail'],$_POST['cinsiyet'],$_POST['tel'],$_POST['dogum'],$_POST['slct'])){
    $ad= Guvenlik($_POST['ad']);
    $soyad = Guvenlik($_POST['soyad']);
    $username = Guvenlik($_POST['kullanici_adi']);
    $sifre = Guvenlik($_POST['pass']);
    $mail = Guvenlik($_POST['mail']);
    $cinsiyet= Guvenlik($_POST['cinsiyet']);
    $tel= Guvenlik($_POST['tel']);
    $dogum= Guvenlik($_POST['dogum']);
    $Secim= Guvenlik($_POST['slct']);
	$pfoto = 'profil.png';

    include "baglan.php";

    $ekle = $db->exec("INSERT INTO kullanici 
(Ad,Soyad,KullaniciAdi,Sifre,Email,CinsiyetId,DogumTarih,KullaniciTurId,TelefonNo,pfoto) 
VALUES ('$ad', '$soyad','$username','$sifre','$mail','$cinsiyet','$dogum','$Secim','$tel','$pfoto')");
    if($ekle){
        if($Secim==3){
            $sorgu = $db->prepare("SELECT * FROM kullanici where KullaniciAdi=?");
            $sorgu ->execute(array($username));
            $kisi = $sorgu->fetch();
            $kisiId = $kisi['Id'];

            $deger =0;
            echo $kisiId." ".$deger;
            $ekle = $db ->exec("INSERT INTO hastabilgi (KullaniciId,Boy,Kilo,YagOrani) VALUES ('$kisiId','$deger','$deger','$deger')");
        }
        header("Location: giris-yap.php");
    }
}
?>