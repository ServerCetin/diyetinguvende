
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
echo '
<aside id="sidebar" class="column-left">

    <header>
        <h1><a href="#">Diyetin Güvende!</a></h1>
        <br>


        <div class ="kullanicibil">
            <h3> Kullanıcı Adı: <a href="/kullaniciprofili.php">'.$username.'</a> </h3>

            <h3>Ad: <label>'.$name.'</label></h3>
    </header>


    <nav id="mainnav">
        <ul>
            </div>
			    <li class="selected-item" style="background-color:forestgreen"><a href="kullaniciSayfasi.php">Güncel Diyet Listem</a></li>
				<li><a href="egzersizplani.php">Egzersiz Planim</a></li>
				<li><a href="eskidiyet.php">Diyetlerim</a></li>
				<li><a href="kulmesajlari.php">Mesajlarim</a></li>
				<li><a href="destek.php">Destek</a></li>
				 <li ><a href="logout.php">Çıkış Yap</a></li>
        </ul>
    </nav>



</aside>
'?>