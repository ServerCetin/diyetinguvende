<?php
session_start();
ob_start();

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
			<?php if($_SESSION["kullaniciTur"] == "Spor Hocası"){include "../Menus/koc-menu.php";}?>


			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			<fieldset>
            <legend>Öğrenci Kaydet</legend><br>
				<form action="#" method="get">		
				
				<p>Öğrencinin Kullanıcı Adı:
						<input type="text" name="username" id="username" value="" /><br /></p>
						
			<p>Öğrencinin Diyet Listesi:
				<br><br>
				Liste 1 <input type="radio" name ="liste2" Value="Liste1">
				Liste 2 <input type="radio" name ="liste2" Value="Liste2">
				<br><br>
			<p><a href="#" class="button buttonS" style="margin-left:28%;"name="kodgonder">Ekle</a>

		
			<h4>Öğrencilerim</h4><br>
				<table id="hastalistesi">
  <tr>
    <th>Öğrenci Adı Soyadı</th>
	<th style="width:200px;">Git</th>
    
  </tr>
  <tr>
    <td>Gözde Çetinkaya</td>
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  <tr>
    <td>Semih Hatıl</td>
   
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a></td>
	</tr>
  <tr>
    <td>Server Çetin</td>
    
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  <tr>
    <td>Arda Çekem</td>
    
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  <tr>
    <td>Tolgahan Acar</td>
    
    <td>
		<a href="#" class="button button-reversed">Git</a>
		<a href="#" class="button">Kaldır</a>
	</td>
  </tr>
  
</table>
			</form>	
				</div>
		</article>
			
		
				
		

			
			

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
