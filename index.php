<?php
session_start();
ob_start();
if(isset($_SESSION["kullaniciTur"])){
    if($_SESSION["kullaniciTur"] == "Kullanici")
        header("Location: ../kullanici/kullanici-Sayfasi.php");
    if($_SESSION["kullaniciTur"] == "Spor Hocası")
        header("Location: ../koc/koc.php");
    if($_SESSION["kullaniciTur"] == "Diyetisyen")
        header("Location: ../diyetisyen/diyetisyen.php");
    else
        header("Location: /giris-yap.php");

?>