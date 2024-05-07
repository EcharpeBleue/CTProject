<?php
// Include the database connection file
include "connect.php";

// Check if the form has been submitted
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    // Check if both the login and password fields are filled out
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
        // Escape the input to prevent SQL injection
        $login = $conn->real_escape_string($_POST['login']);
        $password = $conn->real_escape_string($_POST['pwd']);

        // Hash the password for security
        $hashed_password = md5($password);

        // Check if the login and hashed password match a record in the database
        $sql = "SELECT * FROM membres WHERE id = '$login' AND md5 = '$hashed_password'";
        $result = $conn->query($sql);

        // If a match is found, start a session and redirect to the member space
        if ($result->num_rows == 1) {
            session_start();
            $_SESSION['login'] = $login;
            header('Location: espace-membre.php');
            exit();
        } else {
            // If no match is found, display an error message
            $erreur = 'Login ou mot de passe non reconnu !';
            echo $erreur;
            echo "<br/><a href=\"accueil.php\">Accueil</a>";
            exit();
        }
    } else {
        // If either the login or password field is not filled out, display an error message
        $erreur = 'Errreur de saisie !<br/>Au moins un des champs est vide !';
        echo $erreur;
        echo "<br/><a href=\"accueil.php\">Accueil</a>";
        exit();
    }
}
$conn->close();