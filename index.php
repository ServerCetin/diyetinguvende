<?php
session_start();
ob_start();
if(isset($_SESSION["kullaniciTur"])){
    if($_SESSION["kullaniciTur"] == "Kullanici")
<<<<<<< HEAD
        header("Location: ../kullanici/kullaniciSayfasi.php");
    if($_SESSION["kullaniciTur"] == "Spor Hocası")
        header("Location: ../koc/koc.php");
    if($_SESSION["kullaniciTur"] == "Diyetisyen")
        header("Location: ../diyetisyen/diyetisyen.php");
=======
        header("Location: /Kullanici/kullanici-Sayfasi.php");
    if($_SESSION["kullaniciTur"] == "Spor Hocası")
        header("Location: /Koc/koc.php");
    if($_SESSION["kullaniciTur"] == "Diyetisyen")
        header("Location: /Diyetisyen/diyetisyen.php");
>>>>>>> 5f08b061f8148601dc6805187880824aab958b9c
}
else
    header("Location: /giris-yap.php");

?>