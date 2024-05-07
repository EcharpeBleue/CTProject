<?php
include ("connect_pdo.php");

if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
        $stmt = $pdo->prepare("SELECT * FROM `USERS` WHERE id = :id");
        $stmt->bindParam(':id', $_POST['login']);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($_POST['pwd'], $user['mdp'])) {
            session_start();
            $_SESSION['login'] = $user['id'];
            header('Location: espace-membre.php');
            exit();
        } else {
            $erreur = 'Login ou mot de passe non reconnu !';
            echo $erreur;
            echo "<br/><a href=\"accueil.php\">Accueil</a>";
            exit();
        }
    } else {
        $erreur = 'Errreur de saisie !<br/>Au moins un des champs est vide !';
        echo $erreur;
        echo "<br/><a href=\"accueil.php\">Accueil</a>";
        exit();
    }
}
