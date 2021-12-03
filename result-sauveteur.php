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
    <!-- BARRE DE RECHERCHE -->
    <section>
      <form method="post" action="result.php">
        <input name="sauveteur" type="text" size="15" placeholder="Type here… " />
        <!---->
        <div class="buttons">
          <button class="envoyer" type="submit">Rechercher</button>
        </div>
      </form>
    </section>

    <section class="list">
      <h2>Résultats de la Recherche</h2>
      <?php
      try {
        $db = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=reinerk;charset=utf8', 'reinerk', '060078262EG');
        $req = $db->prepare('SELECT * FROM SAUVETEURS WHERE nomSauveteur = :save_lname OR prenomSauveteur = :save_fname ORDER BY nomSauveteur');
        $values = array(
          "save_lname" => $_POST["sauveteur"],
          "save_fname" => $_POST["sauveteur"]
        );
        $req->execute($values);
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
          echo '<div class="display-data"> <p>' . $t['nomSauveteur'] . ' ' . $t['prenomSauveteur'];
          echo '    <a href="getUser.php?idSauveteur=' . $t['idSauveteur'] . '">Detail</a>   </p></div>';
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