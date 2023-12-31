<?php
    session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Connexion</title>
</head>
<body>
<section>
    <h1>Connexion</h1>
    <?php 
        $is_invalid = isset($_SESSION["is_invalid"]) ? $_SESSION["is_invalid"] : false;
        if ($is_invalid): ?> <!-- Affiche un message d'erreur si la connexion est invalide -->
        <em>Connexion invalide</em>
    <?php endif; ?>
    <form action="connecter.php" method="POST">
        <label>Adresse Mail</label>
        <input type="text" name="mail" value="<?= htmlspecialchars($_POST["mail"] ?? "") ?>"> <!-- Champ de saisie de l'adresse e-mail avec la valeur précédemment saisie -->
        <label>Mot de passe</label>
        <input type="password" name="mdp"> <!-- Champ de saisie du mot de passe -->
        <button type="submit" name="valider"> Se connecter</button> <!-- Bouton pour soumettre le formulaire -->
        <br>
    </form>
    <label>Vous n'avez pas de compte ?</label>
    <a href="inscrire.php">S'inscrire</a> <!-- Lien pour s'inscrire -->
    <br>
    <button onclick="window.location.href='../index.php';" class="btnLogin-popup">Retour</button> <!-- Bouton pour revenir à la page d'accueil -->
</section>
</body>
</html>
