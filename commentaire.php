<?php

    //on essaie d'établir une connexion à la bdd tp2_bdd
    try{
        $objectPDO = new PDO('mysql:host=localhost;dbname=bdd_tp2', 'root', 'root' );
        $objectPDO-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //On prépare la requête 
    $PDOStat = $objectPDO->prepare('SELECT * FROM commentaire');

    //exécution de la requête 
    $executeIsOk = $PDOStat ->execute();

    //récupération des résultas en une seule fois 
    $utilisateur = $PDOStat -> fetchAll();
    }
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

?>

<!doctype html>

<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>Commentaires</title>
  
</head>

    <body>
        <h1> Affichage des commentaires </h1>

        <?php foreach ($commentaire as $commentaire): ?> <!-- à chaque itération on récupére un utilisateur -->
            
            <li>
                <?= $commentaire['description'] ?> <?= $commentaire['utilisateur_id'] ?> 
            
                <a href ="supprimercom.php?numUtilisateur=<?= $commentaire['utilisateur_id']?>"> Supprimer </a>
            
            </li>

        <?php endforeach ?> 

        <form action="accueil.php">
            <div id="bouton2">
	            <input type="submit" value="Revenir à l'accueil" id="submit">	
            </div>
        </form>
        
    </body>

</html>


