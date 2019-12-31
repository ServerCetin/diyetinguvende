<?php // Simple Ajax Chat > Form Nonce

// if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || ($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) die();

$sac_nonces = array(
	'Y4-B84pY:IN:;th1H$r+O8cF',
	'IA/,HwsA^y@V0Rre(jF](^P+',
	'kW5oJsj,M4$.}?Zf/GqqZcaz',
	'=1ekfx)K#_5goJ6HrifbK=Ss',
	'8#8r)z3=ELR;7Oqwcp3V3Nv!',
	'Ei9)OuJaqYRssa]b}wut3;=m',
	'}TM42oi:-HppFF:XYk0OY{DM',
	'z%v3[oRX[:w1pp,3ODHD)m7O',
	'@.,oe/A3KKJAvdtSc{]kogMA',
	'tR7djZB~)hlqs6U*jTcXT+IS',
);

$random_nonce = array_rand($sac_nonces, 1);

$sac_nonce = isset($sac_nonces[$random_nonce]) ? base64_encode($sac_nonces[$random_nonce]) : 0;

echo '<input type="hidden" id="sac_js_nonce" name="sac_js_nonce" value="'. $sac_nonce .'" />';
