<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?>
<!doctype html>
<html>

<head>


<title>Diyetlerim-Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasını sağlar-->
</head>

<body>

		<section id="body" class="width">
			<?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "../Menus/kullanici-menu.php";}?>

			
			<section id="content" class="column-right">
                		
	    <article>
<div class="beyaz" >
			
<h1>Aktivitelerim</h1>
				<br>
			<h3>Su ana kadarki ilerlemeniz</h3>
				<table>
					<tr>
						<th>Tarih</th>
						<th>Boy</th>
						<th>Kilo</th>
						<th>Kalori</th>
						<th>Yürüme</th>
						<th>Kosu</th>
						<th>Diyet Tablosu</th>
						<th>Spor Tablosu</th>
					</tr>
					<tr>
						<td>22.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>23.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>24.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>25.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>26.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>27.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>28.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>29.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>30.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>31.10.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>01.11.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
					<tr>
						<td>02.11.2017</td>
						<td>180</td>
						<td>121</td>
						<td>3000</td>
						<td>2000m</td>
						<td>50m</td>
						<td><a href="#">Tablo</a></td>
						<td><a href="#">Tablo</a></td>
					</tr>
				
	
				</table>
	</div>
		</article>
				<p>&nbsp;</p>
		
			
			<footer class="clear">
				<p>&copy; 2019 Diyetin Güvende.</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
