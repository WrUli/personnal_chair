<?php
session_start();
include_once('environnement.php');



if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $salt = "dhuazfernekvorkbgt";
    $hash = hash('sha256', $password . $salt);

    $request = $db->prepare('SELECT * FROM user 
    WHERE mail = ?');
    $request->execute(array($mail));
    $user = $request->fetch();
    if ($hash == $user['password']) {
        $_SESSION['name'] = $user['prenom'];
        $_SESSION['id'] = $user['id'];
        header('Location: home.php?login=' . $user['prenom']);
    } else {
        // header('Location: connexion.php?login=false&error=Invalid login or password');
        var_dump($user);
        
        exit;
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
    <h1>Connexion</h1>
    
    <form action="connexion.php" method="post" class="form1">
        <div class="form-group">
        <label for="mail">Adresse e-mail</label>
        <input class="input_all" type="email" name="mail" id="mail" required>
        </div>
        <div class="form-group">
        <label for="password">Mot de passe</label>
        <input class="input_all" type="password" name="password" id="password" required>
        </div>
        <input class="input_sub" type="submit" value="Se connecter">
        <a href="inscription.php">Pas encore de compte ? Inscrivez-vous</a>
    </form>

        
    </main>



</body>
</html>