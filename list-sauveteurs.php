<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Sauveteurs Dunkerquois</title>
</head>

<body>
    <nav>
        <a href="page_accueil.html" class="btn">Accueil</a>
        <a href="page_bateaux.html" class="btn">Bateaux</a>
        <a href="page_naufrage.html" class="btn">Naufragés</a>
        <a href="list-sauveteurs.html" class="btn">Sauveteurs</a>
    </nav>
    <header>
        <h1>Les Sauveteurs</h1>
    </header>

    <main>
        <section>
            <p>
                Bienvenue sur le site des sauveteurs du dunkerquois. Ce site rend hommage aux femmes, hommes et enfants qui ont réalisé des actes de sauvetages en milieu aquatique.
                Ces sauveteurs, habitants du dunkerquois (de Bray-Dunes à Grand-Fort-Philippe), ont participé à plus de 900 sauvetages en mer et plus de 1100 sauvetages individuels. Œuvrant avec courage, abnégation et souvent au mépris du risque ils méritent amplement que leurs actes soient pérennisés.

                La citation ci-dessous, signée Arsène Bossu, à un journaliste du Grand Echo du Nord de la France en 1932, résume à elle seule l’état d’esprit des sauveteurs du Dunkerquois.
            </p>
            <figure>
                <img src="./images/sauvetage.jpg" class="sauvetage">
                <!-- Image n°1 (positionné à gauche)-->
            </figure>

            <blockquote class="b1">
                Les sauvetages ? Mais tout le monde en fait ...
                Si un homme tombe dans la "Baille" est ce qu'on ,e va pas le chercher ?
                Il n'y à cela aucun mérite...
            </blockquote>
        </section>


        <!-- BARRE DE RECHERCHE -->
        <section>
            <div>
                <!--Barre de recherche avec options - filtres -->
            </div>
        </section>

        <!-- COURT APERCU DU TABLEAU D'HONNEUR -->
        <section class="list">
            <h2>Tableau d'honneur</h2>
            <div>
                <!-- SCRIPT POUR AFFICHER 5 sauveteurs du tableau d'honneur -->
                <a href="tableau_honneur.html">Voir Plus</a>
            </div>
        </section>

        <!-- LISTE PAR ORDRE ALPHABETIQUE DE TOUS LES SAUVETEURS ENREGISTRES (SI PAS DE NOM SELON L'ORDRE DES CODES A LA FIN) -->
        <section class="list">
            <h2>Nos Héros</h2>
            <?php
            try {
                $db = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=reinerk;charset=utf8', 'reinerk', '060078262EG');
                $req = $db->prepare('SELECT * FROM SAUVETEURS ORDER BY nomSauveteur');
                $req->execute();
                $tuples = $req->fetchAll();
            } catch (Exception $e) {
                die('Erreur :' . $e->getMessage());
            }
            for ($li = 0; $li < (int) sizeof($tuples) / 5; $li++) {
                echo '<div>';
                $nb_to_screen = (sizeof($tuples) - ($li * 5));
                if ($nb_to_screen >= 5) $nb_to_screen = 5;
                for ($i = 0; $i < $nb_to_screen; $i++) {
                    $t = $tuples[($li*5)+$i];
                    echo '<div class="sauv"> <p>' . $t['nomSauveteur'] . ' ' . $t['prenomSauveteur'];
                    echo '    <a href="getUser.php?idSauveteur=' . $t['idSauveteur'] . '">Detail</a>   </p></div>';
                }
                echo '</div>';
            }
            /*foreach($tuples as $t) {
                    echo '<p>' . $t['nomSauveteur'] . ' ' . $t['prenomSauveteur'];
                    echo '    <a href="getUser.php?idSauveteur='.$t['idSauveteur'].'">Detail</a>   </p>';
                }*/
            ?>
            <!-- SCRIPT POUR AFFICHER 5 SAUVETEURS 
                    - Carré avec Photo (si il y'a) + bandean semi transparent en bas avec nom prenom -->
            <!-- Répéter jusqu'à 10 divs similaires par page, donc ajouter un système de pagination. -->
        </section>
    </main>
    <footer class="footer">
        <div>
            <div class="alignement">
                <div class="colonne">
                    <h3><a>Rajoutez vos infos !</a></h3>
                    <ul>
                        <li><a>Naufragés</a></li>
                        <li><a>Sauveteur</a></li>
                    </ul>
                </div>
            </div>
            <div class="alignement">
                <h3 class="decalage"><a href="./sources.html">Livre d'Or</a></h3>
            </div>
        </div>
        <div class="divlogo">
            <a href="https://www.facebook.com/groups/938396409644949"><img src="./images/facebook.png" alt="" class="logo"></a>
            <a href="https://twitter.com/boutelierphili1"><img src="./images/twitter.png" alt="" class="logo"></a>
            <a href="mailto:sauveteurdudunkerquois@gmail.com"><img src="./images/arobase.png" alt="" class="logo"></a>
        </div>


        <p class="copyright">SussyTeam © 2021</p>
    </footer>
</body>

</html>