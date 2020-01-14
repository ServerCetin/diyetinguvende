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
<title>Spor Planı Oluştur-Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php include "../Ortak/get-menu.php"?>

		
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form action ="#" method="POST">	
			
			 <fieldset>
                    <legend>Yeni Spor Planı Oluştur</legend><br><br>	
			Tablo adını giriniz: <input type="text" name="tabloAdi" /><br><br><br>
			<h5>Notunuzu Giriniz</h5>
			<blockquote>
				<textarea name="hocaNotu" rows="5" cols="100"></textarea>
			</blockquote>
			
<head>
	<tr>
			<br><br><br>
			
				<table class="sporlistesiolustur" width="5px" height="5px">
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
    <td ><input type="text" name="Sali3" style="max-width:100px"></td>
    <td ><input type="text" name="Crs3" style="max-width:100px"></td>
    <td ><input type="text" name="Prs3" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma3" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt3" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr3" style="max-width:100px"></td>
  </tr>
    <tr>
    <td ><input type="text" name="Pzt4" style="max-width:100px"></td>
    <td ><input type="text" name="Sali4" style="max-width:100px"></td>
    <td ><input type="text" name="Crs4" style="max-width:100px"></td>
    <td ><input type="text" name="Prs4" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma4" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt4" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr4" style="max-width:100px"></td>
  </tr>
  <tr>
    <td ><input type="text" name="Pzt5" style="max-width:100px"></td>
    <td ><input type="text" name="Sali5" style="max-width:100px"></td>
    <td ><input type="text" name="Crs5" style="max-width:100px"></td>
    <td ><input type="text" name="Prs5" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma5" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt5" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr5" style="max-width:100px"></td>
  </tr>
  <tr>
    <td ><input type="text" name="Pzt6" style="max-width:100px"></td>
    <td ><input type="text" name="Sali6" style="max-width:100px"></td>
    <td ><input type="text" name="Crs6" style="max-width:100px"></td>
    <td ><input type="text" name="Prs6" style="max-width:100px"></td>
    <td ><input type="text" name="Cuma6" style="max-width:100px"></td>
    <td ><input type="text" name="Cmt6" style="max-width:100px"></td>
    <td ><input type="text" name="Pzr6" style="max-width:100px"></td>
  </tr>
 </fieldset>
</table><br><br>
  <br><input type="submit" class="brk-btn" value="Kaydet" style="margin-left:80%;">
 <br><br><br>

			</form>	
				</div>
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


$pzt1 = $_POST['Pzt1'];
$sali1 = $_POST['Sali1'];
$crs1 = $_POST['Crs1'];
$prs1 = $_POST['Prs1'];
$cuma1 = $_POST['Cuma1'];
$cmt1 = $_POST['Cmt1'];
$pzr1 = $_POST['Pzr1'];

$pzt2 = $_POST['Pzt2'];
$sali2 = $_POST['Sali2'];
$crs2 = $_POST['Crs2'];
$prs2 = $_POST['Prs2'];
$cuma2 = $_POST['Cuma2'];
$cmt2 = $_POST['Cmt2'];
$pzr2 = $_POST['Pzr2'];

$pzt3 = $_POST['Pzt3'];
$sali3 = $_POST['Sali3'];
$crs3 = $_POST['Crs3'];
$prs3 = $_POST['Prs3'];
$cuma3 = $_POST['Cuma3'];
$cmt3 = $_POST['Cmt3'];
$pzr3 = $_POST['Pzr3'];

$pzt4 = $_POST['Pzt4'];
$sali4 = $_POST['Sali4'];
$crs4 = $_POST['Crs4'];
$prs4 = $_POST['Prs4'];
$cuma4 = $_POST['Cuma4'];
$cmt4 = $_POST['Cmt4'];
$pzr4 = $_POST['Pzr4'];

$pzt5 = $_POST['Pzt5'];
$sali5 = $_POST['Sali5'];
$crs5 = $_POST['Crs5'];
$prs5 = $_POST['Prs5'];
$cuma5 = $_POST['Cuma5'];
$cmt5 = $_POST['Cmt5'];
$pzr5 = $_POST['Pzr5'];

$pzt6 = $_POST['Pzt6'];
$sali6 = $_POST['Sali6'];
$crs6 = $_POST['Crs6'];
$prs6 = $_POST['Prs6'];
$cuma6 = $_POST['Cuma6'];
$cmt6 = $_POST['Cmt6'];
$pzr6 = $_POST['Pzr6'];

$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(1, $lastId, $pzt1,1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(2, $lastId, $sali1,1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(3, $lastId, $crs1,1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(4, $lastId, $prs1,1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(5, $lastId, $cuma1,1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(6, $lastId, $cmt1,1));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(7, $lastId, $pzr1,1));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(1, $lastId, $pzt2,2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(2, $lastId, $sali2,2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(3, $lastId, $crs2,2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(4, $lastId, $prs2,2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(5, $lastId, $cuma2,2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(6, $lastId, $cmt2,2));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(7, $lastId, $pzr2,2));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(1, $lastId, $pzt3,3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(2, $lastId, $sali3,3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(3, $lastId, $crs3,3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(4, $lastId, $prs3,3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(5, $lastId, $cuma3,3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(6, $lastId, $cmt3,3));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(7, $lastId, $pzr3,3));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(1, $lastId, $pzt4,4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(2, $lastId, $sali4,4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(3, $lastId, $crs4,4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(4, $lastId, $prs4,4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(5, $lastId, $cuma4,4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(6, $lastId, $cmt4,4));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(7, $lastId, $pzr4,4));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(1, $lastId, $pzt5,5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(2, $lastId, $sali5,5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(3, $lastId, $crs5,5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(4, $lastId, $prs5,5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(5, $lastId, $cuma5,5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(6, $lastId, $cmt5,5));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(7, $lastId, $pzr5,5));


$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(1, $lastId, $pzt6,6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(2, $lastId, $sali6,6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(3, $lastId, $crs6,6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(4, $lastId, $prs6,6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(5, $lastId, $cuma6,6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(6, $lastId, $cmt6,6));
$query = $db->prepare("INSERT INTO sportablosatir SET ProgramGunId = ?, SporTabloId = ?, Aciklama = ?, GunSira = ?");
$insert = $query->execute(array(7, $lastId, $pzr6,6));

}


?>
