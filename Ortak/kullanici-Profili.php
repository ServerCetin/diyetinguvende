<?php
session_start();
ob_start();
?>


<!doctype html>
<html>

<head>

<meta charset="UTF-8">
<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasini saglar-->
</head>

<body>

		<section id="body" class="width">
		 <?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "../Menus/kullanici-menu.php";}
		else if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../Menus/diyetisyen-menu.php";}
		else if ($_SESSION["kullaniciTur"] == "Yönetici"){include "../Menus/yonetici-menu.php";}
		else {include "../Menus/koc-menu.php";}	?>

			
			<section id="content" class="column-right">
                <fieldset>
                    <form action="#" method="POST">
                <?php
                if($_SESSION['kullaniciTur']=="Kullanici"){
                    $boy = $_SESSION["boy"];
                    $kilo = $_SESSION["kilo"];
                    $yagOrani = $_SESSION["yagOrani"];
                    echo '
                    <div class="yeni" >
                                                    <br>
                                                    <p><label for="name">Boy:</label>
                                                    <input type="text" name="boy" id="boy" value="'. $boy.'" /><br /></p>	
                                                    <p><label for="name">Kilo:</label>
                                                    <input type="text" name="kilo" id="kilo" value="'.$kilo.'" /><br /></p>	
                                                    <p><label for="name">Yağ Oranı:</label>
                                                    <input type="text" name="fat" id="fat" value="'.$yagOrani.'" /><br /></p>
                    </div>
                    ';
                }?>

	    <article>
<div class="beyaz" >
<h3></h3>
			
				<br>

						<p><label for="name">Adı:</label>
						<input type="text" name="ad" id="ad" value="<?php echo $_SESSION["ad"] ?>" /><br /></p>
						<p><label for="soyad">Soyadı:</label>
						<input type="text" name="soyad" id="soyad" value="<?php echo $_SESSION["soyad"] ?>" /><br /></p>
						<p><label for="email">E-Posta:</label>
						<input type="text" name="email" id="email" value="<?php echo $_SESSION["email"] ?>" /><br /></p>
						<p><label for="tel">Telefon Numarası:</label>
						<input type="text" name="tel" id="tel" value="<?php echo $_SESSION["telefon"] ?>" /><br /></p>
						<p><label for="gender">Cinsiyet:</label>
                        <?php echo $_SESSION["cinsiyet"] ?>
                        <p><input type="submit" name="send" class="formbutton" value="Bilgilerimi Güncelle" /></p>
					</form>
	
				</fieldset>
				
				<p>&nbsp;</p>
				
					
			</div>
		</article>

			
			<footer class="clear">
				<p>&copy; 2019 Diyetin Güvende.</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
<?php
if(isset($_SESSION['Id'],$_POST['ad'],$_POST['soyad'],$_POST['email'],$_POST['tel'])){

    $id = $_SESSION['Id'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $boy = $_POST['boy'];
    $kilo = $_POST['kilo'];
    $yagOrani = $_POST['fat'];

    include "../baglan.php";
    $guncelle = $db->exec("UPDATE  kullanici SET Ad='$ad',Soyad='$soyad',Email='$email',TelefonNo='$tel' WHERE Id='$id'");
    if($guncelle) {
        $_SESSION["ad"] = $ad;
        $_SESSION["soyad"] = $soyad;
        $_SESSION["email"] = $email;
        $_SESSION["telefon"] = $tel;
    }
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
    $guncelle = $db->exec("UPDATE  hastabilgi SET Boy='$boy',Kilo='$kilo',YagOrani='$yagOrani'WHERE KullaniciId='$id'");
    if($guncelle){
        $_SESSION["kilo"] = $kilo;
        $_SESSION["boy"] = $boy;
        $_SESSION["yagOrani"] = $yagOrani;
        echo "başarılı";
    }
    if(!$guncelle)
        echo "2 bşarızız";
}

?>