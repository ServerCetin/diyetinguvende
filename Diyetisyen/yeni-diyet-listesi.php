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
			<form>
			<h4>Yeni Diyet Listesi Oluştur</h4>
			<h5>Notunuzu Giriniz</h5>
			<blockquote>
				<textarea name="diyetisyenNotu" rows="5" cols="100"></textarea>
			</blockquote>
			
				<table class="diyetlistesiolustur" width="5px" height="5px">
  <tr width="5px" height="5px">
    <th width="5px">Saat Seç</th>
	<th width="5px">Pazartesi</th>
	<th width="5px">Salı</th>
	<th width="5px">Çarşamba</th>
	<th width="5px">Perşembe</th>
	<th width="5px">Cuma</th>
	<th width="5px">Cumartesi</th>
	<th width="5px">Pazar</th>
    
  </tr>
  <tr width="5px">
    <td><input type="button" value="Seç" name="sec"></td>
    <td width="10px"><input type="text" name="yemek"></td>
	<td><input type="text" name="yemek"></td>

  </tr>
  <tr>
    <td><input type="button" value="Seç" name="sec"></td> 
    <td><input type="text" name="yemek"></td>
	<td><input type="text" name="yemek"></td>
  </tr>
  <tr>
   <td><input type="button" value="Seç" name="sec"></td>
    <td><input type="text" name="yemek"></td>
	<td><input type="text" name="yemek"></td>
  </tr>
  <tr>
    <td><input type="button" value="Seç" name="sec"></td>
    <td><input type="text"  name="yemek"></td>
	<td><input type="text" name="yemek"></td>
  </tr>
  <tr>
    <td><input type="button" value="Seç" name="sec"></td>  
    <td><input type="text"  name="yemek"></td>
	<td><input type="text" name="yemek"></td>
  </tr>
  <tr>
    <td><input type="button" value="Seç" name="sec"></td> 
    <td><input type="text" name="yemek"></td>
	<td><input type="text" name="yemek"></td>
  </tr>,<tr>
    <td><input type="button" value="Seç" name="sec"></td> 
    <td><input type="text" name="yemek"></td>
	<td><input type="text" name="yemek"></td>
  </tr>
  
</table>
  <a href="#" class="button button-reversed">Ekle</a>
  <a href="#" class="button buttonS" style="margin-left:80%;">Kaydet</a>

<br><br><br><br>

<h4> Mevcut Diyet Listeleri</h4>

<table id="sporplanlari">
  <tr>
    <th >Liste Adı</th>
	<th style="width:100px;">Listeyi Gör</th>
    
  </tr>
  <tr>
  <td> Liste 1</td>
  <td > <a href="#" class="button button-reversed">Git</a></td>
  </tr>
  <tr>
  <td> Liste 2</td>
  <td > <a href="#" class="button button-reversed">Git</a></td>
  </tr>
  <tr>
  <td> Liste 3</td>
  <td > <a href="#" class="button button-reversed">Git</a></td>
  </tr>
  <tr>
  <td> Liste 4</td>
  <td > <a href="#" class="button button-reversed">Git</a></td>
  </tr>

	</form>
	</div>
	</article>

			
		</section>
		<div class="clear"></div>

	</section>
	

</body>
</html>