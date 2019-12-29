<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?>
<!doctype html>
<html>

<head>


<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasını sağlar-->
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "../Menus/kullanici-menu.php";}?>

			
			<section id="content" class="column-right">
                		
	    <article>
<div class="beyaz" >
			
		<h2>Spor Koçunuzun Notu:</h2>
			<blockquote>
						<p>
						Barfixleri 5'er 5'er 5 dklik arayla, mekikleri de 50'ser 50'ser 5 dk arayla yapmalisin.
						</p>
			</blockquote>
				<br>
				<table>
				
				<tr>
						<th>Hareketler</th>
						<th>Bugünkü Sayı</th>
						<th>Yarınki Sayı</th>
		        </tr>
				
				
				
				<tr>
			            <td>Barfix</td>
						<td>20</td>
						<td>17</td>  
			    </tr>
				<tr>
			            <td>Mekik</td>
						<td>200</td>
						<td>120</td>  
			    </tr>
				</table>
				<br>
				<br>
				
			<h2>Mevcut Haftalık Spor Takip Listem</h2>
				<table>
					<tr>
						<th>Hareketler</th>
						<th>Pazartesi</th>
						<th>Salı</th>
						<th>Çarşamba</th>
						<th>Perşembe</th>
						<th>Cuma</th>
						<th>Cumartesi</th>
						<th>Pazar</th>

					</tr>
					<tr>
						<td>Barfix</td>
						<td>20</td>
						<td>17</td>
						<td>15</td>
						<td>30</td>
						<td>5</td>
						<td>-</td>
						<td>12</td>
					</tr>
					<tr>
						<td>Mekik</td>
						<td>200</td>
						<td>120</td>
						<td>42</td>
						<td>44</td>
						<td>400</td>
						<td>-</td>
						<td>-</td>
					</tr>

	
				</table>
				<b>Ekle</b>
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
