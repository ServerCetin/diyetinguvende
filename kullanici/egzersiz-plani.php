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
    <link rel="stylesheet" href="/css/styles.css" type="text/css" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasini saglar-->
</head>

<body>
<section id="body" class="width">

    <?php include "../ortak/get-menu.php"?>

    <section id="content" class="column-right">

        <article>
            <div class="beyaz">
                <fieldset><br>
                    <legend>Egzersiz Planım</legend>
                </fieldset>
                <form action="" method="POST">
                <?php

                include '../baglan.php';
                $id = $_SESSION['Id'];

                $query = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId ='{$id}'")->fetch(PDO::FETCH_ASSOC);
                if ( $query ){
                    $SporTabloId = $query['SporTabloId'];
                }
                $query = $db->query("SELECT * FROM sportablosu WHERE Id ='{$SporTabloId}'")->fetch(PDO::FETCH_ASSOC);
                if ( $query ){
                    $tabloAciklamasi = $query['TabloAciklamasi'];
                }
                if(isset($tabloAciklamasi)){
                    echo '<table>
                <tr>
                    <th>Bugunkü Listem<br></th>
                    <th>Yarınki Listem</th>
                </tr>';

                    date_default_timezone_set('Europe/Istanbul');

                    $today = date('N');
					if($today == 7) $tomorrow =1;
					else $tomorrow = date('N')+1;

                    $listele = $db->query("SELECT * FROM sportablosatir WHERE SporTabloId=$SporTabloId AND (ProgramGunId = $today OR ProgramGunId =$tomorrow)", PDO::FETCH_ASSOC);

                    if ( $listele->rowCount() )
                    {
                        $sayac = 0;
                        $gün = 0;
                        foreach( $listele as $gelenveri )
                        {
                            $Tablo=$db->prepare("select * from sporyaptimi where kullaniciId='$id' AND sira='".$gelenveri['GunSira']."' AND gunId='".$gelenveri['ProgramGunId']."'");
                            $Tablo->execute(array('kullaniciId'));
                            $Tablo1=$Tablo->fetch();

                            if(date('N')==$gelenveri['ProgramGunId']){
                                echo '<tr>';
                                if(!empty($gelenveri['Aciklama'])){
                                    echo "<td>".$gelenveri['Aciklama'];
                                    if(empty($Tablo1['yaptiMi'])){
                                        echo" <input type='checkbox' name='yaptimi[]' value='".$gelenveri['Id']."'>  -Tamamlanmadı ✖️</td>";  }
                                    else{
                                        echo" - &#x2714;</td>";}
                                }
                                else
                                    echo '<td></td>';
                            }
                            else{
                                if(!empty($gelenveri['Aciklama'])){
                                    echo "<td>".$gelenveri['Aciklama'];
                                }
                                else
                                    echo '<td></td>';
                                echo '</tr>';
                            }
                        }
                    }
                }

                echo '</table>
		    <br><br>';?>
            <p>Lütfen bugünkü egzersizlerinizden gerçekleştirmiş olduğunuz verileri seçin! Veriler spor hocanıza gönderilecek.</p>
            <b style="color:red"> Eğer spor hocanız haftalık gidişatınızı kontrol ettiyse takibe devam edebilmek için listenizi yenileyiniz.</b><br><br>
            <input type="submit"  name="yaptimib" class="brk-btn" value="KAYDET">
            <input type="submit"  name="resetTheProgram" class="brk-btn" value="YENİLE" onclick="return window.confirm('Bu işlemi onaylarsanız bu haftaki eylemleriniz sıfırlanacak. Bu işlemi gerçekleştirmek istediğinize gerçekten de emin miniz?')" >
                </form>
			<br><br>
			<br><br>
			<?php
                if(isset($tabloAciklamasi)){
                    echo '<h4>Mevcut Haftalik Diyet Listem</h4>';


                    echo '<h5>Diyetisyeninizin Notu:</h5>'.' <blockquote>
        <p>
            '.$tabloAciklamasi.'
        </p>
    </blockquote>';

                    $listele = $db->query("SELECT * FROM sportablosatir where SporTabloId=$SporTabloId", PDO::FETCH_ASSOC);
                    if ( $listele->rowCount() )
                    {
                        $sayac = 0;
                        echo '<table>';
                        echo '<th>Pazartesi</th>';
                        echo '<th>Salı</th>';
                        echo '<th>Çarşamba</th>';
                        echo '<th>Perşembe</th>';
                        echo '<th>Cuma</th>';
                        echo '<th>Cumartesi</th>';
                        echo '<th>Pazar</th>';
                        foreach( $listele as $gelenveri )
                        {
                            if($sayac==0){echo '<tr>';}
                            echo "<td style=\"width:50px;\">".$gelenveri['Aciklama']."</td>";
                            $sayac++;
                            if($sayac==7){echo '</tr>';$sayac=0;}
                        }
                        echo '</table>';
                    }
                }
                if(isset($_POST['yaptimib'])){
                $yaptiMi = $_POST['yaptimi'];
                        
                        foreach ($yaptiMi as $bugun ) {
                            
                        $deneme=$db->prepare("SELECT * from sportablosatir where Id='$bugun'");
                        $deneme->execute(array('Id'));
                        $deneme1=$deneme->fetch();
                        $tabloId = $deneme1['SporTabloId'];
                        $gunId = $deneme1['ProgramGunId'];
                        $sira=$deneme1['GunSira'];

                        $ekle=$db->exec("INSERT INTO sporyaptimi (tabloId,gunId,sira,yaptiMi,kullaniciId) Values ('$tabloId','$gunId','$sira',
                            '1','$id')");
                        } 
                        echo '<meta http-equiv="refresh" content="0;URL=egzersiz-plani.php">';           
                    }
            if(isset($_POST['resetTheProgram'])){
                $sil = $db-> exec("delete from sporyaptimi where kullaniciId=$id");
                echo '<meta http-equiv="refresh" content="0;egzersiz-plani.php">';
            }
                ?>
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
