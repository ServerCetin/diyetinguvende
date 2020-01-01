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

<title>Diyet Listesi Oluştur-Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../Menus/diyetisyen-menu.php";}?>


			<section id="content" class="column-right">
                	
	    <article>
	
			<div class="beyaz">	
			
			<form action="" method="POST">
			<fieldset>
			<legend>Diyet Listesi Ekle</legend><br><br>
          Tablo adını giriniz: <input type="text" name="tabloAdi" />

                <br><br><br><br>
			<h5>Notunuzu Giriniz</h5>
<blockquote>
<textarea name="diyetisyenNotu" rows="5" cols="100"></textarea>
</blockquote><br><br>
<table class="diyetlistesiolustur" width="5px" height="5px">
<tr width="5px" height="5px">
<th style="max-width:50px">Pazartesi</th>
<th style="max-width:50px">Salı</th>
<th style="max-width:50px">Çarşamba</th>
<th style="max-width:50px">Perşembe</th>
<th style="max-width:50px">Cuma</th>
<th style="max-width:50px">Cumartesi</th>
<th style="max-width:50px">Pazar</th>
   
</tr>
<td><input type="text" name="pzt1" style="max-width:50px"></td>
<td><input type="text" name="sali1" style="max-width:50px"></td>
<td><input type="text" name="crs1" style="max-width:50px"></td>
<td><input type="text" name="prs1" style="max-width:50px"></td>
<td><input type="text" name="cum1" style="max-width:50px"></td>
<td><input type="text" name="cert1" style="max-width:50px"></td>
<td><input type="text" name="paz1" style="max-width:50px"></td>
</tr>
<tr>

<td><input type="text" name="pzt2"style="max-width:50px"></td>
<td><input type="text" name="sali2"style="max-width:50px"></td>
<td><input type="text" name="crs2"style="max-width:50px"></td>
<td><input type="text" name="prs2"style="max-width:50px"></td>
<td><input type="text" name="cum2"style="max-width:50px"></td>
<td><input type="text" name="cert2"style="max-width:50px"></td>
<td><input type="text" name="paz2"style="max-width:50px"></td>
</tr>
<tr>

<td><input type="text" name="pzt3" style="max-width:50px"></td>
<td><input type="text" name="sali3" style="max-width:50px"></td>
<td><input type="text" name="crs3" style="max-width:50px"></td>
<td><input type="text" name="prs3" style="max-width:50px"></td>
<td><input type="text" name="cum3" style="max-width:50px"></td>
<td><input type="text" name="cert3" style="max-width:50px"></td>
<td><input type="text" name="paz3" style="max-width:50px"></td>
</tr>
<tr>
<td><input type="text" name="pzt4" style="max-width:50px"></td>
<td><input type="text" name="sali4" style="max-width:50px"></td>
<td><input type="text" name="crs14" style="max-width:50px"></td>
<td><input type="text" name="prs4" style="max-width:50px"></td>
<td><input type="text" name="cum4" style="max-width:50px"></td>
<td><input type="text" name="cert4" style="max-width:50px"></td>
<td><input type="text" name="paz4" style="max-width:50px"></td>
</tr>
<tr> 
<td><input type="text" name="pzt4" style="max-width:50px"></td>
<td><input type="text" name="sali4" style="max-width:50px"></td>
<td><input type="text" name="crs4" style="max-width:50px"></td>
<td><input type="text" name="prs4" style="max-width:50px"></td>
<td><input type="text" name="cum4" style="max-width:50px"></td>
<td><input type="text" name="cert4" style="max-width:50px"></td>
<td><input type="text" name="paz4" style="max-width:50px"></td>
</tr>
<tr>

<td><input type="text" name="pzt5" style="max-width:50px"></td>
<td><input type="text" name="sali5" style="max-width:50px"></td>
<td><input type="text" name="crs5" style="max-width:50px"></td>
<td><input type="text" name="prs5" style="max-width:50px"></td>
<td><input type="text" name="cum5" style="max-width:50px"></td>
<td><input type="text" name="cert5" style="max-width:50px"></td>
<td><input type="text" name="paz5" style="max-width:50px"></td>
</tr>
<tr>

<td><input type="text" name="pzt6" style="max-width:50px"></td>
<td><input type="text" name="sali6" style="max-width:50px"></td>
<td><input type="text" name="crs6" style="max-width:50px"></td>
<td><input type="text" name="prs6" style="max-width:50px"></td>
<td><input type="text" name="cum6" style="max-width:50px"></td>
<td><input type="text" name="cert6" style="max-width:50px"></td>
<td><input type="text" name="paz6" style="max-width:50px"></td>

</tr>


  </fieldset>
</table>


<br><br>
<br><a href="#" class="button buttonS" style="margin-left:80%;">Gönder</a>

</form>
	</div>
	</article>

			
		</section>
		<div class="clear"></div>

	</section>
	

</body>
</html>

