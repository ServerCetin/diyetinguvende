
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
        <ul>';
        if($path == "/Ortak/kullanici-profili.php")
            echo "<li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
                    <li><a href=\"/Kullanici/kullanici-Sayfasi.php\">Güncel Diyet Listem</a></li>
                    <li><a href=\"/Kullanici/egzersiz-plani.php\">Egzersiz Planim</a></li>
                    <li><a href=\"/Kullanici/kullanici-mesajlari.php\">Mesajlarim</a></li>
                    <li><a href=\"../Ortak/destek.php\">Destek</a></li>
                    <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
        else if($path == "/Kullanici/kullanici-Sayfasi.php")
            echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
                    <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/Kullanici/kullanici-Sayfasi.php\">Güncel Diyet Listem</a></li>
                    <li><a href=\"/Kullanici/egzersiz-plani.php\">Egzersiz Planim</a></li>
                    <li><a href=\"/Kullanici/kullanici-mesajlari.php\">Mesajlarim</a></li>
                    <li><a href=\"../Ortak/destek.php\">Destek</a></li>
                    <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
        else if($path == "/Kullanici/egzersiz-plani.php")
            echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
                    <li><a href=\"/Kullanici/kullanici-Sayfasi.php\">Güncel Diyet Listem</a></li>
                    <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/Kullanici/egzersiz-plani.php\">Egzersiz Planim</a></li>
                    <li><a href=\"/Kullanici/kullanici-mesajlari.php\">Mesajlarim</a></li>
                    <li><a href=\"../Ortak/destek.php\">Destek</a></li>
                    <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
        else if($path == "/Ortak/destek.php")
            echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
                    <li><a href=\"/Kullanici/kullanici-Sayfasi.php\">Güncel Diyet Listem</a></li>
                    <li><a href=\"/Kullanici/egzersiz-plani.php\">Egzersiz Planim</a></li>
                    <li><a href=\"/Kullanici/kullanici-mesajlari.php\">Mesajlarim</a></li>
                    <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../Ortak/destek.php\">Destek</a></li>
                    <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
        else
            echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
                    <li><a href=\"/Kullanici/kullanici-Sayfasi.php\">Güncel Diyet Listem</a></li>
                    <li><a href=\"/Kullanici/egzersiz-plani.php\">Egzersiz Planim</a></li>
                    <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/Kullanici/kullanici-mesajlari.php\">Mesajlarim</a></li>
                    <li><a href=\"../Ortak/destek.php\">Destek</a></li>
                    <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";

echo '			
        </ul>
    </nav>



</aside>
'?>