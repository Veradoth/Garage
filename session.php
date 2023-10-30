<?php
    session_start(); // Démarre la session

    if (isset($_SESSION["user_id"])){ // Vérifie si l'ID de l'utilisateur est défini dans la session
        $connexion = require __DIR__ . "/login/connexion_user.php"; // Inclut et assigne la connexion à la base de données

        $sql = "SELECT * FROM utilisateur WHERE id = {$_SESSION["user_id"]}"; // Requête SQL pour récupérer un administrateur par son ID

        $result = $connexion->query($sql); // Exécute la requête SQL 

        $user = $result->fetch_assoc(); // Récupère les données de l'administrateur sous forme de tableau associatif
    }
?>