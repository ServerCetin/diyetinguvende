
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
$soyad = $_SESSION["soyad"];

echo '
<aside id="sidebar" class="column-left">

    <header>
        <h1><a href="#">Diyetin Güvende!</a></h1>
        <br>
<<<<<<< HEAD
=======


        <div class ="kullanicibil">
            <h3> Kullanıcı Adı: <a href="../ortak/kullaniciprofili.php">'.$username.'</a> </h3>

            <h3>Ad: <label>'.$name.'</label></h3>
>>>>>>> b5602dcb49a0c65a80656666b187a66dbb4c3453
    </header>


    <nav id="mainnav">
        <ul>
            <li><font face="Oxygen" ><a href="../Ortak/kullanici-profili.php">'.$name.' '.$soyad.' <br>@'.$username.'</font></a></li>
            <li class="selected-item" style="background-color:forestgreen"><a href="/Diyetisyen/diyetisyen.php"> Hastalarım</a></li>
            <li><a href="/Diyetisyen/yeni-diyet-listesi.php">Yeni Diyet Listesi Oluştur</a></li>
            <li><a href="/Diyetisyen/hasta-kaydet.php">Hasta Kaydet</a></li>
            <li><a href="/Diyetisyen/diyetisyen-mesajlari.php">Mesajlarim</a></li>
            <li ><a href="../Ortak/destek.php">Destek</a></li>
            <li ><a href="../logout.php">Çıkış Yap</a></li>
        </ul>
    </nav>



</aside>
'?>