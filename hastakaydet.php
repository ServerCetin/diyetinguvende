<?php
session_start();
ob_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Hasta Kaydet-Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "diyetisyenmenu.php";}?>
            <section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form>	
				 <fieldset>
            <legend>Hasta Kaydet</legend><br>
				<form action="#" method="get">		
				
				<p>Hastanın Kullanıcı Adı:
						<input type="text" name="username" id="username" value="" /><br /></p>
						
				<p>Hastanın Diyet Listesi:
				<select><option>Liste 1</option>
				<option>Liste 2</option>
				<option>Liste 3</option>
				<option>Liste 4</option></select>
			<p><a href="#" class="button buttonS" style="margin-left:28%;"name="kodgonder">Ekle</a>
"
			
			
				
			
			</form>	
				</div>
		</article> </fieldset>
			
		
				
		

			
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>

<?php
if(isset($_POST['sorun'],$_POST['message'])){
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
    $hasta = $_POST['username'];
    $diyetBaslangic = date("Y-m-d H:i:s");
    $gonderenId = $_SESSION['Id'];
    $ekle = $db->exec("INSERT INTO hastadiyet(DiyetisyenId,HastaId,DiyetBaslangic) VALUES ('$gonderenId','$hasta','$diyetBaslangic')");
    // diyetisyenin tablosu eklenecek
    echo  $ekle;
    echo  $ekle;
    echo  $ekle;
}

?>
