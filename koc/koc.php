<?php
session_start();
ob_start();

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/png" href="../favicon.png"/>
<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
            <?php include "../ortak/get-menu.php"?>


			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz"  >
                <br>
			<fieldset>
            <legend>Öğrenci Kaydet</legend><br>
				<form action="#" method="POST">
				
				<p>Öğrencinin Kullanıcı Adı:
						<input type="text" name="username" id="username" value="" /><br /></p>
						
			<p>Öğrencinin Diyet Listesi:<br>
			<select name="sporList">
				<?php
                    include '../baglan.php';
                    $id = $_SESSION["Id"];
                    $listele = $db->query("SELECT * FROM sportablosu where KocId =$id", PDO::FETCH_ASSOC);
                    if ( $listele->rowCount() ) //rawcountu 0 değilse
                    {
                        foreach( $listele as $gelenveri )
                        {
                            echo '<option value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].'</option>';
                        }
                    }
                    ?></select>
			<p><input type="submit" class="brk-btn" style="margin-left:28%;"name="kullaniciEkle" value="Ekle"/>

		
			<h4>Öğrencilerim</h4><br>
				<table id="hastalistesi">
  <tr>
    <th>Öğrenci Adı Soyadı</th>
	<th style="width:200px;">Git</th></tr>
     <?php

             include '../baglan.php';
             $id = $_SESSION['Id'];
             $listele = $db->query("SELECT * FROM kullanici INNER JOIN hastabilgi ON kullanici.Id=KullaniciId where KocId='$id'", PDO::FETCH_ASSOC);
             if ($listele->rowCount()) //rawcountu 0 değilse
             {
                 foreach( $listele as $gelenveri )
                 {
                     echo '<tr>
                            <td>'.$gelenveri['Ad'].' '.$gelenveri['Soyad'].'</td>
                             <td>
                               <form method="post"> <input type="hidden" name="kullaniciIds" value="'.$gelenveri['KullaniciId'].'">
                               <input type="submit" name="kaldir" class="formbuttonn" value="Kaldır" />
                               </form>
                                <form method="post" action="ogrenci-profili.php"> <input type="hidden" name="kullaniciIds" value="'.$gelenveri['KullaniciId'].'">
                               <input type="submit" name="git" class="formbutton" value="Git" />
                               </form>
                            </td>
                          </tr>
                     ';
                 }
             }

             ?>
  
 
</table>
</form>	
</div>
		</article>
		</section>
		<div class="clear"></div>
	    </section>
	

</body>
</html>
<?php
if(isset($_POST['kullaniciEkle'])){

    $username = $_POST['username'];
    $id = $_SESSION['Id'];
    $tabloId = $_POST['sporList'];
    include ('../baglan.php');

    $query = $db->query("SELECT * FROM kullanici WHERE KullaniciAdi ='{$username}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        $kId = $query['Id'];
        $insert = $db -> exec("UPDATE hastabilgi SET KocId='$id',SporTabloId='$tabloId' where KullaniciId='$kId'");
    }
        echo '<meta http-equiv="refresh" content="0;URL=koc.php">';
}
    if(isset($_POST['kaldir'])){
    $uId = $_POST['kullaniciIds'];
    $query = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId ='{$uId}'")->fetch(PDO::FETCH_ASSOC);
    if ($query){
        $insert = $db -> exec("UPDATE hastabilgi SET KocId=null, SporTabloId=null where KullaniciId='$uId'"); 
        $insert1 = $db-> exec("DELETE from kullanicimesaj where(GonderenId='$id' and AlanId='$uId') or (GonderenId='$uId' and AlanId='$id')");
    }
         echo '<meta http-equiv="refresh" content="0;URL=koc.php">';

}
?>
