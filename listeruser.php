<?php

    //on essaie d'établir une connexion à la bdd tp2_bdd
    try{
        $objectPDO = new PDO('mysql:host=localhost;dbname=bdd_tp2', 'utilisateur_2', '' );
        $objectPDO-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //On prépare la requête 
    $PDOStat = $objectPDO->prepare('SELECT * FROM vue_utilisateur');

    //exécution de la requête 
    $executeIsOk = $PDOStat ->execute();

    //récupération des résultas en une seule fois 
    $vue_utilisateur = $PDOStat -> fetchAll();
    }
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

?>

<!doctype html>

<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>Vue Utilisateurs</title>
  
</head>

    <body>
        <h1> Affichage des utilisateurs en vue </h1>

        <?php foreach ($vue_utilisateur as $vue_utilisateur): ?> <!-- à chaque itération on récupére un utilisateur -->
            
            <li>
            <?= $vue_utilisateur['id'] ?> <?= $vue_utilisateur['nom'] ?> <?= $vue_utilisateur['prenom'] ?> - <?= $vue_utilisateur['ville'] ?>
            
                
            
            </li>

        <?php endforeach ?> 

        <form action="accueiluser.php">
            <div id="bouton2">
	            <input type="submit" value="Revenir à l'accueil" id="submit">	
            </div>
        </form>
        
    </body>

</html>