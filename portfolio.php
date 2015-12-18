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


//$request = "SELECT * FROM categorie";
//$result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
//while($row = $result->fetch_assoc()){
//
//    echo $row["nom"]."<br/>";
//}


$categories = array();
$breadcrumb = array();
$realisations = array();
if(isset($_GET["category"])){

    $idCategory = $_GET["category"];
    $request = "SELECT * FROM categorie WHERE id_parent=$idCategory";
    $result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
    while($row = $result->fetch_assoc()){
        $categories[] = $row;
    }
    $request = "SELECT * FROM categorie WHERE id=$idCategory";
    $result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
    while($row =$result->fetch_assoc()){

        $breadcrumb[] = $row;

        if ($row["id_parent"] != null) {
            $requestParent = "SELECT * FROM categorie WHERE id=" . $row["id_parent"];
            $result = $CONNEXION->query($requestParent) or die ('Erreur ' . $request . ' ' . $CONNEXION->error);
        }

    }

    $requestRealisation = "SELECT * FROM realisation WHERE categorie_id=".$idCategory;
    $resultRealisation = $CONNEXION->query($requestRealisation) or die ('Erreur '.$request.' '.$CONNEXION->error);
    while($row = $resultRealisation->fetch_assoc()){
        $realisations[] = $row;
    }

} else {
    $request = "SELECT * FROM categorie WHERE id_parent IS NULL";
    $result = $CONNEXION->query($request) or die ('Erreur '.$request.' '.$CONNEXION->error);
    while($row = $result->fetch_assoc()){

        $categories[] = $row;

    }
}
$breadcrumb = array_reverse($breadcrumb);

//get the end of the breadcrumb
$current = end($breadcrumb);


// fermeture de la connexion
mysqli_close($CONNEXION);
?>
<body>
<div class="top-bar">
    <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text">Paul Thibault</li>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <nav aria-label="You are here:" role="navigation">
        <ul class="breadcrumbs">
            <?php
            foreach ($breadcrumb as $item) {
            ?>
                        <li><a href="?category=<?= $item["id"]?>"><?= $item["nom"] ?></a></li>

                <?php
            }
            ?>
        </ul>
    </nav>
</div>
<div class="row wrapper">
    <div class="large-2 columns">
        <h4>Catégories</h4>
        <ul class="menu vertical">
            <?php
            foreach ($categories as $category) {

                echo "<li><a href='?category=".$category["id"]."'>".$category["nom"]."</a></li>";

            }
            ?>
        </ul>
    </div>
    <div class="large-10 columns">
        <h4 class="text-center"><?= $current["nom"] ?></h4>
        <hr>
        <?php
            if($realisations == null){
                echo "<div class='callout warning'>Aucune réalisation pour cette categorie</div>";
            } else {
                foreach ($realisations as $realisation) {
                    echo "<p>".$realisation["titre"]."</p>";
                }
            }
        ?>
    </div>
</div>
<footer class="footer">
    <div class="row">
        <div class="small-12 medium-6 large-5 columns">
            <p class="logo"><i class="fi-shield"></i> Paul Thibault</p>
            <p class="footer-links">
                <a href="index.php">Accueil</a>
                <a href="blog.php">Blog</a>
                <a href="portfolio.php">Portfolio</a>
            </p>
            <p class="copywrite">All right reserved © 2015</p>
            <p class="copywrite"><a href="admin/index.php">Se connecter</a></p>
        </div>
        <div class="small-12 medium-6 large-4 columns">
            <ul class="contact">
                <li><p><i class="fi-marker"></i>Annecy, France</p></li>
                <li><p><i class="fi-telephone"></i>06 32 44 54 27</p></li>
                <li><p><i class="fi-mail"></i><a href="mailto:paulthibault24@gmail.com">paulthibault24@gmail.com</a></p></li>
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