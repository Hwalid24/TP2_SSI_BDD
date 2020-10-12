<?php
    //on essaie d'établir une connexion à la bdd tp2_bdd
    try{
        $objectPDO = new PDO('mysql:host=localhost;dbname=bdd_tp2', 'root', 'root' );
        $objectPDO-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On prépare la requête 
        $PDOStat = $objectPDO->prepare('DELETE FROM commentaire WHERE id=:num LIMIT 1'); //on utilise le paramètre num et le limite à 1 à la fois

        //liaison du paramètre num
        $PDOStat->bindValue(':num', $_GET['numUtilisateur'], PDO::PARAM_INT); //le paramètre num récupère la valeur de numUtilisateur dans l'URL

        //exécution de la requête
        $deleteIsOk = $PDOStat->execute();

        //on teste le résultat de l'exécution
        if($deleteIsOk){
            $message = "Le commentaire a été supprimé";
        }
        else{
            $message = "Echec lors de la suppression du commentaire";
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
    <h1> Suppression d'un commentaire </h1>

    <p><?php echo $message ?> </p>
    
    <form action="listercom.php">
            <div id="bouton1">
                <input type="submit" value="Afficher les commentaires" id="submit">
            </div>
    </form>

    <form action="accueil.php">
        <div id="bouton2">
	        <input type="submit" value="Revenir à l'accueil" id="submit">	
        </div>
    </form>

</body>
</html>