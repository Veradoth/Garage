<?php
    require_once("../header.php");
?>

<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Supprimer un véhicule</title>
    </head>
    <body>
        <h1>Supprimer un véhicule</h1>
        <p><a href='admin.php'>Retour</a></p>
        <?php
        include "../login/connexion_user.php";
        $num = $_POST['numVoiture'];

        $sql = "DELETE FROM voiture WHERE id = $num;";
        $connexion->query($sql); 
        if(!$connexion->errno){
            echo 'le véhicule a bien été supprimé <br>';}
        mysqli_close($connexion) ;
        ?>
        
    </body>
</html>
