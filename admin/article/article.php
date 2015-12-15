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

?>
<div class="row">
    <a href="../admin.php"><i class="fi-arrow-left"></i> Retourner à l'administration</a>
</div>
<div class="row wrapper">
    <h3 class="text-center">Tous les articles</h3>
</div>

<div class="row">
    <ul class="accordion" data-accordion role="tablist">
        <?php
        $request = "SELECT * FROM article";
        $result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
        
        while ($row = $result->fetch_assoc()) {
            if($row["actif"] == "0")
                $actif = "oui";
            else
                $actif = "non";
            ?>
            <li class="accordion-item">
                <a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d"><b><?= $row["titre"] ?></b> - <?= $row["sous_titre"] ?></a>
                <div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">
                    Publié le : <em><?= $row["date_article"] ?></em> -  Actif : <?= $actif ?> - Dernière modification le : <?= $row["date_modif"] ?>
                    <hr>
                    <?= $row["contenu"] ?>
                    <hr>
                    <a href="#" class="button"><i class="fi-pencil"></i> Modifier</a>
                    <a href="#" class="button alert"><i class="fi-x"></i> Supprimer</a>

                </div>
            </li>
            <?php
        }

       ?>

    </ul>

</div>

<!--    <li class="accordion-item">-->
<!--        <a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d">Accordion 1</a>-->
<!--        <div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">-->
<!--            Panel 1. Lorem ipsum dolor-->
<!--        </div>-->
<!--    </li><li class="accordion-item">-->
<!--        <a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d">Accordion 1</a>-->
<!--        <div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">-->
<!--            Panel 1. Lorem ipsum dolor-->
<!--        </div>-->
<!--    </li><li class="accordion-item">-->
<!--        <a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d">Accordion 1</a>-->
<!--        <div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">-->
<!--            Panel 1. Lorem ipsum dolor-->
<!--        </div>-->
<!--    </li>-->
<script type="text/javascript" src="../../js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="../../js/vendor/what-input.min.js"></script>
<script type="text/javascript" src="../../js/foundation.min.js"></script>
<script type="text/javascript" src="../../js/app.js"></script>
</body>
</html>
