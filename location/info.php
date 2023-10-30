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
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
        </div>
        </nav>
        </header>   

        <div class="center">
            <h1>Informations</h1><br><br>
            <div class="voiture">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="images/<?php echo $_GET['nom_image'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">Immatriculation : <?php echo $_GET['imma'] ?></p>
                            <p class="card-text">Marque : <?php echo $_GET['marque'] ?></p>
                            <p class="card-text">Modèle : <?php echo $_GET['modele'] ?></p>
                            <p class="card-text">Mise en circulation : <?php echo $_GET['circulation'] ?></p>
                            <p class="card-text">Prix : <?php echo $_GET['prix'] ?> CFP</p>
                            <p class="card-text">Mise en rentrée : <?php echo $_GET['rentree'] ?></p>
                            <p class="card-text">Chevaux: <?php echo $_GET['chevaux'] ?></p>
                            <p class="card-text">Description : <?php echo $_GET['descrip'] ?></p>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <button onclick="window.location.href='location.php';" type="button" class="btn btn-primary">Retour</button>
            </div>
        </div>
    </body>
</html>