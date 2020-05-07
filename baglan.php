<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
	$db->query("SET CHARACTER SET utf8");
}
catch (PDOException $e){
 echo $e ->getMessage();
}

?>