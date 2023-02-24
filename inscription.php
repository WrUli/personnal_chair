<?php
session_start();
include_once('environnement.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $prenom = $_POST['prenom'];
    $nom = htmlspecialchars($_POST['nom']) ;
    $mail = htmlspecialchars($_POST['mail']) ;
    $password = htmlspecialchars($_POST['password']) ;

    if(empty($prenom) || empty($nom) || empty($mail) || empty($password)) {
      header('Location: inscription.php?error=missing_data');
      exit();
    }
  
    $stmt = $db->prepare('SELECT * FROM user WHERE mail = ?');
    $stmt->execute([$mail]);
    $user = $stmt->fetch();
    if ($user) {
      header('Location: inscription.php?error=email_taken');
      exit();
    }

    if(isset($password)) {
        $salt = "dhuazfernekvorkbgt";
        $hash = hash('sha256', $password . $salt);
    } else {
        header('Location: formulaire_inscription.php?error=missing_password');
        exit();
    }
  
    $stmt = $db->prepare('INSERT INTO user (prenom, nom, mail, password) VALUES (?, ?, ?, ?)');
    $stmt->execute([$prenom, $nom, $mail, $hash]);
  
    header('Location: inscription.php?incription-cinfirmee');
    exit();
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

 
        



        <form method="post" action="inscription.php" class="form1">
            <h2>Inscription</h2>
            <?php
            if(isset($_GET['error'])) {
            $error = $_GET['error'];
            if($error == 'missing_data') {
                echo '<p>Veuillez remplir tous les champs.</p>';
            } else if($error == 'email_taken') {
                echo '<p>Cette adresse e-mail est déjà utilisée. Veuillez en choisir une autre.</p>';
            }
            }
            ?>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" required>

            <label for="nom">Nom :</label>
            <input type="text" name="nom" required>

            <label for="mail">Adresse e-mail :</label>
            <input type="email" name="mail" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" required>

            <input type="submit" value="S'inscrire">
        </form>


    </main>



</body>
</html>