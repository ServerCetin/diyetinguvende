
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
$soyad = $_SESSION["soyad"];

echo '
<aside id="sidebar" class="column-left">

    <header>
        <h1><a href="#">Diyetin Güvende!</a></h1>
        <br>
    </header>


    <nav id="mainnav">
        <ul>
			<li><a href="../Ortak/kullanici-profili.php">'.$name.' '.$soyad.' <br>@'.$username.'</a></li>
			<li class="selected-item"><a href="../Yonetici/destek-istekleri.php">Destek İstekleri</a></li>
			<li ><a href="../cikis-yap.php">Çıkış Yap</a></li>
        </ul>
    </nav>



</aside>
'?>