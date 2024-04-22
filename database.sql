CREATE TABLE `UTILISATEURS` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    email VARCHAR(100),
    mot_de_passe VARCHAR(100)
);

CREATE TABLE `SERVICES` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    description TEXT,
    prix DECIMAL(10, 2) -- Prix en décimal pour gérer les centimes
);

CREATE TABLE `MESSAGES` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id INT,
    service_id INT,
    message TEXT,
    date_envoi DATETIME,
    FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id),
    FOREIGN KEY (service_id) REFERENCES Services(id)
);

CREATE TABLE `MODIFICATIONS_PRIX` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    service_id INT,
    prix_nouveau DECIMAL(10, 2),
    date_modification DATETIME,
    modérateur_id INT,
    FOREIGN KEY (service_id) REFERENCES Services(id),
    FOREIGN KEY (modérateur_id) REFERENCES Utilisateurs(id)
);