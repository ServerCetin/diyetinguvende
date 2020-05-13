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
                        <legend>Diyet Listesi Güncelle</legend><br><br>
                        <label>Güncelleyeceğiniz tabloyu seçiniz.</label>
                    <form method="POST">
                        <select name="diyetlist">
                            <?php
                            include '../baglan.php';
                            $id = $_SESSION["Id"];
                            $listele = $db->query("SELECT * FROM diyettablosu where DiyetisyenId =$id", PDO::FETCH_ASSOC);
                            if ( $listele->rowCount())
                            {
                                foreach( $listele as $gelenveri )
                                {
                                    echo '<option value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].' </option>';
                                }
                            }
                            ?>
                        </select><br><br>
                        <input type="submit" class="brk-btn" value="Getir" name="getir">
                        <input type="submit" class="brk-btn" value="Sil" name="sil">
                        <br><br><br><br>
                        <?php
                        $sayi=0;
                        if(isset($_POST['sil'])){
                            $DiyetTabloId = $_POST['diyetlist'];
                            $kayitlimi=$db-> query("SELECT * FROM hastabilgi where DiyetisyenId=$id" , PDO::FETCH_ASSOC);
                            if ( $kayitlimi->rowCount() ){
                                foreach ($kayitlimi as $kayitli) {
                                if($DiyetTabloId==$kayitli['DiyetTabloId']){
                                   
                                $sayi=0;
                                }
                                else{
                                    $sayi=1;
                                }
                            }
                        }
                         if($sayi==0){
                         echo " aa <script type='text/javascript'>
                                alert('Seçmiş olduğunuz tablo bir hastanızda kayıtlı olduğu için silemezsiniz. Lütfen önce hastanızın tablosunu güncelleyin.');
                                </script>" ;
                            } 
                         else{
                          $listelesatir = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$DiyetTabloId", PDO::FETCH_ASSOC);
                                if ( $listelesatir->rowCount() ){
                                $sil=$db->exec("DELETE FROM diyettablosatir Where DiyetTabloId=$DiyetTabloId");
                                $listele = $db->query("SELECT * FROM diyettablosu where Id=$DiyetTabloId", PDO::FETCH_ASSOC);
                                if($listele->rowCount()){
                                $sil2=$db->exec("DELETE FROM diyettablosu where Id=$DiyetTabloId ");
                                }
                                if($sil)
                                echo '<meta http-equiv="refresh" content="0;URL=diyetisyen-liste-guncelle.php">';
                                } 
                            }
                        }
                   

                    if(isset($_POST['getir'])){
                        $DiyetTabloId = $_POST['diyetlist'];
                        $ilgilitablo = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$DiyetTabloId", PDO::FETCH_ASSOC);
                        $query = $db->query("SELECT * FROM diyettablosu WHERE Id=$DiyetTabloId", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                            foreach( $query as $row ){
                                $aciklama = $row['TabloAciklamasi'];
                                $TabloAdi = $row['TabloAdi'];
                                $DiyetTabloId = $row['Id'];
                            }
                        }
                        echo '<h5>"'.$TabloAdi.'" adlı tablonuzu güncelleyebilirsiniz.
                        <br><br>Notunuzu Giriniz</h5>
                        <input type="hidden" name="TabloAdi" value="'.$TabloAdi.'">'.
                        '<input type="hidden" name="DiyetTabloId" value="'.$DiyetTabloId.'">'.
                        '<input type="hidden" name="tablesize" value="'.($ilgilitablo->rowCount()/7).'">'.
                        '<input type="hidden" id="sizeOfTableRow" name="sizeOfTableRow" value="'.($ilgilitablo->rowCount()/7).'">';
                        $satir =  $ilgilitablo->rowCount()/7;
                        echo '
                        <blockquote>
                        <textarea name="diyetisyenNotu" rows="5" cols="100">'.$aciklama.'</textarea>
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
                    '<td><input type="text" name="g3-'+ $maxGun +'" style="max-width:100px"></td>' +
                    '<td><input type="text" name="g4-'+ $maxGun +'" style="max-width:100px"></td>' +
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
        $TabloAdi = $_POST['TabloAdi'];
        $tabloNot = $_POST['diyetisyenNotu'];
        $DiyetTabloId = $_POST['DiyetTabloId'];
        $datetimeNow = date("Y-m-d H:i:s");
        $tablesize = $_POST['tablesize'];
        $addedrow = $_POST['sizeOfTableRow'];
        $id = $_SESSION['Id'];
        $tableupdate = $db -> exec("UPDATE diyettablosu SET TabloAciklamasi='$tabloNot',TabloTarih='$datetimeNow' where Id='$DiyetTabloId'");

        for($i=1;$i<=$addedrow;$i++){
            for($j=1;$j<=7;$j++){
                $text = 'g'.(string)$j.'-'.(string)$i;
                $tableRowContent = $_POST[$text];
                $girdi = $db -> exec("UPDATE diyettablosatir SET 
                    Aciklama='$tableRowContent'
                    where DiyetTabloId='$DiyetTabloId' 
                    and GunSira = '$i'
                    and ProgramGunId = '$j'
                    ");
            }
        }

        if($addedrow>$tablesize){
            $tablosatirinsert = $db->prepare("INSERT INTO diyettablosatir SET 
            ProgramGunId = ?, 
            DiyetTabloId = ?, 
            Aciklama = ?, 
            GunSira = ?");

            for($i=$tablesize+1;$i<=$addedrow;$i++){
                for($j=1;$j<=7;$j++){
                    $text = 'g'.(string)$j.'-'.(string)$i;
                    $tableRowContent = $_POST[$text];
                    $girdi = $tablosatirinsert->execute(array($j,$DiyetTabloId, $tableRowContent,$i));
                }
            }
        }
        else if($addedrow<$tablesize){
            $deletequery = $db->prepare("DELETE FROM diyettablosatir 
        WHERE DiyetTabloId = :id 
        and GunSira = :GunSira");

            for($i=$tablesize;$i>$addedrow;$i--){
                $delete = $deletequery->execute(array(
                    'id' => $DiyetTabloId,
                    'GunSira' => $i
                ));
            }

        }
    }
?>
