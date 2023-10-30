<?php

    $is_invalid = false; // Variable pour vérifier si la connexion est invalide
    if($_SERVER["REQUEST_METHOD"] === "POST"){ // Vérifie si la méthode de requête est POST
        $connexion = require __DIR__ . "/connexion_user.php"; // Inclut et assigne la connexion à la base de données

        $sql = sprintf("SELECT * FROM utilisateur WHERE mail = '%s'",
        $connexion->real_escape_string($_POST["mail"])); // Requête SQL pour récupérer un administrateur par son email

        $result = $connexion->query($sql); // Exécute la requête SQL

        $user = $result->fetch_assoc(); // Récupère les données de l'administrateur sous forme de tableau associatif

        if($user){ // Vérifie si un utilisateur a été trouvé
            if (password_verify($_POST["mdp"], $user["mdp_hash"])){ // Vérifie si le mot de passe correspond au hachage enregistré

                session_start(); // Démarre la session

                session_regenerate_id(); // Régénère l'ID de session pour des raisons de sécurité

                $_SESSION["user_id"] = $user["id"]; // Stocke l'ID de l'utilisateur dans la session

                header("Location: ../accueil.php"); // Redirige vers la page d'accueil
                exit; // Termine l'exécution du script
            }
        }
        $is_invalid = true; // Marque la connexion comme invalide si aucune correspondance n'est trouvée
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Connexion</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> <!-- Inclut une feuille de style externe -->
    </head>
    <body>
        <section>
            <h1>Connexion</h1>
            <?php if($is_invalid): ?> <!-- Affiche un message d'erreur si la connexion est invalide -->
                <em>Connexion invalide</em>
            <?php endif; ?>
            <form method="POST">
                <label>Adresse Mail</label>
                <input type="text" name="mail" value="<?= htmlspecialchars($_POST["mail"] ?? "")?>"> <!-- Champ de saisie de l'adresse e-mail avec la valeur précédemment saisie -->
                <label>Mot de passe</label>
                <input type="password" name="mdp" > <!-- Champ de saisie du mot de passe -->
                <label>Vous n'avez pas de compte ?</label>
                <a href="inscrire.php">S'inscrire</a> <!-- Lien pour s'inscrire -->
                <br>
                <button type="submit" name="valider"> Se connecter</button> <!-- Bouton pour soumettre le formulaire -->
            </form>
            <button onclick="window.location.href='../accueil.php';" class="btnLogin-popup">Retour</button> <!-- Bouton pour revenir à la page d'accueil -->
        </section>
    </body>
</html>
