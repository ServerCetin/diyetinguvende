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

    <title>Mesajlar-Diyetin Güvende!</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />

    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

<section id="body" class="width">
    <?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "../Menus/kullanici-menu.php";}?>


    <section id="content" class="column-right">

        <article>

            <div class="beyaz" style="padding-top: 50px"  >

                <fieldset>
                    <legend>Mesaj Gönder</legend><br><br>
                    <table>
                        <th>
                        <th>Diyetisyene Mesaj</th>
                        <th>Koçuna Mesaj</th>
                        </th>
                        <?php
                        include "../baglan.php";
                        $id = $_SESSION['Id'];

                        $query = $db->query("SELECT * FROM hastabilgi where KullaniciId= $id", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                            foreach( $query as $hastaBilgi ){
                                $diyetisyenId = $hastaBilgi['DiyetisyenId'];
                                $kocId = $hastaBilgi['KocId'];

                                $hastakullanici = $db->query("SELECT * FROM kullanici WHERE Id = $id")->fetch(PDO::FETCH_ASSOC);
                                $kAdi = $hastakullanici['KullaniciAdi'];
                                $kocVarMi = false;
                                $diyetisyenVarMi = false;
                                if($kocId){
                                    $hastaKoc = $db->query("SELECT * FROM kullanici WHERE Id = $kocId")->fetch(PDO::FETCH_ASSOC);
                                    $kocVarMi = true;
                                }
                                if($diyetisyenId){
                                    $hastaDiyetisyen = $db->query("SELECT * FROM kullanici WHERE Id = $diyetisyenId")->fetch(PDO::FETCH_ASSOC);
                                    $diyetisyenVarMi = true;
                                }

                                print'
                                
                                     <tr><td></td>';
                                if($diyetisyenVarMi){
                                    echo '
                                        <td>
                                             <form method="GET" action="kul-mesajlar.php">
                                                <input type="hidden" value="'.$diyetisyenId.'" name="kullaniciId">
                                                <input type="submit"  value="Diyetisyene Mesaj"> 
                                             </form>
                                        </td>';
                                }
                                if($kocVarMi) {
                                    print '
                                        <td>
                                            <form method="GET" action="kul-mesajlar.php">
                                                <input type="hidden" value="'.$kocId.'" name="kullaniciId">
                                                <input type="submit" value="Koça Mesaj"> 
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


                        ?>

                    </table><br><br>

            </div>
        </article>

    </section>

    <div class="clear"></div>

</section>


</body>
</html>
