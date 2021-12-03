
<?php
    if (isset($_POST["uname"])){
        echo "Bonjour ".$_POST["uname"];
    }  
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <header>
        <nav>
          <a href="page_bateaux.html">Bateaux</a>
          <a href="page_naufrage.html">Naufragés</a>
          <a href="page_sauveteur.html">Sauveteurs</a>
          <a href="formulaire_naufrage.html">Signaler un sauvetage</a>
          <a href="formulaire.html">Ajouter un sauveteur</a>
        </nav>
        <h1>Les Sauveteurs du Dunkerquois</h1>
      </header>
    <form section="sendToMySecondYearInIut.php" method="post">
        <p>Les informations que vous allez rentrer seront vérifiés par un adminsitateur</p>
        <h2>Informations du Sauveteur</h2>
                
                <div class="formulaire">
                    <label for="surname">Nom du sauveteur</label>
                    <input id="surname" name="uname" type="text" placeholder="François">
                    <br>
                </div>

                <div class="formulaire">
                    <label for="name">Prenom du sauveteur</label>
                    <input type="text" name="firstname" id="name" placeholder="Jean">
                </div>

                <div class="formulaire">
                    <label for="datenaissance">Date de naissance :</label>
                    <input type="date" name="datenaissance" id="datenaissance">
                </div>

                <div class="formulaire">
                    <label for="datemort">Date de mort :</label>
                    <input type="date" name="datemort" id="datemort">
                </div>

                <div class="formulaire">
                    <label for="nbsauvetage">Nombre de sauvetages</label>
                    <input type="number" name="nbsauvetage" id="nbsauvetage" min=0>
                </div>


                <div class="formulaire">
                    <label for="fonctions">Fonction du sauveteur</label>
                    <input type="text" name="fonctions" id="fonctions">
                </div>

                <div class="buttons">
                    <button class="envoyer" type="submit">Envoyer</button>
                </div>

    </form>
</body>
</html>
