
<?php
$username = $_SESSION["username"];
$name = $_SESSION["ad"];
echo '
<aside id="sidebar" class="column-left">

    <header>
        <h1><a href="#">Diyetin Güvende!</a></h1>
        <br>


        <div class ="kullanicibil">
            <h3> Kullanıcı Adı: <a href="../ortak/kullaniciprofili.php">'.$username.'</a> </h3>

            <h3>Ad: <label>'.$name.'</label></h3>
    </header>


    <nav id="mainnav">
        <ul>
            </div>
            <li class="selected-item" style="background-color:forestgreen"><a href="diyetisyen.php"> Hastalarım</a></li>
            <li><a href="yenidiyetlistesi.php">Yeni Diyet Listesi Oluştur</a></li>
            <li><a href="hastakaydet.php">Hasta Kaydet</a></li>
            <li><a href="diyetisyenmesajlari.php">Mesajlarim</a></li>
            <li ><a href="destek.php">Destek</a></li>
            <li ><a href="logout.php">Çıkış Yap</a></li>
        </ul>
    </nav>



</aside>
'?>