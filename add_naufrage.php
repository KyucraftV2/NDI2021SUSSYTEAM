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
      <h2>Ajout dans la base de données</h2>
      <?php
      try {
        $db = new PDO('mysql:host=webinfo.iutmontp.univ-montp2.fr;dbname=reinerk;charset=utf8', 'reinerk', '060078262EG');
        $tab = $db->prepare('SELECT * FROM NAUFRAGES');
        $tab->execute();
        $nbID = $tab->fetchAll();
        $req = $db->prepare('INSERT INTO NAUFRAGES (idNaufrage) VALUES (:whatID)');
        $values = array(
          "whatID" => sizeof($nbID)+1
        );
        $req->execute($values);
        $tuples = $req->fetchAll();
        if (isset($_POST['uname'])) {
          $req = $db->prepare('UPDATE NAUFRAGES SET nomNaufrage = :lname_naufrage WHERE idNaufrage = :whatID');
          $values = array(
          "lname_naufrage" => $_POST['uname'],
          "whatID" => sizeof($nbID)+1
        );
          $req->execute($values);
        }
        if (isset($_POST['firstname'])) {
          $req = $db->prepare('UPDATE NAUFRAGES SET prenomNaufrage = :fname_naufrage WHERE idNaufrage = :whatID');
          $values = array(
          "fname_naufrage" => $_POST['uname'],
          "whatID" => sizeof($nbID)+1
        );
          $req->execute($values);
        }
        if (isset($_POST['datenaissance'])) {
          $req = $db->prepare('UPDATE NAUFRAGES SET dateNaissance = :fname_naufrage WHERE idNaufrage = :whatID');
          $values = array(
          "fname_naufrage" => $_POST['uname'],
          "whatID" => sizeof($nbID)+1
        );
          $req->execute($values);
        }
      } catch (Exception $e) {
        die('Erreur :' . $e->getMessage());
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