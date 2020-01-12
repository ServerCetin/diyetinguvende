<?php
session_start();
ob_start();
?>

<!doctype html>
<html>

<head>
	<title>Diyetin Guvende!</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/styles.css" type="text/css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasini saglar-->
</head>

<body>

		<section id="body" class="width">
		<?php if($_SESSION["kullaniciTur"] == "Kullanici"){include "../Menus/kullanici-menu.php";}?>


		<section id="content" class="column-right">
                		
	    <article>
<div class="beyaz" >

<fieldset>
<br>
					<legend>Diyet Listem</legend><br><br>

    <?php

    include '../baglan.php';
    $id = $_SESSION['Id'];

    $query = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId ='{$id}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        $diyetTabloId = $query['DiyetTabloId'];
    }
    $query = $db->query("SELECT * FROM diyettablosu WHERE Id ='{$diyetTabloId}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        $tabloAciklamasi = $query['TabloAciklamasi'];
    }
    if(isset($tabloAciklamasi)){
    echo '<table>
                <tr>
                    <th>Bugunkü Listem<br></th>
                    <th>Yarınki Listem</th>
                </tr>';

    if(date('l')=="Monday"){
        $listele = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND ProgramGunId = 1 OR ProgramGunId =2 ", PDO::FETCH_ASSOC);
        if ( $listele->rowCount() )
        {
            $sayac = 0;
            foreach( $listele as $gelenveri )
            {
                $sayac++;
                if($sayac==1)
                    echo "<tr>";
                echo "<td>".$gelenveri['Aciklama']."</td>";
                if($sayac==2){
                    echo "</tr>";
                    $sayac=0;
                }
            }
        }
    }
    if(date('l')=="Tuesday"){
        $listele = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND ProgramGunId = 2 OR ProgramGunId =3 ", PDO::FETCH_ASSOC);
        if ( $listele->rowCount() )
        {
            $sayac = 0;
            foreach( $listele as $gelenveri )
            {
                $sayac++;
                if($sayac==1)
                    echo "<tr>";
                echo "<td>".$gelenveri['Aciklama']."</td>";
                if($sayac==2){
                    echo "</tr>";
                    $sayac=0;
                }
            }
        }
    }
    if(date('l')=="Wednesday"){
        $listele2 = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND ProgramGunId = 3 OR ProgramGunId =4 ", PDO::FETCH_ASSOC);
        if ( $listele2->rowCount() )
        {
            $sayac = 0;
            foreach( $listele2 as $gelenveri )
            {
                $sayac++;
                if($sayac==1)
                    echo "<tr>";
                echo "<td>".$gelenveri['Aciklama']."</td>";
                if($sayac==2){
                    echo "</tr>";
                    $sayac=0;
                }
            }
        }
    }
    if(date('l')=="Thursday"){
        $listele3 = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND ProgramGunId = 4 OR ProgramGunId =5 ", PDO::FETCH_ASSOC);
        if ( $listele3->rowCount() )
        {
            $sayac = 0;
            foreach( $listele3 as $gelenveri )
            {
                $sayac++;
                if($sayac==1)
                    echo "<tr>";
                echo "<td>".$gelenveri['Aciklama']."</td>";
                if($sayac==2){
                    echo "</tr>";
                    $sayac=0;
                }
            }
        }
    }
    if(date('l')=="Friday"){
        $listele4 = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND ProgramGunId = 5 OR ProgramGunId =6 ", PDO::FETCH_ASSOC);
        if ( $listele4->rowCount() )
        {
            $sayac = 0;
            foreach( $listele4 as $gelenveri )
            {
                $sayac++;
                if($sayac==1)
                    echo "<tr>";
                echo "<td>".$gelenveri['Aciklama']."</td>";
                if($sayac==2){
                    echo "</tr>";
                    $sayac=0;
                }
            }
        }
    }
    if(date('l')=="Saturday"){
        $listele5 = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND ProgramGunId = 6 OR ProgramGunId =7 ", PDO::FETCH_ASSOC);
        if ( $listele5->rowCount() )
        {
            $sayac = 0;
            foreach( $listele5 as $gelenveri )
            {
                $sayac++;
                if($sayac==1)
                    echo "<tr>";
                echo "<td>".$gelenveri['Aciklama']."</td>";
                if($sayac==2){
                    echo "</tr>";
                    $sayac=0;
                }
            }
        }
    }
    if(date('l')=="Sunday"){
        $listele6 = $db->query("SELECT * FROM diyettablosatir WHERE DiyetTabloId=$diyetTabloId AND ProgramGunId = 7 OR ProgramGunId =1 ", PDO::FETCH_ASSOC);
        if ( $listele6->rowCount() )
        {
            $sayac = 0;
            foreach( $listele6 as $gelenveri )
            {
                $sayac++;
                if($sayac==1)
                    echo "<tr>";
                echo "<td>".$gelenveri['Aciklama']."</td>";
                if($sayac==2){
                    echo "</tr>";
                    $sayac=0;
                }
            }
        }
    }
    }

			echo '</table>
				<br>
			<br>
			<br><br>
			<br>

			';


    if(isset($tabloAciklamasi)){
    echo '<h4>Mevcut Haftalik Diyet Listem</h4>';


    echo '<h5>Diyetisyeninizin Notu:</h5>'.' <blockquote>
        <p>
            '.$tabloAciklamasi.'
        </p>
    </blockquote>';

    $listele = $db->query("SELECT * FROM diyettablosatir where DiyetTabloId=$diyetTabloId", PDO::FETCH_ASSOC);
    if ( $listele->rowCount() )
    {
        $sayac = 0;
        echo '<table>';
        echo '<th>Pazartesi</th>';
        echo '<th>Salı</th>';
        echo '<th>Çarşamba</th>';
        echo '<th>Perşembe</th>';
        echo '<th>Cuma</th>';
        echo '<th>Cumartesi</th>';
        echo '<th>Pazar</th>';
        foreach( $listele as $gelenveri )
        {
            if($sayac==0){echo '<tr>';}
            echo "<td style=\"width:50px;\">".$gelenveri['Aciklama']."</td>";
            $sayac++;
            if($sayac==7){echo '</tr>';$sayac=0;}
        }
        echo '</table>';
    }
    }
    ?>
			    <p>&nbsp;</p>
			</fieldset>
					
		</div>
	</article>
	
			<footer class="clear">
				<p>&copy; 2019 Diyetin Guvende.</p>
			</footer>

	</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
