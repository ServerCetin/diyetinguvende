<?php
if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../menus/diyetisyen-menu.php";}
else if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../menus/koc-menu.php";}
else if($_SESSION["kullaniciTur"] == "Yönetici"){include "../menus/yonetici-menu.php";}
else {include "../menus/kullanici-menu.php";}

?>

