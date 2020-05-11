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
                    <fieldset>
                        <legend>Diyet Listem</legend>
                    </fieldset>
                    <form action="" method="POST">

                    <?php
                    include '../baglan.php';
                    $id = $_SESSION['Id'];

                    $query = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId ='{$id}'")->fetch(PDO::FETCH_ASSOC);
                    if ( $query ){
                        $diyetTabloId = $query['DiyetTabloId'];
                    }
                    if(empty($query['DiyetisyenId'])){
                        echo "<br><p><font style='color:green' size='6'face='Georgia, Arial'>Diyetisyeniniz bulunmadığı için herhangi bir listeniz yok!</h2></p>";
                        echo "<br><br><center><img src='../images/logo.png' width='250'hight='250'></center>";
                    }
                    else{
                    $query = $db->query("SELECT * FROM diyettablosu WHERE Id ='{$diyetTabloId}'")->fetch(PDO::FETCH_ASSOC);
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
                        
                        $listele = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND (ProgramGunId = $today OR ProgramGunId = $tomorrow) order by GunSira ASC,ProgramGunId ASC ", PDO::FETCH_ASSOC);

                        if ( $listele->rowCount() )
                        {
                            $sayac = 0;
                            $gün = 0;
                            foreach( $listele as $gelenveri )
                            {
                                $Tablo=$db->prepare("select * from diyetyaptimi where kullaniciId='$id' AND sira='".$gelenveri['GunSira']."' AND gunId='".$gelenveri['ProgramGunId']."'");
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

                    echo "</table>
                    <br><br>";
                
                ?>
                    <p>Lütfen bugünkü diyetinizden gerçekleştirmiş olduğunuz verileri seçin! Veriler spor hocanıza gönderilecek.</p>
					<b style="color:red"> Eğer diyetisyeniniz haftalık gidişatınızı kontrol ettiyse takibe devam edebilmek için listenizi yenileyiniz.</b><br><br>
					<input type="submit"  name="yaptimib" class="brk-btn" value="KAYDET">
					<input type="submit"  name="resetTheProgram" class="brk-btn" value="YENİLE" onclick="return window.confirm('Bu işlemi onaylarsanız bu haftaki eylemleriniz sıfırlanacak. Bu işlemi gerçekleştirmek istediğinize gerçekten de emin miniz?')">
                    </form>
                    <br><br>
                    <br><br>
                    <?php
                   }
                    if(isset($tabloAciklamasi)){
                        echo '<h4>Mevcut Haftalik Diyet Listem</h4>';


                        echo '<h5>Diyetisyeninizin Notu:</h5>'.' <blockquote>
                    <p>
                    '.$tabloAciklamasi.'
                    </p>
                    </blockquote>';

                        $listele = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$diyetTabloId", PDO::FETCH_ASSOC);
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
                            
                        $deneme=$db->prepare("SELECT * from diyettablosatir where Id='$bugun'");
                        $deneme->execute(array('Id'));
                        $deneme1=$deneme->fetch();
                        $tabloId = $deneme1['DiyetTabloId'];
                        $gunId = $deneme1['ProgramGunId'];
                        $sira=$deneme1['GunSira'];

                        $ekle=$db->exec("INSERT INTO diyetyaptimi (tabloId,gunId,sira,yaptiMi,kullaniciId) Values ('$tabloId','$gunId','$sira',
                            '1','$id')");
                        } 
                        echo '<meta http-equiv="refresh" content="0;URL=kullanici-sayfasi.php">';           
                    }
                    if(isset($_POST['resetTheProgram'])){
                        $sil = $db-> exec("delete from diyetyaptimi where kullaniciId=$id");
                        echo '<meta http-equiv="refresh" content="0;kullanici-sayfasi.php">';
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
