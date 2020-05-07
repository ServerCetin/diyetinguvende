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
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php include "../ortak/get-menu.php"?>


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
<br><input type="submit" class="brk-btn" value="Kaydet" style="margin-left:80%;">

</form>
	</div>
	</article>

			
		</section>
		<div class="clear"></div>

	</section>
	

</body>
</html>


<?php
if(isset($_POST['tabloAdi'],$_POST['diyetisyenNotu'])){
include '../baglan.php';

$tabloAdi = $_POST['tabloAdi'];
$tabloNot = $_POST['diyetisyenNotu'];
$datetimeNow = date("Y-m-d H:i:s");
$id = $_SESSION['Id'];

$query = $db->prepare("INSERT INTO diyettablosu SET
TabloAdi = ?,
TabloAciklamasi = ?,
DiyetisyenId = ?,
TabloTarih = ? ");
$insert = $query->execute(array(
    $tabloAdi, $tabloNot, $id, $datetimeNow
));

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

    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(1, $lastId, $pzt1,1));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(2, $lastId, $sali1,1));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(3, $lastId, $crs1,1));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(4, $lastId, $prs1,1));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(5, $lastId, $cuma1,1));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(6, $lastId, $cmt1,1));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(7, $lastId, $pzr1,1));


    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(1, $lastId, $pzt2, 2));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(2, $lastId, $sali2, 2));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(3, $lastId, $crs2, 2));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(4, $lastId, $prs2, 2));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(5, $lastId, $cuma2, 2));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(6, $lastId, $cmt2, 2));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(7, $lastId, $pzr2, 2));


    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(1, $lastId, $pzt3, 3));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(2, $lastId, $sali3, 3));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(3, $lastId, $crs3, 3));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(4, $lastId, $prs3, 3));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(5, $lastId, $cuma3, 3));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(6, $lastId, $cmt3, 3));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(7, $lastId, $pzr3, 3));

    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(1, $lastId, $pzt4, 4));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(2, $lastId, $sali4, 4));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(3, $lastId, $crs4, 4));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(4, $lastId, $prs4, 4));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(5, $lastId, $cuma4, 4));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(6, $lastId, $cmt4, 4));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(7, $lastId, $pzr4, 4));


    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(1, $lastId, $pzt5, 5));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(2, $lastId, $sali5, 5));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(3, $lastId, $crs5, 5));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(4, $lastId, $prs5, 5));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(5, $lastId, $cuma5, 5));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(6, $lastId, $cmt5, 5));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(7, $lastId, $pzr5, 5));


    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(1, $lastId, $pzt6, 6));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(2, $lastId, $sali6, 6));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(3, $lastId, $crs6, 6));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(4, $lastId, $prs6, 6));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(5, $lastId, $cuma6, 6));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(6, $lastId, $cmt6, 6));
    $query = $db->prepare("INSERT INTO diyettablosatir SET ProgramGunId = ?, DiyetTabloId = ?, Aciklama = ?, GunSira = ?");
    $insert = $query->execute(array(7, $lastId, $pzr6, 6));

}


?>
