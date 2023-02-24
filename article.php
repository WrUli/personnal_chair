<?php
session_start();
include_once('environnement.php');





if (isset($_POST['submit_comment'])) {
    $user_id = $_SESSION['id'];
    $article_id = isset($_POST['article_id']) ? intval($_POST['article_id']) : 0;
    $comment_text = $_POST['comment_text'];

    if (empty($comment_text)) {
        $error = "Veuillez saisir un commentaire.";
    } else {
        $stmt = $db->prepare("INSERT INTO commentaire (user_id, article_id, commentaire_texte) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $article_id, $comment_text]);
        $success = "Le commentaire a été ajouté avec succès !";
    }
    
}

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

    <main>
    
        <?php
        if (isset($_GET['id'])) {
        
        $articleId = $_GET['id'];
        
        $article = $db->query(" SELECT article.id, article.img, article.title, article.description, categorie.nom 
                                FROM article 
                                INNER JOIN categorie ON article.categorie_id = categorie.id
                                WHERE article.id = $articleId")->fetch();

        
        
        $sqlNbComments = "SELECT COUNT(*) FROM commentaire WHERE article_id = ?";
        $requestNbComments = $db->prepare($sqlNbComments);
        $requestNbComments->execute(array($article['id']));
        $nbComments = $requestNbComments->fetchColumn();

        
        $sqlAvgRating = "SELECT AVG(rating) FROM rating WHERE article_id = ?";
        $requestAvgRating = $db->prepare($sqlAvgRating);
        $requestAvgRating->execute(array($article['id']));
        $avgRating = $requestAvgRating->fetchColumn();

        }
        ?>

        <div class="article_a">
            <img class="article-image_a" src="assets/img/<?php echo $article['img']; ?>" alt="<?php echo $article['title']; ?>">
            <div class="article-box_a">
                <h2 class="article-title_a"><?php echo $article['title']; ?></h2>
                <p class="article-description_a"><?php echo htmlentities($article['description'], ENT_QUOTES); ?></p>
                <p class="article-category_a">Catégorie : <?php echo $article['nom']; ?></p>
                <p class="article-comments_a">Nombre de commentaires : <?php echo $nbComments; ?></p>
                <p class="article-rating_a">Note moyenne : <?php echo number_format($avgRating, 1); ?></p>
            </div>

            
            
        </div>
        <section class="comments-box">
            <h3>Commentaires</h3>

            <?php

            $stmt = $db->prepare("SELECT * FROM commentaire WHERE article_id = ?");
            $stmt->execute([$article_id]);
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
            foreach ($comments as $comment) {
                $user = $db->query("SELECT prenom, nom FROM user WHERE id = " . $comment['user_id'])->fetch();
                echo "<div class='comment'>";
                echo "<p class='comment-user'>" . $user['prenom'] . " " . $user['nom'] . "</p>";
                echo "<p class='comment-text'>" . $comment['commentaire_texte'] . "</p>";
                echo "</div>";
            }
            ?>

            <form action="article.php" method="post">
                <div>
                    <label for="comment_text">Commentaire :</label><br>
                    <textarea id="comment_text" name="comment_text" rows="5" required></textarea>
                </div>
                <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
                <button type="submit" name="submit_comment">Ajouter un commentaire</button>
            </form>

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