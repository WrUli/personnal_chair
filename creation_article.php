<?php
session_start();
include_once('environnement.php');

$sqlArticle = "SELECT article.id, article.img, article.title, article.description, categorie.nom
             FROM article
             INNER JOIN categorie ON article.categorie_id = categorie.nom";

$requestArticle = $db->prepare($sqlArticle);
$requestArticle->execute();



if(isset($_POST['title']) && isset($_POST['description'])) {
    $title = htmlspecialchars($_POST['title']) ;
    $description = htmlspecialchars($_POST['description']) ;
    $categorie = ($_POST['categorie_id']);

    if (isset($_FILES['img'])) {
        $image = $_FILES['img']['name'];
        $imageTmp = $_FILES['img']['tmp_name'];

        move_uploaded_file($imageTmp, 'assets/img/' . $image);
    }

    
    

    $rqAdd = $db->prepare('INSERT INTO article (title, description, img, categorie_id, user_id)
                        VALUES (?, ?, ?, ?, ? )');

    $rqAdd->execute(array($title,$description, $image, $categorie, $_SESSION['user']['id']));
    header('Location: gallery.php?success=4');                         
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
    <form action="creation_article.php" method="POST" enctype="multipart/form-data">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title">
        <label for="categorie_id">Type d'assise' :</label>
        <select id="categorie_id" name="categorie_id">
            <option value="1">Chaise</option>
            <option value="3">Fauteuil</option>
            <option value="2">Tabouret</option>
        </select>
        <label for="description">Ajouter une description :</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <input type="file" name="img" id="img"> 
        <input type="submit" value="Ajouter">    
    </form>
</main>



    

</body>
</html>
