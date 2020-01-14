<?php
session_start();
ob_start();

if(isset($_SESSION["kullaniciTur"])) {
    if ($_SESSION["kullaniciTur"] == "Kullanici")
        header("Location: ../Kullanici/kullanici-sayfasi.php");
    else if ($_SESSION["kullaniciTur"] == "Spor Hocası")
        header("Location: ../Koc/koc.php");
    else if ($_SESSION["kullaniciTur"] == "Diyetisyen")
        header("Location: ../Diyetisyen/diyetisyen.php");
    else if ($_SESSION["kullaniciTur"] == "Yönetici")
        header("Location: ../Yonetici/destek-istekleri.php");
}
else
    header("Location: /giris-yap.php");

?>