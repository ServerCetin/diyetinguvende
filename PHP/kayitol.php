<?php

$ad=$_POST['ad'];
$soyad = $_POST['soyad'];
$username = $_POST['kullanici_adi'];
$sifre = $_POST['pass'];
$mail = $_POST['mail'];
$cinsiyet=$_POST['cinsiyet'];
$yas=$_POST['yas'];
$dogum=$_POST['dogum'];
$Secim=$_POST['slct'];

$db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
if($db){
echo "Veri Tabanı bağlantısı gerçekleşti.";
}
else{
echo "Bağlantı başarısız.";
}
$ekle = $db->exec("INSERT INTO kullanici (Ad,Soyad,KullaniciAdi,Sifre,Email,CinsiyetId,Yas,DogumTarih,KullaniciTurId) VALUES ('$ad', '$soyad','$username','$sifre','$mail','$cinsiyet','$yas','$dogum','$Secim')");
if($ekle){
echo"Kayıt Olundu ";
}
else{
echo " EKlenemedi";}



?>

