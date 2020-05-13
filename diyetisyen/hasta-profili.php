<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/png" href="../favicon.png"/>
<title>Hasta Profili-Diyetin Güvende!</title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

        <section id="body" class="width">
            <?php include "../ortak/get-menu.php"?>


            <section id="content" class="column-right">
                    
        <article>
        
            <div class="beyaz">
                <?php
                include "../baglan.php";

                $id = $_GET['kullaniciIds'];
                $hasta = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId = $id")->fetch(PDO::FETCH_ASSOC);
                $kullanici = $db->query("SELECT * FROM kullanici WHERE Id = $id")->fetch(PDO::FETCH_ASSOC);

                $cinsiyet = $kullanici['CinsiyetId'] == 1 ? "Kadın" : "Erkek";
                echo '
                <h2>Hastanın bilgileri</h2><br><br><br>';
                $id = $_GET['kullaniciIds'];
                    include "../baglan.php";
                    $listele=$db-> query(" SELECT * FROM kullanici where Id=$id", PDO::FETCH_ASSOC);
                    if($listele->rowCount())
                    {
                        foreach ($listele as $gelenveri) 
                        {
                         if(!empty($gelenveri['pfoto'])){
                            $dosyayolu="../ortak/resimler/".$gelenveri['pfoto'];  
                            echo " <img src='$dosyayolu' width='100' height='100' />";    
                            }
                            else{
                            $dosyayolu="../ortak/resimler/profil.png";  
                            echo " <img src='$dosyayolu' width='100' height='100' />"; 
                            }             
                        }
                    }
                    echo'<br>
                <b >Adı ve Soyadı:   </b>'.$kullanici['Ad'].' '.$kullanici['Soyad'].'<br>
                <b>Kullanıcı Adı:   </b>'.$kullanici['KullaniciAdi'].'<br>
                <b>Cinsiyeti:   </b>'.$cinsiyet.'<br><br>
                <b>Boyu:   </b>'.$hasta['Boy'].'<br>
                <b>Kilosu:   </b>'.$hasta['Kilo'].'<br>
                <b>Yağ oranı:   </b>'.$hasta['YagOrani'].'<br><br><br>

                <a href="yeni-diyet-listesi.php" class="button ButtonS"><b>Yeni Liste Oluştur</b></a><br><br><br>
                <h4>Listesini değiştir</h4>
                <form method="get">
                    <select name="tabloId">
                    ';
                    $diyetisyenId = $_SESSION['Id'];
                    $listele = $db->query("SELECT * FROM diyettablosu where DiyetisyenId =$diyetisyenId", PDO::FETCH_ASSOC);
                        if ( $listele->rowCount() ) //rawcountu 0 değilse
                        {
                            foreach( $listele as $gelenveri )
                            {
                                if($gelenveri['Id'] ==$hasta['DiyetTabloId'])
                                    echo '<option selected="selected" value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].'</option>';
                                else
                                    echo '<option value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].'</option>';
                            }
                        }
                        echo '<input type="hidden" name="kullaniciIds" value="'.$kullanici['Id'].'">';
                    ?>
                    </select>

                <input type="submit" value="Değiştir"><?php echo"<br><br>";?>
                  <table>
                <?php
                $gunler=$db->query("select * from programgun");
                foreach ($gunler as $key) {
                    echo"<th style='max-width:80px'>".$key['Gun']."</th>";
                }         
                $sayi=0;
                $sayi2=0;
                $Kullanıcı=$db->prepare("select * from hastabilgi where kullaniciId='$id'");
                $Kullanıcı->execute(array($id));
                $Kullanıcı1=$Kullanıcı->fetch();
                $Dtablo1=$db->query("select * from diyettablosatir where DiyetTabloId='".$Kullanıcı1['DiyetTabloId']."' order by GunSira ASC,ProgramGunId ASC");
                foreach ($Dtablo1 as $key ) {
                    if(!empty($key['Aciklama']))
                    $sayi++;
                }
                $Dtablo=$db->query("select * from diyettablosatir where DiyetTabloId='".$Kullanıcı1['DiyetTabloId']."' ");
                foreach ($Dtablo as $key ) {
                    
                    $gun=$key['ProgramGunId'];
                    $sira=$key['GunSira'];
                    $Tablo2=$db->prepare("select * from programgun where Id='$gun'");
                    $Tablo2->execute(array('Id'));
                    $Tablo3=$Tablo2->fetch();
                    $Tablo=$db->prepare("select * from diyetyaptimi where kullaniciId='$id' AND sira='$sira' AND gunId='$gun'");
                    $Tablo->execute(array('kullaniciId'));
                    $Tablo1=$Tablo->fetch();
                     if($gun==1)echo"<tr>";

                        if($gun==$Tablo1['gunId'] && $sira==$Tablo1['sira']){
                        echo"<td  >".$key['Aciklama']." &#x2714;</td>";   
                    }
                    else{
                        if(!empty($key['Aciklama']))
                        echo"<td>".$key['Aciklama']." -✖️ </td>";   
                        else{
                            echo"<td></td>";
                        }              
                    }
                    if($gun==7)echo"</tr>";
                    if(!empty($key['Aciklama'])){
                        $sayi2++;

                        if($sayi2==$sayi){
                        
                            break;
                        }
                    }
                    
                 
                }
                
                ?>
     
            </table>
            <br><br><p >Tamamlanmayanlar '✖️' ile gösterilmektedir!</p>
               
            </div>

    </article>

          
        </section>
        <div class="clear"></div>

    </section>
    

</body>
</html>
<?php

if(isset($_GET['tabloId'])){
    $tabloId = $_GET['tabloId'];
    $kId = $_GET['kullaniciIds'];
    $insert = $db -> exec("UPDATE hastabilgi SET DiyetTabloId='$tabloId' where KullaniciId='$kId'");
    if($insert)
    echo '<meta http-equiv="refresh" content="0;URL=hasta-profili.php?tabloId='.$tabloId.'&kullaniciIds='.$kId.'">';
}

?>