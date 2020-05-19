<?php
session_start();
ob_start();
?>
    <!doctype html>
    <html>

    <head>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
        <meta charset="UTF-8">
        <title>Diyetin Güvende!</title>
        <link rel="stylesheet" href="/css/styles.css" type="text/css" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasini saglar-->
    </head>

    <body>
    <section id="body" class="width">

        <?php include "../ortak/get-menu.php"?>

        <section id="content" class="column-right">

            <article>
                <div class="beyaz">
                    <fieldset>
                        <legend>Diyet Listem</legend>
                        <br>
                    </fieldset>
                    <form action="" method="POST">

                    <?php
                    include '../baglan.php';
                    $id = $_SESSION['Id'];

                    $query = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId ='{$id}'")->fetch(PDO::FETCH_ASSOC);
                    if ( $query ){
                        $diyetTabloId = $query['DiyetTabloId'];
                    }
                    if(empty($query['DiyetisyenId'])){
                        echo "<br><p><font style='color:green' size='6'face='Georgia, Arial'>Diyetisyeniniz bulunmadığı için herhangi bir listeniz yok!</h2></p>";
                        echo "<br><br><center><img src='../images/logo.png' width='250'hight='250'></center>";
                    }
                    else{
                    $query = $db->query("SELECT * FROM diyettablosu WHERE Id ='{$diyetTabloId}'")->fetch(PDO::FETCH_ASSOC);
                    if ( $query ){
                        $tabloAciklamasi = $query['TabloAciklamasi'];
                    }
                    if(isset($tabloAciklamasi)){
                        echo '<table>
                    <tr>
                    <th>Bugunkü Listem<br></th>
                    <th>Yarınki Listem</th>
                    </tr>';

                        date_default_timezone_set('Europe/Istanbul');

                        $today = date('N');
						if($today == 7) $tomorrow =1;
						else $tomorrow = date('N')+1;
                        
                        $listele = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND (ProgramGunId = $today OR ProgramGunId = $tomorrow) order by GunSira ASC,ProgramGunId ASC ", PDO::FETCH_ASSOC);

                        if ( $listele->rowCount() )
                        {
                            $sayac = 0;
                            $gün = 0;
                            foreach( $listele as $gelenveri )
                            {
                                $Tablo=$db->prepare("select * from diyetyaptimi where kullaniciId='$id' AND sira='".$gelenveri['GunSira']."' AND gunId='".$gelenveri['ProgramGunId']."'");
                                $Tablo->execute(array('kullaniciId'));
                                $Tablo1=$Tablo->fetch();

                                if(date('N')==$gelenveri['ProgramGunId']){
                                    echo '<tr>';
                                    if(!empty($gelenveri['Aciklama'])){
                                        echo "<td>".$gelenveri['Aciklama'];
                                        if(empty($Tablo1['yaptiMi'])){
                                            echo" <input type='checkbox' name='yaptimi[]' value='".$gelenveri['Id']."'>  -Tamamlanmadı ✖️</td>";  }
                                        else{
                                            echo" - &#x2714;</td>";}
                                    }
                                    else
                                        echo '<td></td>';
                                }
                                else{
                                    if(!empty($gelenveri['Aciklama'])){
                                        echo "<td>".$gelenveri['Aciklama'];
                                    }
                                    else
                                        echo '<td></td>';
                                    echo '</tr>';
                                }
                            }
                        }
                    }
                    

                    
                
                ?>
            </table>
                    <br><br>
                    <p>Lütfen bugünkü diyetinizden gerçekleştirmiş olduğunuz verileri seçin! Veriler spor hocanıza gönderilecek.</p>
					<b style="color:red">Eğer diyetisyeniniz haftalık gidişatınızı kontrol ettiyse takibe devam edebilmek için listenizi yenileyiniz.</b><br><br>
					<input type="submit"  name="yaptimib" class="brk-btn" value="KAYDET">
					<input type="submit"  name="resetTheProgram" class="brk-btn" value="YENİLE" onclick="return window.confirm('Bu işlemi onaylarsanız bu haftaki eylemleriniz sıfırlanacak. Bu işlemi gerçekleştirmek istediğinize gerçekten de emin miniz?')">
                    </form>
                    <br><br>
                    <br><br>
                    <?php
                   }
                    if(isset($tabloAciklamasi)){
                        echo '<h4>Mevcut Haftalik Diyet Listem</h4>';


                        echo '<h5>Diyetisyeninizin Notu:</h5>'.' <blockquote>
                    <p>
                    '.$tabloAciklamasi.'
                    </p>
                    </blockquote>';

                        $listele = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$diyetTabloId", PDO::FETCH_ASSOC);
                        if ( $listele->rowCount() )
                        {
                            $sayac = 0;
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
                                if($sayac==0){echo '<tr>';}
                                echo "<td style=\"width:50px;\">".$gelenveri['Aciklama']."</td>";
                                $sayac++;
                                if($sayac==7){echo '</tr>';$sayac=0;}
                            }
                            echo '</table>';
                        }
                        ?>
                        <form action="" method="POST">
                        <br><br><input type='submit' name='pdf' class='brk-btn' value='PDF Oluştur' style= 'margin-left:70%;'>
                       </form>
                        <?php

                    }
                    if(isset($_POST['pdf'])){
                   

                        require('../fpdf.php');
                        function turkce($k)
                        {
                            return iconv('utf-8','iso-8859-9',$k);
                        }
    
                        $pdf = new FPDF();
                        $pdf->AddPage();
                        $pdf->AddFont('arial_tr_bold','','arial_tr_bold.php');
                        $pdf->SetFont('arial_tr_bold','',18);
                        $pdf->Ln(15);
                        $pdf->Cell(58);
                        $pdf->Cell(100,10,turkce('Diyetin Güvende'));
                        $pdf->Image('../images/logo.png',145,20,40,40);
                        $pdf->AddFont('arial_tr','','arial_tr.php');
                        $pdf->SetFont('arial_tr','',14);


                        include "../baglan.php";
                        $getir=$db -> prepare("select * from kullanici where Id='$id'");
                        $getir->execute(array('Id'));
                        $getir1=$getir->fetch();
                        $pdf->ln(20);
                        $pdf->Cell(10);
                        $pdf->Cell(55,10,turkce('Adınız Soyadınız: '));
                        $pdf->Cell(20,10,turkce($getir1['Ad'])); 
                        $pdf->Cell(40,10,turkce($getir1['Soyad']));
                        $hastabilgi = $db -> query("select * from hastabilgi where KullaniciId='{$id}'",PDO::FETCH_ASSOC);
                        if($hastabilgi->rowCount()){
                            foreach ($hastabilgi as $key ) {
                                   
                            
                            $diyetTabloId = $key['DiyetTabloId'];
                            $say=0;
                            $tabloadi=$db->query("select * from diyettablosu where Id={$diyetTabloId}",PDO:: FETCH_ASSOC);
                            if($tabloadi->rowCount()){
                                foreach ($tabloadi as $row) {
                                $aciklama = $row['TabloAciklamasi'];
                                $TabloAdi = $row['TabloAdi'];
                                $DiyetTabloId = $row['Id'];
                                $diyetisyen=$row['DiyetisyenId'];
                                
                                $diyetisyen1=$db-> query( "SELECT * FROM kullanici where Id={$diyetisyen}", PDO::FETCH_ASSOC);
                                if($diyetisyen1->rowCount()){
                                    foreach ($diyetisyen1 as $key1) {
                                       $pdf->ln(15);
                                       $pdf->Cell(10);
                                       $pdf->Cell(55,10,turkce('Diyetisyen Adı: '));
                                       $pdf->Cell(20,10,turkce($key1['Ad']));
                                       $pdf->Cell(50,10,turkce($key1['Soyad']));
                                    }
                                }

                            
                        $pdf->ln(10);
                        $pdf->Cell(10);
                        $pdf->Cell(55,10,turkce('Tablo Adı: '));
                        $pdf->Cell(150,10,turkce($TabloAdi));
                        $pdf->Ln(10);
                        $pdf->Cell(10);
                        $pdf->Cell(55,10,turkce('Tablo Açıklaması: '));
                        $pdf->MultiCell(120,5, turkce($aciklama));
                        $pdf->Ln(30);
                        
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
                        $ilgilitablo = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$DiyetTabloId", PDO::FETCH_ASSOC);
                        if($ilgilitablo-> rowCount()){
                            foreach ($ilgilitablo as $key) {
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

                            }
                            }
                        }
                    
                            $pdf->Output('F','Tablo.pdf');
                             echo '<meta http-equiv="refresh" content="0;URL=Tablo.pdf">';
                         }
                         
                    }
                    if(isset($_POST['yaptimib'])){
                    
                        
                        $yaptiMi = $_POST['yaptimi'];
                        
                        foreach ($yaptiMi as $bugun ) {
                            
                        $deneme=$db->prepare("SELECT * from diyettablosatir where Id='$bugun'");
                        $deneme->execute(array('Id'));
                        $deneme1=$deneme->fetch();
                        $tabloId = $deneme1['DiyetTabloId'];
                        $gunId = $deneme1['ProgramGunId'];
                        $sira=$deneme1['GunSira'];

                        $ekle=$db->exec("INSERT INTO diyetyaptimi (tabloId,gunId,sira,yaptiMi,kullaniciId) Values ('$tabloId','$gunId','$sira',
                            '1','$id')");
                        } 
                        echo '<meta http-equiv="refresh" content="0;URL=kullanici-sayfasi.php">';           
                    }
                    if(isset($_POST['resetTheProgram'])){
                        $sil = $db-> exec("delete from diyetyaptimi where kullaniciId=$id");
                        echo '<meta http-equiv="refresh" content="0;kullanici-sayfasi.php">';
                    }
                    ?>


                </div>
            </article>

            <footer class="clear">
                <p>&copy; 2019 Diyetin Güvende.</p>
            </footer>

        </section>

        <div class="clear"></div>

    </section>

    </body>
</html>
