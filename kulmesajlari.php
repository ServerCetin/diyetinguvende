<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?><!doctype html>
<html>

<head>


<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasını sağlar-->
</head>

<body>

		<section id="body" class="width">
			<?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "kullanicimenu.php";}?>
			
			<section id="content" class="column-right">
                		
	    <article>
<div class="beyaz" >
				
		
			<h3>Form</h3>
				<fieldset>

					<legend>Mesajlarım</legend>
					<form>	
				
			
			
				<table >
					<tr>
						<th>Gelen Mesajlar</th>
						<th>Kimden</th>
						
					</tr>
					<tr>
						<td>Örnek Gelen Mesaj 1</td>
						<td>Spor Koçu</td>
						
					</tr>
					<tr>
						<td>Örnek Gelen Mesaj 2 </td>
						<td>Diyetisyen</td>
						<td></td>
						</tr>
					</table>
				</form>	
					<form action="#" method="get">
						
						<input type="submit" name="send" class="formbutton" value="Diyetisyene Mesaj" />
						<input type="submit" name="send" class="formbutton" value="Spor Koçuna Mesaj" /><p>
						<p><textarea  cols="60" rows="11" name="message" id="message" placeholder="Mesaj Yaz..." ></textarea>
						<input type="submit" name="send" class="formbutton" value="Gönder" />
					</form>
	
				</fieldset></div>	
			</article>
				<footer class="clear">
								<p>&copy; 2019 Diyetin Güvende.</p>

			</footer>

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>