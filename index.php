<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Statistics.php';
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="assets/virus.png">
        <title>Projet Covid</title>

        <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/custom.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="index.php">Site Covid</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="news.php">Actualites</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="infos.php">Se proteger</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main role="main" class="container">
            <?php
                $dao = new Statistics();
                $dao->fetch();
                echo $dao->getImage();
            ?>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">Projet Covid Raphael Boussidan</span>
            </div>
        </footer>

        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
