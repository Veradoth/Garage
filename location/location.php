<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Location</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="location.css">
    </head>
    <body>
        <!-- En-tête de la page-->
        <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../accueil.php">Accueil</a>
        <div class="collapse navbar-collapse" id= "navbarTogglerDemo03">
        <form class="d-flex" role="search" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
        </div>
        </nav>
        </header>   

        <div class="center">
            <h1>Liste des véhicules</h1><br><br>
            <div class="voiture">

                <?php
                require_once("../connexion.php");
                $req=$connexion->prepare('SELECT * FROM voiture');
                $req->execute();
                while ($response=$req->fetch(PDO::FETCH_OBJ)){ ?>
                <div class="card" style="width: 18rem;">
                    <img src="images/<?php echo $response->nom_image ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $response->marque; ?> &nbsp; <?php echo $response->modele; ?></h5>
                        <p class="card-text"><?php echo substr($response->descrip, 0,100); ?></p>
                        <a href="info.php?imma=<?php echo $response->immatriculation; ?>
                                          &marque=<?php echo $response->marque; ?>
                                          &modele=<?php echo $response->modele; ?>
                                          &circulation=<?php echo $response->mise_circulation; ?>
                                          &prix=<?php echo $response->prix; ?>
                                          &rentree=<?php echo $response->date_rentree; ?>
                                          &chevaux=<?php echo $response->chevaux; ?>
                                          &descrip=<?php echo $response->descrip; ?>
                                          &nom_image=<?php echo $response->nom_image; ?>
                                          " class="btn btn-primary">Voir informations</a>
                    </div>
            </div>
            <?php }
            ?>
            </div>
        </div>
    </body>
</html>