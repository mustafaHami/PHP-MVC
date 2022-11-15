<?php
function displayTab(string $name, array $tab) : void {
	echo '<p>'.$name.' :</p>';
	echo '<pre>'; print_r($tab);
	echo '</pre>';
}

function createCookie($nom,$valeur) {
	if (isset($valeur)) {
		$c1 = setcookie($nom,$valeur,time()+(30*24*3600),
							'/','localhost',false,false);
		if ($c1) { 
			echo '<p>Cookie '.$nom.' déposé correctement</p>';
		}
		else {
			echo '<p>Cookie '.$nom.' non créé</p>';
		}
	}
}

function createInputText($nom,$cookie) {
	echo '<input type="text" required name="'.$nom.'" id="'.$nom.'" value="';
	if (isset($_POST[$nom])) echo htmlspecialchars($_POST[$nom]);
	elseif (isset($_COOKIE[$cookie])) {
		echo htmlspecialchars($_COOKIE[$cookie]);
	}
	echo '"/>';
}
?>
