<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8 />
		<link rel="stylesheet" href="style.css">
		<title>PHP</title>
	</head>
<?php
require_once('connexion.php');
mysqli_query($CONNEXION, "SET lc_time_names = 'fr_FR'");
function convertir( $duree )
{
	$heure = floor($duree/60);
	$minutes = $duree%60;
	if ($minutes<10) $minutes="0".$minutes;
	return($heure."h".$minutes."min");
}
$requete = "SELECT * , DATE_FORMAT(date_sortie, '%d %M %Y') as date_sortie_fr FROM films";
$resultat = mysqli_query($CONNEXION,$requete);
if (!$resultat) {
echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
exit();
}
function realisateurs_id($id_film, $CONNEXION)
{
	$requete = "SELECT id_personne FROM staff where id_film = $id_film AND id_fonction=1";
	$resultat = mysqli_query($CONNEXION, $requete);
	if (!$resultat)
		{
		echo "Erreur dans l'exécution de la requête, message de MySQL : ",
		mysqli_error($CONNEXION);
		exit();
		}
	$retour ="";
	while ($ligne = mysqli_fetch_assoc ($resultat))
		{
		$retour .=$ligne['id_personne']." ";
		}
	return $retour;
}

function realisateurs_prenom_nom ($id_film, $CONNEXION)
{

	$requete = "SELECT nom, prenom FROM (SELECT id_personne FROM staff where id_film = $id_film AND id_fonction=1) AS R1 INNER JOIN personnes ON id_personne=id";
	$resultat = mysqli_query($CONNEXION, $requete);
		if (!$resultat)
		{
		echo "Erreur dans l'exécution de la requête, message de MySQL : ",
		mysqli_error($CONNEXION);
		exit();
		}
	$retour ="";
	while ($ligne = mysqli_fetch_assoc ($resultat))
		{
		$retour .=$ligne['prenom']. " ".$ligne['nom'];
		}
	return $retour;
}


function genre ($CONNEXION, $id_film)
 {
	$requete = "SELECT nom FROM (SELECT id_genre FROM genres_films where id_film = $id_film) AS R2 INNER JOIN genres ON id_genre=id";
	$resultat = mysqli_query($CONNEXION, $requete);
		if (!$resultat)
		{
		echo "Erreur dans l'exécution de la requête, message de MySQL : ",
		mysqli_error($CONNEXION);
		exit();
		}
	$retour ="";
	while ($ligne = mysqli_fetch_assoc ($resultat))
		{
		$retour .=$ligne['nom']. " ";
		}
	return $retour;
 }

 function acteurs_prenom_nom($CONNEXION, $id_film)
 {

	$requete = "SELECT nom, prenom FROM(SELECT id_personne FROM acteurs where id_film=$id_film) AS R3 INNER JOIN personnes ON id_personne=id";
	$resultat = mysqli_query($CONNEXION, $requete);
		if (!$resultat)
		{
		echo "Erreur dans l'exécution de la requête, message de MySQL : ",
		mysqli_error($CONNEXION);
		exit();
		}
	$retour ="";
	while ($ligne = mysqli_fetch_assoc ($resultat))
		{
		$retour .=$ligne['prenom']. " ".$ligne['nom']. ", ";
		}
	return $retour;
}

$nombreLignes = mysqli_num_rows($resultat);
//echo "Il y a ", $nombreLignes, " lignes de résultat pour cette requête :<br/>\n";
//les résultats sous forme de tableau associatif
while ($ligne = mysqli_fetch_assoc ($resultat)) {
echo "<img src='", $ligne['affiche'],"'/> <span class='titre'>",$ligne['titre'],"</span>",
	"<table>
		<tr>
			<td><span class ='intitule'>Date de sortie </span>
			</td>",
			"<td>",$ligne['date_sortie_fr'], " (",convertir($ligne['duree']),")",
			"</td>
		</tr>",
		"<tr>
			<td><span class ='intitule'>Réalisateur </span>
			</td>",
			"<td>",realisateurs_prenom_nom($ligne['id'], $CONNEXION),
			"</td>
		</tr>",
		"<tr>
			<td><span class ='intitule'>Avec </span>
			</td>",
			"<td>",acteurs_prenom_nom($CONNEXION, $ligne['id']),
			"</td>
		</tr>",
		"<tr>
			<td><span class ='intitule'>Genres </span>
			</td>",
			"<td>",genre($CONNEXION, $ligne['id']),
			"</td>
		</tr>",
		"<tr>
			<td><span class ='intitule'>Presse </span>
			</td>",
			"<td>",$ligne['note_presse'],
			"</td>
		</tr>",
		"<tr>
			<td><span class ='intitule'>Public </span>
			</td>",
			"<td>",$ligne['note_public'],
			"</td>
		</tr>
	</table></br></br></br></br>\n";
}

// fermeture de la connexion
mysqli_close($CONNEXION);
?>
                                 </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Affichage de texte avec PHP</h2>

        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo "Celle-ci a été écrite entièrement en PHP."; ?>
        </p>
    </body>
</html>