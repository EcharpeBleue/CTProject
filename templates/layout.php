<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antoine Garages Services</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./assets/js/headerSticky/headerSticky.js" defer></script>
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
</head>

<body>
    <nav id="headerSticky">
        <section id="logoArea">
            <div class="col-6">
                <a href="https://www.patrice-antoine.com/"> <img src="public/assets/imgs/logo.jpg"></a>
            </div>
            <div class="sticky-message">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "Nom d'utilisateur: " . $username;
                } else {
                    echo "Utilisateur non connecté.";
                }
                ?></div>
        </section>
        <section id="headerArea">
            <div id="linksContainer">
                <a class="linksArea" href="/Home"> Accueil </a>
                <?php
                if (!isset($_SESSION['username'])) { ?>
                    <a class="linksArea" href="/Connexion"> Se Connecter </a>
                <?php }
                if (isset($_SESSION['username'])) { ?>
                    <a class="linksArea" href="/Logout"> Se déconnecter </a>
                <?php } ?>
                <a class="linksArea" href="/Services"> Services </a>
                <a class="linksArea" href="/Contact"> Contact </a>
                <?php
                if (isset($_SESSION['username'])) { ?>
                    <a class="linksArea" href="/ModerationServices"> Modération : Services </a>
                    <a class="linksArea" href="/ModerationMessages"> Modération : Messages </a>
                <?php } ?>
            </div>
        </section>
    </nav>
    <?= $content ?>

    <footer>
        <div class="footerCenterElements">
            <img src="public/assets/imgs/logo.jpg" alt="">
        </div>
        <address class="footerCenterElements"> <b>03 26 66 98 00 </b></address>
        <address class="footerCenterElements">Rue de la Nau des Vignes ZA</address>
        <address class="footerCenterElements">51520 La Veuve</address>
        <div class="col footerCenterElements">
            <a href="https://www.patrice-antoine.com/plan-site.php"> Plan du site </a>
            <a href="https://www.patrice-antoine.com/ressources/ajax/mentions_legales_box.php"> Mentions légales </a>
            <a href="https://www.patrice-antoine.com/politique-de-confidentialite.php"> Politique de confidentialité </a>
            <a href="https://www.patrice-antoine.com/#gestion-des-cookies"> Gestion des cookies </a>
            <div> Siret : 39785942200057 </div>
        </div>
    </footer>
</body>

</html>