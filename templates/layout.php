<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antoine Garages Services</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <section id="logoArea">
        <div class="col-6">
            <a href="/Home"> <img src="public/assets/imgs/logo.jpg"></a>
        </div>
    </section>
    <section id="headerArea">
        AGS
        <div id="linksContainer">
            <a class="linksArea" href="/Home"> Accueil </a>
            <a class="linksArea" href="/Connexion"> Se Connecter </a>
            <a class="linksArea" href="/Services"> Services </a>
            <a class="linksArea" href="/Contact"> Contact </a>
            <a class="linksArea" href="/ModerationServices"> Modération : Services </a>
            <a class="linksArea" href="/ModerationMessages"> Modération : Messages </a>
        </div>
    </section>
    <?= $content ?>
</body>

</html>