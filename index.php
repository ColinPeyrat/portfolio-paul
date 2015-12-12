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
    </head>
<?php
require_once('connexion.php');

// fermeture de la connexion
mysqli_close($CONNEXION);
?>
    <body>
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">Paul Thibault</li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Portfolio</a></li>
            </ul>
        </div>
    </div>

    <div class="callout large" id="bg">
        <div class="row column text-center" id="me">
            <h1 class="title">Paul Thibault</h1>
            <p class="description">Jacky tunning d'adobe premiere et d'after effect</p>
        </div>
    </div>
    <div class="row wrapper">
        <div class="medium-6 columns medium-push-6">
            <img class="thumbnail" src="img/beau-male.jpg">
        </div>
        <div class="medium-6 columns medium-pull-6">
            <h2>À propos de moi</h2>
            <p>Bonjour, je m'appelle Paul.
                Étudiant en MMI (Métiers du Multimédia et Internet), je suis passionné de vidéo.
                Ce blog vous permettra de mieux me connaitre via mes réalisations, n'hesitez pas à me contacter !</p>
        </div>
    </div>
    <div class="row wrapper">
        <div class="medium-4 columns">
            <h3>Photoshop</h3>
            <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
        </div>
        <div class="medium-4 columns">
            <h3>Adobe premiere</h3>
            <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
        </div>
        <div class="medium-4 columns">
            <h3>Touchage de nouille</h3>
            <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
        </div>
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
    </body>
</html>