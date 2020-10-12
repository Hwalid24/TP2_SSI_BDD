<?php

    //on essaie d'établir une connexion à la bdd tp2_bdd
    try{
        $objectPDO = new PDO('mysql:host=localhost;dbname=bdd_tp2', 'root', 'root' );
        $objectPDO-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //On prépare la requête d'insertion SQL
    $PDOStat = $objectPDO->prepare('INSERT INTO utilisateur VALUES(NULL, :nom, :prenom, :date, :cb, :ville)');

    //on lie chaque marqueur à une valeur
    $PDOStat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $PDOStat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $PDOStat->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
    $PDOStat->bindParam(':cb', $_POST['cb'], PDO::PARAM_STR);
    $PDOStat->bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);

    //exécution de la requête 
    $insertIsOK = $PDOStat->execute();

    if($insertIsOK){
        $message="L'utlisateur a été ajouté dans la base de données";
    }
    else{
        $message = "Echec de l'ajout d'utilisateur";
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
    <h1> Insertion des utilisateurs </h1>

    <p><?php echo $message ?> </p>
    
    <form action=accueil.php>
        <div id="bouton1">
	        <input type="submit" value="Revenir à l'accueil" id="submit">	
        </div>
    </form>

    <form action=lister.php>
        <div id="bouton2">
	        <input type="submit" value="Voir les utilisateurs" id="submit">	
        </div>
    </form>

</body>
</html>


