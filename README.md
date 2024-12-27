# Geo-Junior

## Objectif du projet

L'objectif de ce projet est de concevoir une application web éducative pour enrichir les connaissances géographiques des élèves sur le continent africain.

Le projet se concentre sur l’interaction avec une base de données bien structurée, comprenant les entités **Continent**, **Pays**, et **Ville**, tout en respectant les principes fondamentaux de SQL et des SGBD.

## Contexte du projet

Suite à la réalisation de la version 1 du projet, vous êtes invités à développer une version 2 plus avancée, en adoptant la **Programmation Orientée Objet (POO)** avec **PHP**.

Cette version doit intégrer de nouvelles fonctionnalités et une gestion optimisée des entités.

Une fois la partie **Back-End** finalisée, vous êtes encouragés à améliorer l’interface utilisateur (**UI/UX**) pour rendre le site plus moderne, ergonomique et attrayant.

## User Stories

### En tant que concepteur :

- Corrigez le diagramme de cas d’utilisation réalisé dans la version 1, en y ajoutant les fonctionnalités manquantes et toutes améliorations nécessaires.
- Réalisez un diagramme de classes **UML**.

### En tant que développeur BackEnd :

1. **Implémentez une architecture orientée objet** pour gérer les entités suivantes :
    - **Continent** : ID, Nom, Nombre de pays.
    - **Pays** : ID_Pays, Nom_Pays, Population_Pays, Langue_Pays, Continent associé.
    - **Ville** : ID_Ville, Nom_Ville, Description_Ville, Type_Ville (capitale ou autre), Pays associé.

2. **Écrivez des classes en PHP avec les fonctionnalités suivantes** :
    - **S'authentifier** en tant que **User** ou **Admin**.
    - **Ajouter** un continent, un pays, ou une ville avec leurs informations respectives.
    - **Modifier** ou **supprimer** un continent, un pays, ou une ville.
    - **Afficher** la liste des continents, des pays et des villes avec leurs détails.

3. **Centraliser la connexion à la base de données** et les requêtes SQL en utilisant **PDO** dans une classe dédiée **GestionBaseDeDonnées**. Cela inclut :
    - La gestion sécurisée des données avec des requêtes préparées.
    - L’utilisation et la compréhension des fonctions prédéfinies de PHP pour manipuler les données.

### Livrables

1. **Lien vers le repository GitHub** contenant le projet :
   - [GitHub Repository](https://github.com/MhamedOuhanane/Geo-Junior.git)

2. **Document PDF V1** :
   - [docomment.pdf](path/to/docomment.pdf)  

3. **Lien de planification en Jira** :
   - [Jira Planification](https://mhamde.atlassian.net/jira/software/projects/GJ/boards/9?sprintStarted=true&atlOrigin=eyJpIjoiMzRmNDg0YjY0OTk5NDllZjlhY2I2ODRmODkwMTI3N2IiLCJwIjoiaiJ9)

4. **Lien de présentation** :
   - [Présentation Canva](https://www.canva.com/design/DAGagEXjsBY/JVQiiCjMYeu7b9RWvtn7gg/edit?utm_content=DAGagEXjsBY&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)
