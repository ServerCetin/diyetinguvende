
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
$soyad = $_SESSION["soyad"];

echo '
<aside id="sidebar" class="column-left">

	<header>
		<h1><a href="#">Diyetin Güvende!</a></h1>	
	</header>
	
	<nav id="mainnav">
  		<ul>
                            		
            <li><font face="Oxygen" ><a href="../Ortak/kullanici-profili.php">'.$name.' '.$soyad.' <br>@'.$username.'</font></a></li>     		 	
            <li class="selected-item" style="background-color:forestgreen"><a href="/Koc/koc.php"> Öğrencilerim</a></li>
			<li><a href="/Koc/yeni-spor-plani.php">Spor Planı Ekle</a></li>
			<li><a href="/Koc/ogrenci-kaydet.php">Liste Güncelle</a></li>	
            <li><a href="/Koc/koc-mesajlari.php">Mesajlarim</a></li>
            <li ><a href="../Ortak/destek.php">Destek</a></li>
			<li ><a href="../cikis-yap.php">Çıkış Yap</a></li>
        </ul>
	</nav>

			
			
</aside>
';?>


