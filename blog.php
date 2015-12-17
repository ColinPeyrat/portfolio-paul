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
            <li><a href="#">Portfolio</a></li>
        </ul>
    </div>
</div>
<div class="callout large primary">
	<div class="row column text-center">
		<h1>Our Blog</h1>
		<h2 class="subheader">Such a Simple Blog Layout</h2>
	</div>
</div>  
<div class="row medium-8 large-7 columns">
	<div class="blog-post">
		<h3>Awesome blog post title <small>3/6/2015</small></h3>
			<img class="thumbnail" src="http://placehold.it/850x350">
			<p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus.</p>
			<div class="callout">
			<ul class="menu simple">
				<li><a href="#">Author: Mike Mikers</a></li>
				<li><a href="#">Comments: 3</a></li>
			</ul>
		</div>
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