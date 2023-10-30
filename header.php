<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administration</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="header.css">
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
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?action=add_vehicule">Ajouter un vehicule</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?action=mod_vehicule">Modifier un véhicule</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?action=suppr_vehicule">Supprimer un véhicule</a>
            </li>
        </ul>
        <!--<form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        -->
        </form>
        </div>
        </div>
        </nav>
        </header>   

    </body>
</html>