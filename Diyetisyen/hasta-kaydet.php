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
<link rel="shortcut icon" type="image/png" href="../favicon.png"/>
<title>Diyet Listesi Oluştur-Diyetin Güvende!</title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php include "../ortak/get-menu.php"?>


			<section id="content" class="column-right">
                	
	    <article>
		
			<div class="beyaz">
			<form>
			<h4>Yeni Diyet Listesi Oluştur</h4><br>
			Hasta Seç: <select>
						 <option>Kullanici Adı</option>
                    </select><br>
			<h5>Notunuzu Giriniz</h5>
			<blockquote>
				<textarea name="diyetisyenNotu" rows="5" cols="100"></textarea>
			</blockquote>
			<form action="" method="">
				<table class="diyetlistesiolustur" width="5px" height="5px">
					<tr width="5px" height="5px">
					
					<th width="5px">Pazartesi</th>
					<th width="5px">Salı</th>
					<th width="5px">Çarşamba</th>
					<th width="5px">Perşembe</th>
					<th width="5px">Cuma</th>
					<th width="5px">Cumartesi</th>
					<th width="5px">Pazar</th>
    
				</tr>
					
					<td><input type="text" name="pzt1" style="max-width:100px"></td>
					<td><input type="text" name="sali1" style="max-width:100px"></td>
					<td><input type="text" name="crs1" style="max-width:100px"></td>
					<td><input type="text" name="prs1" style="max-width:100px"></td>
					<td><input type="text" name="cum1" style="max-width:100px"></td>
					<td><input type="text" name="cert1" style="max-width:100px"></td>
					<td><input type="text" name="paz1" style="max-width:100px"></td>

				</tr>
				<tr>
					
					<td><input type="text" name="pzt2" style="max-width:100px"></td>
					<td><input type="text" name="sali2" style="max-width:100px"></td>
					<td><input type="text" name="crs2" style="max-width:100px"></td>
					<td><input type="text" name="prs2" style="max-width:100px"></td>
					<td><input type="text" name="cum2" style="max-width:100px"></td>
					<td><input type="text" name="cert2" style="max-width:100px"></td>
					<td><input type="text" name="paz2" style="max-width:100px"></td>
				</tr>
				<tr>
					
					<td><input type="text" name="pzt3" style="max-width:100px"></td>
					<td><input type="text" name="sali3" style="max-width:100px"></td>
					<td><input type="text" name="crs3" style="max-width:100px"></td>
					<td><input type="text" name="prs3" style="max-width:100px"></td>
					<td><input type="text" name="cum3" style="max-width:100px"></td>
					<td><input type="text" name="cert3" style="max-width:100px"></td>
					<td><input type="text" name="paz3" style="max-width:100px"></td>
				</tr>
				<tr>
					
					<td><input type="text" name="pzt4" style="max-width:100px"></td>
					<td><input type="text" name="sali4" style="max-width:100px"></td>
					<td><input type="text" name="crs14" style="max-width:100px"></td>
					<td><input type="text" name="prs4" style="max-width:100px"></td>
					<td><input type="text" name="cum4" style="max-width:100px"></td>
					<td><input type="text" name="cert4" style="max-width:100px" ></td>
					<td><input type="text" name="paz4" style="max-width:100px"></td>
				</tr>
				<tr>
					 
					<td><input type="text" name="pzt4" style="max-width:100px"></td>
					<td><input type="text" name="sali4" style="max-width:100px"></td>
					<td><input type="text" name="crs4" style="max-width:100px"></td>
					<td><input type="text" name="prs4" style="max-width:100px"></td>
					<td><input type="text" name="cum4" style="max-width:100px"></td>
					<td><input type="text" name="cert4" style="max-width:100px"></td>
					<td><input type="text" name="paz4" style="max-width:100px"></td>
				</tr>
				<tr>
					 
					<td><input type="text" name="pzt5" style="max-width:100px"></td>
					<td><input type="text" name="sali5" style="max-width:100px"></td>
					<td><input type="text" name="crs5" style="max-width:100px"></td>
					<td><input type="text" name="prs5" style="max-width:100px"></td>
					<td><input type="text" name="cum5" style="max-width:100px"></td>
					<td><input type="text" name="cert5" style="max-width:100px"></td>
					<td><input type="text" name="paz5" style="max-width:100px"></td>
				</tr>
				<tr>
					 
					<td><input type="text" name="pzt6" style="max-width:100px"></td>
					<td><input type="text" name="sali6" style="max-width:100px"></td>
					<td><input type="text" name="crs6" style="max-width:100px"></td>
					<td><input type="text" name="prs6" style="max-width:100px"></td>
					<td><input type="text" name="cum6" style="max-width:100px"></td>
					<td><input type="text" name="cert6" style="max-width:100px"></td>
					<td><input type="text" name="paz6" style="max-width:100px"></td>
					
				</tr>
				<tr>
					 
					<td><input type="text" name="pzt7" style="max-width:100px"></td>
					<td><input type="text" name="sali7" style="max-width:100px"></td>
					<td><input type="text" name="crs7" style="max-width:100px"></td>
					<td><input type="text" name="prs7" style="max-width:100px"></td>
					<td><input type="text" name="cum7" style="max-width:100px"></td>
					<td><input type="text" name="cert7" style="max-width:100px"></td>
					<td><input type="text" name="paz7" style="max-width:100px"></td>
					
				</tr>
  
		</table>
			<form>
				
				

			<br><br><br><br>

				<p><label for="ad">Adı: </label>
				<p><label for="soyad">Soyad: </label>
				Yağ Oranı: <input type="text" style="max-width:40px"><br><br>
				Kilo: <input type="text" style="max-width:40px"><br><br>
				Boy: <input type="text" style="max-width:40px"><br><br>
                    
					<br><a href="#" class="button buttonS" style="margin-left:80%;">Güncelle</a>

	</form>
	</div>
	</article>

			
		</section>
		<div class="clear"></div>

	</section>
	

</body>
</html>