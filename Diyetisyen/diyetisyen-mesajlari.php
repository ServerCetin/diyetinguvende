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

<title>Mesajlar-Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../Menus/diyetisyen-menu.php";}?>

			
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form>	
				<h3>Form</h3>
				<fieldset>

					<legend>Mesajlarım</legend>
					<br>
					<form>	
				
			
			
				<table >
					<tr>
						<th>Gelen Mesajlar</th>
						<th>Kimden</th>
					    <th>Saat</th>
					</tr>
					<tr>
						<td>Örnek Gelen Mesaj 1</td>
						<td>Spor Koçu</td>
						<td>1 saat önce</td>
					</tr>
					<tr>
						<td>Örnek Gelen Mesaj 2 </td>
						<td>Hastalarım</td>
						<td>1 gün önce</td>
						<td></td>
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
						<a href="#" class="button button-reversed" style="margin-left:10px;">Spor Koçuna Mesaj</a>
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
						
					
				</form>	
					<form action="#" method="get">
						
					<p><textarea  cols="60" rows="11" name="message" id="message" placeholder="Mesaj Yaz..." ></textarea>
						<input type="submit" name="send" class="formbutton" value="Gönder" />
					</form>
			
			
				
			</form>	
				</div>
		</article>
			
		
				
		

			
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
