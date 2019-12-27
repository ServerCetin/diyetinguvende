<?php
$username = $_POST['username'];
$sifre = $_POST['password'];
$db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');

if (!$username|| !$sifre) {
    die("boş alan bırakmayınız!");
}
else{
	if($sorgu1 = $db->prepare("SELECT * FROM kullanici WHERE KullaniciAdi = '$username' AND Sifre = '$sifre' AND KullaniciTurId=1")){
	$sorgu1->execute(array($username,$sifre));
	$islem1=$sorgu1->fetch();
	$_SESSION['Diyetisyen'] = $islem1[$username];
    echo'<meta http-equiv="refresh" content="0;URL=Diyetisyen.html">';
	}
	else if($sorgu2 = $db->prepare("SELECT * FROM kullanici WHERE KullaniciAdi = '$username' AND Sifre = '$sifre' AND KullaniciTurId=2")){
	$sorgu2->execute(array($username,$sifre));
	$islem2=$sorgu2->fetch();
	$_SESSION['SporHoca'] = $islem2[$username];
	echo'<meta http-equiv="refresh" content="0;URL=koc">';
	}
	else if($sorgu3 = $db->prepare("SELECT * FROM kullanici WHERE KullaniciAdi = '$username' AND Sifre = '$sifre' AND KullaniciTurId=3")){
	$sorgu3->execute(array($username,$sifre));
	$islem3=$sorgu3->fetch();
	$_SESSION['Kullanici'] = $islem3[$username];
	echo'<meta http-equiv="refresh" content="0;URL=kullaniciSayfasi">';
	}
	
	


/**/
/*if($Diyetisyen){
	echo"Diyetisyen girdi";
	/*$Diyetisyen->execute(array($username,$sifre));
	}
else if($SporHoca){
	echo"Sporhoca girdi";
	/*$SporHoca->execute(array($username,$sifre));
		$_SESSION['SporHoca'] = $SporHoca;
echo'<meta http-equiv="refresh" content="0;URL=koc">';
}


else if($Kullanici){
	echo"Kullanici girdi";
	/*$Kullanici->execute(array($username,$sifre));
		$_SESSION['Kullanici'] =$Kullanici;
echo'<meta http-equiv="refresh" content="0;URL=kullaniciSayfasi">';*/
}
	





?>
