<?php
session_start();
ob_start();
if(isset($_SESSION['PDF'])){
        unlink($_SESSION['PDF'].'.pdf');
        $_SESSION['PDF']=null;
    }
    else{
        require('../fpdf18/fpdf.php'); 
    } 


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

            <div class="beyaz" >

                    <fieldset>
                        <legend>Spor Planı Güncelle</legend><br><br><br>
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
                        </select><br><br>
                        <input type="submit" value="Getir" class="brk-btn" name="getir">
                        <input type="submit" class="brk-btn" value="Sil" name="sil">
                        <input type="submit" class="brk-btn" value="PDF Oluştur" name="pdf">
                        <br><br><br><br>
                        <?php
                        if(isset($_POST['pdf']))
                        {
                           
                        
                        function turkce($k)
                        {
                            return iconv('utf-8','iso-8859-9',$k);
                        }
                        $SporTabloId = $_POST['sporList'];
                        $pdf = new FPDF();
                        $pdf->AddPage();
                        $pdf->AddFont('arial_tr_bold','','arial_tr_bold.php');
                        $pdf->SetFont('arial_tr_bold','',18);
                        $pdf->Ln(15);
                        $pdf->Cell(58);
                        $pdf->Cell(100,10,turkce('Diyetin Güvende'));
                        $pdf->Image('../images/logo.png',145,20,40,40);
                        $pdf->AddFont('arial_tr','','arial_tr.php');
                        $pdf->SetFont('arial_tr','',15);
                        $say=0;
                        $query = $db->query("SELECT * FROM sportablosu WHERE Id=$SporTabloId", PDO::FETCH_ASSOC);
                            if ( $query->rowCount() ){
                                foreach( $query as $row ){
                                $aciklama = $row['TabloAciklamasi'];
                                $TabloAdi = $row['TabloAdi'];
                                $SporTabloId = $row['Id'];
                                $koc=$row['KocId'];
                                $koc1=$db-> query( "SELECT * FROM kullanici where Id=$koc", PDO::FETCH_ASSOC);
                                if($koc1->rowCount()){
                                    foreach ($koc1 as $key1) {
                                       $pdf->ln(20);
                                       $pdf->Cell(10);
                                       $pdf->Cell(55,10,turkce('Diyetisyen Adı: '));
                                       $pdf->Cell(20,10,turkce($key1['Ad']));
                                       $pdf->Cell(50,10,turkce($key1['Soyad']));
                                    }
                                }
                        $pdf->ln(15);
                        $pdf->Cell(10);
                        $pdf->Cell(55,10,turkce('Tablo Adı: '));
                        $pdf->Cell(150,10,turkce($TabloAdi));
                        $pdf->Ln(20);
                        $pdf->Cell(10);
                        $pdf->Cell(55,10,turkce('Tablo Açıklaması: '));
                        $pdf->MultiCell(120,5, turkce($aciklama));
                        $pdf->Ln(30);
                           }
                        }
                        $pdf->AddFont('arial_tr','B','arial_tr.php');
                        $pdf->SetFont('arial_tr','B',11);
                        $pdf->Cell(10);
                        $gun=$db->query("select * from programgun");
                        if($gun->rowCount()){
                            foreach ($gun as $gunler ) {
                                $gunad=$gunler['Gun'];
                                
                                $pdf->Cell(25,10,turkce($gunad),1,0,'C');
                                $say++;
                               if($say==7){
                                $pdf-> LN(10);
                               $say=0;
                               
                                }
                            }
                        }
                        $pdf->AddFont('arial_tr','','arial_tr.php');
                        $pdf->SetFont('arial_tr','',9);


                        $say=0;
                        $pdf->Cell(10);
                        $ilgilitablo = $db->query("SELECT * FROM sportablosatir where SporTabloId=$SporTabloId", PDO::FETCH_ASSOC);
                        if($ilgilitablo-> rowCount()){
                            foreach ($ilgilitablo as $key) {
                                $tablo=$key['Id'];
                                $satir=$key['Aciklama'];
                                $x=$pdf->GetX();
                                $y=$pdf->GetY();
                                $pdf->rect($x,$y,25,15)  ;
                            
                                $say++;
                                $x+=25;     
                                $pdf->MultiCell(25, 5,turkce($satir), 0);
                                $pdf->SetXY($x,$y);

                            
                                if($say==7){
                                $pdf->LN(15);
                                $say=0;
                                $pdf->Cell(10);
                                }
                            } 
                        }
                        $sayi=rand(1,10000000);
                        $_SESSION['PDF']=$sayi;

                          $pdf->Output('F',$sayi.'.pdf');
                          
                                        echo '<meta http-equiv="refresh" content="0;URL='.$sayi.'.pdf">';
                             
                        }
                        $sayi=0;
                        if(isset($_POST['sil'])){
                            $SporTabloId = $_POST['sporList'];
                            $kayitlimi=$db-> query("SELECT * FROM hastabilgi where KocId=$id" , PDO::FETCH_ASSOC);
                            if ( $kayitlimi->rowCount() ){
                                foreach ($kayitlimi as $kayitli) {
                                if($SporTabloId==$kayitli['SporTabloId']){     
                                $sayi=0;
                                break;
                                }
                                else{
                                $sayi=1;
                                }
                            }
                        }
                         if($sayi==0){
                         echo " Seçmiş olduğunuz tablo bir öğrencinizde kayıtlı olduğu için silemezsiniz. Lütfen önce hastanızın tablosunu güncelleyin. " ;
                         
                        } 
                         else if($sayi==1){
                                $listelesatir = $db->query("SELECT * FROM sportablosatir WHERE SporTabloId=$SporTabloId", PDO::FETCH_ASSOC);
                                if ( $listelesatir->rowCount() ){
                                foreach ($listelesatir as $key) {
                                    
                                $sil=$db->exec("DELETE FROM sportablosatir Where SporTabloId=$SporTabloId");
                                $listele = $db->query("SELECT * FROM sportablosu where Id=$SporTabloId", PDO::FETCH_ASSOC);
                                if($listele->rowCount()){
                                $sil2=$db->exec("DELETE FROM sportablosu where Id=$SporTabloId ");
                                }
                                if($sil)
                                echo '<meta http-equiv="refresh" content="0;URL=koc-liste-guncelle.php">';
                                }
                                } 
                            }
                        }
                        ?>
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
                        echo '<h5>"'.$tabloAdi.'" adlı tablonuzu güncelleyebilirsiniz.
                        <br><br>Notunuzu Giriniz</h5>
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
                                        echo '<td><input type="text" name="g'.($sayac+1).'-'. $sira.'" value="'.$gelenveri2['Aciklama'].'" style="max-width:100px" maxlength="35"></td>';
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
                    '<td><input type="text" name="g1-'+ $maxGun +'" style="max-width:100px" maxlength="35"></td>' +
                    '<td><input type="text" name="g2-'+ $maxGun +'" style="max-width:100px" maxlength="35"></td>' +
                    '<td><input type="text" name="g3-'+ $maxGun +'" style="max-width:100px" maxlength="35"></td>' +
                    '<td><input type="text" name="g4-'+ $maxGun +'" style="max-width:100px" maxlength="35"></td>' +
                    '<td><input type="text" name="g5-'+ $maxGun +'" style="max-width:100px" maxlength="35"></td>' +
                    '<td><input type="text" name="g6-'+ $maxGun +'" style="max-width:100px" maxlength="35"></td>' +
                    '<td><input type="text" name="g7-'+ $maxGun +'" style="max-width:100px" maxlength="35"></td>' +
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