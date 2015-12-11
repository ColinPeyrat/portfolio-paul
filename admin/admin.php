<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8 />
        <title>Administration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/foundation.min.css">
        <link rel="stylesheet" href="../css/foundation.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    </head>
    <body>
        <div class="row wrapper">
            <div class="small-3 columns">
                <ul class="menu vertical">
                    <li><a href="article/add_article.php">Ajouter un article</a></li>
                    <li><a href="article/article.php">Gerer les articles</a></li>
                </ul>
            </div>
            <div class="small-9 columns"><h3>Bienvenue sur l'espace d'administration</h3></div>
        </div>

        <script type="text/javascript" src="../js/vendor/jquery.min.js"></script>
        <script type="text/javascript" src="../js/vendor/what-input.min.js"></script>
        <script type="text/javascript" src="../js/foundation.min.js"></script>
        <script type="text/javascript" src="../js/app.js"></script>
    </body>
</html>
