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
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
					<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../Menus/koc-menu.php";}?>

			
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			
				
				<fieldset>

					<legend>Mesajlarım</legend>
					
				
			<br>
			
				<table >
					<tr>
						<th>Gelen Mesajlar</th>
						<th>Kimden</th>
						<th>Saat</th>
					
						
					</tr>
					<tr>
						<td>Örnek Gelen Mesaj 1</td>
						<td>Diyetisyen</td>
						<td>1 saat önce</td>
						
					</tr>
					<tr>
						<td>Örnek Gelen Mesaj 2 </td>
						<td>Hasta1</td>
						<td>1 gün önce</td>
						</tr>
					</table><br><br>
				
					
						<table >
					<tr>
						<th>Hastalarım</th>
						<th>Diyetisyeni</th>
						<th>Mesaj</th>
						
					
						
					</tr>
					<tr>
						<td>Server
						</td>
						<td>Çetin</td>
						<td><a href="#" class="button button-reversed">Hastaya Mesaj</a>
						<a href="#" class="button button-reversed" style="margin-left:10px;">Diyetisyene Mesaj</a>
						</td>
					</tr>
					<tr>
						<td>Server
						</td>
						<td>Çetin</td>
						<td><a href="#" class="button button-reversed">Hastaya Mesaj</a>
						<a href="#" class="button button-reversed" style="margin-left:10px;">Diyetisyene Mesaj</a>
						</td>
					</tr>
					
					</table><br><br>
						
					
						
						
			
			
				
				</div>
		</article>
			
		
				
		

			
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
