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
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../Menus/koc-menu.php";}?>

		
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form>	
			
			<h4>Yeni Spor Planı Oluştur</h4>
			Öğrenci Seç: <select>
						 <option>Kullanici Adı</option>
                         </select><br><br>
			<h5>Notunuzu Giriniz</h5>
			<blockquote>
				<textarea name="hocaNotu" rows="5" cols="100"></textarea>
			</blockquote>
			
<head>
	<tr>
			<br><br><br>
			
				<table id="hastalistesi">
  <tr>
    
	<th>Pzt</th>
    <th>Salı</th>
	<th>Çrş</th>
	<th>Prş</th>
	<th>Cuma</th>
	<th>Cmt</th>
	<th>Pzr</th>
  </tr>
  <tr>
 
    <td ><input type="text" name="Pzt1" style="max-width:100px"></td>
    <td ><input type="text" name="Sali1" style="max-width:100px"></td>
    <td ><input type="text" name="Crs1" style="max-width:100px"></td>
    <td ><input type="text" name="Prs1" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma1" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt1" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr1" style="max-width:100px"></td>
  </tr>
   <tr>
    <td ><input type="text" name="Pzt2" style="max-width:100px"></td>
    <td ><input type="text" name="Sali2" style="max-width:100px"></td>
    <td ><input type="text" name="Crs2" style="max-width:100px"></td>
    <td ><input type="text" name="Prs2" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma2" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt2" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr2" style="max-width:100px"></td>
  </tr>
  <tr>
    <td ><input type="text" name="Pzt3" style="max-width:100px"></td>
    <td ><input type="text" name="Sali" style="max-width:100px"></td>
    <td ><input type="text" name="Crs3" style="max-width:100px"></td>
    <td ><input type="text" name="Prs3" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma3" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt3" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr3" style="max-width:100px"></td>
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
  <br>
  <a href="#" class="button buttonS" style="margin-left:80%;">Kaydet</a>
 <br><br><br>

			</form>	
				</div>
		</article>
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
