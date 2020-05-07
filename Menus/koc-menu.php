
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
    if($path == "/ortak/kullanici-profili.php")
        echo "<li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>     		 	
                <li><a href=\"/koc/koc.php\"> Öğrencilerim</a></li>
                <li><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li>	
                <li><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li ><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
    else if($path == "/koc/koc.php")
        echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>     		 	
                <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/koc/koc.php\"> Öğrencilerim</a></li>
                <li ><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li>	
                <li><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li ><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
    else if($path == "/koc/yeni-spor-plani.php")
        echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>     		 	
                <li><a href=\"/koc/koc.php\"> Öğrencilerim</a></li>
                <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li>	
                <li><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li ><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
    else if($path == "/koc/koc-liste-guncelle.php")
        echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>     		 	
                <li><a href=\"/koc/koc.php\"> Öğrencilerim</a></li>
                <li><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li>	
                <li><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li ><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
    else if($path == "/ortak/destek.php")
        echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>     		 	
                <li><a href=\"/koc/koc.php\"> Öğrencilerim</a></li>
                <li><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li>	
                <li><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
    else if($path=="/koc/koc-mesajlari.php")
        echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>     		 	
                <li><a href=\"/koc/koc.php\"> Öğrencilerim</a></li>
                <li><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li>	
                <li class=\"selected-item\" style=\"background-color:forestgreen\"><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li ><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
                else if($path == "/koc/ogrenci-profili.php")
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>               
                <li><a href=\"/koc/koc.php\" style=\"background-color:forestgreen\"> Öğrencilerim</a></li>
                <li><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li> 
                <li><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li ><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
                else{
                echo "<li><a href=\"../ortak/kullanici-profili.php\">$name $soyad <br>@$username</a></li>               
                <li><a href=\"/koc/koc.php\" > Öğrencilerim</a></li>
                <li><a href=\"/koc/yeni-spor-plani.php\">Spor Planı Ekle</a></li>
                <li><a href=\"/koc/koc-liste-guncelle.php\">Liste Güncelle</a></li> 
                <li><a href=\"/koc/koc-mesajlari.php\">Mesajlarim</a></li>
                <li ><a href=\"../ortak/destek.php\">Destek</a></li>
                <li ><a href=\"../cikis-yap.php\">Çıkış Yap</a></li>";
                }
echo '
        </ul>
	</nav>

			
			
</aside>
';?>


