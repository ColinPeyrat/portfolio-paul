<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8 />
		<link rel="stylesheet" href="style.css">
        <title>PHP</title>
	</head>
<?php
require_once('connexion.php');

// fermeture de la connexion
mysqli_close($CONNEXION);
?>
    <body>
        <h2>Affichage de texte avec PHP</h2>
        <p>
            Cette ligne a été écrite entièrement en HTML.<br/>
            <?php echo "Celle-ci a été écrite entièrement en PHP."; ?>
        </p>
    </body>
</html>