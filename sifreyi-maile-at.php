

<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
echo $_REQUEST['email'];
if (filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $email = $_REQUEST['email'];
    include "baglan.php";

    $query = $db->query("SELECT * FROM kullanici where Email= '{$email}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
       $sifre= $query['Sifre'];
       $isim = $query['Ad'] .' '. $query['Soyad'];

        $msg = 'Şifreniz: '.$sifre;

        $mail = new PHPMailer(true);

        if($mail) {
            //Server settings
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->Mailer = "smtp";
            $mail->SMTPAuth = true;
            $mail->Username = 'servercetin0@gmail.com';
            $mail->Password = '!^+AJT"V\)t5J`};';
            $mail->SMTPSecure = 'tsl';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('diyetimguvende@gmail.com', 'Şifremi unuttum');
            $mail->addAddress($email, $isim);


            // Content
            $mail->isHTML(true);
            $mail->Subject = 'İLETİŞİM FORMU MESAJI';
            $mail->Body = $msg;
            $mail->AltBody = 'İletişim sayfasındaki form aracılığıyla gönderilmiştir';

            $mail->send();
        }
    }
}
header("Location: giris-yap.php");
?>