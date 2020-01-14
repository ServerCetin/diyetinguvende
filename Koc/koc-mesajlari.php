<?php
session_start();
ob_start();

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
					<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../Menus/koc-menu.php";}?>

			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			
				
				<fieldset>
                    <legend>Mesaj Gönder</legend><br><br>
                    <table>
                        <th>
                            <th>Hastaya Mesaj</th>
                            <th>Diyetisyene Mesaj</th>
                        </th>
						<?php
                        include "../baglan.php";
                        $id = $_SESSION['Id'];

                        $query = $db->query("SELECT * FROM hastabilgi where KocId= $id", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                            foreach( $query as $hastaBilgi ){
                                $kId = $hastaBilgi['KullaniciId'];
                                $diyetisyenId = $hastaBilgi['DiyetisyenId'];

                                $hastakullanici = $db->query("SELECT * FROM kullanici WHERE Id = $kId")->fetch(PDO::FETCH_ASSOC);
                                $kAdi = $hastakullanici['KullaniciAdi'];
                                $diyetisyenVarMi = false;
                                if(isset($diyetisyenId)){
                                    $hastaDiyetisyen = $db->query("SELECT * FROM kullanici WHERE Id = $diyetisyenId")->fetch(PDO::FETCH_ASSOC);
                                    $diyetisyenVarMi = true;
                                }

                                print'
                                
                                    <tr>
                                        <td>'.$kAdi.'</td>
                                        <td>
                                             <form method="GET" action="../ortak/mesajlar.php">
                                                <input type="hidden" value="'.$kId.'" name="kullaniciId">
                                                <input type="submit" class="formbutton" value="Kullanıcıya Mesaj"> 
                                             </form>
                                        </td>';
                                       if($diyetisyenVarMi) {
                                           print '
                                        <td>
                                            <form method="GET" action="../ortak/mesajlar.php">
                                                <input type="hidden" value="'.$diyetisyenId.'" name="kullaniciId">
                                                <input type="submit" class="formbutton" value="Diyetisyene Mesaj"> 
                                            </form>
                                                
                                        </td>';
                                       }
                                   print '
                                    </tr>
                                </form>';
                            }
                        }
                        ?>
                    </table>
				<table style="margin-top: 40px;">
					<tr>
						<th>Gelen Mesajlar</th>
						<th>Kimden</th>
					    <th>Gönderilme Tarihi</th>
					</tr>
                <?php

                    $query = $db->query("SELECT * FROM kullanicimesaj where AlanId = $id", PDO::FETCH_ASSOC);
                    if ( $query->rowCount() ){
                        foreach( $query as $mesaj ){
                            $kkId= $mesaj['GonderenId'];
                            $karsiKullanici = $db->query("SELECT * FROM kullanici WHERE Id = $kkId")->fetch(PDO::FETCH_ASSOC);
                            print '
                                <tr>
                                    <td>'.$mesaj['Mesaj'].'</td>
                                    <td>'.$karsiKullanici['KullaniciAdi'].'</td>
                                    <td>'.$mesaj['GonderilmeTarihi'].'</td>
                                </tr>
                            ';
                        }
                    }


                ?><br><br>
            <table>	</table>
			</div>
		</article>		
		</section>

<div class="clear"></div>

	</section>
	

</body>
</html>
