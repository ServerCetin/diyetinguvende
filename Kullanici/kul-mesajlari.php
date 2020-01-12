<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?><!doctype html>
<html>

<head>


<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasını sağlar-->
</head>

<body>

		<section id="body" class="width">
			<?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "../Menus/kullanici-menu.php";}?>
			
			<section id="content" class="column-right">
                		
	    <article>
<div class="beyaz" >		
		
			<h3>Form</h3>
				<fieldset>

					<legend>Mesajlarım</legend>

					<form action="#" method="get">
						<p><textarea  cols="70" rows="4" name="message" id="message" placeholder="Mesaj Yaz..." ></textarea><br>
                        <input type="submit" name="kocSend" class="formbutton" value="Spor Koçuna Mesaj" /><p>
					</form>

                    <form action="#" method="post">
                        <p><textarea  cols="70" rows="4" name="message2" id="message" placeholder="Mesaj Yaz..." ></textarea><br>
                        <input type="submit" name="diyetisyenSend" class="formbutton" value="Diyetisyene Mesaj" />
                    </form>

                      <?php
                    $id = $_SESSION["Id"];
                    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
                    $listele = $db->query("SELECT * FROM kullanicimesaj where AlanId='{$id}'", PDO::FETCH_ASSOC);
                    if ( $listele->rowCount() )
                    {
						echo '<table>
                    <th>Mesaj<br></th>
                    <th>Gönderen Kişi</th>';
                        foreach( $listele as $gelenveri )
                        {
							echo " <tr>";	
                            echo "<td>Mesajı:".$gelenveri['Mesaj']."</td>"."<td>"." Atan:". $gelenveri['GonderenId']."</td>"."<br />";
						    echo " </tr>";
                        }
						echo '</table>';
                    }
                    ?>
                    <table>  
                    </table>

                </fieldset>
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
if($_GET){
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');

    $id = $_SESSION["Id"];
    $sorgu = $db->prepare("SELECT * FROM hastaspor where HastaId=?");
    $sorgu ->execute(array($id));
    $hastatablo = $sorgu->fetch();
    $hocaId = $hastatablo['HocaId'];
    $mesaj = $_GET["message"];
    $ekle = $db->exec("INSERT INTO kullanicimesaj (GonderenId,AlanId,Mesaj) VALUES ('$id', '$hocaId','$mesaj')");
}
if($_POST)
{
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');

    $id = $_SESSION["Id"];
    $sorgu = $db->prepare("SELECT * FROM hastadiyet where HastaId=?");
    $sorgu ->execute(array($id));
    $hastatablo = $sorgu->fetch();
    $diyetisyenId = $hastatablo['DiyetisyenId'];
    $mesaj = $_POST["message2"];
    $ekle = $db->exec("INSERT INTO kullanicimesaj (GonderenId,AlanId,Mesaj) VALUES ('$id', '$diyetisyenId','$mesaj')");
    if($ekle)
        echo "diyetisyene mesj göndeirldi!";
}
?>