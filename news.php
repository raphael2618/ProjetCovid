<?php

require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->addWarning('Requete vers page d\'accueil');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
</head>

<body>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Site Covid</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="news.php">Actualites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="infos.php">Se proteger</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="container">
    <?php
    use voku\db\DB;
    $db = DB::getInstance('127.0.0.1', 'root', 'root', 'covid');

    $articleQuery = $db->query("select * from infos order by id desc limit 3");
    $articles  = $articleQuery->fetchAll();

    foreach ($articles as $article) {
        echo '<h2>' .  $article->title . '</h2>';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($article->image) . '"/>';
        echo '<p>' .  $article->text . '</p>';
    }
    ?>
</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
<!--<script src="../../assets/js/vendor/popper.min.js"></script>-->
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
