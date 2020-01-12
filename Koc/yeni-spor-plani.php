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
			<form action ="#" method="POST">	
			 <fieldset>
                    <legend>Yeni Spor Planı Oluştur</legend><br><br>
				
			Tablo adını giriniz: <input type="text" name="tabloAdi" /><br><br>
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

</table><br><br>
  <br><input type="submit" class="brk-btn" value="Kaydet" style="margin-left:80%;">
 <br><br><br>

			</form>	
				</div>
				</fieldset>
		</article>
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
<?php
if(isset($_POST['tabloAdi'],$_POST['hocaNotu'])){
include '../baglan.php';

$tabloAdi = $_POST['tabloAdi'];
$tabloNot = $_POST['hocaNotu'];
$datetimeNow = date("Y-m-d H:i:s");
$id = $_SESSION['Id'];

$query = $db->prepare("INSERT INTO sportablosu SET
TabloAdi = ?,
TabloAciklamasi = ?,
KocId = ?,
TabloTarih = ? ");
$insert = $query->execute(array(
    $tabloAdi, $tabloNot, $id, $datetimeNow));

$lastId = $db->lastInsertId();


$pzt1 = $_POST['pzt1'];
$sali1 = $_POST['sali1'];
$crs1 = $_POST['crs1'];
$prs1 = $_POST['prs1'];
$cuma1 = $_POST['cum1'];
$cmt1 = $_POST['cert1'];
$pzr1 = $_POST['paz1'];

$pzt2 = $_POST['pzt2'];
$sali2 = $_POST['sali2'];
$crs2 = $_POST['crs2'];
$prs2 = $_POST['prs2'];
$cuma2 = $_POST['cum2'];
$cmt2 = $_POST['cert2'];
$pzr2 = $_POST['paz2'];

$pzt3 = $_POST['pzt3'];
$sali3 = $_POST['sali3'];
$crs3 = $_POST['crs3'];
$prs3 = $_POST['prs3'];
$cuma3 = $_POST['cum3'];
$cmt3 = $_POST['cert3'];
$pzr3 = $_POST['paz3'];

$pzt4 = $_POST['pzt4'];
$sali4 = $_POST['sali4'];
$crs4 = $_POST['crs4'];
$prs4 = $_POST['prs4'];
$cuma4 = $_POST['cum4'];
$cmt4 = $_POST['cert4'];
$pzr4 = $_POST['paz4'];

$pzt5 = $_POST['pzt5'];
$sali5 = $_POST['sali5'];
$crs5 = $_POST['crs5'];
$prs5 = $_POST['prs5'];
$cuma5 = $_POST['cum5'];
$cmt5 = $_POST['cert5'];
$pzr5 = $_POST['paz5'];

$pzt6 = $_POST['pzt6'];
$sali6 = $_POST['sali6'];
$crs6 = $_POST['crs6'];
$prs6 = $_POST['prs6'];
$cuma6 = $_POST['cum6'];
$cmt6 = $_POST['cert6'];
$pzr6 = $_POST['paz6'];

$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(1, $lastId, $pzt1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(2, $lastId, $sali1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(3, $lastId, $crs1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(4, $lastId, $prs1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(5, $lastId, $cuma1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(6, $lastId, $cmt1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(7, $lastId, $pzr1));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(1, $lastId, $pzt2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(2, $lastId, $sali2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(3, $lastId, $crs2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(4, $lastId, $prs2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(5, $lastId, $cuma2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(6, $lastId, $cmt2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(7, $lastId, $pzr2));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(1, $lastId, $pzt3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(2, $lastId, $sali3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(3, $lastId, $crs3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(4, $lastId, $prs3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(5, $lastId, $cuma3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(6, $lastId, $cmt3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(7, $lastId, $pzr3));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(1, $lastId, $pzt4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(2, $lastId, $sali4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(3, $lastId, $crs4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(4, $lastId, $prs4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(5, $lastId, $cuma4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(6, $lastId, $cmt4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(7, $lastId, $pzr4));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(1, $lastId, $pzt5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(2, $lastId, $sali5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(3, $lastId, $crs5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(4, $lastId, $prs5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(5, $lastId, $cuma5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(6, $lastId, $cmt5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(7, $lastId, $pzr5));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(1, $lastId, $pzt6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(2, $lastId, $sali6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(3, $lastId, $crs6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(4, $lastId, $prs6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(5, $lastId, $cuma6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(6, $lastId, $cmt6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?");
$insert = $query->execute(array(7, $lastId, $pzr6));

}


?>
