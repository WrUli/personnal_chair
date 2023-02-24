
    <ul class="header_nav">
        <li><i class="fa-solid fa-circle-user"></i></li>
        <?php
            if (isset($_SESSION['user'])) {
            echo '<li>'. $_SESSION['user']['prenom'] . '</li>';    
            echo '<li><a href="deconnexion.php">Se déconnecter</a></li>';
            } else {
                echo '<li><a href="connexion.php">Se connecter</a></li>';
                echo '<li><a href="inscription.php">Créer un compte</a></li>';
                
            }
        ?>
    </ul>
    <div class="header_tittle">
        <h1>Industri'</h1>
        <h1 class="header_secondtittle">chair.com</h1>
    </div>
    <div class="header_p">
        <p>L’assise industrielle vu par un passionné, pour</p>
        <p>des passionnés</p>
    </div>
