<?php
session_start();
ob_start();
if(isset($_SESSION["kullaniciTur"])){
    if($_SESSION["kullaniciTur"] == "Kullanici")
        header("Location: /Kullanici/kullanici-Sayfasi.php");
    if($_SESSION["kullaniciTur"] == "Spor Hocası")
        header("Location: /Koc/koc.php");
    if($_SESSION["kullaniciTur"] == "Diyetisyen")
        header("Location: /Diyetisyen/diyetisyen.php");
}
else
    header("Location: /giris.php");

?>