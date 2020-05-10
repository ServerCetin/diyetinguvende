

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
			echo "no";
            //Server settings
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'mail.diyetinguvende.com';
            $mail->Mailer = "smtp";
            $mail->SMTPAuth = true;
            $mail->Username = 'info@diyetimguvende.com';
            $mail->Password = 'Sisi$onyor34';
            $mail->SMTPSecure = 'tsl';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('info@diyetimguvende.com', 'Şifremi unuttum');
            $mail->addAddress($email, $isim);


            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Şifrenizle alakalı bilgiler';
            $mail->Body = $msg;
            $mail->AltBody = 'Bolca sevgi ve saygılarımızla. DG Ekibi';

            $mail->send();
        }
    }
}
header("Location: giris-yap.php");
?>