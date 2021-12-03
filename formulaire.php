
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>     
    </head>
    <body>
    <?php
    if (isset($_POST["unbateau"])){
        echo $_POST["unbateau"];
    }  
    if (isset($_POST["unnaufrage"])){
        echo $_POST["unnaufrage"];
    }  
    if (isset($_POST["unsauveteur"])){
        echo $_POST["unsauveteur"];
    }  
?>

    </body>
</html>


