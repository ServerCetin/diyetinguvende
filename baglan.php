<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=diyetinguvende", "root", '');
}
catch (PDOException $e){
 echo $e ->getMessage();
}

?>