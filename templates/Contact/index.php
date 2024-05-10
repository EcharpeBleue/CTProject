<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-Nous</title>
    <link rel="stylesheet" href="./assets/css/Contact/style.css">
</head>
<body>
    <h1>Contactez-Nous</h1>
    <p>Pour toute question ou demande, n'hésitez pas à nous contacter en utilisant le formulaire ci-dessous ou via nos coordonnées suivantes :</p>
    <p><strong>Entreprise XYZ</strong><br>
    Adresse : 123 Rue Imaginaire, 75000 Paris<br>
    Téléphone : +33 1 23 45 67 89<br>
    Email : contact@entreprisexyz.com</p>

    <form action="/submit_contact_form" method="POST">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Sujet :</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>