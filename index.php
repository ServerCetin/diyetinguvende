<?php
session_start();
ob_start();
if(isset($_SESSION["kullaniciTur"])){
    if($_SESSION["kullaniciTur"] == "Kullanici")
        header("Location: /kullaniciSayfasi.php");
    if($_SESSION["kullaniciTur"] == "Spor Hocası")
        header("Location: /koc.php");
    if($_SESSION["kullaniciTur"] == "Diyetisyen")
        header("Location: /diyetisyen.php");
}
else
    header("Location: /giris.php");

?>