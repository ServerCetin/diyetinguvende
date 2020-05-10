
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
$soyad = $_SESSION["soyad"];
$path = $_SERVER['REQUEST_URI'];
echo '
<aside id="sidebar" class="column-left">

    <header>
        <h1><a href="#">Diyetin Güvende!</a></h1>
        <br>
    </header>


    <nav id="mainnav">
        <ul>
        ';

    if($path == "/ortak/kullanici-profili.php")
        echo "<li class=\"selected-item\"><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
			<li><a href=\"../yonetici/destek-istekleri.php\">Destek İstekleri</a></li>
			<li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
    else
        echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
			<li class=\"selected-item\"><a href=\"../yonetici/destek-istekleri.php\">Destek İstekleri</a></li>
			<li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
    echo'
        </ul>
    </nav>



</aside>
'?>