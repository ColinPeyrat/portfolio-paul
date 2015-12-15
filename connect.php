<?php
	//serveur de développement : wamp ou mamp
	if ($_SERVER['SERVER_NAME']=='localhost') {
		define ('SERVEUR_BD','localhost');
		define ('LOGIN_BD','root');
		define ('PASS_BD','root');
		define ('NOM_BD','paul-portfolio');
	}
	// serveur de déploiement : mmi-agences ou Olympe
	else {
		// define ('SERVEUR_BD','localhost');
		// define ('LOGIN_BD','root');
		// define ('PASS_BD','root');
		// define ('NOM_BD','paul-portfolio');
		define ('SERVEUR_BD','localhost');
		define ('LOGIN_BD','peyratc');
		define ('PASS_BD','bS1NYm');
		define ('NOM_BD','peyratc');
	}
?>