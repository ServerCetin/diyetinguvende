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
                        <legend>Diyet Listesi Güncelle</legend><br><br>
                        <label>Güncelleyeceğiniz tabloyu seçiniz</label>
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
                        <input type="submit" value="Getir" name="getir">
                        <br><br><br><br>
                        <h5>Notunuzu Giriniz</h5>

                        <?php
                        if(isset($_POST['getir'])){
                            $diyetTabloId = $_POST['diyetList'];
                            $listele = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$diyetTabloId", PDO::FETCH_ASSOC);
                            $query = $db->query("SELECT * FROM diyettablosu WHERE Id=$diyetTabloId", PDO::FETCH_ASSOC);
                            if ( $query->rowCount() ){
                                foreach( $query as $row ){
                                    $aciklama = $row['TabloAciklamasi'];
                                    $tabloAdi = $row['TabloAdi'];
                                    $diyetTabloId = $row['Id'];
                                }
                            }
                            echo '<input type="hidden" name="tabloAdi" value="'.$tabloAdi.'">';
                            echo '<input type="hidden" name="diyetTabloId" value="'.$diyetTabloId.'">';
                            echo '
                            <blockquote>
                            <textarea name="diyetisyenNotu" rows="5" cols="100">'.$aciklama.'</textarea>
                            </blockquote>
                            <br><br>';

                            if ( $listele->rowCount() )
                            {
                                $sayac = 0;$durak=1;$gun="";
                                echo '<table>';
                                echo '<th>Pazartesi</th>';
                                echo '<th>Salı</th>';
                                echo '<th>Çarşamba</th>';
                                echo '<th>Perşembe</th>';
                                echo '<th>Cuma</th>';
                                echo '<th>Cumartesi</th>';
                                echo '<th>Pazar</th>';
                                foreach( $listele as $gelenveri )
                                {
                                    if($sayac==0){$gun="pzt";}
                                    if($sayac==1){$gun="sali";}
                                    if($sayac==2){$gun="crs";}
                                    if($sayac==3){$gun="prs";}
                                    if($sayac==4){$gun="cuma";}
                                    if($sayac==5){$gun="cmt";}
                                    if($sayac==6){$gun="pzr";}
                                    if($sayac==0){echo '<tr>';}
                                    echo '<td><input type="text" name="'.($gun.$durak).'" value="'.$gelenveri["Aciklama"].'" style="max-width:50px"></td>';
                                    $sayac++;
                                    if($sayac==7){echo '</tr>';$sayac=0;$durak++;}
                                }
                                echo '</table>';
                            }
                        }
                        else{
                            echo '<table class="diyetlistesiolustur" width="5px" height="5px">

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
                            <td><input type="text" name="cuma1" style="max-width:50px"></td>
                            <td><input type="text" name="cmt1" style="max-width:50px"></td>
                            <td><input type="text" name="pzr1" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt2"style="max-width:50px"></td>
                                <td><input type="text" name="sali2"style="max-width:50px"></td>
                                <td><input type="text" name="crs2"style="max-width:50px"></td>
                                <td><input type="text" name="prs2"style="max-width:50px"></td>
                                <td><input type="text" name="cuma2"style="max-width:50px"></td>
                                <td><input type="text" name="cmt2"style="max-width:50px"></td>
                                <td><input type="text" name="pzr2"style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt3" style="max-width:50px"></td>
                                <td><input type="text" name="sali3" style="max-width:50px"></td>
                                <td><input type="text" name="crs3" style="max-width:50px"></td>
                                <td><input type="text" name="prs3" style="max-width:50px"></td>
                                <td><input type="text" name="cuma3" style="max-width:50px"></td>
                                <td><input type="text" name="cmt3" style="max-width:50px"></td>
                                <td><input type="text" name="pzr3" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt4" style="max-width:50px"></td>
                                <td><input type="text" name="sali4" style="max-width:50px"></td>
                                <td><input type="text" name="crs4" style="max-width:50px"></td>
                                <td><input type="text" name="prs4" style="max-width:50px"></td>
                                <td><input type="text" name="cuma4" style="max-width:50px"></td>
                                <td><input type="text" name="cmt4" style="max-width:50px"></td>
                                <td><input type="text" name="pzr4" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt5" style="max-width:50px"></td>
                                <td><input type="text" name="sali5" style="max-width:50px"></td>
                                <td><input type="text" name="crs5" style="max-width:50px"></td>
                                <td><input type="text" name="prs5" style="max-width:50px"></td>
                                <td><input type="text" name="cuma5" style="max-width:50px"></td>
                                <td><input type="text" name="cmt5" style="max-width:50px"></td>
                                <td><input type="text" name="pzr5" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt6" style="max-width:50px"></td>
                                <td><input type="text" name="sali6" style="max-width:50px"></td>
                                <td><input type="text" name="crs6" style="max-width:50px"></td>
                                <td><input type="text" name="prs6" style="max-width:50px"></td>
                                <td><input type="text" name="cuma6" style="max-width:50px"></td>
                                <td><input type="text" name="cmt6" style="max-width:50px"></td>
                                <td><input type="text" name="pzr6" style="max-width:50px"></td>
                            </tr>


                    </fieldset>
                         </table>';
                        }

                        ?>



                        <br><br>
                        <br><input type="submit" class="button buttonS" value="Güncelle" name="guncelle" style="margin-left:80%;">

                </form>
            </div>
        </article>


    </section>
    <div class="clear"></div>

