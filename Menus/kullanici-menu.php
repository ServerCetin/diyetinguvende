
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
			<li><font face="Oxygen" ><a href="../Ortak/kullanici-profili.php">'.$name.' '.$soyad.' <br>@'.$username.'</font></a></li>
			<li class="selected-item" style="background-color:forestgreen"><a href="/Kullanici/kullanici-Sayfasi.php">Güncel Diyet Listem</a></li>
			<li><a href="/Kullanici/egzersiz-plani.php">Egzersiz Planim</a></li>
			<li><a href="/Kullanici/eski-diyet.php">Diyetlerim</a></li>
			<li><a href="/Kullanici/kul-mesajlari.php">Mesajlarim</a></li>
			<li><a href="../Ortak/destek.php">Destek</a></li>
			<li ><a href="../logout.php">Çıkış Yap</a></li>
        </ul>
    </nav>



</aside>
'?>