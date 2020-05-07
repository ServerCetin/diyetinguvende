
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
$soyad = $_SESSION["soyad"];
$id = $_SESSION['Id'];
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
            $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
                     $listele=$db-> query(" SELECT * FROM kullanici where Id=$id", PDO::FETCH_ASSOC);
                      if($listele->rowCount())
                     {
                        foreach ($listele as $gelenveri) 
                        {
                            if(!empty($gelenveri['pfoto'])){
                            
                            $dosyayolu="../Ortak/resimler/".$gelenveri['pfoto'];  
                             echo "<center> <a href='../Ortak/kullanici-profili.php'><img src='$dosyayolu' width='80' height='80'  style='border-width:2px; border-radius:50px; border-style:solid; border-color:white;' ></center>";     
                            }
                            else{
                            $dosyayolu="../Ortak/resimler/profil.png";  
                            echo " <center> <a href='../Ortak/kullanici-profili.php'><img src='$dosyayolu' width='90' height='90' style='border-width:3px; border-radius:50px; border-style:solid; border-color:white;'></center>"; 
                            }             
                        }
                    }

            if($path== "/Ortak/kullanici-profili.php")
                echo "<li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/Diyetisyen/diyetisyen.php")
                echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/Diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/Diyetisyen/yeni-diyet-listesi.php")
                echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/Diyetisyen/diyetisyen-liste-guncelle.php")
                echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li  class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/Ortak/destek.php")
                echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if(($path== "/Diyetisyen/hasta-profili.php"))
                echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen.php\"style=\"background-color:forestgreen\"> Hastalarım</a></li>
            <li><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li  ><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
             else if(($path== "/Diyetisyen/diyetisyen-mesajlari.php"))
                echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li  ><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\"style=\"background-color:forestgreen\">Mesajlarim</a></li>
            <li ><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
             else {
                echo "<li><a href=\"../Ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/Diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/Diyetisyen/diyetisyen-mesajlari.php\" style=\"background-color:forestgreen\">Mesajlarim</a></li>
            <li ><a href=\"../Ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
        }
echo '
        </ul>
    </nav>



</aside>
'?>