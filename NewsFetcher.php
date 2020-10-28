<?php

use voku\db\DB;
use Monolog\Logger;

/**
 * Cette classe genere les articles d'actualite
 */
class NewsFetcher
{
    /**
     * Loggeur pour les erreurs face a la base de donnees
     *
     * @var Logger
     */
    private $log;

    /**
     * Constructeur de la classe NewsFetcher
     */
    function __construct() {
        $this->log = new Logger('log');
        $this->log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
    }

    /**
     * Connecte a la base de donnees, requert les 3 articles selon le dernier ID et genere le HTML
     *
     * @return string resultat HTML qui contient les articles
     */
    function fetch() {
        try {
            $db = DB::getInstance('127.0.0.1', 'root', 'root', 'covid');

            try {
                $articleQuery = $db->query("select * from infos order by id desc limit 3");
                $articles  = $articleQuery->fetchAll();
                $result = '';

                foreach ($articles as $article) {
                    $base64image = base64_encode($article->image);
                    $result .= <<<HTML
                        <div>
                            <h2 class="mx-5">{$article->title}</h2>
                            <img width="40%" class="float-left m-4" src="data:image/jpeg;base64,{$base64image}"/>
                            <p>{$article->text}</p>
                        </div>
                    HTML;
                }
                return $result;
            } catch (Exception $e) {
                $this->log->addWarning('Exception reçue en envoyant une requëte a la base de données : '
                    .  $e->getMessage());
                return "Erreur de requëte a la base de données";
            }
        } catch (Exception $e) {
            $this->log->addWarning('Exception reçue en se connectant a la base de données : '
                .  $e->getMessage());
            return "Erreur de connexion  a la base de données";
        }
    }
}