CREATE DATABASE scolarite;

CREATE TABLE etudiant (
    matricule INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    sexe ENUM('M', 'F') NOT NULL,
    telephone VARCHAR(15),
    date_de_naissance DATE NOT NULL
);

CREATE TABLE enseignant (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    sexe ENUM('M', 'F', 'Autre') NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    adresse TEXT NOT NULL
);

CREATE TABLE classe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(50) NOT NULL,
    libelle VARCHAR(100) NOT NULL,
    nbreE INT NOT NULL DEFAULT 0
);

CREATE TABLE cours (
    id INT AUTO_INCREMENT PRIMARY KEY,              
    libelle VARCHAR(100) NOT NULL,                   
    enseignant_id INT,                               
    salle_id INT,                                    
    FOREIGN KEY (enseignant_id) REFERENCES enseignant(id),  
    FOREIGN KEY (salle_id) REFERENCES salle(id)            
);


