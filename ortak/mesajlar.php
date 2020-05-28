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
<title>Mesajlar-Diyetin Güvende!</title>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css" type="text/css" />
   <style>
       .chat{
           margin-top: auto;
           margin-bottom: auto;
       }
       .card{
           height: 500px;
           border-radius: 15px !important;
           background-color: rgba(0,0,0,0.4) !important;
       }
       .msg_card_body{
           overflow-y: auto;
       }
       .card-header{
           border-radius: 15px 15px 0 0 !important;
           border-bottom: 0 !important;
       }
       .card-footer{
           border-radius: 0 0 15px 15px !important;
           border-top: 0 !important;
       }
       .type_msg{
           background-color: rgba(0,0,0,0.3) !important;
           border:0 !important;
           color:white !important;
           height: 60px !important;
           overflow-y: auto;
       }
       .type_msg:focus{
           box-shadow:none !important;
           outline:0px !important;
       }
       .send_btn{
           border-radius: 0 15px 15px 0 !important;
           background-color: rgba(0,0,0,0.3) !important;
           border:0 !important;
           color: white !important;
           cursor: pointer;
       }
       .contacts li{
           width: 100% !important;
           padding: 5px 10px;
           margin-bottom: 15px !important;
       }
       .user_img{
           height: 70px;
           width: 70px;
           border:1.5px solid #f5f6fa;

       }
       .user_img_msg{
           height: 40px;
           width: 40px;
           border:1.5px solid #f5f6fa;

       }
       .img_cont{
           position: relative;
           height: 70px;
           width: 70px;
       }
       .img_cont_msg{
           height: 40px;
           width: 40px;
       }
       .user_info{
           margin-top: auto;
           margin-bottom: auto;
           margin-left: 15px;
       }
       .user_info span{
           font-size: 20px;
           color: white;
       }
       .user_info p{
           font-size: 10px;
           color: rgba(255,255,255,0.6);
       }
       .video_cam span{
           color: white;
           font-size: 20px;
           cursor: pointer;
           margin-right: 20px;
       }
       .msg_cotainer{
           margin-top: auto;
           margin-bottom: auto;
           margin-left: 10px;
           border-radius: 25px;
           background-color: #82ccdd;
           padding: 10px;
           position: relative;
       }
       .msg_cotainer_send{
           margin-top: auto;
           margin-bottom: auto;
           margin-right: 10px;
           border-radius: 25px;
           background-color: #78e08f;
           padding: 10px;
           position: relative;
       }
       .msg_time{
           position: absolute;
           left: 0;
           bottom: -15px;
           color: rgba(255,255,255,0.5);
           font-size: 10px;
       }
       .msg_time_send{
           position: absolute;
           right:0;
           bottom: -15px;
           color: rgba(255,255,255,0.5);
           font-size: 10px;
       }
       .msg_head{
           position: relative;
       }
       .action_menu ul{
           list-style: none;
           padding: 0;
           margin: 0;
       }
       .action_menu ul li{
           width: 100%;
           padding: 10px 15px;
           margin-bottom: 5px;
       }
       .action_menu ul li i{
           padding-right: 10px;

       }
       .action_menu ul li:hover{
           cursor: pointer;
           background-color: rgba(0,0,0,0.2);
       }
       @media(max-width: 576px){
           .contacts_card{
               margin-bottom: 15px !important;
           }
       }
       @media(min-width: 1280px){
           .chat{
               width:900px;
           }
           .card{
               height: 600px;
           }
       }
       .beyaz{padding: 0px;}
       section#content {
           width: 980px;
       }
       h1{font-weight: 600;}
       body{line-height: normal;}
       .brk-btn{color: #cacaca;border-color: #676767;}
    </style>


</head>

<body>

		<section id="body" class="width">
		<?php include "get-menu.php"?>
            <?php
            include "../baglan.php";

            $id = $_SESSION['Id'];
            $gonderilenId =  $_GET['kullaniciId'];
            $karsi = $db->query("SELECT `kullanici`.*, `kullanicitur`.* FROM `kullanici` INNER JOIN `kullanicitur` ON `kullanici`.`KullaniciTurId` = `kullanicitur`.`Id` where `kullanici`.`Id`= $gonderilenId;")->fetch(PDO::FETCH_ASSOC);
            ?>
			
        <section id="content" class="column-right">
                <div class="beyaz">
                    <div class="container-fluid h-100">
                        <div class="row justify-content-center h-100">
                            <div class="chat">
                                <div class="card">
                                    <div class="card-header msg_head">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="../ortak/resimler/<?php echo $karsi['pfoto']; ?>" class="rounded-circle user_img">
                                            </div>
                                            <div class="user_info">
                                                <span><?php echo $karsi['KullaniciAdi']; ?> ile olan mesajlaşma</span>
                                                <p><?php echo $karsi['TurAd']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body msg_card_body">
                                        <?php
                                        $query = $db->query("SELECT * FROM kullanicimesaj WHERE GonderenId= $gonderilenId AND AlanId= $id OR GonderenId= $id AND AlanId= $gonderilenId order by GonderilmeTarihi ASC ", PDO::FETCH_ASSOC);
                                        $countOfQuery = $query->rowCount();
                                        $state = 0;

                                        if ( $query->rowCount() ){
                                            foreach( $query as $mesaj ){
                                                $state++;
                                                echo $state;
                                                if($state!=$countOfQuery){
                                                    if($mesaj['AlanId']!=$id){
                                                        print '
                                                        <div class="d-flex justify-content-end mb-4">
                                                            <div class="msg_cotainer_send">
                                                                '.$mesaj["Mesaj"].'
                                                                 <!-- <span class="msg_time_send">8:55 AM, Today</span> -->
                                                            </div>
                                                            <div class="img_cont_msg">
                                                                <img src="/ortak/resimler/'.$_SESSION['photo'].'" class="rounded-circle user_img_msg">
                                                            </div>
                                                        </div>
                                                        ';
                                                    }
                                                    else{
                                                        print '
                                                           <div class="d-flex justify-content-start mb-4">
                                                                <div class="img_cont_msg">
                                                                    <img src="/ortak/resimler/'.$karsi["pfoto"].'" class="rounded-circle user_img_msg">
                                                                </div>
                                                                <div class="msg_cotainer">
                                                                    '.$mesaj['Mesaj'].'
                                                                    <!-- <span class="msg_time_send">8:55 AM, Today</span> -->
                                                                </div>
                                                            </div>
                                                        ';
                                                    }
                                                }
                                                else{
                                                    if($mesaj['AlanId']!=$id){
                                                        print '
                                                        <div class="d-flex justify-content-end mb-4" id="lastMessage">
                                                            <div class="msg_cotainer_send">
                                                                '.$mesaj["Mesaj"].'
                                                                 <!-- <span class="msg_time_send">8:55 AM, Today</span> -->
                                                            </div>
                                                            <div class="img_cont_msg">
                                                                <img src="/ortak/resimler/'.$_SESSION['photo'].'" class="rounded-circle user_img_msg">
                                                            </div>
                                                        </div>
                                                        ';
                                                    }
                                                    else{
                                                        print '
                                                           <div class="d-flex justify-content-start mb-4"  id="lastMessage">
                                                                <div class="img_cont_msg">
                                                                    <img src="/ortak/resimler/'.$karsi["pfoto"].'" class="rounded-circle user_img_msg">
                                                                </div>
                                                                <div class="msg_cotainer">
                                                                    '.$mesaj['Mesaj'].'
                                                                    <!-- <span class="msg_time_send">8:55 AM, Today</span> -->
                                                                </div>
                                                            </div>
                                                        ';
                                                    }
                                                }
                                              }
                                            }

                                        ?>
                                    </div>
                                    <div class="card-footer">
                                        <form method="get">
                                            <div class="input-group">
                                            <input type="hidden" value="<?php echo $gonderilenId ?>" name="kullaniciId">
                                            <textarea name="msg" class="form-control type_msg" placeholder="Mesajınızı yazınız..."></textarea>
                                            <div class="input-group-append">
                                                <input class="brk-btn" type="submit" onclick="refresh()" value="Gönder">
                                            </div>
                                            
                                            <!--<div class="input-group-append">
                                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                            </div> Gelecekte eklenecek-->

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <form action="" method="Post">
                <input type="submit" class="brk-btn" value="Mesajları Temizle" name="sil" style= 'margin-left:80%;' onclick="return window.confirm('Bu kullanıcı ile olan mesajlarınızı silmek istediğinizden emin misiniz?')">
                </form>
              
                
                </div>
                
		</section>

		<div class="clear"></div>

	</section>
	

</body>

<script>
	function refresh()
	 {
	  location.reload();
	 }
    var x = document.getElementById('lastMessage');
    x.setAttribute("tabindex", 1);
    x.focus()
</script>
</html>
<?php

if(isset($_GET['msg'])){
    if($_GET['msg'] != ""){
    $msg = $_GET['msg'];
    $query = $db->prepare("INSERT INTO kullanicimesaj SET GonderenId = ?, AlanId = ?, Mesaj = ?,GonderilmeTarihi = ?");
    $insert = $query->execute(array($id, $gonderilenId,$msg, date("Y-m-d H:i:s")));
    }
    echo '<meta http-equiv="refresh" content="0;URL=mesajlar.php?kullaniciId='.$gonderilenId.'">';
}
if(isset($_POST['sil'])){
      $delete = $db-> exec("DELETE from kullanicimesaj where(GonderenId='$id' and AlanId='$gonderilenId') or (GonderenId='$gonderilenId' and AlanId='$id')");
      echo '<meta http-equiv="refresh" content="0;URL=mesajlar.php?kullaniciId='.$gonderilenId.'">';
}
?>