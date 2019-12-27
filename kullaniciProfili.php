<?php
session_start();
ob_start();
?>


<!doctype html>
<html>

<head>

<meta charset="UTF-8">
<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasini saglar-->
</head>

<body>

		<section id="body" class="width">
		 <?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "kullanicimenu.php";}
		else if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "diyetisyenmenu.php";}
else {include "sporkocumenu.php";}	?>

			
			<section id="content" class="column-right">
  <div class="yeni" >
  <fieldset>
<form action="#" method="get">
                        <br>
			    

						<p><label for="name">Boy:</label>
						<input type="text" name="boy" id="boy" value="<?php if(isset($_SESSION['boy'])){echo $_SESSION["boy"];} ?>" /><br /></p>	
						<p><label for="name">Kilo:</label>
						<input type="text" name="kilo" id="kilo" value="<?php  if(isset($_SESSION['kilo'])){echo $_SESSION["kilo"];} ?>" /><br /></p>	
						<p><label for="name">Yağ Oranı:</label>
						<input type="text" name="fat" id="fat" value="<?php if(isset($_SESSION['yagorani'])){echo $_SESSION["yagorani"];} ?>" /><br /></p>
						<p><label for="name">Rozet Sayısı:</label>
						<input type="text" name="badge" id="badge" value="" /><br /></p>
  
</form>
	
				</fieldset>




</div>  
	    <article>
<div class="beyaz" >
<h3></h3>
			
				<br>
			    <fieldset>

					
					<form action="#" method="POST">
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
				<p>&copy; 2019 Diyetin G�vende.</p>
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
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
    $guncelle = $db->exec("UPDATE  kullanici SET Ad='$ad',Soyad='$soyad',Email='$email',TelefonNo='$tel' WHERE Id='$id'");
    if($guncelle){
        $_SESSION["ad"] = $ad;
        $_SESSION["soyad"] = $soyad;
        $_SESSION["email"] = $email;
        $_SESSION["telefon"] = $tel;
    }


}

?>