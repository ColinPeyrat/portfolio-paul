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

//recuperation de l'article redirige vers l'accueil des articles si il n'y a pas d'id passé en parametre
//ou si l'article n'existe pas
if(isset($_GET["id"])){

	$idArticle = $_GET["id"];
	$request = "SELECT * FROM article WHERE id=".$idArticle;
    $result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
	$row = $result->fetch_assoc();
	if($row == null){
		header("Location:index.php");
		exit();
	}

} else {

	header("Location:index.php");
}

if(isset($_POST["action"]) && $_POST["action"] == "Modifier"){
    if(empty($_POST["title"]) || empty($_POST["subtitle"]) || empty($_POST["content"])){
        ?>
        <div class="row">
            <div class="alert callout" data-closable>
                <p>Tous les champs sont obligatoires</p>
            </div>
        </div>
        <?php
    } else {
        $actif = "1";
        if(isset($_POST["actif"]) && $_POST["actif"] =="on")
            $actif = "0";

        $request = "UPDATE article SET titre='".$_POST["title"]."',sous_titre='".$_POST["subtitle"]."',contenu='".$_POST["content"]."',date_modif='NOW()',actif='".$actif."' WHERE id=".$row["id"];
        $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
        header("Location:index.php");
    }
}

?>
<div class="row">
    <a href="../admin.php"><i class="fi-arrow-left"></i> Retourner à l'administration</a>
</div>
<div class="row wrapper">
    <h3 class="text-center">Modifier un article</h3>
</div>
<form action="" method="post">
    <div class="row">
        <div class="medium-4 medium-centered large-8 large-centered columns">
            <form>
                <div class="row column log-in-form">
                    <label>Titre
                        <input value="<?= $row["titre"] ?>" name="title" type="text">
                    </label>
                    <label>Sous-titre
                        <input value="<?= $row["sous_titre"] ?>" name="subtitle" type="text">
                    </label>
                    <label><span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex=2 title="Vous pouvez utiliser de l'HTML classique (<br/>,<hr>,etc...)">Contenu</span>
                        <textarea rows="5" cols="50" name="content" type="text"><?= $row["contenu"] ?></textarea>
                    </label>
                    <input <?php if($row["actif"] == "0") echo "checked='true'"; ?> name="actif" type="checkbox"><label for="checkbox"><span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex=1 title="Cochez cette case si vous voulez que l'article soit visible dés sa création">Actif</span></label>
                    <p><input name="action" value="Modifier" type="submit" class="button expanded"></input></p>
                </div>
            </form>
        </div>
    </div>
</form>
<script type="text/javascript" src="../../js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="../../js/vendor/what-input.min.js"></script>
<script type="text/javascript" src="../../js/foundation.min.js"></script>
<script type="text/javascript" src="../../js/app.js"></script>
</body>
</html>
