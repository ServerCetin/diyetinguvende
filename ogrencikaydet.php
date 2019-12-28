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

<title>Ogrenci Kaydet-Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "sporkocumenu.php";}?>


			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			
				<fieldset>
            <legend>Öğrenci Kaydet</legend><br>
				<form action="#" method="get">		
				
				<p>Öğrencinin Kullanıcı Adı:
						<input type="text" name="username" id="username" value="" /><br /></p>
						
			<p>Öğrencinin Diyet Listesi:
				<select>Seçin<option>Liste 1</option>
				<option>Liste 2</option>
				<option>Liste 3</option>
				<option>Liste 4</option></select>
			<p><a href="#" class="button buttonS" style="margin-left:28%;"name="kodgonder">İstek Gönder</a>
			
				
			</form>	
				</div>
		</article> </fieldset>
			
			</div>
		</article>
			
		
				
		

			
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
