/* Création de database */
CREATE DATABASE geojunior;
        /*Exécuter*/




/* crée les tableau utiliser (continent, pays, ville, Login)*/
    /*Table de continent*/
CREATE TABLE continent (
    id_continent INT AUTO_INCREMENT,
    nom VARCHAR(50),
    PRIMARY KEY (id_continent)
);

    /*Table de pays*/
CREATE TABLE pays (
    id_pays INT AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL UNIQUE,
    population BIGINT,
    langues VARCHAR(20),
    id_continent INT,
    PRIMARY KEY (id_pays),
    FOREIGN KEY (id_continent) REFERENCES continent(id_continent)
);

    /*Table de ville*/
CREATE TABLE ville (
    id_ville INT AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL UNIQUE,
    description TEXT,
    type ENUM('Capitale' , 'Principale'),
    id_pays INT,
    PRIMARY KEY (id_ville),
    FOREIGN KEY (id_pays) REFERENCES pays(id_pays)
    ON DELETE CASCADE
);

CREATE TABLE Role( id_role int PRIMARY KEY AUTO_INCREMENT, name ENUM('Admine' , 'User') );

CREATE TABLE User( id_user int PRIMARY KEY AUTO_INCREMENT, Username VARCHAR(50) NOT NULL, Email VARCHAR(50) NOT NULL, Password VARCHAR(20) NOT NULL, id_role int , FOREIGN KEY (id_role) REFERENCES Role(id_role) );
        /*Exécuter*/