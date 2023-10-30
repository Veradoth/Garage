
<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Modifier un véhicule</title>
    </head>
    <body>
        <h1>Modifier un véhicule</h1>
        <p><a href='admin.php'>Retour</a></p>
        <?php
        include "../login/connexion_user.php";
        $num = $_POST['numVoiture'];
        $immatriculation = $_POST['newImmatriculation'];
        $marque = $_POST['newMarque'];
        $modele = $_POST['newModele'];
        $mise_circulation = $_POST['newMise-circulation'];
        $prix = $_POST['newPrix'];
        $rentree = $_POST['newRentree'];
        $chevaux = $_POST['newChevaux'];
        $descrip = $_POST['newDescription'];

        $sql = "UPDATE voiture SET immatriculation = '$immatriculation' , marque = '$marque' , modele = '$modele' , mise_circulation = '$mise_circulation' , prix = '$prix' , date_rentree = '$rentree' , chevaux = '$chevaux' , descrip = '$descrip' WHERE id = $num;";
        $connexion->query($sql); 
        if(!$connexion->connect_errno){echo 'la voiture a bien été modifié <br>';}
        mysqli_close($connexion) ;
        ?>
        
    </body>
</html>
