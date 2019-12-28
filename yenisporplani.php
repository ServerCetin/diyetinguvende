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

<title>Spor Planı Oluştur-Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "sporkocumenu.php";}?>

		
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form>	
			<h4>Yeni Spor Planı Oluştur</h4>
			<h5>Notunuzu Giriniz</h5>
			<blockquote>
				<textarea name="hocaNotu" rows="5" cols="100"></textarea>
			</blockquote>
			
<head>
	<tr>
			<br>
			<br>
			<br>
			
			
			<br>
			<br>
			

			<h5>Yeni Listenizin Adı: </h5>
		<input  type="text" name="listead">
		<br><br>
				<table id="hastalistesi">
  <tr>
    <th style="width:35px">Adet</th>
	<th>Pzt</th>
    <th>Salı</th>
	<th>Çrş</th>
	<th>Prş</th>
	<th>Cuma</th>
	<th>Cmt</th>
	<th>Pzr</th>
  </tr>
  <tr>
    <td ><input type="text" name="Adet1" style="width:35px"></td>
    <td ><input type="text" name="Pzt1" style="max-width:100px"></td>
    <td ><input type="text" name="Sali1" style="max-width:100px"></td>
    <td ><input type="text" name="Crs1" style="max-width:100px"></td>
    <td ><input type="text" name="Prs1" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma1" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt1" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr1" style="max-width:100px"></td>
  </tr>
   <tr>
    <td ><input type="text" name="Adet2" style="width:35px"></td>
    <td ><input type="text" name="Pzt2" style="max-width:100px"></td>
    <td ><input type="text" name="Sali2" style="max-width:100px"></td>
    <td ><input type="text" name="Crs2" style="max-width:100px"></td>
    <td ><input type="text" name="Prs2" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma2" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt2" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr2" style="max-width:100px"></td>
  </tr>
  <tr>
    <td ><input type="text" name="Adet3" style="width:35px"></td>
    <td ><input type="text" name="Pzt3" style="max-width:100px"></td>
    <td ><input type="text" name="Sali" style="max-width:100px"></td>
    <td ><input type="text" name="Crs3" style="max-width:100px"></td>
    <td ><input type="text" name="Prs3" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma3" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt3" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr3" style="max-width:100px"></td>
  </tr>
   

</table>
  <a href="#" class="button button-reversed">Ekle</a>
  <a href="#" class="button buttonS" style="margin-left:80%;">Kaydet</a>
 <br><br><br>
<h4> Mevcut Spor Listeleri</h4>

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
