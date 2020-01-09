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
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
<title>Hastalarım-Diyetin Güvende!</title>


<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../Menus/diyetisyen-menu.php";}?>
			
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<form action="#" method="POST">
			<fieldset>
				 <legend>Hasta Kaydet ve Liste Gönder</legend><br><br>

				<p>Hastanın Kullanıcı Adı:
						<input type="text" name="username" id="username" value="" /><br /></p>
						
				<p>Hastanın Diyet Listesi:<br>
                    <select name="diyetList">
                    <?php
                    include '../baglan.php';
                    $id = $_SESSION["Id"];
                    $listele = $db->query("SELECT * FROM diyettablosu where DiyetisyenId =$id", PDO::FETCH_ASSOC);
                    if ( $listele->rowCount() ) //rawcountu 0 değilse
                    {
                        foreach( $listele as $gelenveri )
                        {
                            echo '<option value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].'</option>';
                        }
                    }
                    ?>
                    </select>
				<br>
			<p><input type="submit" style="margin-left:80%;" name="kullaniciEkle" value="Ekle" >
			<br><br>
			<h4>Hastalarım</h4><br>
				<table id="hastalistesi">
  <tr>
    <th>Hasta Adı Soyadı</th>
	<th style="width:200px;">Git</th>
  </tr>
            </form>
                <?php

             include '../baglan.php';
             $id = $_SESSION['Id'];
             $listele = $db->query("SELECT * FROM kullanici INNER JOIN hastabilgi ON kullanici.Id=KullaniciId where DiyetisyenId='$id'", PDO::FETCH_ASSOC);
             if ($listele->rowCount()) //rawcountu 0 değilse
             {
                 foreach( $listele as $gelenveri )
                 {
                     echo '<tr>
                            <td>'.$gelenveri['Ad'].' '.$gelenveri['Soyad'].'</td>
                            <td>
                               <form method="post" action="hasta-profili.php"> <input type="hidden" name="kullaniciIds" value="'.$gelenveri['KullaniciId'].'">
                               <input type="submit" name="git" class="button button-reversed" value="Git" />
                               </form>
                                <form method="post"> <input type="hidden" name="kullaniciIds" value="'.$gelenveri['KullaniciId'].'">
                               <input type="submit" name="kaldir" class="button button-reversed" value="Kaldır" />
                               </form>
                            </td>
                          </tr>
                     ';
                 }
             }

             ?>

</table>

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
    $tabloId = $_POST['diyetList'];
    include ('../baglan.php');

    $query = $db->query("SELECT * FROM kullanici WHERE KullaniciAdi ='{$username}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        $kId = $query['Id'];
        $insert = $db -> exec("UPDATE hastabilgi SET DiyetisyenId='$id',DiyetTabloId='$tabloId' where KullaniciId='$kId'");
    }
}
if(isset($_POST['kaldir'])){
    $uId = $_POST['kullaniciIds'];
    $query = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId ='{$uId}'")->fetch(PDO::FETCH_ASSOC);
    if ($query){
        $insert = $db -> exec("UPDATE hastabilgi SET DiyetisyenId=null, DiyetTabloId=null where KullaniciId='$uId'");
    }
}

?>