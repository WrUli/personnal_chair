<?php
session_start();
include_once('environnement.php');

$sqlArticle = "SELECT article.id, article.img, article.title, article.description, categorie.nom
                FROM article
                INNER JOIN categorie ON article.categorie_id = categorie.id";
$requestArticle = $db->prepare($sqlArticle);
$requestArticle->execute();
$articles = $requestArticle->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/libs/css/starability.min.css">
    <link rel="stylesheet" href="assets/libs/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Industri'chair</title>
</head>
<body>
    
<header>
    <div class="header_fade"></div>
    <div class="header_text">
        <?php include_once ('nav.php'); ?>
        <a href="home.php" class="btn_header"> > RETOUR A L'ACCUEIL < </a>
    </div>
</header>

    <main id="main_background">
        <section>
            <div class="main_bg_tittle">
                <p class="main_text">Assises diverses</p>
                <div class="main_bg_line"></div>
            </div>
            
            <div></div>
        </section>

        <section>
        <?php
            if (isset($_SESSION['user'])) {
            echo '<a href="creation_article.php">Créer un nouvel article</a>';    
            }
        ?>
        </section>
        
        <section class="article_list">
		<?php foreach ($articles as $article) {
			
			$sqlNbComments = "SELECT COUNT(*) FROM commentaire WHERE article_id = ?";
			$requestNbComments = $db->prepare($sqlNbComments);
			$requestNbComments->execute(array($article['id']));
			$nbComments = $requestNbComments->fetchColumn();

			
			$sqlAvgRating = "SELECT AVG(rating) FROM rating WHERE article_id = ?";
			$requestAvgRating = $db->prepare($sqlAvgRating);
			$requestAvgRating->execute(array($article['id']));
			$avgRating = $requestAvgRating->fetchColumn();

			echo '<a href="article.php?id=' . $article['id'] . '" class="article_a">';
			echo '<div class="article">';
            echo '<img class="article-image" src="assets/img/' . $article['img'] . '" alt="' . $article['title'] . '">';
            echo '<h2 class="article-title">' . $article['title'] . '</h2>';
            echo '<p class="article-description">' . $article['description'] . '</p>';
            echo '<p class="article-category">Catégorie : ' . $article['nom'] . '</p>';
            echo '<p class="article-comments">Nombre de commentaires : ' . $nbComments . '</p>';
            echo '<p class="article-rating">Note moyenne : ' . number_format($avgRating, 1) . '</p>';
            echo '</div>';
            echo '</a>';
		}
	    ?>
        </section>


    </main>

    <footer>
        <div class="footer_brand">
            <p>Industri'chair.com</p>
            <p>a</p>
        </div>
    </footer>

</body>
</html>