# 3IW1-2024

## Installation

1. Cloner le repository
```bash
git clone https://github.com/skrzypczyk/3IW1-2024
```

2. Build Docker
```bash
docker compose build
```

3. Lancer les containers
```bash
docker compose up -d
```

4. Accès au local
```
http://localhost
```

5. Importer la base de donnée
```
Importer dans phpmyadmin, le fichier "esgi.sql" qui se trouve dans le dossier "sql-db-to-import".
```

## Compte test
```
email : test@gmail.com
psswd : Testtest1
```

## Features

### Conception
- [x] Création d'une table SQL user

### Inscription
- [x] Création d'une vue avec un formulaire
- [x] Validation des champs du formulaire avec affichage des erreurs si nécessaire
  - email, pwd, pwdConfirm, firstname, lastname, country
  - Vérification de l'unicité de l'email
  - Utilisation de password hash
- [x] Insertion en BDD de l'utilisateur
- [x] Redirection sur la page de login

### Connexion
- [x] Création d'une vue avec un formulaire
- [x] Validation des champs avec vérifications des identifiants
  - Utilisation de password verify
- [x] Redirection sur la page d'accueil et afficher dessus le prénom si l'user est connecté

### Déconnexion
- [x] Ajouter un lien de déconnexion

### Notes
- [x] L'utilisation des models est facultative
- [x] Page title dynamique