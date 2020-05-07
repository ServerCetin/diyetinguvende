<?php
session_start();
ob_start();
?>
<!doctype html>
<html>

    <head>
        <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
        <meta charset="UTF-8">
        <title>Diyetin Güvende!</title>
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasini saglar-->
    </head>

    <body>
        <section id="body" class="width">

            <?php include "../Ortak/get-menu.php"?>

            <section id="content" class="column-right">
                    <fieldset>
                        <form action="#" method="POST" enctype="multipart/form-data">
                    <?php
                    if($_SESSION['kullaniciTur']=="Kullanici"){
                        $boy = $_SESSION["boy"];
                        $kilo = $_SESSION["kilo"];
                        $yagOrani = $_SESSION["yagOrani"];
                        echo '
                        <div class="yeni" >
                                                        <br>
                                                        <p><label for="name">Boy:</label>
                                                        <input type="text" name="boy" id="boy" value="'. $boy.'" /><br /></p>   
                                                        <p><label for="name">Kilo:</label>
                                                        <input type="text" name="kilo" id="kilo" value="'.$kilo.'" /><br /></p> 
                                                        <p><label for="name">Yağ Oranı:</label>
                                                        <input type="text" name="fat" id="fat" value="'.$yagOrani.'" /><br /></p>
                        </div>
                        ';
                    }?>

            <article>
    <div class="beyaz" >
    <h3></h3>

                    <br>
                    <?php
                     $id = $_SESSION['Id'];
                     $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
                     $listele=$db-> query(" SELECT * FROM kullanici where Id=$id", PDO::FETCH_ASSOC);
                     if($listele->rowCount())
                     {
                        foreach ($listele as $gelenveri) 
                        {
                            if(!empty($gelenveri['pfoto'])){
                            $dosyayolu="resimler/".$gelenveri['pfoto'];  
                            echo " <img src='$dosyayolu' width='100' height='100' style='border-width:3px; border-radius:50px; border-style:solid; border-color:white;' >";    
                            }
                            else{
                            $dosyayolu="resimler/profil.png";  
                            echo " <img src='$dosyayolu' width='100' height='100' style='border-width:3px; border-radius:50px; border-style:solid; border-color:green;'>"; 
                            }             
                        }
                     }
                    ?>
                   
                            <p>Fotoğraf <input type="FILE" name="file"><input type="submit" name="fotokaydet" value="kaydet" />
                            <p><label for="name">Adı:</label>
                            <input type="text" name="ad" id="ad" value="<?php echo $_SESSION["ad"] ?>" /><br /></p>
                            <p><label for="soyad">Soyadı:</label>
                            <input type="text" name="soyad" id="soyad" value="<?php echo $_SESSION["soyad"] ?>" /><br /></p>
                            <p><label for="email">E-Posta:</label>
                            <input type="text" name="email" id="email" value="<?php echo $_SESSION["email"] ?>" /><br /></p>
                            <p><label for="tel">Telefon Numarası:</label>
                            <input type="text" name="tel" id="tel" value="<?php echo $_SESSION["telefon"] ?>" /><br /></p>
                            <p><label for="gender">Cinsiyet:</label>
                            <?php echo $_SESSION["cinsiyet"] ?>
                            <p><input type="submit" name="send" class="formbutton" value="Bilgilerimi Güncelle" /></p>
                        </form>

                    </fieldset>

                    <p>&nbsp;</p>


                </div>
            </article>


                <footer class="clear">
                    <p>&copy; 2019 Diyetin Güvende.</p>
                </footer>

            </section>

            <div class="clear"></div>

        </section>

    </body>
</html>
<?php
if(isset($_SESSION['Id'],$_POST['ad'],$_POST['soyad'],$_POST['email'],$_POST['tel'],$_POST['send'])){
    $id = $_SESSION['Id'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $boy = $_POST['boy'];
    $kilo = $_POST['kilo'];
    $yagOrani = $_POST['fat'];
    
    
    
    
    
    
    
    $guncelle = $db->exec("UPDATE  kullanici SET Ad='$ad',Soyad='$soyad',Email='$email',TelefonNo='$tel' WHERE Id='$id'");
    if($guncelle) {
        $_SESSION["ad"] = $ad;
        $_SESSION["soyad"] = $soyad;
        $_SESSION["email"] = $email;
        $_SESSION["telefon"] = $tel;
        
        
    }
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
    $guncelle = $db->exec("UPDATE  hastabilgi SET Boy='$boy',Kilo='$kilo',YagOrani='$yagOrani'WHERE KullaniciId='$id'");
    if($guncelle){
        $_SESSION["kilo"] = $kilo;
        $_SESSION["boy"] = $boy;
        $_SESSION["yagOrani"] = $yagOrani;
        echo "başarılı";
    }
    echo '<meta http-equiv="refresh" content="0;URL=kullanici-Profili.php">';

}

?>
<?php if(isset($_POST['fotokaydet'])){
    if(!empty($_FILES['file'] ['name'])){
   
    $yuklenecekklasor = "resimler/";
    $tmp_name = $_FILES['file'] ['tmp_name'];
    $name = $_FILES['file'] ['name'];
    $boyut = $_FILES['file'] ['size'];
    $tip = $_FILES['file'] ['type'];
    $uzanti = substr($name,-4,4);
    $rastsayi1 = rand(10000,50000);
    $rastsayi2 = rand(10000,50000);
    $resimad=$rastsayi1.$rastsayi2.$uzanti;
    include "../baglan.php";
    
    
    move_uploaded_file($tmp_name,"$yuklenecekklasor/$resimad");
     
    $ekle = $db->exec("INSERT INTO kullanici (pfoto) VALUES ('$resimad')");
    if($ekle){
     $_SESSION["pfoto"]=$resimad;   
    }
    
   $guncelle2=$db->exec("UPDATE  kullanici SET pfoto='$resimad' WHERE Id='$id'");
   if($guncelle2){
   $_SESSION["pfoto"]=$resimad;
   }
}
    
    

echo '<meta http-equiv="refresh" content="0;URL=kullanici-Profili.php">';
}
?>