</section>


</body>
</html>


<?php


if(isset($_POST['guncelle'])){
    echo 'sadasdads';
    include '../baglan.php';
    $tabloAdi = $_POST['tabloAdi'];
    $tabloNot = $_POST['diyetisyenNotu'];
    $diyetTabloId = $_POST['diyetTabloId'];
    $datetimeNow = date("Y-m-d H:i:s");
    $id = $_SESSION['Id'];
    $insert = $db -> exec("UPDATE diyettablosu SET TabloAciklamasi='$tabloNot',TabloTarih='$datetimeNow' where Id='$diyetTabloId'");

    $pzt1 = $_POST['pzt1'];
    $sali1 = $_POST['sali1'];
    $crs1 = $_POST['crs1'];
    $prs1 = $_POST['prs1'];
    $cuma1 = $_POST['cuma1'];
    $cmt1 = $_POST['cmt1'];
    $pzr1 = $_POST['pzr1'];

    $pzt2 = $_POST['pzt2'];
    $sali2 = $_POST['sali2'];
    $crs2 = $_POST['crs2'];
    $prs2 = $_POST['prs2'];
    $cuma2 = $_POST['cuma2'];
    $cmt2 = $_POST['cmt2'];
    $pzr2 = $_POST['pzr2'];

    $pzt3 = $_POST['pzt3'];
    $sali3 = $_POST['sali3'];
    $crs3 = $_POST['crs3'];
    $prs3 = $_POST['prs3'];
    $cuma3 = $_POST['cuma3'];
    $cmt3 = $_POST['cmt3'];
    $pzr3 = $_POST['pzr3'];

    $pzt4 = $_POST['pzt4'];
    $sali4 = $_POST['sali4'];
    $crs4 = $_POST['crs4'];
    $prs4 = $_POST['prs4'];
    $cuma4 = $_POST['cuma4'];
    $cmt4 = $_POST['cmt4'];
    $pzr4 = $_POST['pzr4'];

    $pzt5 = $_POST['pzt5'];
    $sali5 = $_POST['sali5'];
    $crs5 = $_POST['crs5'];
    $prs5 = $_POST['prs5'];
    $cuma5 = $_POST['cuma5'];
    $cmt5 = $_POST['cmt5'];
    $pzr5 = $_POST['pzr5'];

    $pzt6 = $_POST['pzt6'];
    $sali6 = $_POST['sali6'];
    $crs6 = $_POST['crs6'];
    $prs6 = $_POST['prs6'];
    $cuma6 = $_POST['cuma6'];
    $cmt6 = $_POST['cmt6'];
    $pzr6 = $_POST['pzr6'];

    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzt1", "tabloId" => $diyetTabloId, "gunno" => "1", "gunsira" => "1"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzt2", "tabloId" => $diyetTabloId, "gunno" => "1", "gunsira" => "2"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzt3", "tabloId" => $diyetTabloId, "gunno" => "1", "gunsira" => "3"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzt4", "tabloId" => $diyetTabloId, "gunno" => "1", "gunsira" => "4"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzt5", "tabloId" => $diyetTabloId, "gunno" => "1", "gunsira" => "5"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzt6", "tabloId" => $diyetTabloId, "gunno" => "1", "gunsira" => "6"));

    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$sali1", "tabloId" => $diyetTabloId, "gunno" => "2", "gunsira" => "1"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$sali2", "tabloId" => $diyetTabloId, "gunno" => "2", "gunsira" => "2"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$sali3", "tabloId" => $diyetTabloId, "gunno" => "2", "gunsira" => "3"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$sali4", "tabloId" => $diyetTabloId, "gunno" => "2", "gunsira" => "4"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$sali5", "tabloId" => $diyetTabloId, "gunno" => "2", "gunsira" => "5"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$sali6", "tabloId" => $diyetTabloId, "gunno" => "2", "gunsira" => "6"));

    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$crs1", "tabloId" => $diyetTabloId, "gunno" => "3", "gunsira" => "1"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$crs2", "tabloId" => $diyetTabloId, "gunno" => "3", "gunsira" => "2"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$crs3", "tabloId" => $diyetTabloId, "gunno" => "3", "gunsira" => "3"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$crs4", "tabloId" => $diyetTabloId, "gunno" => "3", "gunsira" => "4"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$crs5", "tabloId" => $diyetTabloId, "gunno" => "3", "gunsira" => "5"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$crs6", "tabloId" => $diyetTabloId, "gunno" => "3", "gunsira" => "6"));

    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$prs1", "tabloId" => $diyetTabloId, "gunno" => "4", "gunsira" => "1"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$prs2", "tabloId" => $diyetTabloId, "gunno" => "4", "gunsira" => "2"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$prs3", "tabloId" => $diyetTabloId, "gunno" => "4", "gunsira" => "3"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$prs4", "tabloId" => $diyetTabloId, "gunno" => "4", "gunsira" => "4"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$prs5", "tabloId" => $diyetTabloId, "gunno" => "4", "gunsira" => "5"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$prs6", "tabloId" => $diyetTabloId, "gunno" => "4", "gunsira" => "6"));

    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => $cuma1, "tabloId" => $diyetTabloId, "gunno" => 5, "gunsira" => "1"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cuma2", "tabloId" => $diyetTabloId, "gunno" => "5", "gunsira" => "2"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cuma3", "tabloId" => $diyetTabloId, "gunno" => "5", "gunsira" => "3"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cuma4", "tabloId" => $diyetTabloId, "gunno" => "5", "gunsira" => "4"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cuma5", "tabloId" => $diyetTabloId, "gunno" => "5", "gunsira" => "5"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cuma6", "tabloId" => $diyetTabloId, "gunno" => "5", "gunsira" => "6"));

    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cmt1", "tabloId" => $diyetTabloId, "gunno" => "6", "gunsira" => "1"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cmt2", "tabloId" => $diyetTabloId, "gunno" => "6", "gunsira" => "2"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cmt3", "tabloId" => $diyetTabloId, "gunno" => "6", "gunsira" => "3"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cmt4", "tabloId" => $diyetTabloId, "gunno" => "6", "gunsira" => "4"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cmt5", "tabloId" => $diyetTabloId, "gunno" => "6", "gunsira" => "5"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$cmt6", "tabloId" => $diyetTabloId, "gunno" => "6", "gunsira" => "6"));

    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzr1", "tabloId" => $diyetTabloId, "gunno" => "7", "gunsira" => "1"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzr2", "tabloId" => $diyetTabloId, "gunno" => "7", "gunsira" => "2"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzr3", "tabloId" => $diyetTabloId, "gunno" => "7", "gunsira" => "3"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzr4", "tabloId" => $diyetTabloId, "gunno" => "7", "gunsira" => "4"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzr5", "tabloId" => $diyetTabloId, "gunno" => "7", "gunsira" => "5"));
    $query = $db->prepare("UPDATE diyettablosatir SET Aciklama = :aciklama WHERE DiyetTabloId = :tabloId AND ProgramGunId= :gunno AND GunSira= :gunsira");
    $update = $query->execute(array("aciklama" => "$pzr6", "tabloId" => $diyetTabloId, "gunno" => "7", "gunsira" => "6"));
}

?>
