<?php 
 session_start();
ob_start();
if($_SESSION['PDF']!=null){
    $pedefe=$_SESSION['PDF'];
     unlink("".$pedefe.".pdf");
     $_SESSION['PDF']=null;
    
}
if($_SESSION['PDF']==null){
     require('../fpdf18/fpdf.php');
}


 $id = $_SESSION['Id'];


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
                                $diyetTabloId = $row['Id'];
                                $diyetisyen=$row['DiyetisyenId'];
                                
                                $d1=$db-> query( "SELECT * FROM kullanici where Id={$diyetisyen}", PDO::FETCH_ASSOC);
                                if($d1->rowCount()){
                                    foreach ($d1 as $key1) {
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
                        $ilgilitablo = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$diyetTabloId", PDO::FETCH_ASSOC);
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
                        $sayi=rand(1,10000000);
                    
                            $pdf->Output('F',''.$sayi.'.pdf');
                            $_SESSION['PDF']=$sayi;
                             echo '<meta http-equiv="refresh" content="0;URL='.$sayi.'.pdf">';
                             
                         }
                         
                    
?>