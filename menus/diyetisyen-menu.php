
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
$soyad = $_SESSION["soyad"];
$id = $_SESSION['Id'];
$path = $_SERVER['REQUEST_URI'];
if(!empty($_SESSION['kId'])){
    $kullaniciId=$_SESSION['kId'];
}
else{
    $kullaniciId=null;
}


echo '
<aside id="sidebar" class="column-left">

    <header>
        <h1><a href="#">Diyetin Güvende!</a></h1>

<br>
    </header>
    <nav id="mainnav">
        <ul>
      
           ';
                    include "../baglan.php";
                     $listele=$db-> query(" SELECT * FROM kullanici where Id=$id", PDO::FETCH_ASSOC);
                      if($listele->rowCount())
                     {
                        foreach ($listele as $gelenveri) 
                        {
                            if(!empty($gelenveri['pfoto'])){
                            
                            $dosyayolu="../ortak/resimler/".$gelenveri['pfoto'];  
                             echo "<center> <a href='../ortak/kullanici-profili.php'><img src='$dosyayolu' width='80' height='80'  style='border-width:2px; border-radius:50px; border-style:solid; border-color:white;' ></center>";     
                            }
                            else{
                            $dosyayolu="../ortak/resimler/profil.png";  
                            echo " <center> <a href='../ortak/kullanici-profili.php'><img src='$dosyayolu' width='90' height='90' style='border-width:3px; border-radius:50px; border-style:solid; border-color:white;'></center>"; 
                            }             
                        }
                    }

            if($path== "/ortak/kullanici-profili.php")
                echo "<li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/diyetisyen/diyetisyen.php")
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/diyetisyen/yeni-diyet-listesi.php")
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/diyetisyen/diyetisyen-liste-guncelle.php")
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li  class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
            else if($path== "/ortak/destek.php")
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
             else if($path == "/diyetisyen/hasta-profili.php?tabloId=45&kullaniciIds=".$kullaniciId)
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\"style=\"background-color:forestgreen\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li  ><a href=\"/diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
             else if(($path== "/diyetisyen/diyetisyen-mesajlari.php"))
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/diyetisyen/diyetisyen-mesajlari.php\">Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";

             else if($path == "/diyetisyen/hasta-profili.php?kullaniciIds=".$kullaniciId."&git=Git"){
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\" style=\"background-color:forestgreen\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-mesajlari.php\" >Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
        }
         else {
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>
            <li><a href=\"/diyetisyen/diyetisyen.php\"> Hastalarım</a></li>
            <li><a href=\"/diyetisyen/yeni-diyet-listesi.php\">Diyet Listesi Ekle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-liste-guncelle.php\">Liste Güncelle</a></li>
            <li><a href=\"/diyetisyen/diyetisyen-mesajlari.php\" >Mesajlarim</a></li>
            <li ><a href=\"../ortak/destek.php\">Destek</a></li>
            <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
        }
echo '
        </ul>
    </nav>



</aside>
'?>