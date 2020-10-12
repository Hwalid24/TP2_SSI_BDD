<head>
    <title> Formulaire </title>
    <meta charset ="utf-8">
    <link rel="stylesheet" href="style.css"/>
</head> 

<div class=c100>
<h1>
    Bienvenue sur le formulaire 
</h1>
</div>

<form action="inserercom.php" method="post">  
<div class="c100">
    <label for = "description"> Description : </label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
</div>


<div class="c100">
        <label for = "utilisateur_id"> Numero Utilisateur : </label>
        <input type = "text" id = "utilisateur_id" name = "utilisateur_id"> 
    </div>



<div class = "c100" id = "submit">
    <input type ="submit" value="Ajouter">
</div>

