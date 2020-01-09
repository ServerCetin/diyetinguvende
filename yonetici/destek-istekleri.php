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
		<?php if($_SESSION["kullaniciTur"] == "Yönetici"){include "../Menus/yonetici-menu.php";}?>
			
			<section id="content" class="column-right">
                		
	    <article>

			<div class="beyaz" style="padding-top: 50px"  >
                <h2>Destek talepleri</h2>
                <table>
                    <tr>
                        <td>Gönderen</td>
                        <td>Sorun</td>
                        <td>Sorun Kategorisi</td>
                        <td>Sil</td>
                    </tr>
                    <?php
                     include "../baglan.php";

                    $listele = $db->query("SELECT * FROM destek", PDO::FETCH_ASSOC);
                    if ( $listele->rowCount() )
                    {
                        foreach( $listele as $gelenveri )
                        {
                        $query = $db->query("SELECT * FROM kullanici WHERE Id = '{$gelenveri['GonderenId']}'")->fetch(PDO::FETCH_ASSOC);
                        $query2 = $db->query("SELECT * FROM destekkategori WHERE Id = '{$gelenveri['SorunKategoriId']}'")->fetch(PDO::FETCH_ASSOC);
                         echo ' <tr>
                                    <td>'.$query['KullaniciAdi'].'</td>
                                    <td>'.$gelenveri['Sorun'].'</td>
                                    <td>'.$query2['Ad'].'</td>
                                    <td><form method="post">
                                    <input type="hidden" value="'.$gelenveri['Id'].'" name="destekId"/>
                                    <input type="submit" name="destekSil" value="Sil"></form></td>
                                </tr>';
                        }
                    }



                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </table>


            </div>
		</article>

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>

<?php

if(isset($_POST['destekSil'])){
    $id = $_POST['destekId'];
    $query = $db->prepare("DELETE FROM destek WHERE Id = :id");
    $delete = $query->execute(array(
        'id' => $id
    ));
}



?>