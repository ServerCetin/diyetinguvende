<?php
if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "../Menus/diyetisyen-menu.php";}
else if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../Menus/koc-menu.php";}
else if($_SESSION["kullaniciTur"] == "Yönetici"){include "../Menus/yonetici-menu.php";}
else {include "../Menus/kullanici-menu.php";}

?>

