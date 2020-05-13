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
    <link rel="stylesheet" href="../css/styles.css" type="text/css" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

<section id="body" class="width">
    <?php include "../ortak/get-menu.php"?>


    <section id="content" class="column-right">

        <article>

            <div class="beyaz" style="padding-top: 50px"  >

                    <fieldset>
                        <legend>Spor Planı Güncelle</legend><br><br>
                        <label>Güncelleyeceğiniz tabloyu seçiniz</label>
                    <form method="POST">
                        <select name="sporList">
                            <?php
                            include '../baglan.php';
                            $id = $_SESSION["Id"];
                            $listele = $db->query("SELECT * FROM sportablosu where KocId =$id", PDO::FETCH_ASSOC);
                            if ( $listele->rowCount())
                            {
                                foreach( $listele as $gelenveri )
                                {
                                    echo '<option value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].' </option>';
                                }
                            }
                            ?>
                        </select>
                        <input type="submit" value="Getir" name="getir">
                        <br><br><br><br>
                        <?php
                    if(isset($_POST['getir'])){
                        $sporTabloId = $_POST['sporList'];
                        $ilgilitablo = $db->query("SELECT * FROM sportablosatir where SporTabloId=$sporTabloId", PDO::FETCH_ASSOC);
                        $query = $db->query("SELECT * FROM sportablosu WHERE Id=$sporTabloId", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                            foreach( $query as $row ){
                                $aciklama = $row['TabloAciklamasi'];
                                $tabloAdi = $row['TabloAdi'];
                                $sporTabloId = $row['Id'];
                            }
                        }
                        echo '<h5>Notunuzu Giriniz</h5>
                        <input type="hidden" name="tabloAdi" value="'.$tabloAdi.'">'.
                        '<input type="hidden" name="sporTabloId" value="'.$sporTabloId.'">'.
                        '<input type="hidden" name="tablesize" value="'.($ilgilitablo->rowCount()/7).'">'.
                        '<input type="hidden" id="sizeOfTableRow" name="sizeOfTableRow" value="'.($ilgilitablo->rowCount()/7).'">';
                        $satir =  $ilgilitablo->rowCount()/7;
                        echo '
                        <blockquote>
                        <textarea name="kocNotu" rows="5" cols="100">'.$aciklama.'</textarea>
                        </blockquote>
                        <br><br>';
                        echo '<table id="programlist"><tr>'
                            .'<th>Pazartesi</th>'
                            .'<th>Salı</th>'
                            .'<th>Çarşamba</th>'
                            .'<th>Perşembe</th>'
                            .'<th>Cuma</th>'
                            .'<th>Cumartesi</th>'
                            .'<th>Pazar</th></tr>';
                            if ( $ilgilitablo->rowCount() )
                            {
                                $sayac = 0;$durak=1;$gun="";
                                $sayac=0;
                                $sira=1;
                                foreach( $ilgilitablo as $gelenveri2 ){
                                        if($sayac==0)   echo '<tr>';
                                        echo '<td><input type="text" name="g'.($sayac+1).'-'. $sira.'" value="'.$gelenveri2['Aciklama'].'" style="max-width:100px"></td>';
                                        $sayac++;
                                        if($sayac==7){echo '</tr>'; $sayac=0;$sira++;}

                                }
                                echo '</table>';
                            }
                            else{
                                echo '</table>';
                            }
                            echo '<input type="submit" class="brk-btn" value="Güncelle" name="guncelle" style="margin-left:80%;">
                            </form>
                        <button class="brk-btn" style="top:-30px;" onclick="ekle()">Satır ekle</button> '.
                        '<button class="brk-btn" style="top:-30px;" id="silButton" onclick="sil()">Satır Sil</button><br>';
                            }
                        ?>
            </div>
        </article>
    </section>

    <div class="clear"></div>
    </section>
</body>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
            $maxGun = <?php echo $satir+1;?>;
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
                    if($maxGun>1){
                        $('#silButton').show();
                    }
            }
            function sil() {
                if($maxGun!=1){
                    $('#programlist tr').slice($maxGun-1).remove();
                    $maxGun--;
                    $("#sizeOfTableRow").val($maxGun-1);
                    if($maxGun==1)
                        $('#silButton').hide();
                }
            }
        </script>

</html>
<?php
    if(isset($_POST['guncelle'])){
        include '../baglan.php';
        $tabloAdi = $_POST['tabloAdi'];
        $tabloNot = $_POST['kocNotu'];
        $sporTabloId = $_POST['sporTabloId'];
        $datetimeNow = date("Y-m-d H:i:s");
        $tablesize = $_POST['tablesize'];
        $addedrow = $_POST['sizeOfTableRow'];
        $id = $_SESSION['Id'];
        $tableupdate = $db -> exec("UPDATE sportablosu SET TabloAciklamasi='$tabloNot',TabloTarih='$datetimeNow' where Id='$sporTabloId'");

        for($i=1;$i<=$addedrow;$i++){
            for($j=1;$j<=7;$j++){
                $text = 'g'.(string)$j.'-'.(string)$i;
                $tableRowContent = $_POST[$text];
                $girdi = $db -> exec("UPDATE sportablosatir SET 
                    Aciklama='$tableRowContent'
                    where SporTabloId='$sporTabloId' 
                    and GunSira = '$i'
                    and ProgramGunId = '$j'
                    ");
            }
        }

        if($addedrow>$tablesize){
            $tablosatirinsert = $db->prepare("INSERT INTO sportablosatir SET 
            ProgramGunId = ?, 
            SporTabloId = ?, 
            Aciklama = ?, 
            GunSira = ?");

            for($i=$tablesize+1;$i<=$addedrow;$i++){
                for($j=1;$j<=7;$j++){
                    $text = 'g'.(string)$j.'-'.(string)$i;
                    $tableRowContent = $_POST[$text];
                    $girdi = $tablosatirinsert->execute(array($j,$sporTabloId, $tableRowContent,$i));
                }
            }
        }
        else if($addedrow<$tablesize){
            $deletequery = $db->prepare("DELETE FROM sportablosatir 
        WHERE SporTabloId = :id 
        and GunSira = :i");

            for($i=$tablesize;$i>$addedrow;$i--){
                $delete = $deletequery->execute(array(
                    'id' => $sporTabloId,
                    'GunSira' => $i
                ));
            }

        }
    }
?>
