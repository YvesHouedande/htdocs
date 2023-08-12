-- Création de la base de données "gestion"
CREATE DATABASE gestion;

-- Sélection de la base de données
USE gestion;

-- Création de la table "administrateur"
CREATE TABLE administrateur (
    id_administrateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Création de la table "utilisateur"
CREATE TABLE utilisateur (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    id_administrateur INT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_administrateur) REFERENCES administrateur(id_administrateur)
) ENGINE=InnoDB;

-- Création de la table "produit"
CREATE TABLE produit (
    id_produit INT PRIMARY KEY AUTO_INCREMENT,
    reference VARCHAR(50) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT, -- Nouvel attribut description
    categorie VARCHAR(50) -- Nouvel attribut categorie
) ENGINE=InnoDB;

-- Création de la table "commande"
CREATE TABLE commande (
    id_commande INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT,
    id_administrateur INT, -- Nouvel attribut pour la clé étrangère de la table administrateur
    date_commande DATE DEFAULT CURRENT_DATE, -- Nouvel attribut de type date pour enregistrer la date courante
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (id_administrateur) REFERENCES administrateur(id_administrateur)
) ENGINE=InnoDB;

-- Création de la table "contient"
CREATE TABLE contient (
    id_contient INT PRIMARY KEY AUTO_INCREMENT,
    id_produit INT,
    id_commande INT,
    -- Ajoutez d'autres attributs spécifiques à la table "contient" si nécessaire
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit),
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande)
) ENGINE=InnoDB;


-- Modification de la table "commande" pour ajuster la taille de la colonne 'date_commande'
ALTER TABLE administrateur
ADD mot_de_passe VARCHAR(255) NOT NULL;
ALTER TABLE utilisateur
ADD mot_de_passe VARCHAR(255) NOT NULL;


-- Ajouter la colonne "categorie" à la table "produit"
ALTER TABLE produit
ADD COLUMN categorie_id INT;

-- Ajouter la contrainte de clé étrangère à la colonne "categorie_id" pour faire référence à la table "categorie"
ALTER TABLE produit
ADD CONSTRAINT fk_produit_categorie
FOREIGN KEY (categorie_id) REFERENCES categorie(id_categorie);


ALTER TABLE ma_table
CHANGE COLUMN ancien_nom nouveau_nom type_de_donnees [autres_options];

ALTER TABLE produit MODIFY image VARCHAR(2000);

