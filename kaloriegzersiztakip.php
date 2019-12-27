<?php
session_start();
ob_start();
$ad = $_SESSION["ad"];
$username = $_SESSION["username"];
?>
<!doctype html>
<html>

<head>


<title>Diyetin Güvende!</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><!-- telefona uyumlu olmasını sağlar-->
</head>

<body>

		<section id="body" class="width">
			<aside id="sidebar" class="column-left">

			<header>
				<h1><a href="#">Diyetin Güvende!</a></h1>	
				
			</header>
			<?php if($_SESSION["kullaniciTur"] == "Diyetisyen"){include "diyetisyenmenu.php";}?>
			<section id="content" class="column-right">
                		
	    <article>
<div class="beyaz" >
<fieldset>
<legend>Kalori Takip</legend><br>
			
<legend>Bugünki Durumun</legend>
<form action="#" method="get">		
Boy: <input type="text" style="width:40px"><br> <br>
Kilo: <input type="text" style="width:40px"><br> <br>				
<p><label >Kalori Miktari:</label>
<input type="text" name="kalori" id="kalori" /><br></p>
Diyetisyenime Bırakmak İstediğim Ekstra Not
<br>
<br> <p><textarea  cols="50" rows="5" name="message" id="message" placeholder="Mesaj Yaz..." ></textarea> <br>	
Bugünkü Diyet Planıma Uydum: <input type="radio" name="radio2" value="evet"> Evet
<input type="radio" name="radio2" value="hayır"> Hayır <br> <br>
<p><input type="submit" name="send" class="formbutton" value="Gönder" /> <input type="reset" name="resetle" class="formbutton" value="Sıfırla" /></p>
</form>				
</fieldset>    


<fieldset>

<legend>Egzersiz Takip</legend><br>

<legend>Bugünki Durumun</legend><br>
<form action="#" method="get">
<p><label for="email">Kaç Adım Attın:</label>
<input type="text" name="yurume" id="yurume" value="" /><br></p>
<p><label for="email">Kaç Metre Kostun:</label>
<input type="text" name="kosma" id="kosma" value="" /><br></p>
Spor Hocama Bırakmak İstediğim Ekstra Not
<br><br><p><textarea  cols="50" rows="5" name="message" id="message" placeholder="Mesaj Yaz..." ></textarea> <br>
Bugünkü Egzersiz Planıma Uydum: <input type="radio" name="radio1" value="evet"> Evet
<input type="radio" name="radio1" value="hayır"> Hayır <br> <br>				
<p><input type="submit" name="send" class="formbutton" value="Gönder" /> 
<input type="reset" name="resetle" class="formbutton" value="Sıfırla" /></p>
</form>


				</div>
		</article>

			
			<footer class="clear">
				<p>&copy; Diyetin Güvende.</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
