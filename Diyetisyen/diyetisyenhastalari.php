
<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
<?php if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "diyetisyenmenu.php";}?>
			
			<section id="content" class="column-right">
                		
	    <article>
			
			<div class="beyaz" style="padding-top: 50px"  >
			 <fieldset>
			<legend>Hasta Takip</legend><br>
			<form>	
				
			
			
				<table id="hastalistesi">
 
  <tr>
    <th>Gözde Çetinkaya</th>
    <th>19.11.2019</th>
	<th>20.11.2019</th>
	<th>21.11.2019</th>
	<th>22.11.2019</th>
  <th>23.11.2019</th>
  </tr>
  <tr>
    <th>Kahvaltı</th>
	
    <td>&#x2714;</td>
	<td> Yapmadı! </td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
  </tr>
   <tr>
    <th>Ara Öğün</th>
	
    <td>&#x2714;</td>
	<td>Yapmadı!</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
  </tr>
   <tr>
    <th>Öğle Yemeği</th>
	
    <td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>Yapmadı!</td>
	<td>&#x2714;</td>
  </tr>
   <tr>
    <th>Ara Öğün</th>
	
    <td>&#x2714;</td>
	<td>Yapmadı!</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
  </tr>
   <tr>
    <th>Akşam Yemeği</th>
	
    <td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
	<td>&#x2714;</td>
  </tr>
   <tr>
    <th>Meyve,Kuru Yemiş</th>
	
    <td>&#x2714;</td>
	<td>Yapmadı!</td>
	<td>Yapmadı!</td>
	<td>&#x2714;</td>
	<td>Yapmadı!</td>
  </tr>
  
</table>
			</form>	
				</div>
		</article> </fieldset>	

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
