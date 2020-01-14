<?php
session_start();
ob_start();

if(isset($_SESSION["kullaniciTur"])) {
    if ($_SESSION["kullaniciTur"] == "Kullanici")
        header("Location: ../kullanici/kullanici-Sayfasi.php");
    else if ($_SESSION["kullaniciTur"] == "Spor Hocası")
        header("Location: ../koc/koc.php");
    else if ($_SESSION["kullaniciTur"] == "Diyetisyen")
        header("Location: ../diyetisyen/diyetisyen.php");
    else if ($_SESSION["kullaniciTur"] == "Yönetici")
        header("Location: ../Yonetici/destek-istekleri.php");
}
else
    header("Location: /giris-yap.php");

?>