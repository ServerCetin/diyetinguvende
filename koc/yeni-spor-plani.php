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
            <?php include "../ortak/get-menu.php"?>

		
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form action ="#" method="POST">	
			
                    <legend>Yeni Spor Planı Oluştur</legend><br><br>
			Tablo adını giriniz: <input type="text" name="tabloAdi" /><br><br><br>
			<h5>Notunuzu Giriniz</h5>
			<blockquote>
				<textarea name="hocaNotu" rows="5" cols="100"></textarea>
			</blockquote>
			
<head>
	<tr>
			<br><br><br>
			
    <table class="sporlistesiolustur" id="programlist" width="5px" height="5px">
      <tr>
        <th>Pazartesi</th>
        <th>Salı</th>
        <th>Çarşamba</th>
        <th>Perşembe</th>
        <th>Cuma</th>
        <th>Cumartesi</th>
        <th>Pazar</th>
      </tr>
      <tr>
        <td ><input type="text" name="g1-1" style="max-width:100px"></td>
        <td ><input type="text" name="g2-1" style="max-width:100px"></td>
        <td ><input type="text" name="g3-1" style="max-width:100px"></td>
        <td ><input type="text" name="g4-1" style="max-width:100px"></td>
        <td ><input type="text" name="g5-1" style="max-width:100px"></td>
        <td ><input type="text" name="g6-1" style="max-width:100px"></td>
        <td ><input type="text" name="g7-1" style="max-width:100px"></td>
      </tr>
     </fieldset>
    </table>
	<input type="hidden" id="sizeOfTableRow" name="sizeOfTableRow" value="1">
    <input type="submit" class="brk-btn" value="Kaydet" style="margin-left:80%;">
</form>
    <button class="brk-btn" style="top:-30px;" onclick="ekle()">Satır ekle</button><br>
</div>
		</article>
			

		</section>

		<div class="clear"></div>

	</section>


    <script src="../js/jquery-3.5.1.min.js"></script>
	<script>
		$maxGun =2;
        function ekle(){
            $('#programlist > tbody:last-child').append('' +
                '<tr>' +
                '<td><input type="text" name="g1-'+ $maxGun +'" style="max-width:100px"></td>' +
                '<td><input type="text" name="g2-'+ $maxGun +'" style="max-width:100px"></td>' +
                '<td><input type="text" name="g3-'+ $maxGun +'" style="max-width:100px"></td><' +
                'td><input type="text" name="g4-'+ $maxGun +'" style="max-width:100px"></td>' +
                '<td><input type="text" name="g5-'+ $maxGun +'" style="max-width:100px"></td>' +
                '<td><input type="text" name="g6-'+ $maxGun +'" style="max-width:100px"></td>' +
                '<td><input type="text" name="g7-'+ $maxGun +'" style="max-width:100px"></td>' +
                '</tr>');
				$maxGun++;
                $("#sizeOfTableRow").val($maxGun-1);
        }
		
	</script>

</body>
</html>
<?php
if(isset($_POST['tabloAdi'],$_POST['hocaNotu'])){

    $tabloAdi = $_POST['tabloAdi'];
    $tabloNot = $_POST['hocaNotu'];
    $datetimeNow = date("Y-m-d H:i:s");
    $id = $_SESSION['Id'];
    $tablesize = $_POST['sizeOfTableRow'];

    $query = $db->prepare("INSERT INTO sportablosu SET
    TabloAdi = ?,
    TabloAciklamasi = ?,
    KocId = ?,
    TabloTarih = ? ");
    $insert = $query->execute(array($tabloAdi, $tabloNot, $id, $datetimeNow));

    $lastId = $db->lastInsertId();

    $tablosatirinsert = $db->prepare("INSERT INTO sportablosatir SET 
    ProgramGunId = ?, 
    SporTabloId = ?, 
    Aciklama = ?, 
    GunSira = ?");
    for($i=1;$i<=$tablesize;$i++){
        for($j=1;$j<=7;$j++){
            $text = 'g'.(string)$j.'-'.(string)$i;
            $tableRowContent = $_POST[$text];
            $girdi = $tablosatirinsert->execute(array($j,$lastId, $tableRowContent,$i));
        }
    }
}
?>
