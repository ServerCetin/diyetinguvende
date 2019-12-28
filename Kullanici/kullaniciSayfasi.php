<?php
session_start();
ob_start();
?>

<!doctype html>
<html>

<head>
	<title>Diyetin Guvende!</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles.css" type="text/css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasini saglar-->
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "kullanicimenu.php";}?>


		<section id="content" class="column-right">
                		
	    <article>
<div class="beyaz" >
<h4>Diyetisyeninizin Notu:</h4>
			<blockquote>
						<p>
						Programina uymaya dikkat et, sana ozel ayarlandigindan aksatmamaya calis!
						</p>
			</blockquote>
			
			
			
			<table>
			
		    <tr>
						<th>Saat</th>
						<th>Bugunku Listem<br><button id="button1">Yaptim</button> <button id="button2">Yapmadim</button></th>
						<th>Yarýnki Listem</th>
		    </tr>
			<script>

var listeyiYaptým=document.getElementById("button1");
	listeyiYaptým.onclick=function()
	{
		window.alert("Hasta bugünkü diyetini yapmýþtýr. Diyetisyenine bilgilendirme yapýlacaktýr.");
	}

	var listeyiYapmadým=document.getElementById("button2");
	listeyiYapmadým.onclick=function()
	{
		window.alert("Hasta bugünkü diyetini tam olarak yapmamýþtýr. Diyetisyenine bilgilendirme yapýlacaktýr.");
	}
	
            </script>


			<tr>
			            <td>09.00</td>
						<td>Kahvalti</td>
						<td>Kahvalti</td>  
			</tr>
			
			<tr>
			            <td>12.00</td>
						<td>Ara Ogun</td>
						<td>Ara Ogun</td>  
			</tr>
			
			<tr>
			            <td>14.30</td>
						<td>Ogle Yemegi</td>
						<td>Ogle Yemegi</td>  
			</tr>
			
			<tr>
			            <td>17.00</td>
						<td>Ara Ogun</td>
						<td>Ara Ogun</td>  
			</tr>
			
			<tr>
			            <td>19.00</td>
						<td>Aksam Yemegi</td>
						<td>Aksam Yemegi</td>  
			</tr>
			
			<tr>
			            <td>21.00</td>
						<td>Meyve,Kuruyemis</td>
						<td>Meyve,Kuruyemis</td>  
			</tr>
			</table>
			
			<br>
			<br>
						<br>
			<br>			<br>
			<br>			<br>
			<br>
			<h4>Mevcut Haftalik Diyet Listem</h4>
				<table>
					<tr>
						<th style="width:50px;">Saat</th>
						<th style="width:50px;">Pazartesi</th>
						<th style="width:50px;">Sali</th>
						<th style="width:50px;">Çarsamba</th>
						<th style="width:50px;">Persembe</th>
						<th style="width:50px;">Cuma</th>
						<th style="width:50px;">Cumartesi</th>
						<th style="width:50px;">Pazar</th>

					</tr>
					<tr>
						<td>09.00</td>
						<td>x</td>
						<td>x</td>
						<td>x</td>
						<td>x</td>
						<td>x</td>
						<td>x</td>
						<td>x</td>
					</tr>
					<tr>
						<td>12.00</td>
						<td>x </td>
						<td>x x</td>
						<td>x x</td>
						<td>z z</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
					</tr>
					<tr>
						<td>14.30</td>
						<td> x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
					</tr>
					<tr>
						<td>17.00</td>
						<td> x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
					</tr>
					<tr>
						<td>19.00</td>
						<td> x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						
					</tr>
					<tr>
						<td>21.00</td>
						<td> x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>
						<td>x x</td>

						
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
