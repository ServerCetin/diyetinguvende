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
<h4>Diyetisyeninizin Notu:</h4>
			<blockquote>
						<p>
						Programina uymaya dikkat et, sana ozel ayarlandigindan aksatmamaya calis!
						</p>
			</blockquote>
			
			
			
			<table>
			
		    <tr>
						<th>Saat</th>
						<th>Bugunku Listem<br><button id="button1">Yaptim</button> <button id="button2">Yapmadim</button></th>
						<th>Yar�nki Listem</th>
		    </tr>
			<script>

var listeyiYapt�m=document.getElementById("button1");
	listeyiYapt�m.onclick=function()
	{
		window.alert("Hasta bug�nk� diyetini yapm��t�r. Diyetisyenine bilgilendirme yap�lacakt�r.");
	}

	var listeyiYapmad�m=document.getElementById("button2");
	listeyiYapmad�m.onclick=function()
	{
		window.alert("Hasta bug�nk� diyetini tam olarak yapmam��t�r. Diyetisyenine bilgilendirme yap�lacakt�r.");
	}
	
            </script>


			<tr>
			            <td>09.00</td>
						<td>Kahvalti</td>
						<td>Kahvalti</td>  
			</tr>
			
			<tr>
			            <td>12.00</td>
						<td>Ara Ogun</td>
						<td>Ara Ogun</td>  
			</tr>
			
			<tr>
			            <td>14.30</td>
						<td>Ogle Yemegi</td>
						<td>Ogle Yemegi</td>  
			</tr>
			
			<tr>
			            <td>17.00</td>
						<td>Ara Ogun</td>
						<td>Ara Ogun</td>  
			</tr>
			
			<tr>
			            <td>19.00</td>
						<td>Aksam Yemegi</td>
						<td>Aksam Yemegi</td>  
			</tr>
			
			<tr>
			            <td>21.00</td>
						<td>Meyve,Kuruyemis</td>
						<td>Meyve,Kuruyemis</td>  
			</tr>
			</table>
			
			<br>
			<br>
						<br>
			<br>			<br>
			<br>			<br>
			<br>
    <?php
    include '../baglan.php';
    $id = $_SESSION['Id'];

    echo '<h4>Mevcut Haftalik Diyet Listem</h4>';

    $query = $db->query("SELECT * FROM hastabilgi WHERE KullaniciId ='{$id}'")->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        $diyetTabloId = $query['DiyetTabloId'];
    }

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

    ?>

				<p>&nbsp;</p>
				
					
			</div>
		</article>

			
			<footer class="clear">
				<p>&copy; 2019 Diyetin G�vende.</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
