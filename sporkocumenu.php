
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
echo '
<aside id="sidebar" class="column-left">

			<header>
				<h1><a href="#">Diyetin Güvende!</a></h1>	
				
			</header>
			<h3>  Kullanıcı Adı: <a href="/kullaniciprofili.php">'.$username.'</a></h3>
			

			<nav id="mainnav">
  				<ul>
                            		
                           		 	
                           		 <li class="selected-item" style="background-color:forestgreen"><a href="koc.php"> Öğrencilerim</a></li>
								 <li><a href="yenisporplani.php">Yeni Spor Planı Oluştur</a></li>
                           		 <li><a href="ogrencikaydet.php">Öğrenci Kaydet</a></li>	
                            		<li><a href="kocmesajlari.php">Mesajlarim</a></li>
                            		<li ><a href="destek.php">Destek</a></li>
									 <li ><a href="logout.php">Çıkış Yap</a></li>
                        	</ul>
			</nav>

			
			
</aside>
';?>


