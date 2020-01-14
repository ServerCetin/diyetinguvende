<?php
session_start();
ob_start();

$ad = $_SESSION["ad"];
$username = $_SESSION["username"];

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "../Menus/kullanici-menu.php";}
		else if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../Menus/diyetisyen-menu.php";}
else {include "../Menus/koc-menu.php";}	?>
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<fieldset>


				<legend> Destek</legend>
					<form action="#" method="POST">
                        Sorunun Kategorisi:
                        <select name="sorun">
                            <?php
                            $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
                            $listele = $db->query("SELECT * FROM destekkategori", PDO::FETCH_ASSOC);
                            if ( $listele->rowCount() )
                            {
                                foreach( $listele as $gelenveri )
                                {
                                    echo  "<option value=".$gelenveri['Id'].">".$gelenveri['Ad']."</option>";
                                }
                            }
                            ?>
                        </select><br><br>
						<p><label for="message">Mesajınız:</label>
						<textarea cols="60" rows="11" name="message" id="message"></textarea><br /></p>
						<p><input type="submit" name="send" class="formbutton" value="Gönder" /></p>
						<p><input type="reset" name="resetle" class="formbutton" value="Sıfırla" /></p>
						<br>
						<br>
						<img src="../images/whatsapp.png" width=50px height=50px > <h5>WhatsApp Hattı: 05** *** ****</h5>
					</form>
			</fieldset>
			
				
			
				</div>
		</article>
			<footer class="clear">
								<p>&copy; 2019 Diyetin Güvende.</p>

			</footer>

		</section>

		<div class="clear">		
</div>

	</section>
	

</body>
</html>

<?php
if(isset($_POST['sorun'],$_POST['message'])){
    include "../baglan.php";
    $sorunId = $_POST['sorun'];
    $message = $_POST['message'];
    $gonderenId = $_SESSION['Id'];
	$id = 13;
    //$ekle = $db->exec("INSERT INTO destek (Id,GonderenId,Sorun,SorunKategoriId) VALUES ($id,'$gonderenId','$message','$sorunId')");
	
	$query = $db->prepare("INSERT INTO destek SET
	GonderenId = ?,
	Sorun = ?,
	SorunKategoriId = ?");
	$insert = $query->execute(array(
		 $gonderenId, $message, $sorunId
	));
    $last_id = $db->lastInsertId();
    if ( $insert ){
		$last_id = $db->lastInsertId();
}
}


?>