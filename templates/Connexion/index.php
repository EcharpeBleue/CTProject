<?php
$servername = "PHP-SERVER-CTProject";
$username = "admin";
$password = "motdepasse";
$dbname = "CTDB";
$conn = null;

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT * FROM `USER` WHERE username = ? AND userPassword = ?");
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->bindParam(2, $password, PDO::PARAM_STR);

            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($row) {
                        session_start();
                        $_SESSION['username'] = $username;
                        header('Location: /Home');
                        exit();
                    } else {
                        $erreur = 'Login ou mot de passe non reconnu !';
                        echo $erreur;
                        exit();
                    }
                }
            } else {
                // Handle error
                echo "Error: " . $stmt->errorInfo()[2];
            }
        } else {
            $erreur = 'Erreur de saisie !<br/>Au moins un des champs est vide !';
            echo $erreur;
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    if ($conn) {
        $conn = null; // Fermeture de la connexion
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="./assets/css/Connexion/style.css">
</head>

<body>
    <h2>Connexion</h2>
    <form action="/login" method="POST">
        <div>
            <label for="username">Identifiant:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Se connecter</button>
        </div>
    </form>
</body>

</html>