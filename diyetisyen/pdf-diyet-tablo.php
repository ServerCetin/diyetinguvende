<?php
require('../fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

include "../baglan.php";
$DiyetTabloId = $_POST['diyetlist'];
$ilgilitablo = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$DiyetTabloId", PDO::FETCH_ASSOC);
$query = $db->query("SELECT * FROM diyettablosu WHERE Id=$DiyetTabloId", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
        foreach( $query as $row ){
        $aciklama = $row['TabloAciklamasi'];
        $TabloAdi = $row['TabloAdi'];
        $DiyetTabloId = $row['Id'];
     

$pdf->Cell(40,10,'$aciklama',1);

   }

    }
    $pdf->SetFont('Arial','B',16);
   $pdf->Output();
?>