<?php
    
    //on essaie d'établir une connexion à la bdd tp2_bdd
    try{
    $objectPDO = new PDO('mysql:host=localhost;dbname=bdd_tp2', 'root', 'root' );
        
    $objectPDO-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
?>

<html>

    <head>
        <title> TP SSI Bases de données </title>
        <meta charset ="utf-8">
        
    </head>

    <body>

        <div class=c100>
            <h1> Bienvenue dans notre base de données </h1>
            
        </div>

        <form action="formulaire.html">
            <div id="bouton1">
                <input type="submit" value="Créer un utilisateur" id="submit">
            </div>
           
        </form>

        
        <form action="lister.php">
            <div id="bouton2">
	            <input type="submit" value="Afficher les utilisateurs" id="submit">	
            </div>
            
        </form>

       
        <form action="formulairecom.php">
            <div id="bouton3">
                <input type="submit" value="Ajouter un commentaire" id="submit">
            </div>
           
        </form>
    
        <form action="commentaire.php">
            <div id="bouton4">
	            <input type="submit" value="Afficher les commentaires" id="submit">	
            </div>
        </form>
        
    </body>

</html>




