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
<br><input type="submit" class="button buttonS" value="Kaydet" style="margin-left:80%;">

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
$db ->exec('INSERT INTO diyettablosu(TabloAdi,TabloAciklamasi,DiyetisyenId,TabloTarih) VALUES ($tabloAdi,$tabloNot,$id,$datetimeNow)');
if($db){echo 'helal başarılı';}
else
    echo 'bir şeyi başaramıyorsun';
echo $tabloAdi;
echo $tabloNot;
echo $datetimeNow;
echo $id;
$lastId = $db-> lastinsertid();

$pzt1 = $_POST['pzt1'];
$sali1 = $_POST['sali1'];
$crs1 = $_POST['crs1'];
$prs1 = $_POST['prs1'];
$cuma1 = $_POST['cum1'];
$cmt1 = $_POST['cert1'];
$pzr1 = $_POST['paz1'];

$pzt2 = $_POST['pzt1'];
$sali2 = $_POST['sali1'];
$crs2 = $_POST['crs1'];
$prs2 = $_POST['prs1'];
$cuma2 = $_POST['cum1'];
$cmt2 = $_POST['cert1'];
$pzr2 = $_POST['paz1'];

$pzt3 = $_POST['pzt1'];
$sali3 = $_POST['sali1'];
$crs3 = $_POST['crs1'];
$prs3 = $_POST['prs1'];
$cuma3 = $_POST['cum1'];
$cmt3 = $_POST['cert1'];
$pzr3 = $_POST['paz1'];

$pzt4 = $_POST['pzt1'];
$sali4 = $_POST['sali1'];
$crs4 = $_POST['crs1'];
$prs4 = $_POST['prs1'];
$cuma4 = $_POST['cum1'];
$cmt4 = $_POST['cert1'];
$pzr4 = $_POST['paz1'];

$pzt5 = $_POST['pzt1'];
$sali5 = $_POST['sali1'];
$crs5 = $_POST['crs1'];
$prs5 = $_POST['prs1'];
$cuma5 = $_POST['cum1'];
$cmt5 = $_POST['cert1'];
$pzr5 = $_POST['paz1'];

$pzt6 = $_POST['pzt1'];
$sali6 = $_POST['sali1'];
$crs6 = $_POST['crs1'];
$prs6 = $_POST['prs1'];
$cuma6 = $_POST['cum1'];
$cmt6 = $_POST['cert1'];
$pzr6 = $_POST['paz1'];


$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (1,$lastId,pzt1)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (1,$lastId,pzt2)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (1,$lastId,pzt3)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (1,$lastId,pzt4)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (1,$lastId,pzt5)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (1,$lastId,pzt6)');

$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,sali1)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,sali2)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,sali3)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,sali4)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,sali5)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,sali6)');

$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,crs1)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,crs2)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,crs3)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,crs4)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,crs5)');
$db ->exec('INSERT INTO diyettablosatir (ProgramGunId,DiyetTabloId,Aciklama) VALUES (2,$lastId,crs6)');


}


?>
