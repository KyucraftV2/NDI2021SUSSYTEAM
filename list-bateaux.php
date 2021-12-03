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
        <div><a  class="btn" href="./page_accueil.html">Accueil</a></div>
        <div><a href="./list-bateaux.php" class="btn">Bateaux</a></div>
        <div><a href="./list-naufrages.php" class="btn">Naufragés</a></div>  
        <div><a href="./list-sauveteurs.php" class="btn">Sauveteurs</a></div>
        <button id="themesombre" class="btn">Mode sombre</button>
        <script src="script.js"></script>
    </nav>
    <header>
        <h1>Les Bateaux</h1>
    </header>

    <main>
        <section>
            <form method="post" action="./result-bateau.php">
                <input name="bateau" type="text" size="15" placeholder="Type here… " />
                <!---->
                <div class="buttons">
                    <button class="envoyer" type="submit">Rechercher</button>
                </div>
            </form>
        </section>

        <section class="list">
            <h2>Les Bateaux</h2>
            <?php
            try {
                $db = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=reinerk;charset=utf8', 'reinerk', '060078262EG');
                $req = $db->prepare('SELECT * FROM BATEAUX ORDER BY nomBateau');
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
                    $t = $tuples[($li * 5) + $i];
                    echo '<div class="display-data"> <p>' . $t['nomBateau'] . ' - (' . $t['typeBateau'] . ')';
                    echo '    <a href="getUser.php?idBateau=' . $t['idBateau'] . '">Detail</a>   </p></div>';
                }
                echo '</div>';
            }
            ?>
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