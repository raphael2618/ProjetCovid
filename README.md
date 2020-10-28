# Projet COVID Raphael Boussidan

## Introduction

Projet pour classe de CSI 2020 utilisant Composer, Monolog, phpDocumentor, Git, MySQL et Bootstrap.

## Instructions

### Comment installer
Executer:

    composer install

### Comment demarrer

    php -S localhost:8000
    
### Generer documentation phpDocumentor

    vendor\bin\phpdoc run -d . -t docs  --ignore "vendor/"
    
Ensuite ouvrir `docs/index.html` dans le navigateur