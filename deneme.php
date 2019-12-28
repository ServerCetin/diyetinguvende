<?php
include 'baglan.php';

$listele = $db->query("SELECT * FROM kullanici where KullaniciTurId=3", PDO::FETCH_ASSOC);
if ( $listele->rowCount() ) //rawcountu 0 değilse
{
    foreach( $listele as $gelenveri )
    {
        echo "Id'si: ".$gelenveri['Id']." Adı: ".$gelenveri['Ad']. "<br />";
    }
}

?>