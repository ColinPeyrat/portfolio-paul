<!DOCTYPE html>
<html>
<head>
    <meta charset=UTF-8 />
    <title>PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/foundation.min.css">
    <link rel="stylesheet" href="../css/foundation.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
</head>
</body>
<?php
session_start();
////////////////////////////////////////////////////////
$login ="admin";
$password = "admin";
////////////////////////////////////////////////////////
//Quand l'admin est authentifié
if(isset($_SESSION["user"])){
    //redirige vers le panneau d'administration
    header("Location:admin.php");
//Quand il ne l'ai pas
} else {
    //traitement de la connection
    if (isset($_POST["action"]) && $_POST["action"] == "Se connecter") {
        echo "<div class='row'>";
        // var_dump($_POST);
        if (empty($_POST["login"]) || empty($_POST["password"])) {
            ?>

            <div class="alert callout" data-closable>
                <p>Tous les champs sont obligatoires</p>
            </div>

            <?php


        } else if ($_POST["login"] != $login && $_POST["password"] != $password) {
            ?>
            <div class="alert callout" data-closable>
                <p>Login ou mot de passe incorrect.</p>
            </div>
            <?php
        } else {
            $_SESSION["user"] = "admin";
            header("Location:admin.php");
        }
        echo "</div>";
    }
?>
    <form action="index.php" method="post">
    <div class="row" id="login">
        <div class="medium-6 medium-centered large-4 large-centered columns">
            <form>
                <div class="row column log-in-form">
                    <h4 class="text-center">Veuillez vous connectez</h4>
                    <label>Login
                        <input name="login" type="text">
                    </label>
                    <label>Mot de passe
    <input name="password" type="password">
                    </label>
                    <p><input name="action" value="Se connecter" type="submit" class="button expanded"></input></p>
                </div>
            </form>
        </div>
        </div>
     </form>
    <?php
}
?>

    </footer>
    <script type="text/javascript" src="../js/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="../js/vendor/what-input.min.js"></script>
    <script type="text/javascript" src="../js/foundation.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    </body>
    </body>
</html>