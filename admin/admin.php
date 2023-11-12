<?php
    require_once("../header.php"); // Inclusion du fichier header.php (probablement contenant la structure de l'en-tête de la page)
?>

<div class="center">
    <h1>Administration</h1><br><br> <!-- Affichage du titre "Administration" -->

    <!--Champ ajouter un véhicule-->

    <?php
        if(isset($_GET['action'])){ // Vérifie si le paramètre 'action' est présent dans l'URL
            if($_GET['action'] == 'add_vehicule'){ // Vérifie si la valeur du paramètre 'action' est égale à 'add_vehicule'
                require_once("../config/pdo.php"); // Inclusion du fichier connexion.php pour établir une connexion à la base de données

                if(isset($_POST['submit'])){ // Vérifie si le formulaire a été soumis (le bouton submit a été cliqué)
                    extract($_POST); // Extrait les données du formulaire dans des variables distinctes

                    $content_dir='../location/images/'; // Chemin du répertoire où les images seront stockées

                    $tmp_file = $_FILES['fichier']['tmp_name']; // Récupère le chemin temporaire du fichier uploadé

                    if(!is_uploaded_file($tmp_file)) {
                        exit('le fichier est introuvable'); // Arrête l'exécution du code et affiche un message d'erreur si le fichier est introuvable
                    }

                    $type_file = $_FILES['fichier']['type']; // Récupère le type de fichier uploadé

                    if(!strstr($type_file,'png') && !strstr($type_file,'jpeg')){
                        exit('Le fichier n\'est pas une image'); // Arrête l'exécution du code et affiche un message d'erreur si le fichier n'est pas une image
                    }

                    $name_file = time(). '.jpg'; // Génère un nom unique pour le fichier en utilisant le timestamp actuel

                    if(!move_uploaded_file($tmp_file, $content_dir.$name_file)){
                        $error = error_get_last();
                        exit('Impossible de copier le fichier. Erreur : ' . $error['message']);
                    }

                    $save_voiture = $connexion->prepare('INSERT INTO voiture(immatriculation, marque, modele, mise_circulation, prix, date_rentree, chevaux, descrip, nom_image) VALUES(?,?,?,?,?,?,?,?,?)'); // Prépare une requête SQL d'insertion dans la table 'voiture'
                    $save_voiture->execute(array($imma, $marque, $modele, $mise_circulation, $prix, $rentree, $chevaux, $descrip, $name_file)); // Exécute la requête d'insertion avec les valeurs fournies
                    echo "Véhicule enregistrée"; // Affiche un message de confirmation d'enregistrement du véhicule
                }
    ?>

    <h3>Ajouter un véhicule</h3>
    <form method="post" action="" enctype="multipart/form-data"><br>
        <input type="text" name="imma" placeholder="Immatriculation" required="" class="form form-control"><br>
        <input type="text" name="marque" placeholder="Marque" required="" class="form form-control"><br>
        <input type="text" name="modele" placeholder="Modèle" required="" class="form form-control"><br>
        <input type="date" name="mise_circulation" placeholder="Mise en circulation" required="" class="form form-control"><br>
        <input type="number" name="prix" placeholder="Prix" required="" class="form form-control"><br>
        <input type="date" name="rentree" placeholder="Mise en rentrée" required="" class="form form-control"><br>
        <input type="number" name="chevaux" placeholder="Chevaux" required="" class="form form-control"><br>
        <textarea name="descrip" placeholder="Description" class="form form-control"></textarea><br>
        <input type="file" name="fichier"><br><br>
        <input type="submit" name="submit" class="btn btn-primary"><br><br>
    </form>
    <?php
    }
    }

    ?>

</div>

<!--Champ supprimer un véhicule-->

<?php
    if(isset($_GET['action'])){ // Vérifie si la variable GET 'action' est définie
        if($_GET['action'] == 'suppr_vehicule'){ // Vérifie si la valeur de 'action' est égale à 'suppr_vehicule'
            require_once("../config/config.php"); // Inclut et exécute le fichier de connexion à la base de données
            ?>

    <h3>Supprimer un véhicule</h3> <!-- Titre "Supprimer un véhicule" -->
    <form action='supprimer.php' method='POST'> <!-- Formulaire avec action 'supprimer.php' et méthode POST -->
    Voiture : <select name='numVoiture'> <!-- Élément de sélection avec le nom 'numVoiture' -->
    <?php
    include "../login/connexion_user.php"; // Inclut et exécute à nouveau le fichier de connexion à la base de données
    $sql = 'SELECT * FROM voiture'; // Requête SQL pour sélectionner toutes les voitures
    $listeVoiture = $connexion->query($sql); // Exécute la requête SQL et assigne le résultat à la variable $listeVoiture
    while ($voiture = $listeVoiture->fetch_assoc()) { // Boucle while pour parcourir chaque ligne de résultat
        echo "<option value='".$voiture['id']."'>".$voiture['immatriculation']." ".$voiture['marque']." ".$voiture['modele']." ".$voiture['mise_crirculation']." ".$voiture['prix']." ".$voiture['date_rentree']." ".$voiture['chevaux']." ".$voiture['descrip'];
        echo '</option>'; // Affiche chaque option dans le menu déroulant avec les informations de la voiture
    }
    ?>
    </select><br> <!-- Fin de l'élément de sélection -->
    <?php $connexion->close();?> <!-- Ferme la connexion à la base de données -->
    <input type='submit' Value="Supprimer cette voiture"/> <!-- Bouton de soumission du formulaire -->
    </form> <!-- Fin du formulaire -->
    <?php
    }
}
?>

<!--Champ modifier un véhicule-->

<?php
    if(isset($_GET['action'])){
        if($_GET['action'] == 'mod_vehicule'){
            require_once("../config/config.php");
            ?>
        
        <h1>Modifier la voiture</h1>
        <form action = 'modifier.php' method ='POST'>
        Voiture : <select name='numVoiture'>
        <?php
        include "../login/connexion_user.php";
        $sql = 'SELECT * FROM voiture';
        $listeVoiture = $connexion->query($sql);
        while ($voiture = $listeVoiture->fetch_assoc()) {
	        echo "<option value='".$voiture['id']."'>".$voiture['immatriculation']." ".$voiture['marque']." ".$voiture['modele']." ".$voiture['mise_crirculation']." ".$voiture['prix']." ".$voiture['date_rentree']." ".$voiture['chevaux']." ".$voiture['descrip'];
            echo '</option>';
        }
        ?>
        <hr>
        </select><br>
        <input type="text" name="newImmatriculation" placeholder="Immatriculation" required="" class="form form-control"><br>
        <input type="text" name="newMarque" placeholder="Marque" required="" class="form form-control"><br>
        <input type="text" name="newModele" placeholder="Modèle" required="" class="form form-control"><br>
        <input type="date" name="newMise-circulation" placeholder="Mise en circulation" required="" class="form form-control"><br>
        <input type="number" name="newPrix" placeholder="Prix" required="" class="form form-control"><br>
        <input type="date" name="newRentree" placeholder="Mise en rentrée" required="" class="form form-control"><br>
        <input type="number" name="newChevaux" placeholder="Chevaux" required="" class="form form-control"><br>
        <textarea name="newDescription" placeholder="Description" class="form form-control"></textarea><br>
        <input type="submit" name="submit" class="btn btn-primary"><br><br>
        </form>
    <?php
        }
    }
    ?>

