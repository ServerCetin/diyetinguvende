<?php
session_start();
ob_start();

?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kayit ol</title>
    <link href="./logincss/kayitol.css" rel="stylesheet" type="text/css" />
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
        background-image: url(./girisimg/h1.png);
    }
</style>
<div class="signup">
    <form action="" method="POST">
        <h2 style="color: #fff;">Kayıt Ol</h2>

        <div class="select">
            <select name="slct" id="slct">
                <option selected disabled>Bir seçenek belirleyiniz.</option>
                <option value="1">Diyetisyen</option>
                <option value="2">Spor Hocası</option>
                <option value="3">Kullanıcı</option>
            </select>
        </div>

        <input type="text" name="ad" placeholder="Ad"><br><br>
        <input type="text" name="soyad" placeholder="Soyad"><br><br>
        <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı"><br><br>
        <input type="password" name="pass" placeholder="Şifre"><br><br>
        <input type="mail" name="mail" placeholder="E-Posta Adresi" ><br><br>
        <input type="radio" align="right" name="cinsiyet" value="1"> Kadın<br>
        <input type="radio" align="left" name="cinsiyet" value="2"> Erkek<br><br>
        <input type="text" name="tel" placeholder="Telefon numaranız"><br><br>
        <input type="date" name="dogum" placeholder="Doğum Tarihi"><br><br>
        <input type="submit" value="Kayıt Ol"  name="kayitol"><br><br>


        <a href="giris.php" style="text-decoration: none; font-family: 'Play', sans-serif; color: yellow;">&nbsp;Giriş Yap</a>
    </form>

</div>
</body>
</html>


<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
print_r(error_get_last());
if(isset($_POST['ad'],$_POST['soyad'],$_POST['kullanici_adi'],$_POST['pass'],$_POST['pass'],$_POST['mail'],$_POST['cinsiyet'],$_POST['tel'],$_POST['dogum'],$_POST['slct'])){
    $ad=$_POST['ad'];
    $soyad = $_POST['soyad'];
    $username = $_POST['kullanici_adi'];
    $sifre = $_POST['pass'];
    $mail = $_POST['mail'];
    $cinsiyet= $_POST['cinsiyet'];
    $tel= $_POST['tel'];
    $dogum= $_POST['dogum'];
    $Secim= $_POST['slct'];

    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
    if($db){
        echo "Veri Tabanı bağlantısı gerçekleşti.";
    }
    else{
        echo "Bağlantı başarısız.";
    }
    $ekle = $db->exec("INSERT INTO kullanici (Ad,Soyad,KullaniciAdi,Sifre,Email,CinsiyetId,DogumTarih,KullaniciTurId,TelefonNo) VALUES ('$ad', '$soyad','$username','$sifre','$mail','$cinsiyet','$dogum','$Secim','$tel')");
    if($ekle){
        if($Secim==3){
        $sorgu = $db->prepare("SELECT * FROM kullanici where KullaniciAdi=?");
        $sorgu ->execute(array($username));
        $kisi = $sorgu->fetch();
        $kisiId = $kisi['Id'];
		/* 
        $ekle1 = $db->query("INSERT INTO hastabilgi (KullaniciId,Boy,Kilo,YagOrani) VALUES (0,0,0,0)");
		print_r(error_get_last());
		 if(!$ekle1)
			 echo 'beni düzgün kodla';
		}
		//header("Location: /giris.php"); */
		$deger =0;
		$query = $db->prepare("INSERT INTO hastabilgi SET
		KullaniciId = ?,
		Boy = ?,
		Kilo = ?,
		YagOrani = ?");
		$insert = $query->execute(array(
			 $kisiId, $deger, $deger, $deger
		));$_SESSION["boy"] = $_POST['Boy'];
			$_SESSION["kilo"] = $_POST['Kilo'];
			$_SESSION["yagorani"] = $_POST['YagOrani'];
		if ( $insert ){
			$last_id = $db->lastInsertId();
			header("Location: /giris.php");
			
} 

    }
    else{
        echo " EKlenemedi";}
    
}

}


?>