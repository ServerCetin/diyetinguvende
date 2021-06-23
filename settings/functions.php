<?php

function Guvenlik($Deger){
    $BosluklariSil = trim($Deger);
    $TaglariTemizle = strip_tags($BosluklariSil);
    $OzelKarakterler = htmlspecialchars($TaglariTemizle, ENT_QUOTES);
    $Sonuc = $OzelKarakterler;
    return $Sonuc;
}