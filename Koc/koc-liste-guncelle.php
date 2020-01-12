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

<title>Spor Planı Oluştur-Diyetin Güvende!</title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../Menus/koc-menu.php";}?>

		
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			 <form action="" method="POST">
                    <fieldset>
                        <legend>Spor Planı Güncelle</legend><br><br>
                        <label>Güncelleyeceğiniz tabloyu seçiniz</label>
                        <select name="sporList">
                            <?php
                            include '../baglan.php';
                            $id = $_SESSION["Id"];
                            $listele = $db->query("SELECT * FROM sportablosu where KocId =$id", PDO::FETCH_ASSOC);
                            if ( $listele->rowCount() ) //rawcountu 0 değilse
                            {
                                foreach( $listele as $gelenveri )
                                {
                                    echo '<option value="'.$gelenveri['Id'].'">'.$gelenveri['TabloAdi'].'</option>';
                                }
                            }
                            ?>
			
			</select>
                        <input type="submit" value="Getir" name="getir">
                        <br><br><br><br>
                        <h5>Notunuzu Giriniz</h5>

                        <?php
                        if(isset($_POST['getir'])){
                            $sporTabloId = $_POST['sporList'];
                            $listele = $db->query("SELECT * FROM sportablosatir where SporTabloId=$sporTabloId", PDO::FETCH_ASSOC);
                            $query = $db->query("SELECT * FROM sportablosu WHERE Id=$sporTabloId", PDO::FETCH_ASSOC);
                            if ( $query->rowCount() ){
                                foreach( $query as $row ){
                                    $aciklama = $row['TabloAciklamasi'];
                                    $tabloAdi = $row['TabloAdi'];
                                    $sporTabloId = $row['Id'];
                                }
                            }
			 echo '<input type="hidden" name="tabloAdi" value="'.$tabloAdi.'">';
             echo '<input type="hidden" name="diyetTabloId" value="'.$sporTabloId.'">';
             echo '
            <blockquote>
            <textarea name="kocNotu" rows="5" cols="100">'.$aciklama.'</textarea>
            </blockquote>
            <br><br>';
			 if ( $listele->rowCount() )
                            {
                                $sayac = 0;$durak=1;$gun="";
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
                                    if($sayac==0){$gun="pzt";}
                                    if($sayac==1){$gun="sali";}
                                    if($sayac==2){$gun="crs";}
                                    if($sayac==3){$gun="prs";}
                                    if($sayac==4){$gun="cuma";}
                                    if($sayac==5){$gun="cmt";}
                                    if($sayac==6){$gun="pzr";}
                                    if($sayac==0){echo '<tr>';}
                                    echo '<td><input type="text" name="'.($gun.$durak).'" value="'.$gelenveri["Aciklama"].'" style="max-width:50px"></td>';
                                    $sayac++;
                                    if($sayac==7){echo '</tr>';$sayac=0;$durak++;}
                                }
                                echo '</table>';
                            }
                        }
                        else{
                            echo '<table class="sporlistesiolustur" width="5px" height="5px">

                            <tr width="5px" height="5px">
                                <th style="max-width:50px">Pazartesi</th>
                                <th style="max-width:50px">Salı</th>
                                <th style="max-width:50px">Çarşamba</th>
                                <th style="max-width:50px">Perşembe</th>
                                <th style="max-width:50px">Cuma</th>
                                <th style="max-width:50px">Cumartesi</th>
                                <th style="max-width:50px">Pazar</th>

                            </tr>
                            <td><input type="text" name="pzt1" style="max-width:50px"></td>
                            <td><input type="text" name="sali1" style="max-width:50px"></td>
                            <td><input type="text" name="crs1" style="max-width:50px"></td>
                            <td><input type="text" name="prs1" style="max-width:50px"></td>
                            <td><input type="text" name="cuma1" style="max-width:50px"></td>
                            <td><input type="text" name="cmt1" style="max-width:50px"></td>
                            <td><input type="text" name="pzr1" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt2"style="max-width:50px"></td>
                                <td><input type="text" name="sali2"style="max-width:50px"></td>
                                <td><input type="text" name="crs2"style="max-width:50px"></td>
                                <td><input type="text" name="prs2"style="max-width:50px"></td>
                                <td><input type="text" name="cuma2"style="max-width:50px"></td>
                                <td><input type="text" name="cmt2"style="max-width:50px"></td>
                                <td><input type="text" name="pzr2"style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt3" style="max-width:50px"></td>
                                <td><input type="text" name="sali3" style="max-width:50px"></td>
                                <td><input type="text" name="crs3" style="max-width:50px"></td>
                                <td><input type="text" name="prs3" style="max-width:50px"></td>
                                <td><input type="text" name="cuma3" style="max-width:50px"></td>
                                <td><input type="text" name="cmt3" style="max-width:50px"></td>
                                <td><input type="text" name="pzr3" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt4" style="max-width:50px"></td>
                                <td><input type="text" name="sali4" style="max-width:50px"></td>
                                <td><input type="text" name="crs4" style="max-width:50px"></td>
                                <td><input type="text" name="prs4" style="max-width:50px"></td>
                                <td><input type="text" name="cuma4" style="max-width:50px"></td>
                                <td><input type="text" name="cmt4" style="max-width:50px"></td>
                                <td><input type="text" name="pzr4" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt5" style="max-width:50px"></td>
                                <td><input type="text" name="sali5" style="max-width:50px"></td>
                                <td><input type="text" name="crs5" style="max-width:50px"></td>
                                <td><input type="text" name="prs5" style="max-width:50px"></td>
                                <td><input type="text" name="cuma5" style="max-width:50px"></td>
                                <td><input type="text" name="cmt5" style="max-width:50px"></td>
                                <td><input type="text" name="pzr5" style="max-width:50px"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="pzt6" style="max-width:50px"></td>
                                <td><input type="text" name="sali6" style="max-width:50px"></td>
                                <td><input type="text" name="crs6" style="max-width:50px"></td>
                                <td><input type="text" name="prs6" style="max-width:50px"></td>
                                <td><input type="text" name="cuma6" style="max-width:50px"></td>
                                <td><input type="text" name="cmt6" style="max-width:50px"></td>
                                <td><input type="text" name="pzr6" style="max-width:50px"></td>
                            </tr>


                    </fieldset>
                         </table>';
                        }

                        ?>
                    <br><br>
                    <br><input type="submit" class="brk-btn" value="Güncelle" name="guncelle" style="margin-left:80%;">

			</form>	
				</div>
		</article>
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
