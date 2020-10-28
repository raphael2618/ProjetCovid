<?php

require __DIR__ . '/vendor/autoload.php';

/**
 * Cette classe genere les statistiques
 */
class Statistics
{

    /**
     * Tire de l'API corona.lmao.ninja des donnees en JSON,
     * utilise JSONQ pour faire des calculs et genere une table de statistiques.
     *
     * @return string resultat HTML qui contient les statistiques
     */
    function fetch() {

            //$url = "https://corona.lmao.ninja/v2/countries";
            //$file_name = basename($url);
            //$jsonData = file_get_contents($url);
            //$jsonqData = '{ "name": "covid", "description": "Features product list",
            //            "stats": ' . $jsonData . '}';

            // Utiliser ceci au cas ou l'API n'est pas disponible
             $jsonqData = file_get_contents("coviddata.json");

            $pays = array(
                "France" => "France",
                "Belgium" => "Belgique",
                "USA" => "Etats-Unis",
                "Canada" => "Canada",
                "Germany" => "Allemagne"
            );

            $result = jsonq($jsonqData)->from('stats')
                ->where('country', 'in', array_keys($pays))
                ->get(['country', 'deaths', 'cases', 'recovered', 'critical'])
                ->groupBy('country');
            ?>
            <p>
            <h4>Données statistiques par pays</h4>
            <table id='covidtable' class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Pays</th>
                    <th>Morts</th>
                    <th>Cas</th>
                    <th>Guéris</th>
                    <th>Critiques</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $key => $tuple) {
                    echo "<tr>\n";
                    echo "<th scope=\"row\">" . $pays[$key] . "</th>";
                    echo "<td>" . $tuple[0]['deaths'] . "</td>";
                    echo "<td>" . $tuple[0]['cases'] . "</td>";
                    echo "<td>" . $tuple[0]['recovered'] . "</td>";
                    echo "<td>" . $tuple[0]['critical'] . "</td>";
                    echo "</tr>\n";
                }

                ?>
                </tbody>
            </table>
            </p>
            <?php
    }

    /**
     * Genere le code HTML pour une image avec des statistiques.
     *
     * @return string code HTML de l'image
     */
    function getImage() {
        return <<<HTML
            <div style="width: 80%;" class="mx-auto">
                <h4>Graphique</h4>
                <img src="assets/barchart.png" width="100%">
            </div>
            HTML;
    }
}
