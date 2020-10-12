<?php

    //on essaie d'établir une connexion à la bdd tp2_bdd
    try{
        $objectPDO = new PDO('mysql:host=localhost;dbname=bdd_tp2', 'root', 'root' );
        $objectPDO-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //On prépare la requête d'insertion SQL
    
    $PDOStat = $objectPDO->prepare('INSERT INTO commentaire VALUES(NULL, :description, :utilisateur_id)');

    //on lie chaque marqueur à une valeur
    $PDOStat->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
    $PDOStat->bindParam(':utilisateur_id', $_POST['utilisateur_id'], PDO::PARAM_STR);

    //exécution de la requête 
    $insertIsOK = $PDOStat->execute();

    if($insertIsOK){
        $message="Le commentaire a été ajouté dans la base de données";
    }
    else{
        $message = "Echec de l'ajout du commentaire";
    }
    }
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
?>

<!doctype html>

<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>Réponse</title>
</head>

<body>
    <h1> Insertion des commentaires </h1>

    <p><?php echo $message ?> </p>
    
    <form action=accueil.php>
        <div id="bouton1">
	        <input type="submit" value="Revenir à l'accueil" id="submit">	
        </div>
    </form>

    <form action=listercom.php>
        <div id="bouton2">
	        <input type="submit" value="Voir les commentaires" id="submit">	
        </div>
    </form>

</body>
</html>