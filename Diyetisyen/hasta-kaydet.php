<?php
session_start();
ob_start();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Hasta Kaydet-Diyetin Güvende!</title>
<<<<<<< HEAD:Diyetisyen/hasta-kaydet.php
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
=======
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
>>>>>>> b5602dcb49a0c65a80656666b187a66dbb4c3453:Diyetisyen/hasta-kaydet.php

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../Menus/diyetisyen-menu.php";}?>
            <section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form>	
				 <fieldset>
            <legend>Hasta Kaydet</legend><br>
				<form action="#" method="POST">
				
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
			
                <?php
                if(isset($_POST['username'])){
                    $username = $_POST['username'];

                    include 'baglan.php';
                    if($kullanici = $db->query("SELECT * FROM kullanici where KullaniciAdi ='$username'")){
                        $kullanici['']; // düzenlenecek
                    }
                }

                ?>
				
		

			
			

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
