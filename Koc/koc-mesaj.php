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

<title>Mesajlar-Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../Menus/koc-menu.php";}?>

			
        <section id="content" class="column-right">
                <div class="beyaz" style="padding-top: 50px"  >
                    <?php
                    include "../baglan.php";

                    $id = $_SESSION['Id'];
                    $gonderilenId =  $_GET['kullaniciId'];
                    $karsi = $db->query("SELECT * FROM kullanici WHERE Id = $gonderilenId")->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <legend><?php echo $karsi['KullaniciAdi']; ?> ile olan mesajlaşma</legend><br>
                    <div class="mesajAlani" id="mesajAlani" style="background-color: #fffff;width: 100%;height: 400px;overflow: scroll;">

                        <?php
                        $query = $db->query("SELECT * FROM kullanicimesaj WHERE GonderenId= $gonderilenId OR AlanId= $gonderilenId", PDO::FETCH_ASSOC);
                        if ( $query->rowCount() ){
                            foreach( $query as $mesaj ){
                                if($mesaj['AlanId']!=$id){
                                    print '
                                        <div style="align-content:right;min-width:100px;width:30%;height:80px;" class="speech-bubble" class="alanMesaj" align="center"  >
                                            <br><p>Sen :'.$mesaj['Mesaj'].'</p>
                                        </div>
                                        ';
                                }
                                else{
                                    print '
                                        <div style="align-content:left;min-width:100px;width:30%;height:80px;" class="karsiMesaj" align="center" class="speech-bubble">
                                            <br><p>O :'.$mesaj['Mesaj'].'</p>
                                        </div>
                                    ';
                                }

                            }
                        }


                        ?>

                    </div>
                    <form method="get">
                        <input type="text" style="width: 70%" id="msg" name="msg1"/>
                        <input type="hidden" value="<?php echo $karsi['Id'] ?>" name="kullaniciId">
                        <input type="submit" class="brk-btn" onclick="mesajGonderildi()" value="Gönder">
                    </form>
                </div>
		</section>

		<div class="clear"></div>

	</section>
	

</body>

<script>
    function mesajGonderildi() {
       var alan = document.getElementById('mesajAlani');
       var mesaj = document.getElementById('msg1');
       alan.innerHTML +=
           "<div class=\"alanMesaj\" style=\"background-color: #00b8d4;font-size: 24px;font-weight: bold;margin: 10px 15px\">\n" +
           "                                            <p style=\"padding: 5px 5px 5px 5px\">Ben: +mesaj+</p>\n" +
           "                                        </div>";
    }
</script>
</html>
<?php
$msg1 = $_GET['msg1'];
$query = $db->prepare("INSERT INTO kullanicimesaj SET GonderenId = ?, AlanId = ?, Mesaj = ?,GonderilmeTarihi = ?");
$insert = $query->execute(array($id, $gonderilenId,$msg1, date("Y-m-d H:i:s")));
?>