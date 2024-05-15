<?php
include_once '../config/config.php';

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $sessionUsername = $_POST['username'];
        $sessionPassword = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM `USER` WHERE username = ? AND userPassword = ?");
        $stmt->bindParam(1, $sessionUsername, PDO::PARAM_STR);
        $stmt->bindParam(2, $sessionPassword, PDO::PARAM_STR);

        if ($stmt->execute()) {
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['username'] = $sessionUsername;
                header('Location: /Home');
                exit();
            } else {
                echo 'Login ou mot de passe non reconnu !';
                exit();
            }
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        echo 'Erreur de saisie !<br/>Au moins un des champs est vide !';
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    if ($conn) {
        $conn = null;
    }
}