# Projet COVID Raphael Boussidan

## Introduction

Projet pour classe de CSI 2020 utilisant Composer, Monolog, phpDocumentor, Git, MySQL et Bootstrap.

Le projet contient 3 pages : 
  - L'accueil avec un tableau de statistiques sur le COVID 19 tirer d'une API (statistics.php)
  - Une page d'informations (infos.php)
  - Une page d'actualités (news.php)

## Instructions

### Comment installer
Executer:

    composer install

### Comment demarrer

    php -S localhost:8000
    
### Generer documentation phpDocumentor

    vendor\bin\phpdoc run -d . -t docs  --ignore "vendor/"
    
Ensuite ouvrir le fichier `docs/index.html` localement dans le navigateur.
