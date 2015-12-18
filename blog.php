<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8 />
        <title>PHP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/foundation.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    </head>
<?php
require_once('connexion.php');

?>
<body>
<div class="top-bar">
    <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text">Paul Thibault</li>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="#">Portfolio</a></li>
        </ul>
    </div>
</div>
<div class="callout large primary">
	<div class="row column text-center">
		<h1>Mon blog</h1>
		<h2 class="subheader">Bienvenue</h2>
	</div>
</div>
<div class="row medium-8 large-7 columns">
<?php

$request = "SELECT * FROM article WHERE actif=0";
$result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);

while ($row = $result->fetch_assoc()) {

    $requestComments = "SELECT * FROM commentaire WHERE article_id=".$row["id"];
    $resultComments = $CONNEXION->query($requestComments) or die ('Erreur '.$request.' '.$CONNEXION->error);
    $nbComments = $resultComments->num_rows;

    ?>
    <div class="blog-post wrapper">
        <h3><?= $row["titre"] ?><small> <?= date("j/m/Y - h:m:s",strtotime($row["date_article"])) ?></small></h3>
        <p><?= $row["contenu"] ?></p>
        <div class="callout">
            <ul class="menu simple">
                <li><a href="#">Commentaire: <?= $nbComments ?></a></li>
            </ul>
        </div>
    </div>
    <?php

}

?>
</div>
<footer class="footer">
        <div class="row">
            <div class="small-12 medium-6 large-5 columns">
                <p class="logo"><i class="fi-shield"></i> Paul Thibault</p>
                <p class="footer-links">
                    <a href="#">Accueil</a>
                    <a href="#">Blog</a>
                    <a href="#">Portfolio</a>
                </p>
                <p class="copywrite">All right reserved © 2015</p>
                <p class="copywrite"><a href="admin/index.php">Se connecter</a></p>
            </div>
            <div class="small-12 medium-6 large-4 columns">
                <ul class="contact">
                    <li><p><i class="fi-marker"></i>Annecy, France</p></li>
                    <li><p><i class="fi-telephone"></i>06 j'ai oublié</p></li>
                    <li><p><i class="fi-mail"></i>contact@emperor.com</p></li>
                </ul>
            </div>
            <div class="small-12 medium-12 large-3 columns">
                <ul class="inline-list social">
                    <a href="https://www.facebook.com/paulothibault"><i class="fi-social-facebook"></i></a>
                    <a href="https://twitter.com/paul_thib"><i class="fi-social-twitter"></i></a>
                </ul>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="js/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="js/vendor/what-input.min.js"></script>
    <script type="text/javascript" src="js/foundation.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>