<!DOCTYPE html>
<html>
<head>
    <meta charset=UTF-8 />
    <title>Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/foundation.min.css">
    <link rel="stylesheet" href="../../css/foundation.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
</head>
<body>
<?php

//vérifie si l'utilisateur est authentifié
session_start();
if(!isset($_SESSION["user"])){
    header("Location:../index.php");
}
require('../../connexion.php');

if(isset($_GET["id"])){

	$idArticle = $_GET["id"];
	$request = "SELECT * FROM article WHERE id=".$idArticle;
    $result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
	$row = $result->fetch_assoc();
	if($row == null){
		header("Location:index.php");
		exit();
	} else {

		$request = "DELETE FROM article WHERE id=".$idArticle;
		$CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
		header("Location:index.php");

	}

} else {

	header("Location:index.php");
}


?>
<script type="text/javascript" src="../../js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="../../js/vendor/what-input.min.js"></script>
<script type="text/javascript" src="../../js/foundation.min.js"></script>
<script type="text/javascript" src="../../js/app.js"></script>
</body>
</html>
